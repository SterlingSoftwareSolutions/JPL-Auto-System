@extends('layouts.layout')

@section('content')
   

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
    </style>

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
                        <input id="f-track" list="track-options" placeholder="e.g. Electrical">
                        <datalist id="track-options"></datalist>
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
                <h2>Timeline</h2>
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

        let tasks = [
            { id: 1, track: 'Electrical', phase: 'design', label: 'Diagram eng', cost: 3000, start: 1, dur: 2 },
            { id: 2, track: 'Electrical', phase: 'production', label: 'Harness (prod)', cost: 1000, start: 3, dur: 3 },
            { id: 3, track: 'Electrical', phase: 'installation', label: 'Install (Josh)', cost: 0, start: 6, dur: 1 },

            { id: 4, track: 'Climate (A/C)', phase: 'procurement', label: 'Source pump', cost: 500, start: 1, dur: 1 },
            { id: 5, track: 'Climate (A/C)', phase: 'shipping', label: 'Ship new unit', cost: 1000, start: 2, dur: 2 },

            { id: 6, track: 'ABS / plumbing', phase: 'procurement', label: 'Order ABS', cost: 3000, start: 1, dur: 1 },
            { id: 7, track: 'ABS / plumbing', phase: 'shipping', label: 'Ship ABS unit', cost: 0, start: 2, dur: 2 },
            { id: 8, track: 'ABS / plumbing', phase: 'installation', label: 'Install ABS', cost: 0, start: 4, dur: 1 },
            { id: 9, track: 'ABS / plumbing', phase: 'installation', label: 'Plumbing (Josh)', cost: 0, start: 5, dur: 1 },

            { id: 10, track: 'Interior / 3D', phase: 'design', label: '3D modelling', cost: 0, start: 1, dur: 3 },
            { id: 11, track: 'Interior / 3D', phase: 'production', label: 'Panel milling', cost: 3000, start: 4, dur: 2 },
            { id: 12, track: 'Interior / 3D', phase: 'installation', label: 'Trim', cost: 2000, start: 6, dur: 1 },
            { id: 13, track: 'Interior / 3D', phase: 'installation', label: 'Install (Josh)', cost: 0, start: 7, dur: 1 },

            { id: 14, track: 'Digital gauges', phase: 'design', label: 'Gauge design', cost: 0, start: 1, dur: 2 },
            { id: 15, track: 'Digital gauges', phase: 'production', label: 'Gauge production', cost: 3000, start: 3, dur: 2 },
            { id: 16, track: 'Digital gauges', phase: 'production', label: 'SW integration', cost: 1000, start: 5, dur: 1 },

            { id: 17, track: 'Seats', phase: 'procurement', label: 'Order seats', cost: 800, start: 1, dur: 1 },
            { id: 18, track: 'Seats', phase: 'shipping', label: 'Ship from US', cost: 0, start: 2, dur: 3 },
            { id: 19, track: 'Seats', phase: 'design', label: 'Belt eng', cost: 1000, start: 5, dur: 1 },

            { id: 20, track: 'Testing', phase: 'testing', label: 'Testing', cost: 7000, start: 8, dur: 2 },
        ];
        let nextId = 21;

        async function loadState() {
            try {
                const res = await window.storage.get('478-timeline-tasks', false);
                if (res && res.value) {
                    tasks = JSON.parse(res.value);
                    nextId = tasks.reduce((m, t) => Math.max(m, t.id), 0) + 1;
                }
            } catch (e) { /* no saved state yet, use defaults */ }
            renderAll();
        }

        async function saveState() {
            try {
                await window.storage.set('478-timeline-tasks', JSON.stringify(tasks), false);
            } catch (e) { /* storage unavailable, continue with in-memory state */ }
        }

        function populatePhaseSelect() {
            const sel = document.getElementById('f-phase');
            sel.innerHTML = PHASES.map(p => `<option value="${p.id}">${p.label}</option>`).join('');
        }

        function populateTrackOptions() {
            const dl = document.getElementById('track-options');
            const tracks = [...new Set(tasks.map(t => t.track))];
            dl.innerHTML = tracks.map(t => `<option value="${t}">`).join('');
        }

        function addTask() {
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

            tasks.push({ id: nextId++, track, phase, label, cost, start, dur });
            document.getElementById('f-label').value = '';
            document.getElementById('f-cost').value = '';
            document.getElementById('f-start').value = '1';
            document.getElementById('f-dur').value = '1';
            saveState();
            renderAll();
        }

        function deleteTask(id) {
            tasks = tasks.filter(t => t.id !== id);
            saveState();
            renderAll();
        }

        function updateTask(id, field, value) {
            const t = tasks.find(t => t.id === id);
            if (!t) return;
            if (field === 'cost' || field === 'start' || field === 'dur') {
                value = parseFloat(value) || 0;
                if (field === 'start' || field === 'dur') value = Math.max(1, Math.round(value));
            }
            t[field] = value;
            saveState();
            renderAll();
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

            const maxWeek = Math.max(9, ...tasks.map(t => t.start + t.dur - 1));
            const tracks = [...new Set(tasks.map(t => t.track))];

            let weekHeader = '<div class="weekrow"><div></div><div class="weeks">';
            for (let w = 1; w <= maxWeek; w++) { weekHeader += `<span>${w}</span>`; }
            weekHeader += '</div></div>';

            let trackRows = tracks.map(track => {
                const trackTasks = tasks.filter(t => t.track === track);
                let bars = trackTasks.map(t => {
                    const p = phaseById[t.phase] || PHASES[0];
                    const left = ((t.start - 1) / maxWeek) * 100;
                    const width = (t.dur / maxWeek) * 100;
                    const label = t.cost ? `${t.label} ${fmtMoney(t.cost)}` : t.label;
                    return `<div class="bar" style="left:${left}%;width:${width}%;background:${p.color};color:${p.text}" title="${t.label} (${p.label}, wk ${t.start}-${t.start + t.dur - 1})">${label}</div>`;
                }).join('');
                return `<div class="track-row">
          <div class="track-name">${track}</div>
          <div class="bar-lane">${bars}</div>
        </div>`;
            }).join('');

            wrap.innerHTML = `<div class="timeline-scroll"><div class="timeline-inner">${weekHeader}${trackRows}</div></div>`;

            legend.innerHTML = PHASES.map(p => `<span><span class="swatch" style="background:${p.color}"></span>${p.label}</span>`).join('');

            const totalCost = tasks.reduce((s, t) => s + t.cost, 0);
            totalsEl.innerHTML = `<div>Critical path: <b>${maxWeek} weeks</b></div><div>Costed total: <b>${fmtMoney(totalCost)}</b></div><div>Tasks: <b>${tasks.length}</b></div>`;
        }

        function renderAll() {
            populateTrackOptions();
            renderTable();
            renderTimeline();
        }

        populatePhaseSelect();
        loadState();
    </script>

@endsection
