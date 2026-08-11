@extends('layouts.layout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #15171a;
            --panel: #1d2024;
            --panel-2: #23272c;
            --border: #33373d;
            --text: #e8e6e1;
            --text-dim: #9a9a94;
            --text-faint: #6b6d70;
            --accent: #d97706;
            --row-h: 34px;
        }

        * {
            box-sizing: border-box;
        }

        .build-page {
            background: var(--bg);
            color: var(--text);
            min-height: calc(100vh - 70px);
            padding: 30px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        .wrap {
            width: 100%;
            max-width: 1300px;
            margin: auto;
        }

        .h1heading {
            font-size: 20px;
            font-weight: 600;
            margin: 0 0 4px;
            letter-spacing: -0.01em;
        }

        .sub {
            color: var(--text-dim);
            font-size: 13px;
            margin: 0 0 24px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 20px;
        }

        .panel h2 {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: var(--text-dim);
            margin: 0 0 14px;
            font-weight: 600;
        }

        /* Add task form */
        .form-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr 1.6fr .9fr .8fr .8fr auto;
            gap: 8px;
            align-items: end;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .field label {
            font-size: 11px;
            color: var(--text-faint);
        }

        input,
        select {
            background: var(--panel-2);
            border: 1px solid var(--border);
            border-radius: 6px;
            color: var(--text);
            padding: 7px 8px;
            font-size: 13px;
            font-family: inherit;
            width: 100%;
        }

        input:focus,
        select:focus {
            outline: 1px solid var(--accent);
            border-color: var(--accent);
        }

        .taskbtn {
            background: var(--accent);
            color: #1a1006;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .taskbtn:hover {
            filter: brightness(1.08);
        }

        .taskbtn.ghost {
            background: transparent;
            color: var(--text-dim);
            border: 1px solid var(--border);
            font-weight: 400;
            padding: 4px 8px;
            font-size: 12px;
        }

        .taskbtn.ghost:hover {
            color: var(--text);
            border-color: var(--text-dim);
        }

        .taskbtn.danger:hover {
            color: #f87171;
            border-color: #f87171;
        }

        /* Task list table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            text-align: left;
            color: var(--text-faint);
            font-weight: 500;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .04em;
            padding: 0 8px 8px;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 7px 8px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .swatch {
            width: 10px;
            height: 10px;
            border-radius: 2px;
            display: inline-block;
            margin-right: 6px;
            flex-shrink: 0;
        }

        .row-label {
            display: flex;
            align-items: center;
        }

        .num {
            color: var(--text-dim);
        }

        .actions {
            text-align: right;
            white-space: nowrap;
        }

        /* Timeline */
        .timeline-scroll {
            overflow-x: auto;
        }

        .timeline-inner {
            min-width: 760px;
        }

        .weekrow {
            display: grid;
            grid-template-columns: 150px 1fr;
            margin-bottom: 4px;
        }

        .weekrow .weeks {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: 1fr;
        }

        .weeks span {
            text-align: center;
            font-size: 11px;
            color: var(--text-faint);
        }

        .track-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            align-items: center;
            padding: 5px 0;
        }

        .track-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            padding-right: 8px;
        }

        .track-empty {
            font-size: 12px;
            color: var(--text-faint);
            font-style: italic;
        }

        .bar-lane {
            position: relative;
            height: var(--row-h);
            background: var(--panel-2);
            border-radius: 5px;
        }

        .bar {
            position: absolute;
            top: 2px;
            height: calc(var(--row-h) - 4px);
            border-radius: 5px;
            display: flex;
            align-items: center;
            padding: 0 7px;
            overflow: hidden;
            font-size: 11px;
            font-weight: 500;
            white-space: nowrap;
            cursor: default;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid var(--border);
        }

        .legend span {
            font-size: 12px;
            color: var(--text-dim);
            display: flex;
            align-items: center;
        }

        .totals {
            display: flex;
            gap: 24px;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid var(--border);
            font-size: 12px;
            color: var(--text-dim);
        }

        .totals b {
            color: var(--text);
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: var(--text-faint);
            font-size: 13px;
        }

        @media (max-width:700px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .dashboard-floating-btn {
            position: absolute;
            top: 104px;
            right: 24px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #ffffff;
            color: #1e293b;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            text-decoration: none;
            transition: all 0.2s ease;
            z-index: 100;
        }
        .dashboard-floating-btn:hover {
            background: #f8fafc;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transform: translateY(-1px);
        }

        .custom-datalist {
            position: relative;
        }
        .custom-datalist-options {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--panel-2);
            border: 1px solid var(--border);
            border-radius: 6px;
            margin-top: 4px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 50;
            display: none;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.5);
        }
        .custom-datalist-options.show {
            display: block;
        }
        
        /* Custom Scrollbar for Dropdown */
        .custom-datalist-options::-webkit-scrollbar {
            width: 4px;
        }
        .custom-datalist-options::-webkit-scrollbar-track {
            background: var(--panel-2);
            border-radius: 4px;
        }
        .custom-datalist-options::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 4px;
        }
        .custom-datalist-options::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        .custom-datalist-option {
            padding: 8px 12px;
            cursor: pointer;
            font-size: 13px;
            color: var(--text);
        }
        .custom-datalist-option:hover {
            background: var(--accent);
            color: #1a1006;
        }
    </style>

    <a href="{{ route('dashboard') }}" class="dashboard-floating-btn">
        <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        Dashboard
    </a>

    <div class="build-page">
        <div class="wrap">
            <h1 class="h1heading" >478 prototype completion timeline</h1>
            <p class="sub">Editable task list drives the timeline below &mdash; add, edit, or remove items and it updates
                automatically.</p>

            <div class="panel">
                <h2>Add task</h2>
                <div class="form-grid">
                    <div class="field">
                        <label>Track</label>
                        <div class="custom-datalist" id="track-combobox">
                            <input id="f-track" placeholder="e.g. Electrical" autocomplete="off" onfocus="showTrackOptions()" onblur="hideTrackOptions()" oninput="filterTrackOptions()">
                            <div class="custom-datalist-options" id="track-options-list"></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Phase</label>
                        <select id="f-phase"></select>
                    </div>
                    <div class="field">
                        <label>Task label</label>
                        <input id="f-label" placeholder="e.g. Wiring harness">
                    </div>
                    <div class="field">
                        <label>Cost ($)</label>
                        <input id="f-cost" type="number" min="0" step="1" placeholder="0">
                    </div>
                    <div class="field">
                        <label>Start (wk)</label>
                        <input id="f-start" type="number" min="1" step="1" value="1">
                    </div>
                    <div class="field">
                        <label>Duration (wk)</label>
                        <input id="f-dur" type="number" min="1" step="1" value="1">
                    </div>
                    <button class="taskbtn" onclick="addTask()">Add task</button>
                </div>
            </div>

            <div class="panel">
                <h2>Task list</h2>
                <div id="task-table-wrap"></div>
            </div>

            <div class="panel">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                    <h2 style="margin:0;">Timeline</h2>
                    <select id="timeline-scale" onchange="changeTimelineScale()" style="width: auto; padding: 4px 8px; font-size: 12px; background: var(--panel-2); color: var(--text); border: 1px solid var(--border); border-radius: 6px;">
                        <option value="weekly">Weekly View</option>
                        <option value="monthly">Monthly View</option>
                    </select>
                </div>
                <div id="timeline-wrap"></div>
                <div class="legend" id="legend"></div>
                <div class="totals" id="totals"></div>
            </div>
        </div>
    </div>

    <script>
        const PHASES = [
            { id: 'procurement', label: 'Procurement', color: '#d97706', text: '#1a1006' },
            { id: 'design', label: 'Design', color: '#2563eb', text: '#0d1a3d' },
            { id: 'production', label: 'Production', color: '#eab308', text: '#1f1a02' },
            { id: 'shipping', label: 'Shipping', color: '#7c3aed', text: '#160a33' },
            { id: 'installation', label: 'Installation', color: '#16a34a', text: '#052e10' },
            { id: 'testing', label: 'Testing', color: '#dc2626', text: '#2e0505' },
        ];
        const phaseById = Object.fromEntries(PHASES.map(p => [p.id, p]));

        const DEFAULT_TRACKS = [
            'Electrical',
            'Climate (A/C)',
            'ABS / plumbing',
            'Interior / 3D',
            'Digital gauges',
            'Seats',
            'Testing'
        ];

        let tasks = @json($tasks ?? []);
        let timelineScale = 'weekly';

        function changeTimelineScale() {
            timelineScale = document.getElementById('timeline-scale').value;
            renderTimeline();
        }

        const getCsrfToken = () => document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function populatePhaseSelect() {
            const sel = document.getElementById('f-phase');
            sel.innerHTML = PHASES.map(p => `<option value="${p.id}">${p.label}</option>`).join('');
        }

        function populateTrackOptions() {
            const list = document.getElementById('track-options-list');
            const usedTracks = tasks.map(t => t.track);
            const allTracks = [...new Set([...DEFAULT_TRACKS, ...usedTracks])];
            
            window.allTrackOptions = allTracks;
            renderTrackOptions(allTracks);
        }

        function renderTrackOptions(options) {
            const list = document.getElementById('track-options-list');
            if (options.length === 0) {
                list.innerHTML = `<div class="custom-datalist-option" style="color:var(--text-faint);cursor:default;">No matches</div>`;
                return;
            }
            list.innerHTML = options.map(t => `<div class="custom-datalist-option" onmousedown="selectTrack('${t.replace(/'/g, "\\'")}')">${t}</div>`).join('');
        }

        function showTrackOptions() {
            document.getElementById('track-options-list').classList.add('show');
            filterTrackOptions();
        }

        function hideTrackOptions() {
            setTimeout(() => {
                const el = document.getElementById('track-options-list');
                if(el) el.classList.remove('show');
            }, 150);
        }

        function filterTrackOptions() {
            const val = document.getElementById('f-track').value.toLowerCase();
            const filtered = window.allTrackOptions.filter(t => t.toLowerCase().includes(val));
            renderTrackOptions(filtered);
        }

        function selectTrack(track) {
            document.getElementById('f-track').value = track;
            document.getElementById('track-options-list').classList.remove('show');
        }

        async function addTask() {
            const track = document.getElementById('f-track').value.trim();
            const phase = document.getElementById('f-phase').value;
            const label = document.getElementById('f-label').value.trim();
            const cost = parseFloat(document.getElementById('f-cost').value) || 0;
            const start = parseInt(document.getElementById('f-start').value) || 1;
            const dur = Math.max(1, parseInt(document.getElementById('f-dur').value) || 1);

            if (!track || !label) {
                alert('Track and task label are required.');
                return;
            }

            try {
                const response = await fetch('/build-system/tasks', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: JSON.stringify({ track, phase, label, cost, start, dur })
                });
                const data = await response.json();
                
                if (data.success) {
                    tasks.push(data.task);
                    document.getElementById('f-track').value = '';
                    document.getElementById('f-label').value = '';
                    document.getElementById('f-cost').value = '';
                    document.getElementById('f-start').value = '1';
                    document.getElementById('f-dur').value = '1';
                    alert('Task added successfully!');
                    renderAll();
                }
            } catch(e) {
                console.error(e);
                alert("Failed to add task.");
            }
        }

        async function deleteTask(id) {
            try {
                const response = await fetch('/build-system/tasks/' + id, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': getCsrfToken() }
                });
                const data = await response.json();
                if (data.success) {
                    tasks = tasks.filter(t => t.id !== id);
                    renderAll();
                }
            } catch(e) {
                console.error(e);
                alert("Failed to delete task.");
            }
        }

        async function updateTask(id, field, value) {
            const t = tasks.find(t => t.id === id);
            if (!t) return;
            if (field === 'cost' || field === 'start' || field === 'dur') {
                value = parseFloat(value) || 0;
                if (field === 'start' || field === 'dur') value = Math.max(1, Math.round(value));
            }
            
            const originalValue = t[field];
            t[field] = value;
            
            try {
                const response = await fetch('/build-system/tasks/' + id, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: JSON.stringify({ [field]: value })
                });
                const data = await response.json();
                if (data.success) {
                    renderAll();
                } else {
                    t[field] = originalValue;
                    renderAll();
                }
            } catch(e) {
                console.error(e);
                t[field] = originalValue;
                renderAll();
            }
        }

        function fmtMoney(v) {
            if (!v) return '$0';
            return '$' + Math.round(v).toLocaleString();
        }

        function renderTable() {
            const wrap = document.getElementById('task-table-wrap');
            if (tasks.length === 0) {
                wrap.innerHTML = '<div class="empty-state">No tasks yet. Add one above.</div>';
                return;
            }
            const sorted = [...tasks].sort((a, b) => a.track.localeCompare(b.track) || a.start - b.start);
            let rows = sorted.map(t => {
                const p = phaseById[t.phase] || PHASES[0];
                return `<tr>
          <td>${t.track}</td>
          <td class="row-label"><span class="swatch" style="background:${p.color}"></span>
            <select onchange="updateTask(${t.id},'phase',this.value)" style="padding:3px 6px;font-size:12px;">
              ${PHASES.map(ph => `<option value="${ph.id}" ${ph.id === t.phase ? 'selected' : ''}>${ph.label}</option>`).join('')}
            </select>
          </td>
          <td><input value="${t.label}" onchange="updateTask(${t.id},'label',this.value)" style="padding:4px 6px;font-size:12px;"></td>
          <td class="num"><input type="number" value="${t.cost}" min="0" onchange="updateTask(${t.id},'cost',this.value)" style="width:80px;padding:4px 6px;font-size:12px;"></td>
          <td class="num"><input type="number" value="${t.start}" min="1" onchange="updateTask(${t.id},'start',this.value)" style="width:56px;padding:4px 6px;font-size:12px;"></td>
          <td class="num"><input type="number" value="${t.dur}" min="1" onchange="updateTask(${t.id},'dur',this.value)" style="width:56px;padding:4px 6px;font-size:12px;"></td>
          <td class="actions"><button class="ghost danger" onclick="deleteTask(${t.id})">Remove</button></td>
        </tr>`;
            }).join('');
            wrap.innerHTML = `<table>
        <thead><tr>
          <th>Track</th><th>Phase</th><th>Label</th><th>Cost</th><th>Start wk</th><th>Dur wk</th><th></th>
        </tr></thead>
        <tbody>${rows}</tbody>
      </table>`;
        }

        function renderTimeline() {
            const wrap = document.getElementById('timeline-wrap');
            const legend = document.getElementById('legend');
            const totalsEl = document.getElementById('totals');

            if (tasks.length === 0) {
                wrap.innerHTML = '<div class="empty-state">Timeline will appear once you add tasks.</div>';
                legend.innerHTML = '';
                totalsEl.innerHTML = '';
                return;
            }

            const maxWeek = Math.max(9, ...tasks.map(t => parseInt(t.start) + parseInt(t.dur) - 1));
            const tracks = [...new Set(tasks.map(t => t.track))];
            
            let timelineMax = maxWeek;

            let weekHeader = '<div class="weekrow"><div></div><div class="weeks">';
            
            if (timelineScale === 'monthly') {
                const maxMonth = Math.ceil(maxWeek / 4);
                timelineMax = maxMonth * 4; // Round up max weeks to a whole month scale
                for (let m = 1; m <= maxMonth; m++) { 
                    weekHeader += `<span>M${m}</span>`; 
                }
            } else {
                for (let w = 1; w <= maxWeek; w++) { 
                    weekHeader += `<span>${w}</span>`; 
                }
            }
            weekHeader += '</div></div>';

            let trackRows = tracks.map(track => {
                const trackTasks = tasks.filter(t => t.track === track);
                let bars = trackTasks.map(t => {
                    const p = phaseById[t.phase] || PHASES[0];
                    const left = ((parseInt(t.start) - 1) / timelineMax) * 100;
                    const width = (parseInt(t.dur) / timelineMax) * 100;
                    const label = parseFloat(t.cost) > 0 ? `${t.label} ${fmtMoney(parseFloat(t.cost))}` : t.label;
                    return `<div class="bar" style="left:${left}%;width:${width}%;background:${p.color};color:${p.text}" title="${t.label} (${p.label}, wk ${t.start}-${parseInt(t.start) + parseInt(t.dur) - 1})">${label}</div>`;
                }).join('');
                return `<div class="track-row">
          <div class="track-name">${track}</div>
          <div class="bar-lane">${bars}</div>
        </div>`;
            }).join('');

            wrap.innerHTML = `<div class="timeline-scroll"><div class="timeline-inner">${weekHeader}${trackRows}</div></div>`;

            legend.innerHTML = PHASES.map(p => `<span><span class="swatch" style="background:${p.color}"></span>${p.label}</span>`).join('');

            const totalCost = tasks.reduce((s, t) => s + parseFloat(t.cost || 0), 0);
            totalsEl.innerHTML = `<div>Critical path: <b>${maxWeek} weeks</b></div><div>Costed total: <b>${fmtMoney(totalCost)}</b></div><div>Tasks: <b>${tasks.length}</b></div>`;
        }

        function renderAll() {
            populateTrackOptions();
            renderTable();
            renderTimeline();
        }

        populatePhaseSelect();
        renderAll();
    </script>

@endsection
