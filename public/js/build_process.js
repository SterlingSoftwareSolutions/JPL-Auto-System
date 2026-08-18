function initBuildProcess(wrapId, data, interactive, buildCards, activeBuildId) {
    const wrap = document.getElementById(wrapId);
    if (!data || data.length === 0) {
        wrap.innerHTML = '<div style="padding:40px;text-align:center;color:#6b7280;font-size:14px;border:1px dashed #d1d5db;border-radius:8px;margin-top:20px;">No build process steps found.</div>';
        return;
    }

    // 1. Process data into SECTIONS and OPS
    let sectionsMap = {};
    let OPS = [];
    data.forEach((st, stIdx) => {
        let sId = st.section_name || String(stIdx + 1).padStart(2, '0');
        let title = st.name || '';
        title = title.replace(/^(\d+)\s*[-—]*\s*/, '');
        
        if(!sectionsMap[sId]) sectionsMap[sId] = { id: sId, title: title };
        
        st.operations.forEach(op => {
            OPS.push({
                dbOpId: op.id,
                dbStId: st.id,
                opNo: op.code,
                title: op.title,
                section: sId,
                station: op.station || st.name,
                ppe: op.ppes ? op.ppes.map(p => p.name) : [],
                hazards: op.hazards ? op.hazards.map(h => [h.hazard, h.control]) : [],
                tools: op.tools ? op.tools.map(t => t.name) : [],
                materials: op.materials ? op.materials.map(m => m.name) : [],
                steps: op.steps.map(s => [s.label, s.keypoint_text, s.image_path || null, s.image_caption || null, { 
                    photoRequired: s.photo_required, 
                    photoLabel: s.photo_label,
                    dataEntry: s.data_entry_label ? { label: s.data_entry_label, spec: s.data_entry_spec, unit: s.data_entry_unit } : null
                }]),
                qc: op.qc_checks ? op.qc_checks.map(q => [q.specification, q.expected_value || '', q.status, q.id, q.after_step ?? null]) : [],
                dbSteps: op.steps,
                signoffs: op.signoffs || [],
                diagramSvg: op.diagram_svg ? op.diagram_svg : (op.diagram_image_path ? (window.AppUrl + '/storage/' + op.diagram_image_path) : null),
                diagramCaption: op.diagram_caption || null
            });
        });
    });
    const SECTIONS = Object.values(sectionsMap).sort((a, b) => parseInt(a.id, 10) - parseInt(b.id, 10));
    
    // 2. Setup state
    let viewMode = 'section';
    let currentSectionId = SECTIONS[0].id;
    let currentOpIdx = 0;
    let openSections = { [currentSectionId]: true };

    const b = interactive ? buildCards.find(x => x.id === activeBuildId) : null;

    // Build the initial HTML structure
    wrap.innerHTML = `
      <div class="bp-wrapper" data-theme="light">
        <button id="bp-menu-btn" onclick="document.getElementById('bp-sidebar-${wrapId}').classList.toggle('open')">☰</button>
        <div class="bp-app">
          <aside class="bp-sidebar" id="bp-sidebar-${wrapId}">
            <div class="bp-brand" style="padding:20px 20px 14px;border-bottom:1px solid var(--line);">
              <div>
                <div style="font-family:var(--mono);font-size:11px;letter-spacing:.14em;color:var(--amber);text-transform:uppercase;">JPL Automotive</div>
                <h1 style="font-family:var(--disp);font-size:20px;font-weight:600;margin:4px 0 2px;">Full Build — ${b ? b.name : 'Template'}</h1>
                <div style="font-size:11.5px;color:var(--muted);">1967 Mustang Fastback · Rev A</div>
              </div>
            </div>
            <div style="padding:14px 20px;border-bottom:1px solid var(--line);">
              <div style="display:flex;justify-content:space-between;font-family:var(--mono);font-size:11px;color:var(--muted);margin-bottom:8px;text-transform:uppercase;letter-spacing:.08em;">
                  <span>Overall build progress</span>
                  <span id="overall-pct-${wrapId}" style="color:var(--text);font-size:13px;">0%</span>
              </div>
              <div style="height:7px;background:var(--panel2);border:1px solid var(--line);border-radius:4px;overflow:hidden;">
                  <div id="overall-bar-${wrapId}" style="height:100%;background:linear-gradient(90deg,var(--amber-dim),var(--amber));border-radius:4px;transition:width .35s ease;width:0%"></div>
              </div>
            </div>
            <div class="bp-op-list" id="op-list-${wrapId}" style="flex:1;padding:6px 10px 10px;overflow-y:auto;"></div>
          </aside>
          <main class="bp-main" id="bp-main-${wrapId}" style="flex:1;min-width:0;padding:32px 40px 80px;"></main>
        </div>
        <div id="bp-lightbox" onclick="this.classList.remove('open')">
          <img id="bp-lightbox-img" src="" alt="Full size" onclick="event.stopPropagation()">
          <div class="lbcap" id="bp-lightbox-cap"></div>
        </div>
      </div>
    `;

    // Lightbox helper attached to window so inline onclicks can reach it
    if (!window.bpOpenLightbox) {
        window.bpOpenLightbox = function(src, cap) {
            document.getElementById('bp-lightbox-img').src = src;
            document.getElementById('bp-lightbox-cap').innerText = cap || '';
            document.getElementById('bp-lightbox').classList.add('open');
        };
    }
    if (!window.bpOpenLightboxFromEl) {
        window.bpOpenLightboxFromEl = function(el) {
            const imgEl = el.querySelector('img');
            const src = imgEl ? imgEl.src : '';
            const cap = el.getAttribute('data-img-cap') || '';
            document.getElementById('bp-lightbox-img').src = src;
            document.getElementById('bp-lightbox-cap').innerText = cap;
            document.getElementById('bp-lightbox').classList.add('open');
        };
    }

    const listEl = document.getElementById(`op-list-${wrapId}`);
    const mainEl = document.getElementById(`bp-main-${wrapId}`);

    // Helper functions
    const sectionOps = (sid) => OPS.filter(o => o.section === sid);
    const opCompletion = (op) => {
        const t = op.dbSteps.length;
        if(t===0) return 0;
        const c = interactive ? op.dbSteps.filter(s=>s.is_completed).length : 0;
        return c/t;
    };
    const opFullyDone = (op) => op.dbSteps.length > 0 && opCompletion(op) === 1;
    const sectionCompletion = (sid) => {
        const sops = sectionOps(sid);
        const t = sops.reduce((a,o)=>a+o.dbSteps.length,0);
        if(t===0) return 0;
        const c = interactive ? sops.reduce((a,o)=>a+o.dbSteps.filter(s=>s.is_completed).length,0) : 0;
        return c/t;
    };
    const overallCompletion = () => {
        const t = OPS.reduce((a,o)=>a+o.dbSteps.length,0);
        if(t===0) return 0;
        const c = interactive ? OPS.reduce((a,o)=>a+o.dbSteps.filter(s=>s.is_completed).length,0) : 0;
        return c/t;
    };

    function renderSidebar() {
        const pct = Math.round(overallCompletion()*100);
        document.getElementById(`overall-pct-${wrapId}`).textContent = pct + '%';
        document.getElementById(`overall-bar-${wrapId}`).style.width = pct + '%';

        listEl.innerHTML = '';
        const currentOp = OPS[currentOpIdx];

        SECTIONS.forEach(sec => {
            const ops = sectionOps(sec.id);
            if(ops.length===0) return;
            const isOpen = openSections[sec.id] !== undefined ? openSections[sec.id]
              : (viewMode==='section' ? sec.id===currentSectionId : (currentOp && currentOp.section===sec.id));
            const spct = Math.round(sectionCompletion(sec.id)*100);
            const sectionActive = viewMode==='section' && currentSectionId===sec.id;

            const group = document.createElement('div');
            group.style.marginBottom = '2px';
            const head = document.createElement('div');
            head.className = 'section-head' + (sectionActive ? ' active' : '');
            head.style = `display:flex;align-items:center;gap:8px;padding:10px 8px;cursor:pointer;border-radius:8px; ${sectionActive ? 'background:var(--panel2);border:1px solid var(--amber-dim);' : ''}`;
            head.innerHTML = `
              <span style="font-family:var(--mono);font-size:10px;color:var(--muted);width:12px;transition:transform .15s;transform:${isOpen?'rotate(90deg)':'none'}" data-chevron>▶</span>
              <span style="font-family:var(--mono);font-size:10px;color:var(--muted);background:var(--panel2);border:1px solid var(--line);border-radius:5px;padding:2px 6px;flex:0 0 auto;">${sec.id}</span>
              <span style="font-size:12.5px;font-weight:600;color:var(--text);flex:1;min-width:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${sec.title}</span>
              <span style="font-family:var(--mono);font-size:10px;color:var(--muted);">${spct}%</span>
            `;
            head.querySelector('[data-chevron]').onclick = (e) => { e.stopPropagation(); openSections[sec.id] = !isOpen; renderSidebar(); };
            head.onclick = () => { viewMode='section'; currentSectionId=sec.id; openSections[sec.id]=true; renderAll(); };
            group.appendChild(head);

            const opsWrap = document.createElement('div');
            opsWrap.style = `overflow:hidden;transition:max-height .2s ease;max-height:${isOpen?'1200px':'0'}`;
            ops.forEach(op => {
                const idx = OPS.indexOf(op);
                const c = opCompletion(op), full = opFullyDone(op);
                const item = document.createElement('div');
                const isOpActive = (viewMode==='op' && idx===currentOpIdx);
                item.style = `display:flex;align-items:center;gap:10px;padding:8px 10px 8px 30px;border-radius:8px;cursor:pointer;margin:1px 0;border:1px solid transparent; ${isOpActive ? 'background:var(--panel2);border-color:var(--line);' : ''}`;
                
                let statusColor = full ? 'var(--green)' : (c>0 ? 'var(--amber)' : 'var(--muted2)');
                let statusBg = full ? 'var(--green-dim)' : 'transparent';
                
                item.innerHTML = `
                  <div style="width:20px;height:20px;flex:0 0 20px;border-radius:50%;border:2px solid ${statusColor};background:${statusBg};display:flex;align-items:center;justify-content:center;font-family:var(--mono);font-size:9px;color:${statusColor};">${full?'✓':''}</div>
                  <div style="flex:1;min-width:0;">
                      <div style="font-family:var(--mono);font-size:9.5px;color:var(--muted);letter-spacing:.06em;">${op.opNo}</div>
                      <div style="font-size:12.5px;line-height:1.3;color:var(--text);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${op.title}</div>
                  </div>
                `;
                item.onclick = () => { viewMode='op'; currentOpIdx = idx; renderAll(); };
                opsWrap.appendChild(item);
            });
            group.appendChild(opsWrap);
            listEl.appendChild(group);
        });
    }

    function renderMain() {
        if(viewMode === 'section') { renderSectionMain(currentSectionId); return; }
        const op = OPS[currentOpIdx];
        const sec = SECTIONS.find(s=>s.id===op.section);

        // Helper: render one QC checkpoint as an inline card
        function qcInlineCardHtml(q, qIdx) {
            const status = q[2]; // 'pass', 'fail', or null/string step index
            return `
              <div class="qc-inline">
                <div class="qc-inline-icon">QC</div>
                <div class="qc-inline-body">
                  <div class="qc-inline-check">${q[0]}</div>
                  <div class="qc-inline-spec">${q[1]}</div>
                </div>
                <div class="qc-toggle-group">
                  <button class="qc-btn pass${status==='pass'?' active':''}" onclick="if(${interactive}) procToggleQc('${wrapId}', ${q[3]}, 'pass', ${currentOpIdx}, ${qIdx}, '${activeBuildId}')">PASS</button>
                  <button class="qc-btn fail${status==='fail'?' active':''}" onclick="if(${interactive}) procToggleQc('${wrapId}', ${q[3]}, 'fail', ${currentOpIdx}, ${qIdx}, '${activeBuildId}')">FAIL</button>
                </div>
              </div>`;
        }

        const stepsHtml = op.steps.map((s, i)=>{
            const [instr, keypoint, img, cap] = s;
            const dbStep = op.dbSteps[i];
            const isDone = interactive ? dbStep.is_completed : false;

            let keypointClass = '';
            if(keypoint) {
              if (keypoint.startsWith('⚠')) keypointClass = ' crit';
              if (keypoint.startsWith('✔')) keypointClass = ' ok';
            }

            const masterImgSrc = (typeof IMAGES !== 'undefined' && IMAGES[img]) ? IMAGES[img] : null;
            const jobImgSrc = interactive && (dbStep.job_image_url || dbStep.job_image_path) ? (dbStep.job_image_url || dbStep.job_image_path) : null;
            const safeCapAttr = (cap || '').replace(/"/g, '&quot;');
            let imgColHtml = '<div style="display:flex;flex-direction:column;gap:6px;min-width:160px;max-width:200px;">';
            if (masterImgSrc) {
                imgColHtml += `<div class="step-img" style="position:relative;" onclick="bpOpenLightboxFromEl(this)" data-img-cap="${safeCapAttr}" title="Reference photo">
                    <img src="${masterImgSrc}" alt="${cap||'Reference photo'}">
                    <div class="cap" style="font-size:9px;color:var(--muted);padding:3px 6px;">${cap||'Reference'}</div>
                    ${activeBuildId === 'master' ? `<div onclick="event.stopPropagation(); procRemoveMasterImage(${dbStep.id}, ${currentOpIdx}, ${i}, '${wrapId}')" style="position:absolute;top:4px;right:4px;width:20px;height:20px;background:rgba(255,255,255,0.8);border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--danger);font-size:14px;box-shadow:0 1px 3px rgba(0,0,0,0.2);z-index:10;" title="Remove Reference Image">&#10005;</div>` : ''}
                  </div>`;
            } else {
                if (activeBuildId === 'master') {
                    imgColHtml += `<div class="step-img empty" onclick="procUploadMasterStepImage(${dbStep.id}, '${wrapId}', ${currentOpIdx}, ${i})" style="cursor:pointer;font-size:11px;color:var(--amber);border-color:var(--amber-dim);">📷 Upload reference photo</div>`;
                } else {
                    imgColHtml += `<div class="step-img empty">no image</div>`;
                }
            }
            imgColHtml += '</div>';

            const stepCard = `
              <div class="step ${isDone?'done':''}">
                <div class="step-check">
                  <div class="checkbox ${isDone?'checked':''}" onclick="if(${interactive}) procToggleStep('${wrapId}', ${op.dbStId}, ${currentOpIdx}, ${i}, ${dbStep.id}, '${activeBuildId}')" role="checkbox" aria-checked="${isDone}" tabindex="0">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6L20 6" stroke="#12151A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </div>
                  <div class="step-num">${i+1}</div>
                </div>
                <div class="step-body">
                  <div class="instr">${instr}</div>
                  ${keypoint ? `<div class="keypoint ${keypointClass}">${keypoint}</div>` : ''}
                </div>
                ${imgColHtml}
              </div>`;

            const gatedQc = op.qc.map((q,qIdx)=>({q,qIdx})).filter(({q})=> q[4]===i);
            const qcAfterStep = gatedQc.map(({q,qIdx})=> qcInlineCardHtml(q,qIdx,dbStep.id)).join('');

            const extras = s[4] || {};
            let photoHtml = '';
            if (extras.photoRequired) {
                if (jobImgSrc) {
                    photoHtml = `
                      <div class="doc-box photo-box" style="background:var(--panel2);border:1px solid var(--line);border-radius:10px;padding:12px 14px;margin-bottom:10px;margin-left:76px;text-align:left;">
                        <div style="font-size:12px;font-weight:600;color:var(--text);margin-bottom:4px;">📷 Build photo</div>
                        <div style="position:relative; display:inline-block;">
                          <div onclick="bpOpenLightboxFromEl(this)" data-img-cap="Job photo" style="cursor:zoom-in;">
                            <img src="${jobImgSrc}" style="display:block;max-width:220px;max-height:160px;border-radius:8px;border:1px solid var(--line);margin-bottom:4px;">
                          </div>
                          ${interactive ? `<button onclick="procRemoveImage(${dbStep.id}, ${currentOpIdx}, ${i}, '${wrapId}', '${activeBuildId}')" style="position:absolute;top:6px;right:6px;background:var(--panel);border:1px solid var(--red);color:var(--red);width:22px;height:22px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 2px 4px rgba(0,0,0,0.1);font-weight:bold;font-size:14px;padding:0;line-height:1;font-family:sans-serif;" title="Remove Photo">&times;</button>` : ''}
                        </div>
                      </div>`;
                } else {
                    photoHtml = `
                      <div class="doc-box photo-box empty" style="background:var(--panel2);border:1px dashed var(--line);border-radius:10px;padding:12px 14px;margin-bottom:10px;margin-left:76px;text-align:left;">
                        <div style="font-size:12px;font-weight:600;color:var(--text);margin-bottom:4px;">📷 Photo documentation required</div>
                        <div style="font-family:var(--mono);font-size:10.5px;color:var(--muted);margin-bottom:10px;">${extras.photoLabel || 'Photograph the completed work at this step for the build record.'}</div>
                        ${interactive ? `<button onclick="procUploadImage(${dbStep.id}, ${currentOpIdx}, ${i}, '${wrapId}', '${activeBuildId}')" style="display:inline-block;font-family:var(--mono);font-size:11px;letter-spacing:.04em;padding:7px 13px;border-radius:6px;border:1px solid var(--line);background:var(--panel);color:var(--text);cursor:pointer;">Add photo</button>` : ''}
                      </div>`;
                }
            }

            let dataEntryHtml = '';
            if (extras.dataEntry) {
                const de = extras.dataEntry;
                const val = dbStep.data_entry_value || '';
                dataEntryHtml = `
                  <div class="doc-box data-entry-box" style="background:var(--panel2);border:1px solid var(--line);border-radius:10px;padding:12px 14px;margin-bottom:10px;margin-left:76px;text-align:left;">
                    <div style="font-size:12px;font-weight:600;color:var(--text);margin-bottom:4px;">📋 ${de.label}</div>
                    <div style="font-family:var(--mono);font-size:10.5px;color:var(--muted);margin-bottom:10px;">Required: ${de.spec}${de.unit ? ' ('+de.unit+')' : ''}</div>
                    <input type="text" placeholder="Value used${de.unit ? ' — '+de.unit : ''}" value="${val}" ${interactive ? `onchange="procSaveDataEntry(${dbStep.id}, ${currentOpIdx}, ${i}, '${wrapId}', '${activeBuildId}', this.value)"` : 'disabled'} style="width:100%;max-width:320px;background:var(--panel);border:1px solid var(--line);border-radius:6px;color:var(--text);padding:8px 11px;font-size:13px;">
                  </div>`;
            }

            return stepCard + photoHtml + dataEntryHtml + qcAfterStep;
        }).join('');

        const hazardsHtml = op.hazards.map(h=>`<tr><td style="color:var(--text);font-weight:500;width:32%;padding:12px 14px;border-bottom:1px solid var(--line);font-size:13px;vertical-align:top;">${h[0]}</td><td style="color:var(--muted);padding:12px 14px;border-bottom:1px solid var(--line);font-size:13px;vertical-align:top;">${h[1]}</td></tr>`).join('');

        const ungatedQc = op.qc
            .map((q, qIdx) => ({q, qIdx}))
            .filter(({q}) => q[4] === null || q[4] === undefined);
        const finalQcHtml = ungatedQc.length
            ? `<div class="stage-heading">Final verification</div>${ungatedQc.map(({q, qIdx}) => qcInlineCardHtml(q, qIdx)).join('')}`
            : '';

        const pct = Math.round(opCompletion(op)*100);
        const opIndexInSection = sectionOps(op.section).indexOf(op) + 1;
        const opCountInSection = sectionOps(op.section).length;

        mainEl.innerHTML = `
          <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:22px;flex-wrap:wrap;">
            <div>
              <div style="font-family:var(--mono);font-size:12px;color:var(--amber);letter-spacing:.1em;text-transform:uppercase;"><a href="javascript:void(0)" onclick="const m=document.getElementById('${wrapId}')._bp; m.viewMode='section'; m.currentSectionId='${op.section}'; m.renderAll();" style="color:inherit;text-decoration:underline;text-decoration-color:var(--amber-dim);cursor:pointer;">Section ${op.section} — ${sec?sec.title:''}</a> · Op ${opIndexInSection} of ${opCountInSection}</div>
              <h2 style="font-family:var(--disp);font-size:30px;font-weight:600;margin:4px 0 6px;line-height:1.15;">${op.title}</h2>
              <div style="font-size:13px;color:var(--muted);">${op.opNo} · ${op.station} · Rev A — 07/08/2026</div>
            </div>
            <div style="font-family:var(--mono);font-size:12px;padding:8px 14px;border-radius:8px;border:1px solid var(--line);background:var(--panel);white-space:nowrap;color:var(--muted);"><b style="color:var(--text);">${pct}%</b> complete</div>
          </div>

          <div style="display:grid;grid-template-columns:repeat(4, 1fr);gap:1px;background:var(--line);border:1px solid var(--line);border-radius:10px;overflow:hidden;margin-bottom:30px;">
            <div style="background:var(--panel);padding:12px 16px;">
              <div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:4px;">Model</div>
              <div style="font-size:13px;color:var(--text);font-weight:500;">JPL 478</div>
            </div>
            <div style="background:var(--panel);padding:12px 16px;">
              <div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:4px;">Section</div>
              <div style="font-size:13px;color:var(--text);font-weight:500;">${op.section} — ${sec?sec.title:''}</div>
            </div>
            <div style="background:var(--panel);padding:12px 16px;">
              <div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:4px;">Operation</div>
              <div style="font-size:13px;color:var(--text);font-weight:500;">${op.opNo}</div>
            </div>
            <div style="background:var(--panel);padding:12px 16px;">
              <div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:4px;">Station</div>
              <div style="font-size:13px;color:var(--text);font-weight:500;">${op.station}</div>
            </div>
          </div>

          <div style="font-family:var(--disp);font-size:15px;letter-spacing:.05em;text-transform:uppercase;color:var(--text);display:flex;align-items:center;gap:10px;margin:30px 0 14px;">Safety — PPE required<div style="flex:1;height:1px;background:var(--line);"></div></div>
          <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:8px;">${op.ppe.map(p=>`<span style="background:var(--panel2);border:1px solid var(--line);border-radius:20px;padding:6px 13px;font-size:12px;color:var(--text);">${p}</span>`).join('')}</div>
          ${op.hazards.length ? `
          <table style="width:100%;border-collapse:collapse;border:1px solid var(--line);border-radius:10px;overflow:hidden;">
            <thead style="background:var(--panel2);text-align:left;font-family:var(--mono);font-size:10px;letter-spacing:.07em;text-transform:uppercase;color:var(--muted);"><tr><th style="padding:10px 14px;border-bottom:1px solid var(--line);">Hazard</th><th style="padding:10px 14px;border-bottom:1px solid var(--line);">Control</th></tr></thead>
            <tbody>${hazardsHtml}</tbody>
          </table>` : ''}

          <div style="font-family:var(--disp);font-size:15px;letter-spacing:.05em;text-transform:uppercase;color:var(--text);display:flex;align-items:center;gap:10px;margin:30px 0 14px;">Tools, equipment &amp; materials<div style="flex:1;height:1px;background:var(--line);"></div></div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--line);border:1px solid var(--line);border-radius:10px;overflow:hidden;margin-bottom:6px;">
            <div style="background:var(--panel);padding:14px 16px;"><div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px;">Tools &amp; equipment</div><ul style="margin:0;padding-left:18px;font-size:13px;line-height:1.7;color:var(--text);">${op.tools.map(t=>`<li>${t}</li>`).join('')}</ul></div>
            <div style="background:var(--panel);padding:14px 16px;"><div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px;">Consumables / materials</div><ul style="margin:0;padding-left:18px;font-size:13px;line-height:1.7;color:var(--text);">${op.materials.map(t=>`<li>${t}</li>`).join('')}</ul></div>
          </div>

          <div class="stage-heading" style="display:flex;align-items:center;justify-content:space-between;"><span>Work sequence</span></div><div class="diagram-box">
            ${op.diagramSvg
                ? `<div class="diagram-frame" style="position:relative;padding:12px;display:flex;justify-content:center;border-radius:8px;">
                     <div style="width:100%;text-align:center;position:relative;display:inline-block;max-width:max-content;min-width:60%;">
                       ${op.diagramSvg.startsWith('<') ? op.diagramSvg.replace('<svg ', '<svg style="width:100%; height:auto; min-width:400px; max-width:800px;" ') : `<img src="${op.diagramSvg}" style="width:100%;max-width:800px;max-height:600px;display:block;margin:0 auto;border-radius:8px;border:1px solid var(--line);">`}
                       ${(!interactive || activeBuildId === 'master') ? `<div onclick="procRemoveMasterDiagram(${op.dbOpId}, '${wrapId}', ${currentOpIdx})" style="position:absolute;top:-10px;right:-10px;width:28px;height:28px;background:var(--red);color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:14px;box-shadow:0 2px 4px rgba(0,0,0,0.3);z-index:10;border:2px solid #fff;" title="Remove Reference Diagram">&#10005;</div>` : ''}
                     </div>
                   </div>
                   ${op.diagramCaption ? `<div class="diagram-cap">${op.diagramCaption}</div>` : ''}`
                : ''}
            ${interactive && op.jobDiagramUrl
                ? `<div style="margin-top:${op.diagramSvg?'12px':'0'}">
                     <div style="font-family:var(--mono);font-size:9px;color:var(--amber);text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px;">Job photo</div>
                     <img src="${op.jobDiagramUrl}" alt="Job diagram" style="max-width:100%;border-radius:8px;border:1px solid var(--line);cursor:pointer;" onclick="bpOpenLightbox('${op.jobDiagramUrl}','Job work sequence photo')">
                   </div>`
                : ''}
            ${!op.diagramSvg && !(interactive && op.jobDiagramUrl) ? `<div class="diagram-placeholder" style="display:flex;flex-direction:column;align-items:center;gap:12px;padding:24px;"><div>No diagram uploaded yet for this operation.</div>${interactive && activeBuildId !== 'master' ? `<button onclick="procUploadDiagram(${op.dbOpId}, '${wrapId}', ${currentOpIdx}, '${activeBuildId}')" style="font-family:var(--mono);font-size:11px;padding:8px 16px;border-radius:6px;border:1px dashed var(--amber-dim);background:transparent;color:var(--amber);cursor:pointer;letter-spacing:.06em;">?? Upload job photo</button>` : `<button onclick="procUploadMasterDiagram(${op.dbOpId}, '${wrapId}', ${currentOpIdx})" style="font-family:var(--mono);font-size:11px;padding:8px 16px;border-radius:6px;border:1px dashed var(--line);background:transparent;color:var(--muted);cursor:pointer;letter-spacing:.06em;">?? Upload reference diagram</button>`}</div>` : ''}
          </div>
          ${stepsHtml}

          ${finalQcHtml}

          <div style="font-family:var(--disp);font-size:15px;letter-spacing:.05em;text-transform:uppercase;color:var(--text);display:flex;align-items:center;gap:10px;margin:30px 0 14px;">Next operation<div style="flex:1;height:1px;background:var(--line);"></div></div>
          <div style="background:var(--panel);border:1px solid var(--line);border-radius:10px;padding:14px 16px;font-size:13px;color:var(--muted);margin-bottom:8px;">${op.next_operation ? op.next_operation : (OPS[currentOpIdx+1] ? OPS[currentOpIdx+1].opNo + ' — ' + OPS[currentOpIdx+1].title + '.' : 'None')}</div>

          <div style="font-family:var(--disp);font-size:15px;letter-spacing:.05em;text-transform:uppercase;color:var(--text);display:flex;align-items:center;gap:10px;margin:30px 0 14px;">Sign-off<div style="flex:1;height:1px;background:var(--line);"></div></div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:20px;">
            ${(op.signoffs && op.signoffs.length) ? op.signoffs.map(sig => `
              <div style="background:var(--panel);border:1px solid var(--line);border-radius:10px;padding:16px;">
                <div style="font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px;display:flex;justify-content:space-between;align-items:center;">
                  <span>${sig.role}</span>
                  <span style="display:${sig.signature_data ? 'block' : 'none'};color:var(--green);font-weight:600;font-family:var(--mono);">✓ SIGNED</span>
                </div>
                <input type="text" id="sign_name_${sig.id}" placeholder="Name (printed)" value="${sig.signed_by || ''}" ${interactive && !sig.signature_data ? '' : 'disabled'} style="width:100%;background:var(--panel2);border:1px solid var(--line);border-radius:6px;color:var(--text);padding:9px 11px;font-size:13px;margin-bottom:8px;outline:none;">
                <div style="position:relative;border:1px dashed var(--line);border-radius:8px;background:var(--panel);margin-bottom:8px;overflow:hidden;height:120px; ${sig.signature_data ? `background-image:url(${sig.signature_data});background-size:contain;background-repeat:no-repeat;background-position:center;` : ''}">
                  ${!sig.signature_data ? `<canvas id="sign_canvas_${sig.id}" width="400" height="120" style="position:absolute;top:0;left:0;width:100%;height:100%;cursor:crosshair;"></canvas><div style="position:absolute;top:50%;left:0;right:0;text-align:center;transform:translateY(-50%);font-family:var(--mono);font-size:11px;color:var(--muted2);pointer-events:none;">Sign here</div>` : ''}
                </div>
                ${interactive && !sig.signature_data ? `<button id="sign_btn_${sig.id}" onclick="procSaveSignoff(${sig.id}, 'sign_canvas_${sig.id}', 'sign_name_${sig.id}', '${activeBuildId}', '${wrapId}')"  style="margin-bottom:8px;width:100%;padding:8px;background:var(--amber);color:var(--bg);border-radius:6px;font-size:13px;font-weight:600;cursor:pointer;border:none;">Save signature</button>` : ''}
                  <input type="date" placeholder="Date" value="${sig.signed_at ? sig.signed_at.substring(0, 10) : ''}" ${interactive && !sig.signature_data ? '' : 'disabled'} style="width:100%;background:var(--panel2);border:1px solid var(--line);border-radius:6px;color:var(--text);padding:9px 11px;font-size:13px;margin-bottom:8px;outline:none;">
                <div id="sign_clear_${sig.id}" onclick="procClearOrRemoveSignoff(event, ${sig.id}, '${activeBuildId}', ${!!sig.signature_data}, '${wrapId}')"  style="font-size:11px;text-decoration:underline;color:var(--muted);cursor:pointer;display:inline-block;">${sig.signature_data ? 'Remove signature' : 'Clear signature'}</div>
              </div>
            `).join('') : '<div style="color:var(--muted);grid-column:1/-1;text-align:center;font-size:13px;">No sign-offs required</div>'}
          </div>
          <div style="font-family:var(--mono);font-size:10px;color:var(--muted2);text-align:center;margin-top:40px;padding-top:16px;border-top:1px solid var(--line);">JPL Automotive — Full Build — ${op.opNo} — progress saved automatically</div>
        `;
    
          // Initialize signature canvases
          if (op.signoffs && interactive) {
              op.signoffs.forEach(s => {
                  const cvs = document.getElementById('sign_canvas_' + s.id);
                  if (cvs) initSignCanvas(cvs);
              });
          }
      }

    function renderSectionMain(sectionId) {
        const sec = SECTIONS.find(s=>s.id===sectionId);
        const ops = sectionOps(sectionId);
        const pct = Math.round(sectionCompletion(sectionId)*100);
        const secIdx = SECTIONS.findIndex(s=>s.id===sectionId) + 1;

        const cardsHtml = ops.map(op=>{
            const idx = OPS.indexOf(op);
            const c = opCompletion(op), full = opFullyDone(op);
            let statusColor = full ? 'var(--green)' : (c>0 ? 'var(--amber)' : 'var(--muted2)');
            let statusBg = full ? 'var(--green-dim)' : 'transparent';
            return `
              <div onclick="const m=document.getElementById('${wrapId}')._bp; m.viewMode='op'; m.currentOpIdx=${idx}; m.renderAll();" style="display:flex;align-items:center;gap:12px;background:var(--panel);border:1px solid var(--line);border-radius:10px;padding:12px 14px;cursor:pointer;transition:border-color .15s, background .15s;">
                <div style="width:26px;height:26px;flex:0 0 26px;border-radius:50%;border:2px solid ${statusColor};background:${statusBg};display:flex;align-items:center;justify-content:center;font-family:var(--mono);font-size:9px;color:${statusColor};">${full?'✓':''}</div>
                <div style="flex:1;min-width:0;">
                  <div style="font-family:var(--mono);font-size:10px;color:var(--muted);">${op.opNo}</div>
                  <div style="font-size:13px;color:var(--text);line-height:1.3;">${op.title}</div>
                </div>
                <div style="font-family:var(--mono);font-size:11px;color:var(--muted);flex:0 0 auto;">${Math.round(c*100)}%</div>
              </div>`;
        }).join('');

        mainEl.innerHTML = `
          <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:22px;flex-wrap:wrap;">
            <div>
              <div style="font-family:var(--mono);font-size:12px;color:var(--amber);letter-spacing:.1em;text-transform:uppercase;">Build Stage ${secIdx} of ${SECTIONS.length}</div>
              <h2 style="font-family:var(--disp);font-size:30px;font-weight:600;margin:4px 0 6px;line-height:1.15;">${sec.title}</h2>
              <div style="font-size:13px;color:var(--muted);">Section ${sec.id} · ${ops.length} operation${ops.length===1?'':'s'}</div>
            </div>
            <div style="font-family:var(--mono);font-size:12px;padding:8px 14px;border-radius:8px;border:1px solid var(--line);background:var(--panel);white-space:nowrap;color:var(--muted);"><b style="color:var(--text);">${pct}%</b> complete</div>
          </div>

          <div class="stage-heading">Stage diagram</div>
          <div class="diagram-box">
             <div class="diagram-placeholder">Stage-level diagrams are not supported yet.<br>View individual operations for their specific diagrams.</div>
          </div>

          <div style="font-family:var(--disp);font-size:15px;letter-spacing:.05em;text-transform:uppercase;color:var(--text);display:flex;align-items:center;gap:10px;margin:30px 0 14px;">Operations in this stage<div style="flex:1;height:1px;background:var(--line);"></div></div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:10px;">${cardsHtml}</div>

          <div style="font-family:var(--mono);font-size:10px;color:var(--muted2);text-align:center;margin-top:40px;padding-top:16px;border-top:1px solid var(--line);">JPL Automotive — Full Build — Section ${sec.id} — progress saved automatically</div>
        `;
    }

    function renderAll(skipScroll = false) {
        renderSidebar();
        renderMain();
        if (!skipScroll) window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Attach to wrapper for global access by inline onclick handlers
    wrap._bp = {
        viewMode, currentSectionId, currentOpIdx, renderAll,
        _ops: OPS,
        _activeBuildId: activeBuildId,
        set viewMode(v){viewMode=v},
        set currentSectionId(v){currentSectionId=v},
        set currentOpIdx(v){currentOpIdx=v}
    };

    renderAll();
}

/* ==========================================================
   BUILD PROCESS API INTERACTION FUNCTIONS
   These are called via inline onclick handlers in the rendered HTML.
   They communicate with the BuildProcessController via fetch().
   ========================================================== */

/**
 * Get the Laravel CSRF token for POST requests.
 */
function _bpCsrf() {
    const m = document.querySelector('meta[name="csrf-token"]');
    return m ? m.getAttribute('content') : '';
}

/**
 * procToggleStep — called when a step checkbox is clicked.
 * @param {string} wrapId      - The wrapper element ID (to re-render after save)
 * @param {number} stId        - Master station DB id (unused in new arch, kept for compat)
 * @param {number} opIdx       - Index of the operation in OPS array
 * @param {number} stepIdx     - Index of the step in the operation's steps
 * @param {number} dbStepId    - Master vehicle_build_step id
 * @param {number} buildId     - The vehicle_model_id of this commissioned build
 */
function procToggleStep(wrapId, stId, opIdx, stepIdx, dbStepId, buildId) {
    if (!buildId) return;

    const wrap = document.getElementById(wrapId);
    const bp   = wrap._bp;

    // Optimistically toggle in local state
    const step = bp._ops[opIdx].dbSteps[stepIdx];
    const newState = !step.is_completed;
    step.is_completed = newState;
    bp.renderAll(true);

    // Persist to DB
    fetch(`${window.AppUrl}/builds/${buildId}/steps/${dbStepId}/toggle`, {
        method : 'POST',
        headers: {
            'Content-Type'     : 'application/json',
            'X-CSRF-TOKEN'     : _bpCsrf(),
            'Accept'           : 'application/json',
        },
        body: JSON.stringify({ is_completed: newState }),
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            // Revert on failure
            step.is_completed = !newState;
            bp.renderAll(true);
            alert('Failed to save. Please try again.');
        }
    })
    .catch(() => {
        step.is_completed = !newState;
        bp.renderAll(true);
        alert('Network error. Please check your connection.');
    });
}

/**
 * procToggleQc — called when PASS or FAIL button is clicked on a QC row.
 * @param {string} wrapId   - The wrapper element ID
 * @param {number} qcId     - operation_qc_check id
 * @param {string} status   - 'pass' or 'fail'
 * @param {number} opIdx    - Index of the operation in OPS array
 * @param {number} qcIdx    - Index of the QC check in op.qc array
 * @param {number} buildId  - The vehicle_model_id
 */
function procToggleQc(wrapId, qcId, status, opIdx, qcIdx, buildId) {
    if (!buildId) return;

    const wrap = document.getElementById(wrapId);
    const bp   = wrap._bp;

    // Optimistically update local state (index 2 in the qc tuple is status)
    const qcItem = bp._ops[opIdx].qc[qcIdx];
    const prevStatus = qcItem[2];
    // Toggle off if same status clicked again
    qcItem[2] = (prevStatus === status) ? null : status;
    bp.renderAll(true);

    fetch(`${window.AppUrl}/builds/${buildId}/qc/${qcId}`, {
        method : 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN' : _bpCsrf(),
            'Accept'       : 'application/json',
        },
        body: JSON.stringify({ status: qcItem[2] || '' }),
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            qcItem[2] = prevStatus;
            bp.renderAll(true);
        }
    })
    .catch(() => {
        qcItem[2] = prevStatus;
        bp.renderAll(true);
    });
}

function procRemoveMasterImage(dbStepId, opIdx, stepIdx, wrapId) {
    if (!confirm('Are you sure you want to remove the master reference image?')) return;

    fetch(`${window.AppUrl}/master/steps/${dbStepId}/image`, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            alert('Failed to remove reference image: ' + (data.message || JSON.stringify(data)));
        }
    })
    .catch(() => alert('Network error.'));
}
/**
 * procUploadImage — called when the "No image / Click to upload" placeholder is clicked.
 * @param {number} dbStepId  - Master vehicle_build_step id
 * @param {number} opIdx     - Index of the operation in OPS array
 * @param {number} stepIdx   - Index of the step in the operation's steps
 * @param {string} wrapId    - The wrapper element ID
 * @param {number} buildId   - The vehicle_model_id
 */
