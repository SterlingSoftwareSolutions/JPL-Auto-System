@extends('layouts.layout')

@section('content')

<style>
/* ===== JPL Theme Enhanced ===== */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=JetBrains+Mono:wght@400;700&display=swap');

:root {
    --bg: #F0F2F5; 
    --panel: #FFFFFF; 
    --panel2: #F8FAFC; 
    --line: #E2E8F0;
    --accent: #0F172A; 
    --accent-dim: #F1F5F9;
    --gold: #D97706; 
    --gold-dim: #FEF3C7;
    --green: #10B981; 
    --green-dim: #D1FAE5;
    --red: #EF4444; 
    --red-dim: #FEE2E2;
    --text: #1E293B; 
    --muted: #64748B; 
    --muted2: #94A3B8;
    --mono: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; 
    --disp: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; 
    --body: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --radius: 8px;
}
*,*::before,*::after{box-sizing:border-box;}
#jpl-wi-app{display:flex;min-height:calc(100vh - 120px);background:var(--bg);font-family:var(--body);color:var(--text);margin-top:16px;position:relative;}

.dashboard-floating-btn {
    position: absolute;
    top: 24px;
    right: 24px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: #ffffff;
    color: var(--text);
    font-size: 13px;
    font-weight: 700;
    border-radius: var(--radius);
    border: 1px solid var(--line);
    box-shadow: var(--shadow-sm);
    text-decoration: none;
    transition: all 0.2s ease;
    z-index: 100;
}
.dashboard-floating-btn:hover {
    background: var(--panel2);
    box-shadow: var(--shadow-md);
    transform: translateY(-1px);
}
/* SIDEBAR */
#jpl-sidebar{width:320px;flex:0 0 320px;background:var(--panel);border-right:1px solid var(--line);display:flex;flex-direction:column;position:sticky;top:16px;height:calc(100vh - 136px);overflow-y:auto;box-shadow:var(--shadow-sm);border-top-right-radius:var(--radius);}
.jpl-brand{padding:24px 20px 20px;background:#000000;color:#fff;}
.jpl-brand .eyebrow{font-family:var(--mono);font-size:10px;letter-spacing:.15em;color:var(--gold);text-transform:uppercase;margin-bottom:6px;font-weight:700;}
.jpl-brand h1{font-family:var(--disp);font-size:18px;font-weight:900;margin:0 0 4px;color:#fff;letter-spacing:-0.02em;}
.jpl-brand .sub{font-size:12px;color:var(--muted2);}
.progress-wrap{padding:16px 20px;background:var(--panel);border-bottom:1px solid var(--line);}
.progress-label{display:flex;justify-content:space-between;font-family:var(--mono);font-size:11px;color:var(--muted);margin-bottom:8px;text-transform:uppercase;letter-spacing:.08em;font-weight:700;}
.progress-label span.big{color:var(--accent);font-size:14px;font-weight:900;}
.bar-track{height:8px;background:var(--line);border-radius:4px;overflow:hidden;}
.bar-fill{height:100%;background:linear-gradient(90deg, var(--gold) 0%, #F59E0B 100%);border-radius:4px;transition:width .5s cubic-bezier(0.4, 0, 0.2, 1);box-shadow:inset 0 -1px 1px rgba(0,0,0,0.1);}
.sync-status{font-family:var(--mono);font-size:10px;color:var(--muted2);margin-top:8px;display:flex;align-items:center;gap:4px;}
.sync-status.ok{color:var(--green);}
.sync-status.err{color:var(--red);}
.op-list{flex:1;padding:12px;overflow-y:auto;}
.section-group{margin-bottom:4px;}
.section-head{display:flex;align-items:center;gap:10px;padding:10px 12px;cursor:pointer;border-radius:var(--radius);border:1px solid transparent;transition:all 0.2s ease;}
.section-head:hover{background:var(--panel2);}
.section-head.active{background:var(--accent);color:#fff;box-shadow:var(--shadow-md);transform:translateY(-1px);}
.section-head.active .section-title, .section-head.active .section-pct, .section-head.active .section-num{color:#fff;border-color:rgba(255,255,255,0.2);background:transparent;}
.section-chevron{font-family:var(--mono);font-size:10px;color:var(--muted);width:12px;transition:transform .2s ease;}
.section-head.active .section-chevron{color:#fff;}
.section-chevron.open{transform:rotate(90deg);}
.section-num{font-family:var(--mono);font-size:10px;color:var(--muted);background:var(--panel2);border:1px solid var(--line);border-radius:4px;padding:2px 6px;flex:0 0 auto;font-weight:700;}
.section-title{font-size:13px;font-weight:600;color:var(--text);flex:1;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.section-pct{font-family:var(--mono);font-size:11px;color:var(--muted);font-weight:700;}
.section-ops{overflow:hidden;max-height:0;transition:max-height .3s cubic-bezier(0.4, 0, 0.2, 1);}
.section-ops.open{max-height:1500px;}
.op-item{display:flex;align-items:center;gap:10px;padding:8px 12px 8px 30px;border-radius:var(--radius);cursor:pointer;margin:2px 0;border:1px solid transparent;transition:all 0.2s ease;}
.op-item:hover{background:var(--panel2);transform:translateX(2px);}
.op-item.active{background:var(--accent-dim);border-color:var(--line);}
.op-status{width:20px;height:20px;flex:0 0 20px;border-radius:50%;border:2px solid var(--line);display:flex;align-items:center;justify-content:center;font-family:var(--mono);font-size:9px;color:var(--muted2);transition:all 0.2s;}
.op-status.done{border-color:var(--green);background:var(--green);color:#fff;box-shadow:0 0 0 3px var(--green-dim);}
.op-status.partial{border-color:var(--gold);color:var(--gold);background:var(--gold-dim);}
.op-meta .no{font-family:var(--mono);font-size:10px;color:var(--muted);margin-bottom:2px;font-weight:700;}
.op-meta .title{font-size:12px;color:var(--text);font-weight:500;}
.reset-row{padding:16px 20px;border-top:1px solid var(--line);background:var(--panel2);}
.reset-btn{width:100%;background:var(--panel);border:1px solid var(--line);color:var(--muted);font-family:var(--mono);font-size:11px;letter-spacing:.08em;text-transform:uppercase;padding:10px;border-radius:var(--radius);cursor:pointer;transition:all 0.2s ease;font-weight:700;}
.reset-btn:hover{border-color:var(--red);color:var(--red);background:var(--red-dim);box-shadow:var(--shadow-sm);}

/* MAIN */
#jpl-main{flex:1;min-width:0;padding:32px 48px 100px;max-width:1600px;margin:0 auto;}
.op-header{display:flex;justify-content:space-between;align-items:flex-end;gap:20px;margin-bottom:28px;flex-wrap:wrap;padding-bottom:20px;border-bottom:2px solid var(--line);}
.op-header .titleblock .eyebrow{font-family:var(--mono);font-size:12px;color:var(--gold);letter-spacing:.1em;text-transform:uppercase;font-weight:700;display:inline-block;padding:4px 8px;background:var(--gold-dim);border-radius:4px;margin-bottom:8px;}
.op-header h2{font-family:var(--disp);font-size:28px;font-weight:900;margin:0 0 8px;color:var(--accent);letter-spacing:-0.02em;}
.op-header .station{font-size:14px;color:var(--muted);font-weight:500;}
.op-progress-badge{font-family:var(--mono);font-size:12px;padding:8px 14px;border-radius:20px;border:1px solid var(--line);background:var(--panel);white-space:nowrap;color:var(--muted);box-shadow:var(--shadow-sm);font-weight:700;}
.op-progress-badge b{color:var(--accent);font-size:13px;}
.infogrid{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--line);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;margin-bottom:32px;box-shadow:var(--shadow-sm);}
.infocell{background:var(--panel);padding:16px;transition:background 0.2s;}
.infocell:hover{background:var(--panel2);}
.infocell .k{font-family:var(--mono);font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px;font-weight:700;}
.infocell .v{font-size:14px;color:var(--accent);font-weight:700;}
.stage-heading{font-family:var(--disp);font-size:14px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);display:flex;align-items:center;gap:16px;margin:40px 0 16px;}
.stage-heading::after{content:'';flex:1;height:1px;background:var(--line);}
.chip-row{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:12px;}
.chip{background:var(--accent);color:#fff;border-radius:4px;padding:6px 12px;font-size:12px;font-weight:600;letter-spacing:.02em;box-shadow:var(--shadow-sm);display:inline-flex;align-items:center;gap:6px;}
.hazard-table, .qc-table{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow-sm);background:var(--panel);}
.hazard-table th, .qc-table th{background:var(--panel2);color:var(--muted);text-align:left;font-family:var(--mono);font-size:11px;letter-spacing:.08em;text-transform:uppercase;padding:12px 16px;font-weight:700;border-bottom:1px solid var(--line);}
.hazard-table td, .qc-table td{padding:14px 16px;border-bottom:1px solid var(--line);font-size:14px;vertical-align:top;color:var(--text);}
.hazard-table tr:last-child td, .qc-table tr:last-child td{border-bottom:none;}
.hazard-table tr:hover td, .qc-table tr:hover td{background:var(--accent-dim);}
.hazard-table td.haz{font-weight:600;width:35%;color:var(--accent);}
.hazard-table td.ctrl{color:var(--muted);}
.qc-table td.spec{color:var(--muted);width:35%;}
.tools-grid{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--line);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;margin-bottom:12px;box-shadow:var(--shadow-sm);}
.tools-col{background:var(--panel);padding:20px;}
.tools-col .h{font-family:var(--mono);font-size:11px;color:var(--accent);text-transform:uppercase;letter-spacing:.1em;margin-bottom:12px;font-weight:700;display:flex;align-items:center;gap:8px;}
.tools-col .h::before{content:'';display:block;width:4px;height:12px;background:var(--gold);border-radius:2px;}
.tools-col ul{margin:0;padding-left:20px;font-size:14px;line-height:1.8;color:var(--text);}
.tools-col ul li{margin-bottom:4px;}
.step{display:grid;grid-template-columns:48px 1fr 240px;gap:20px;background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:20px;margin-bottom:16px;transition:all .3s cubic-bezier(0.4, 0, 0.2, 1);box-shadow:var(--shadow-sm);position:relative;overflow:hidden;}
.step::before{content:'';position:absolute;top:0;left:0;bottom:0;width:4px;background:var(--line);transition:background 0.3s;}
.step:hover{box-shadow:var(--shadow-md);transform:translateY(-2px);border-color:#CBD5E1;}
.step.done{opacity:0.7;background:var(--panel2);}
.step.done::before{background:var(--green);}
.step-check{display:flex;flex-direction:column;align-items:center;gap:8px;z-index:1;}
.checkbox{width:28px;height:28px;border-radius:6px;border:2px solid #CBD5E1;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s cubic-bezier(0.4, 0, 0.2, 1);flex-shrink:0;background:var(--panel);box-shadow:inset 0 2px 4px rgba(0,0,0,0.02);}
.step:hover .checkbox:not(.checked){border-color:var(--muted2);}
.checkbox svg{opacity:0;transition:all .2s;transform:scale(0.5);}
.checkbox.checked{background:var(--green);border-color:var(--green);box-shadow:0 0 0 4px var(--green-dim);}
.checkbox.checked svg{opacity:1;transform:scale(1);color:#fff;}
.step-num{font-family:var(--mono);font-size:11px;color:var(--muted);font-weight:700;}
.step-body .instr{font-size:15px;line-height:1.6;color:var(--text);margin-bottom:12px;}
.step-body .keypoint{font-size:13px;line-height:1.5;color:var(--gold);background:var(--gold-dim);border-radius:6px;padding:10px 14px;display:flex;gap:10px;align-items:flex-start;}
.step-body .keypoint::before{content:'⚠️';font-size:14px;}
.step-body .keypoint.crit{color:var(--red);background:var(--red-dim);}
.step-body .keypoint.crit::before{content:'🛑';}
.step-body .keypoint.ok{color:var(--green);background:var(--green-dim);}
.step-body .keypoint.ok::before{content:'✅';}
.step-img{border-radius:var(--radius);overflow:hidden;border:1px solid var(--line);cursor:zoom-in;background:var(--panel2);display:flex;flex-direction:column;transition:all 0.2s;box-shadow:var(--shadow-sm);}
.step-img:hover{box-shadow:var(--shadow-md);border-color:var(--muted2);}
.step-img img{width:100%;display:block;max-height:160px;object-fit:cover;}
.step-img .cap{font-family:var(--mono);font-size:10px;color:var(--muted);padding:8px 10px;background:var(--panel);border-top:1px solid var(--line);}
.step-img.empty{align-items:center;justify-content:center;color:var(--muted2);font-family:var(--mono);font-size:11px;min-height:100px;border:1px dashed #CBD5E1;background:transparent;}
.diagram-box{background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:20px;margin-bottom:20px;box-shadow:var(--shadow-sm);}
.diagram-frame svg{width:100%;height:auto;display:block;max-height:300px;}
.diagram-cap{font-family:var(--mono);font-size:11px;color:var(--muted);margin-top:12px;text-align:center;font-weight:500;}
.qc-toggle-group{display:flex;gap:6px;background:var(--panel2);padding:4px;border-radius:6px;border:1px solid var(--line);display:inline-flex;}
.qc-btn{font-family:var(--mono);font-size:11px;letter-spacing:.05em;padding:6px 14px;border-radius:4px;border:1px solid transparent;background:transparent;color:var(--muted);cursor:pointer;transition:all .2s;font-weight:700;}
.qc-btn:hover:not(.active){background:var(--panel);box-shadow:var(--shadow-sm);}
.qc-btn.pass.active{background:#fff;border-color:var(--green);color:var(--green);box-shadow:var(--shadow-sm);}
.qc-btn.fail.active{background:#fff;border-color:var(--red);color:var(--red);box-shadow:var(--shadow-sm);}
.signoff-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
.signoff-card{background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:20px;box-shadow:var(--shadow-sm);transition:all 0.2s;}
.signoff-card:hover{box-shadow:var(--shadow-md);border-color:var(--muted2);}
.signoff-card .h{font-family:var(--mono);font-size:11px;color:var(--accent);text-transform:uppercase;letter-spacing:.1em;margin-bottom:12px;display:flex;justify-content:space-between;align-items:center;font-weight:700;}
.signoff-card input[type=text]{width:100%;background:var(--panel2);border:1px solid var(--line);border-radius:6px;color:var(--text);padding:10px 14px;font-size:14px;font-family:var(--body);margin-bottom:12px;transition:all 0.2s;}
.signoff-card input:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-dim);background:#fff;}
.sig-pad-wrap{position:relative;border:2px dashed var(--line);border-radius:6px;background:var(--panel2);margin-bottom:10px;overflow:hidden;transition:all 0.2s;}
.sig-pad-wrap:hover{border-color:var(--muted2);background:#fff;}
.sig-pad-wrap canvas{display:block;width:100%;height:120px;touch-action:none;cursor:crosshair;}
.sig-placeholder{position:absolute;top:50%;left:0;right:0;text-align:center;transform:translateY(-50%);font-family:var(--mono);font-size:12px;color:var(--muted2);pointer-events:none;}
.sig-clear{font-family:var(--mono);font-size:11px;color:var(--muted);background:none;border:none;cursor:pointer;text-decoration:underline;padding:0;font-weight:500;}
.sig-clear:hover{color:var(--red);}
.signed-tag{font-family:var(--mono);font-size:11px;color:var(--green);font-weight:700;display:flex;align-items:center;gap:4px;}
.signed-tag::before{content:'✓';}
.next-op{background:var(--accent);color:#fff;border-radius:var(--radius);padding:16px 20px;font-size:14px;margin-bottom:10px;box-shadow:var(--shadow-md);display:flex;align-items:center;justify-content:space-between;}
.next-op strong{color:var(--gold);font-weight:700;}
.footer-note{font-family:var(--mono);font-size:11px;color:var(--muted2);text-align:center;margin-top:48px;padding-top:20px;border-top:1px solid var(--line);}
#jpl-lightbox{position:fixed;inset:0;background:rgba(15, 23, 42, 0.95);display:none;align-items:center;justify-content:center;z-index:9999;cursor:zoom-out;padding:40px;backdrop-filter:blur(4px);}
#jpl-lightbox.open{display:flex;animation:fadeIn 0.2s ease;}
@keyframes fadeIn{from{opacity:0;}to{opacity:1;}}
#jpl-lightbox img{max-width:90vw;max-height:85vh;border-radius:var(--radius);border:2px solid rgba(255,255,255,0.1);box-shadow:0 25px 50px -12px rgba(0,0,0,0.5);}
#jpl-lightbox .lbcap{position:absolute;bottom:40px;left:0;right:0;text-align:center;font-family:var(--mono);font-size:13px;color:#fff;text-shadow:0 2px 4px rgba(0,0,0,0.5);}
#jpl-menu-btn{display:none;position:fixed;bottom:24px;right:24px;z-index:60;width:56px;height:56px;border-radius:28px;background:var(--accent);border:none;color:#fff;align-items:center;justify-content:center;cursor:pointer;font-size:24px;box-shadow:var(--shadow-lg);transition:transform 0.2s;}
#jpl-menu-btn:active{transform:scale(0.95);}
@media(max-width:880px){
    #jpl-sidebar{position:fixed;left:-340px;width:300px;flex:0 0 300px;z-index:50;transition:left .3s cubic-bezier(0.4, 0, 0.2, 1);box-shadow:var(--shadow-lg);height:100vh;}
    #jpl-sidebar.open{left:0;}
    #jpl-main{padding:24px 20px 80px;}
    .step{grid-template-columns:36px 1fr;gap:16px;}
    .step-img{grid-column:1/-1;}
    .infogrid{grid-template-columns:1fr 1fr;}
    .signoff-grid{grid-template-columns:1fr;}
    #jpl-menu-btn{display:flex;}
}
</style>

<button id="jpl-menu-btn" onclick="document.getElementById('jpl-sidebar').classList.toggle('open')">☰</button>

<div id="jpl-wi-app">
    <aside id="jpl-sidebar">
        <div class="jpl-brand">
            <div class="eyebrow">JPL Automotive</div>
            <h1>Full Build — JPL 478</h1>
            <div class="sub">1967 Mustang Fastback · Rev A</div>
        </div>
        <div class="progress-wrap">
            <div class="progress-label">
                <span>Overall Build Progress</span>
                <span class="big" id="overall-pct">0%</span>
            </div>
            <div class="bar-track"><div class="bar-fill" id="overall-bar" style="width:0%"></div></div>
            <div class="sync-status" id="sync-status"></div>
        </div>
        <div class="op-list" id="op-list"></div>
        <div class="reset-row">
            <button class="reset-btn" id="reset-btn">↺ Reset All Progress</button>
        </div>
    </aside>
    <main id="jpl-main"></main>
    <a href="{{ route('dashboard') }}" class="dashboard-floating-btn">
        <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        Dashboard
    </a>
</div>

<div id="jpl-lightbox" onclick="closeLightbox()">
    <img id="jpl-lightbox-img" src="" alt="">
    <div class="lbcap" id="jpl-lightbox-cap"></div>
</div>

<script>
const OPS=[{opNo:"OP-101",section:"01",station:"Receiving Bay",title:"New Body Shell Receiving, Inspection & Fixture Check",ppe:["Safety Glasses","Gloves","Steel-Cap Boots"],hazards:[["Manual handling of shell/panels","Two-plus person lift or hoist for shell; use body cart/rotisserie once landed."],["Shell on stands — stability","Confirm stands/fixture rated for shell weight before releasing hoist."]],tools:["Body cart / rotisserie","Dimensional check fixture / tape","Inspection light","Camera"],materials:["Dynacorn shell spec sheet"],steps:[["Uncrate and inspect the new Dynacorn reproduction shell for shipping damage, panel alignment and e-coat/paint condition.","No teardown required — shell arrives as new sheet metal, not a restored body.",null,null],["Mount shell on rotisserie or chassis fixture; confirm level and square before any structural work begins.","",null,null],["Dimensionally check core body points — shock tower centres, front rail width, rear frame rail length — against the Dynacorn spec sheet.","⚠ Confirm dimensions before OP-201 — the parcel shelf brace and Front IFS install both depend on an accurate shell.",null,null],["Photograph shell condition and record any shipping damage claims before proceeding.","",null,null]],qc:[["Shell dimensions vs Dynacorn spec","Within tolerance at all checked points"],["Shipping damage","None, or documented/claimed before work begins"]],next:"OP-201 — Rear Parcel Shelf Brace — Fabrication & Weld-In (ADR Seatbelt Mounting)."},{opNo:"OP-201",section:"02",station:"Chassis Fab Bay",title:"Rear Parcel Shelf Brace � Fabrication — Weld-In (ADR Seatbelt Mounting)",ppe:["Safety Glasses","Welding Mask / Gloves","Steel-Cap Boots","Hearing Protection"],hazards:[["Cutting / grinding sparks","Clear flammables from bay; fire extinguisher within reach."],["Welding fumes / arc flash","Ventilated bay; welding mask and gauntlets."]],tools:["MIG welder","Angle finder","Adjustable clamps"],materials:["Parcel shelf assembly — supplied part","MIG wire","Grinding discs"],steps:[["Receive and inspect the parcel shelf assembly against the reference drawing.","✔ This is a supplied part — check it against the drawing for shipping damage or defect.",null,null],["Dry-fit the parcel shelf panel across the rear package tray.","⚠ Reflex angle is body-specific — confirm the fold/seat angle against the actual shell.",null,null],["Clamp the panel in place and tack weld the parcel shelf brace to the body structure.","",null,null],["Confirm fitment before final weld — check for panel oil-canning or gaps.","✔ No gaps or high spots before proceeding to final weld.",null,null],["Fully weld the parcel shelf brace to the body seam per structural weld standard.","✔ Continuous weld bead, no gaps, cold-lap or pinholes.",null,null]],qc:[["Part received matches drawing","P/N confirmed, no shipping damage"],["Seating against body reflex angle","Flush, no gaps"],["Final weld quality","Full weld, no gaps/cold-lap/pinholes"]],next:"OP-202 — ADR-Compliant Seatbelt Mounting Plate Upgrade.",diagramSvg:'<svg viewBox="0 0 640 340" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="#1A1A1A" stroke-width="2.2" stroke-linejoin="round" stroke-linecap="round"><path d="M 40 70 L 150 40 L 300 40 L 470 130 L 560 150"/><path d="M 300 40 L 460 128" stroke-dasharray="4 4"/><path d="M 470 130 L 560 150 L 560 170 L 470 175 Z"/><path d="M 40 70 L 40 260 L 600 260 L 600 175 L 560 170"/><path d="M 60 200 L 60 260 M 60 200 Q 95 180 150 200 L 150 260"/><path d="M 150 195 L 470 175 L 470 205 L 150 225 Z" fill="#F5E9D3" opacity="0.7" stroke="#C1720E"/><circle cx="210" cy="212" r="5" fill="#C1720E" stroke="none"/><circle cx="300" cy="205" r="5" fill="#C1720E" stroke="none"/><circle cx="390" cy="197" r="5" fill="#C1720E" stroke="none"/></g><g font-size="11" fill="#1A1A1A" font-family="monospace"><line x1="300" y1="185" x2="300" y2="115" stroke="#1A1A1A" stroke-width="1"/><text x="205" y="108">PARCEL SHELF BRACE</text><text x="225" y="124">welded across package tray</text><line x1="300" y1="205" x2="300" y2="300" stroke="#1A1A1A" stroke-width="1"/><text x="195" y="316">ADR SEATBELT ANCHOR POINTS (3x, rear)</text></g></svg>',diagramCaption:"Schematic — parcel shelf brace location & seatbelt anchor points (not to scale)"},{opNo:"OP-202",section:"02",station:"Chassis Fab Bay",title:"ADR-Compliant Seatbelt Mounting Plate Upgrade",ppe:["Safety Glasses","Welding Mask / Gloves","Steel-Cap Boots","Hearing Protection"],hazards:[["Cutting / grinding sparks","Clear flammables from bay."],["Welding fumes / arc flash","Ventilated bay; welding mask."]],tools:["MIG welder","Drill","Torque wrench"],materials:["ADR-compliant seatbelt mounting plate kit"],steps:[["Locate factory seatbelt anchor points and confirm against the ADR seatbelt anchorage design rule.","",null,null],["Remove or reinforce any factory mounting points that don't meet the compliant spec.","",null,null],["Fit and weld ADR-compliant seatbelt mounting plates at all positions — tie rear mounts into the parcel shelf brace from OP-201.","✔ Rear belt loads route through the parcel shelf brace, not bare sheet metal.",null,null],["Confirm all mounting plate welds and drill any clearance holes required for belt hardware.","",null,null]],qc:[["Mounting plate positions","Match ADR seatbelt anchorage spec"],["Weld quality","Full weld, no gaps"],["Belt hardware fit","Test-fits without binding"]],next:"OP-010 — Front K-Member, Shock Tower Saddle & Frame Rail Preparation (Section 03). ."},{opNo:"OP-010",section:"03",station:"Chassis — Front End",title:"Front K-Member, Shock Tower Saddle & Frame Rail Preparation (Section 03).",ppe:["Safety Glasses","Welding Mask / Gloves","Steel-Cap Boots","Hearing Protection"],hazards:[["Vehicle on jack stands / hoist","Confirm stability before working underneath."],["Cutting / grinding sparks","Fire extinguisher within reach; eye and hand protection mandatory."],["Welding fumes / arc flash","Local extraction; welding mask and gauntlets."],["Suspended engine/component","Use rated hoist/engine crane; no body parts under suspended load."]],tools:["Vehicle hoist or jack stands","Engine crane","Angle grinder + cut-off wheel","MIG welder","Adjustable C-clamps","Tape measure","Socket set (SAE)"],materials:["HEIDTS K-member sub-frame kit (P/N MTF-201)","Shock tower saddles","Grinding discs","MIG wire"],steps:[["Raise vehicle and support on jack stands placed on the flat section of the frame rails.","⚠ Confirm stand placement before releasing hoist. Vehicle must not rock.",null,null],["Remove engine and transmission. Tag and bag all fasteners for re-installation.","✔ Every fastener labelled — zero loose/unlabelled fasteners at end of step.",null,null],["Remove front wheels and shocks. Disconnect brake lines and tie rods.","Cap open brake lines to prevent fluid loss.",null,null],["Remove the factory steering box, pitman arm, and lower control arms. Cut out the factory lower control arm mounts.","Reference cut lines only — do not cut into the main frame rail.",null,null],["Cut out the factory shock towers along the edge between the shock tower and the inner apron — passenger side.","✔ Clean, straight cut on the apron edge.",null,null],["Cut out the factory shock tower — driver's side.","✔ Match passenger side cut line.",null,null],["Grind and clean the remaining front frame rails down to bare, weld-ready metal.","✔ No paint, rust, or coating within the weld zone.",null,null],["Measure 24-1/4\" from the very front of the frame and mark a vertical line on each rail.","⚠ CRITICAL DIMENSION — re-check measurement on both sides before marking.",null,null]],qc:[["Spindle centreline mark, both sides","24 1/4\" from front of frame, ±1/16\""],["Frame rails cleaned to bare metal","Visual — no coating/rust"],["All removed fasteners tagged","100% accounted for"],["Shock tower cut lines clean","Visual, both sides"]],next:"OP-020 — Shock Tower Saddle Fit-Up & Tack Weld."},{opNo:"OP-020",section:"03",station:"Chassis — Front End",title:"Shock Tower Saddle Fit-Up & Tack Weld",ppe:["Safety Glasses","Welding Mask / Gloves","Steel-Cap Boots"],hazards:[["Vehicle on jack stands","Confirm stability before working underneath."],["Welding fumes / arc flash","Welding mask; ventilated bay."]],tools:["MIG welder (tack setting)","Adjustable C-clamps","Torque wrench"],materials:["Driver's side shock tower saddle","Passenger's side shock tower saddle"],steps:[["Place the driver's side shock tower saddle onto the frame rail. Orient so the upper control arm mount hole is higher at the front than the rear.","Confirm orientation before clamping.",null,null],["Pre-locate the driver's side saddle using the factory 7/16\" steering gear bolt as an alignment guide.","Factory bolt is an alignment guide only — discard once saddle is aligned.",null,null],["Pre-locate the passenger's side saddle using the factory 3/8\" idler arm bolt.","Discard factory bolt once aligned.",null,null],["Check the slot in each shock tower saddle against the spindle centreline mark made in OP-010.","⚠ Do not proceed until the centreline mark is visible through the slot on both sides.",null,null],["Clamp both shock tower saddles to the frame rails and tack weld in place.","✔ Tack only — full weld occurs in OP-030 after K-member fit-up.",null,null]],qc:[["Spindle centreline visible through saddle slot, both sides","Visual"],["Saddle orientation — front hole higher than rear","Visual, both sides"],["Saddles clamped snug, no gap to frame rail","Visual / feel"]],next:"OP-030 — K-Member Installation & Final Weld."},{opNo:"OP-030",section:"03",station:"Chassis — Front End",title:"K-Member Installation & Final Weld",ppe:["Safety Glasses","Welding Mask / Gloves","Steel-Cap Boots","Hearing Protection"],hazards:[["Vehicle on jack stands","Confirm stability."],["K-member weight during fit-up","Support with engine crane or transmission jack."],["Full-seam welding","Ventilation, welding mask/gauntlets."]],tools:["Engine crane or transmission jack","Adjustable C-clamps","MIG welder (full-penetration setting)","Grinding wheel"],materials:["HEIDTS front K-member sub-frame (motor stands pre-welded on)"],steps:[["Place the front K-member into the vehicle, locating the vertical slots on the K-member to the saddles.","Slots must align — do not force.",null,null],["Confirm the motor stands are correctly oriented before welding.","✔ Re-check spindle centreline alignment before welding — last point to correct it.",null,null],["Fully weld all seams and slots between the K-member and the vehicle frame.","✔ Continuous weld bead, no gaps or cold-lap.",null,null],["Complete the weld on driver's side from engine compartment view.","Grind smooth per finishing standard.",null,null]],qc:[["K-member slots aligned to saddle slots","Visual, both sides"],["Spindle centreline still correct post-clamp","24 1/4\" from front of frame, ±1/16\""],["Full weld — no gaps, pinholes or cold-lap","Visual, both sides + tap test"]],next:"OP-401 — Rear Axle & Suspension."},{opNo:"OP-401",section:"04",station:"Rear Chassis",title:"Rear Axle, 4-Link / Torque Arm & Panhard Bar Mounting",ppe:["Safety Glasses","Welding Mask / Gloves","Steel-Cap Boots","Hearing Protection"],hazards:[["Vehicle on jack stands","Confirm stability."],["Suspended axle assembly","Support on rated stands/jack."],["Welding fumes / arc flash","Ventilated bay."]],tools:["Engine crane or transmission jack","MIG welder","Adjustable C-clamps","Tape measure"],materials:["4-link / torque arm bracket kit","Panhard or Watts link kit"],steps:[["Position rear axle assembly under the vehicle at correct ride height and pinion angle.","",null,null],["Fit 4-link/torque arm brackets and Panhard/Watts link mount, confirming axle centreline against chassis centreline.","⚠ CRITICAL — axle centreline must match chassis centreline before any welding.",null,null],["Tack weld all mounting brackets; verify axle is square before final weld.","",null,null],["Fully weld all mounting brackets to the frame.","✔ Continuous weld bead, no gaps.",null,null]],qc:[["Axle centreline vs chassis centreline","±1/16\""],["Pinion angle","Within spec"],["Bracket welds","Full weld, no gaps"]],next:"OP-501 — Brake Line Fabrication."},{opNo:"OP-501",section:"05",station:"Brake & Fuel Bay",title:"Brake Line Fabrication & Master Cylinder / Booster Install",ppe:["Safety Glasses","Gloves","Steel-Cap Boots"],hazards:[["Brake fluid — skin/eye/paint contact","Wear gloves and glasses; wipe spills immediately."]],tools:["Brake line flaring tool","Tubing bender","Torque wrench"],materials:["Master cylinder / booster","Proportioning valve","Brake line & fittings"],steps:[["Install master cylinder, booster and proportioning valve.","",null,null],["Fabricate and route brake lines front to rear, securing with mounting clips.","No line within 50mm of exhaust or moving suspension without a heat shield.",null,null],["Connect lines to calipers/wheel cylinders; torque all fittings to spec.","",null,null]],qc:[["Brake line routing","No contact with moving or hot components"],["Fitting torque","Torqued to spec, no weeping under pressure test"]],next:"OP-601 — Engine & Transmission Install."},{opNo:"OP-601",section:"06",station:"Drivetrain Bay",title:"Engine & Transmission Install",ppe:["Safety Glasses","Gloves","Steel-Cap Boots"],hazards:[["Suspended engine/transmission load","Use rated hoist/crane; no body parts under suspended load."]],tools:["Engine crane/hoist","Transmission jack","Torque wrench"],materials:["Engine mounts","Transmission crossmember"],steps:[["Lower engine/transmission assembly onto mounts; confirm mount alignment and clearance to chassis/body.","",null,null],["Connect engine mounts, transmission crossmember and driveline accessories.","",null,null],["Torque all mounting hardware to spec.","✔ Re-check torque after first heat cycle.",null,null]],qc:[["Mount torque","Torqued to spec"],["Chassis/body clearance","Adequate clearance at all points"]],next:"OP-701 — Chassis Harness Install."},{opNo:"OP-701",section:"07",station:"Electrical Bay",title:"Chassis Harness Install",ppe:["Safety Glasses","Gloves","Steel-Cap Boots"],hazards:[["Battery — short circuit / arc risk","Disconnect battery before harness work."]],tools:["Wiring harness","Crimp tools","Multimeter","Loom / conduit"],materials:["Chassis wiring harness"],steps:[["Route and secure chassis wiring harness, keeping clear of heat sources and moving parts.","",null,null],["Connect lighting, fuel sender and chassis grounds; verify continuity at each circuit.","",null,null],["Confirm no shorts to chassis before battery connection.","⚠ Do not connect battery until this check passes.",null,null]],qc:[["Continuity check","Zero shorts to chassis"],["Grounds","Clean contact, torqued"]],next:"OP-801 — Panel Fitment, Bodywork & Paint."},{opNo:"OP-801",section:"08",station:"Paint Booth",title:"Panel Fitment, Bodywork & Paint",ppe:["Respirator","Safety Glasses","Coveralls"],hazards:[["Paint / solvent fumes","Spray only in a ventilated, filtered booth."],["Isocyanate exposure (2K paint)","Fresh-air-fed respirator required for 2K clear coat."]],tools:["Paint booth","Spray gun","DA sander","Panel gap gauges"],materials:["Filler, primer, base coat, clear coat"],steps:[["Fit and align all body panels; confirm gaps and shut lines within spec.","",null,null],["Complete bodywork, filler and surface prep; seal and prime.","",null,null],["Apply base coat and clear coat in a controlled, ventilated booth.","⚠ Full respiratory protection required for 2K clear coat application.",null,null],["Colour-sand and buff finished paint.","",null,null]],qc:[["Panel gaps","Within spec, consistent both sides"],["Paint finish","Free of runs, excess orange peel, or contamination"],["Cure time","Met before handling"]],next:"OP-901 — Interior, Glass & Trim Install."},{opNo:"OP-901",section:"09",station:"Trim Bay",title:"Interior, Glass & Trim Install",ppe:["Safety Glasses","Gloves","Steel-Cap Boots"],hazards:[["Manual handling of glass","Two-person lift for all glass panels."]],tools:["Trim tools","Adhesive / sealant","Torque wrench"],materials:["Seats, belts, console","Dash & trim","Glass & weatherstrip"],steps:[["Install sound deadening, carpet, seats, seatbelts and console.","",null,null],["Install dash, gauges and interior trim.","",null,null],["Install glass, exterior trim and weatherstrip; confirm seals against water/wind intrusion.","",null,null]],qc:[["Seatbelt anchor points","Torqued to spec"],["Glass seals","Continuous, no gaps"],["Trim fitment","Secure, no rattles on shake test"]],next:"OP-1001 — Fluids, Start-Up & Systems Check."},{opNo:"OP-1001",section:"10",station:"Commissioning Bay",title:"Fluids, Start-Up & Systems Check",ppe:["Safety Glasses","Gloves","Steel-Cap Boots"],hazards:[["First start — fire risk","Fire extinguisher on hand; clear bay of flammables."]],tools:["Fluid fill equipment","Diagnostic scanner"],materials:["Oil, coolant, transmission, differential, brake, power steering fluid"],steps:[["Fill all fluids — oil, coolant, transmission, differential, brake, power steering — to spec.","",null,null],["Perform initial start-up; check for leaks, unusual noise and correct idle.","⚠ First start — extinguisher on hand, bay clear of flammables.",null,null],["Function-check all electrical systems: lighting, HVAC, wipers, gauges.","",null,null]],qc:[["Leak check after first start","No leaks"],["Electrical systems","All functional"],["Fluid levels","Correct level and type, all systems"]],next:"End of commissioning — vehicle ready for final compliance inspection."}];

const STORE='jpl478_v2';
let state={};
function loadState(){try{state=JSON.parse(localStorage.getItem(STORE)||'{}')}catch(e){state={}}}
function saveState(){localStorage.setItem(STORE,JSON.stringify(state))}
function opKey(o,i){return o+':s:'+i}
function qcKey(o,i){return o+':q:'+i}
function sigKey(o,w){return o+':sig:'+w}
loadState();
function opPct(op){let d=0;op.steps.forEach((_,i)=>{if(state[opKey(op.opNo,i)])d++});return op.steps.length?Math.round(d/op.steps.length*100):0}
function overallPct(){let t=0,d=0;OPS.forEach(op=>{t+=op.steps.length;op.steps.forEach((_,i)=>{if(state[opKey(op.opNo,i)])d++})});return t?Math.round(d/t*100):0}
function updateBar(){const p=overallPct();document.getElementById('overall-pct').textContent=p+'%';document.getElementById('overall-bar').style.width=p+'%'}
function secTitle(s){const t={'01':'Body Shell','02':'Chassis — Rear','03':'Front IFS','04':'Rear Suspension','05':'Brakes & Fuel','06':'Drivetrain','07':'Electrical','08':'Paint & Body','09':'Trim & Glass','10':'Commissioning'};return t[s]||'Section '+s}
function getSections(){const m={};OPS.forEach(op=>{const s=op.section||'?';if(!m[s])m[s]={num:s,title:secTitle(s),ops:[]};m[s].ops.push(op)});return Object.values(m).sort((a,b)=>a.num.localeCompare(b.num))}
let activeOp=OPS[0].opNo;
function e(s){if(!s)return '';return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;')}

function buildSidebar(){
    const list=document.getElementById('op-list');
    list.innerHTML='';
    getSections().forEach(sec=>{
        const avgP=Math.round(sec.ops.reduce((a,op)=>a+opPct(op),0)/sec.ops.length);
        const isActive=sec.ops.some(op=>op.opNo===activeOp);
        const g=document.createElement('div');g.className='section-group';
        const h=document.createElement('div');
        h.className='section-head'+(isActive?' active':'');
        h.innerHTML=`<span class="section-chevron${isActive?' open':''}">▶</span><span class="section-num">${sec.num}</span><span class="section-title">${sec.title}</span><span class="section-pct">${avgP}%</span>`;
        h.addEventListener('click',()=>{const o=g.querySelector('.section-ops');o.classList.toggle('open');h.querySelector('.section-chevron').classList.toggle('open')});
        const od=document.createElement('div');od.className='section-ops'+(isActive?' open':'');
        sec.ops.forEach(op=>{
            const p=opPct(op);
            const it=document.createElement('div');
            it.className='op-item'+(op.opNo===activeOp?' active':'');
            it.innerHTML=`<div class="op-status ${p===100?'done':p>0?'partial':''}">${p===100?'✓':p>0?'~':''}</div><div class="op-meta"><div class="no">${op.opNo}</div><div class="title">${op.title}</div></div>`;
            it.addEventListener('click',()=>{activeOp=op.opNo;render()});
            od.appendChild(it);
        });
        g.appendChild(h);g.appendChild(od);list.appendChild(g);
    });
}

function render(){
    buildSidebar();updateBar();
    const op=OPS.find(o=>o.opNo===activeOp);if(!op)return;
    const main=document.getElementById('jpl-main');
    const p=opPct(op);const sd=op.steps.filter((_,i)=>state[opKey(op.opNo,i)]).length;
    let html=`<div class="op-header"><div class="titleblock"><div class="eyebrow">${e(op.opNo)} · ${e(op.station)}</div><h2>${e(op.title)}</h2></div><div class="op-progress-badge"><b>${sd}</b>/${op.steps.length} steps · <b>${p}%</b></div></div>`;
    html+=`<div class="infogrid"><div class="infocell"><div class="k">Operation</div><div class="v">${e(op.opNo)}</div></div><div class="infocell"><div class="k">Station</div><div class="v">${e(op.station)}</div></div><div class="infocell"><div class="k">Section</div><div class="v">${e(secTitle(op.section||'?'))}</div></div><div class="infocell"><div class="k">Progress</div><div class="v">${p}%</div></div></div>`;
    html+=`<div class="stage-heading">PPE Required</div><div class="chip-row">`;
    op.ppe.forEach(p2=>{html+=`<span class="chip">⚠ ${e(p2)}</span>`});html+=`</div>`;
    html+=`<div class="stage-heading">Hazards & Controls</div><div style="overflow-x:auto; width:100%;"><table class="hazard-table"><thead><tr><th>Hazard</th><th>Control</th></tr></thead><tbody>`;
    op.hazards.forEach(([h2,c])=>{html+=`<tr><td class="haz">${e(h2)}</td><td class="ctrl">${e(c)}</td></tr>`});html+=`</tbody></table></div>`;
    html+=`<div class="stage-heading">Tools & Materials</div><div class="tools-grid"><div class="tools-col"><div class="h">Tools</div><ul>`;
    op.tools.forEach(t=>{html+=`<li>${e(t)}</li>`});html+=`</ul></div><div class="tools-col"><div class="h">Materials</div><ul>`;
    op.materials.forEach(m=>{html+=`<li>${e(m)}</li>`});html+=`</ul></div></div>`;
    if(op.diagramSvg){html+=`<div class="stage-heading">Reference Diagram</div><div class="diagram-box"><div class="diagram-frame">${op.diagramSvg}</div><div class="diagram-cap">${e(op.diagramCaption||'')}</div></div>`}
    html+=`<div class="stage-heading">Work Steps</div>`;
    op.steps.forEach(([instr,key,img,cap],i)=>{
        const done=!!state[opKey(op.opNo,i)];
        const kc=key&&key.startsWith('⚠')?'keypoint crit':key&&key.startsWith('✔')?'keypoint ok':'keypoint';
        html+=`<div class="step${done?' done':''}" id="step-${op.opNo}-${i}"><div class="step-check"><div class="checkbox${done?' checked':''}" onclick="toggleStep('${op.opNo}',${i})"><svg width="14" height="14" viewBox="0 0 14 14"><polyline points="2,7 6,11 12,3" stroke="#fff" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></div><div class="step-num">${String(i+1).padStart(2,'0')}</div></div><div class="step-body"><div class="instr">${e(instr)}</div>${key?`<div class="${kc}">${e(key)}</div>`:''}</div><div class="step-img${img?'':' empty'}">${img?`<img src="${img}" alt="${e(cap||'')}"><div class="cap">${e(cap||'')}</div>`:'[ No reference image ]'}</div></div>`;
    });
    html+=`<div class="stage-heading">Quality Check Points</div><div style="overflow-x:auto; width:100%;"><table class="qc-table"><thead><tr><th>Check</th><th>Accept Criteria</th><th>Result</th></tr></thead><tbody>`;
    op.qc.forEach(([ch,sp],i)=>{const qv=state[qcKey(op.opNo,i)]||'';html+=`<tr><td>${e(ch)}</td><td class="spec">${e(sp)}</td><td><div class="qc-toggle-group"><button class="qc-btn pass${qv==='pass'?' active':''}" onclick="setQC('${op.opNo}',${i},'pass',this)">PASS</button><button class="qc-btn fail${qv==='fail'?' active':''}" onclick="setQC('${op.opNo}',${i},'fail',this)">FAIL</button></div></td></tr>`});
    html+=`</tbody></table></div>`;
    html+=`<div class="stage-heading">Sign-Off</div><div class="signoff-grid">`;
    ['Technician','Quality Inspector'].forEach(who=>{
        const sv=state[sigKey(op.opNo,who)]||{};
        html+=`<div class="signoff-card"><div class="h"><span>${who}</span>${sv.signed?'<span class="signed-tag">✔ SIGNED</span>':''}</div><input type="text" placeholder="Full name" value="${e(sv.name||'')}" id="sn-${who.replace(' ','-')}"/><div class="sig-pad-wrap"><canvas id="sc-${who.replace(' ','-')}" width="400" height="110"></canvas><div class="sig-placeholder">${sv.signed?'':'Draw signature here'}</div></div><div style="display:flex;justify-content:space-between;align-items:center;"><button class="sig-clear" onclick="clearSig('${op.opNo}','${who}')">Clear</button><button class="qc-btn pass" onclick="saveSig('${op.opNo}','${who}')">Sign & Save</button></div></div>`;
    });
    html+=`</div>`;
    if(op.next){html+=`<div class="stage-heading">Next Operation</div><div class="next-op"><strong>→</strong> ${e(op.next)}</div>`}
    html+=`<div class="footer-note">JPL Automotive · Build Doc JPL-478-WI · This document is controlled — verify revision before use.</div>`;
    main.innerHTML=html;
    initSigs(op);
}

function toggleStep(o,i){const k=opKey(o,i);state[k]=!state[k];saveState();render()}
function setQC(o,i,v,btn){const k=qcKey(o,i);if(state[k]===v){delete state[k]}else{state[k]=v};saveState();const g=btn.closest('.qc-toggle-group');g.querySelectorAll('.qc-btn').forEach(b=>b.classList.remove('active'));if(state[k])btn.classList.add('active')}
const pads={};
function initSigs(op){
    ['Technician','Quality Inspector'].forEach(who=>{
        const id='sc-'+who.replace(' ','-');const cv=document.getElementById(id);if(!cv)return;
        const ctx=cv.getContext('2d');cv.width=cv.offsetWidth||400;ctx.strokeStyle='#1A1A1A';ctx.lineWidth=2;ctx.lineCap='round';
        const sv=state[sigKey(op.opNo,who)]||{};
        if(sv.data){const img=new Image();img.onload=()=>ctx.drawImage(img,0,0);img.src=sv.data}
        let dr=false,lx=0,ly=0;
        cv.addEventListener('pointerdown',ev=>{dr=true;[lx,ly]=gp(ev,cv)});
        cv.addEventListener('pointermove',ev=>{if(!dr)return;const[x,y]=gp(ev,cv);ctx.beginPath();ctx.moveTo(lx,ly);ctx.lineTo(x,y);ctx.stroke();[lx,ly]=[x,y]});
        cv.addEventListener('pointerup',()=>dr=false);cv.addEventListener('pointerleave',()=>dr=false);
        pads[who]={cv,ctx};
    });
}
function gp(ev,cv){const r=cv.getBoundingClientRect();return[ev.clientX-r.left,ev.clientY-r.top]}
function saveSig(opNo,who){
    const cv=document.getElementById('sc-'+who.replace(' ','-'));
    const nm=document.getElementById('sn-'+who.replace(' ','-'));
    if(!cv)return;
    state[sigKey(opNo,who)]={name:nm?nm.value:'',data:cv.toDataURL(),signed:true};
    saveState();
    const ss=document.getElementById('sync-status');ss.className='sync-status ok';ss.textContent='✔ Signed — '+new Date().toLocaleTimeString();
    setTimeout(()=>{if(ss){ss.className='sync-status';ss.textContent=''}},3000);
}
function clearSig(opNo,who){delete state[sigKey(opNo,who)];saveState();const p=pads[who];if(p)p.ctx.clearRect(0,0,p.cv.width,p.cv.height)}
function openLightbox(s,c){document.getElementById('jpl-lightbox-img').src=s;document.getElementById('jpl-lightbox-cap').textContent=c||'';document.getElementById('jpl-lightbox').classList.add('open')}
function closeLightbox(){document.getElementById('jpl-lightbox').classList.remove('open')}
document.getElementById('reset-btn').addEventListener('click',()=>{if(confirm('Reset ALL build progress? This cannot be undone.')){localStorage.removeItem(STORE);loadState();render()}});
document.addEventListener('keydown',ev=>{if(ev.key==='Escape')closeLightbox()});
render();
</script>
@endsection