function procUploadImage(dbStepId, opIdx, stepIdx, wrapId, buildId) {
    if (!buildId) return;

    const input = document.createElement('input');
    input.type   = 'file';
    input.accept = 'image/*';
    input.style  = 'display:none';
    document.body.appendChild(input);

    input.onchange = function () {
        const file = input.files[0];
        if (!file) { document.body.removeChild(input); return; }

        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', _bpCsrf());

        fetch(`${window.AppUrl}/builds/${buildId}/steps/${dbStepId}/image`, {
            method : 'POST',
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() },
            body   : formData,
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                // Update local state so re-render shows the new job photo
                const wrap = document.getElementById(wrapId);
                const bp   = wrap._bp;
                bp._ops[opIdx].dbSteps[stepIdx].job_image_path = data.image_url;
                bp.renderAll(true);
            } else {
                alert('Image upload failed. Please try again.');
            }
        })
        .catch(() => alert('Network error uploading image.'))
        .finally(() => document.body.removeChild(input));
    };

    input.click();
}

function procSaveDataEntry(dbStepId, opIdx, stepIdx, wrapId, buildId, value) {
    if (!buildId) return;

    const wrap = document.getElementById(wrapId);
    const bp   = wrap._bp;

    const step = bp._ops[opIdx].dbSteps[stepIdx];
    step.data_entry_value = value;

    fetch(`${window.AppUrl}/builds/${buildId}/steps/${dbStepId}/data-entry`, {
        method : 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN' : _bpCsrf(),
            'Accept'       : 'application/json',
        },
        body: JSON.stringify({ data_entry_value: value }),
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            alert('Failed to save data entry.');
        }
    })
    .catch(() => {
        alert('Network error saving data entry.');
    });
}

/**
 * procSaveSignoff — called when the "Save signature" button is clicked.
 * @param {number} signoffId    - operation_signoff_id
 * @param {string} canvasId     - ID of the canvas element containing the signature
 * @param {string} nameInputId  - ID of the text input for the printed name
 * @param {number} buildId      - The vehicle_model_id
 * @param {string} wrapId       - The wrapper element ID
 */

function procClearOrRemoveSignoff(e, signoffId, buildId, isSaved, wrapId) {
    if (isSaved) {
        if (!confirm('Are you sure you want to remove this signature?')) return;
        fetch(`${window.AppUrl}/builds/${buildId}/signoff/${signoffId}/clear`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': _bpCsrf(),
                'Accept': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                // Find the wrapper (assumes id is bp_wrap, which is the default in blade)
                const wrap = wrapId ? document.getElementById(wrapId) : null;
                if (wrap && wrap._bp) {
                    wrap._bp._ops.forEach(op => {
                        if (op.signoffs) {
                            const sig = op.signoffs.find(s => s.id === signoffId);
                            if (sig) {
                                sig.signature_data = null;
                                sig.signed_by = null;
                                sig.signed_at = null;
                            }
                        }
                    });
                    wrap._bp.renderAll(true);
                } else {
                    window.location.reload();
                }
            } else {
                alert('Failed to remove signature.');
            }
        })
        .catch(() => alert('Network error removing signature.'));
    } else {
        const cvs = document.getElementById('sign_canvas_' + signoffId);
        if (cvs) {
            const ctx = cvs.getContext('2d');
            ctx.clearRect(0, 0, cvs.width, cvs.height);
            if (cvs.nextElementSibling) cvs.nextElementSibling.style.display = 'block';
        }
    }
}

function procSaveSignoff(signoffId, canvasId, nameInputId, buildId, wrapId) {
    if (!buildId) return;

    const canvas    = document.getElementById(canvasId);
    const nameInput = document.getElementById(nameInputId);
    const name      = nameInput ? nameInput.value.trim() : '';

    if (!name) { alert('Please enter your printed name before signing.'); return; }

    const signatureData = canvas ? canvas.toDataURL('image/png') : null;

    fetch(`${window.AppUrl}/builds/${buildId}/signoff/${signoffId}`, {
        method : 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN' : _bpCsrf(),
            'Accept'       : 'application/json',
        },
        body: JSON.stringify({ signed_by: name, signature_data: signatureData }),
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const wrap = document.getElementById(wrapId);
            if (wrap && wrap._bp) {
                wrap._bp._ops.forEach(op => {
                    if (op.signoffs) {
                        const sig = op.signoffs.find(s => s.id === signoffId);
                        if (sig) {
                            sig.signature_data = signatureData;
                            sig.signed_by = name;
                            sig.signed_at = data.log ? data.log.signed_at : new Date().toISOString();
                        }
                    }
                });
                wrap._bp.renderAll(true);
            } else {
                window.location.reload();
            }
        } else {
            alert('Failed to save signature. Please try again.');
        }
    })
    .catch(() => alert('Network error saving signature.'));
}

/**
 * procUploadDiagram — called when the "Upload job photo" button in Work Sequence is clicked.
 * @param {number} opId      - vehicle_build_operation_id
 * @param {string} wrapId    - The wrapper element ID
 * @param {number} opIdx     - Index of the operation in OPS array
 * @param {number} buildId   - The vehicle_model_id
 */
function procRemoveMasterDiagram(dbOpId, wrapId, opIdx) {
    if(!confirm('Remove this master reference diagram? This affects all builds.')) return;
    fetch(`${window.AppUrl}/api/master/operations/${dbOpId}/diagram`, {
        method: 'DELETE', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            ['proc-template-wrap', 'proc-build-wrap'].forEach(wId => {
                const w = document.getElementById(wId);
                if (w && w._bp) {
                    const lOp = w._bp._ops.find(o => o.dbOpId === dbOpId);
                    if (lOp) {
                        lOp.diagramSvg = null;
                        if (wId === wrapId || (wId === 'proc-build-wrap' && activeBuildId !== 'master')) {
                            w._bp.renderAll(true);
                        }
                    }
                }
            });
        } else { alert('Failed to remove diagram.'); }
    })
    .catch(() => alert('Network error.'));
}

function procUploadDiagram(opId, wrapId, opIdx, buildId) {
    if (!buildId) return;

    const input = document.createElement('input');
    input.type   = 'file';
    input.accept = 'image/*';
    input.style  = 'display:none';
    document.body.appendChild(input);

    input.onchange = function () {
        const file = input.files[0];
        if (!file) { document.body.removeChild(input); return; }

        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', _bpCsrf());

        fetch(`${window.AppUrl}/api/builds/${buildId}/operations/${opId}/diagram`, {
            method : 'POST',
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() },
            body   : formData,
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                const wrap = document.getElementById(wrapId);
                const bp   = wrap._bp;
                bp._ops[opIdx].jobDiagramUrl = data.image_url;
                bp.renderAll(true);
            } else {
                alert('Diagram upload failed.');
            }
        })
        .catch(() => alert('Network error uploading diagram.'))
        .finally(() => document.body.removeChild(input));
    };

    input.click();
}


/**
 * procUploadMasterStepImage � upload a reference photo to the MASTER template step.
 * Stores to vehicle_build_steps.image_path. Visible in ALL builds as the reference photo.
 */
function procUploadMasterStepImage(stepId, opIdx, stepIdx, wrapId, opId) {
    const input = document.createElement('input');
    input.type = 'file'; input.accept = 'image/*'; input.style = 'display:none';
    document.body.appendChild(input);
    input.onchange = function () {
        const file = input.files[0];
        if (!file) { document.body.removeChild(input); return; }
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', _bpCsrf());
        fetch(`${window.AppUrl}/api/master/steps/${stepId}/image`, {
            method: 'POST', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() }, body: formData,
        })
        .then(r => r.json())
        .then(data => { if (data.success) { const wrap = document.getElementById(wrapId); const bp = wrap._bp; bp._ops[opIdx].diagramSvg = data.image_url; bp.renderAll(true); } else { alert('Upload failed.'); } })
        .catch(() => alert('Network error.'))
        .finally(() => document.body.removeChild(input));
    };
    input.click();
}

/**
 * procUploadMasterDiagram � upload a reference diagram to the MASTER template operation.
 * Stores to vehicle_build_operations.diagram_image_path. Visible in ALL builds.
 */
function procUploadMasterDiagram(opId, wrapId, opIdx) {
    const input = document.createElement('input');
    input.type = 'file'; input.accept = 'image/*'; input.style = 'display:none';
    document.body.appendChild(input);
    input.onchange = function () {
        const file = input.files[0];
        if (!file) { document.body.removeChild(input); return; }
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', _bpCsrf());
        fetch(`${window.AppUrl}/api/master/operations/${opId}/diagram`, {
            method: 'POST', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() }, body: formData,
        })
        .then(r => r.json())
        .then(data => { 
            if (data.success) { 
                ['proc-template-wrap', 'proc-build-wrap'].forEach(wId => {
                    const w = document.getElementById(wId);
                    if (w && w._bp) {
                        const lOp = w._bp._ops.find(o => o.dbOpId === opId);
                        if (lOp) {
                            lOp.diagramSvg = data.image_url;
                            if (wId === wrapId || (wId === 'proc-build-wrap' && activeBuildId !== 'master')) {
                                w._bp.renderAll(true);
                            }
                        }
                    }
                });
            } else { alert('Upload failed.'); } 
        })
        .catch(() => alert('Network error.'))
        .finally(() => document.body.removeChild(input));
    };
    input.click();
}


function initSignCanvas(canvas) {
    const ctx = canvas.getContext('2d');
    let drawing = false;
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.strokeStyle = '#12151A';

    const getPos = (e) => {
        const rect = canvas.getBoundingClientRect();
        const clientX = e.touches ? e.touches[0].clientX : e.clientX;
        const clientY = e.touches ? e.touches[0].clientY : e.clientY;
        return { x: clientX - rect.left, y: clientY - rect.top };
    };

    const start = (e) => {
        e.preventDefault();
        drawing = true;
        const pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
        if (canvas.nextElementSibling) {
            canvas.nextElementSibling.style.display = 'none';
        }
    };

    const draw = (e) => {
        if (!drawing) return;
        e.preventDefault();
        const pos = getPos(e);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
    };

    const stop = () => { drawing = false; };

    canvas.addEventListener('mousedown', start);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stop);
    canvas.addEventListener('mouseout', stop);
    canvas.addEventListener('touchstart', start, {passive: false});
    canvas.addEventListener('touchmove', draw, {passive: false});
    canvas.addEventListener('touchend', stop);
}

function procRemoveImage(dbStepId, opIdx, stepIdx, wrapId, buildId) {
    if (!confirm('Remove this job photo?')) return;
    fetch(`${window.AppUrl}/api/builds/${buildId}/steps/${dbStepId}/image`, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _bpCsrf() }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const wrap = document.getElementById(wrapId);
            if (wrap && wrap._bp) {
                wrap._bp._ops[opIdx].dbSteps[stepIdx].job_image_path = null;
                wrap._bp.renderAll(true);
            } else {
                window.location.reload();
            }
        } else {
            alert('Failed to remove image: ' + (data.message || JSON.stringify(data)));
        }
    })
    .catch(() => alert('Network error.'));
}