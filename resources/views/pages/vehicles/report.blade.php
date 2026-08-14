@extends('layouts.layout')

@section('hide_header', true)

@section('content')
<div style="background: var(--bg); display: flex; flex-direction: column; min-height: 100vh; width: 100%;">
<style>
  :root {
    --bg: #ffffff; --panel: #f7f7f5; --card: #ffffff; --border: #e0dfda;
    --text: #1a1a18; --text-dim: #6b6a64; --text-faint: #9c9b94;
    --orange: #c9781f; --green: #2f8a4c; --amber: #b8860b;
  }
  * { box-sizing: border-box; }
  body { margin: 0; background: var(--bg); color: var(--text); font-family: -apple-system,"Segoe UI",Helvetica,Arial,sans-serif; font-size: 14px; }
  ::-webkit-scrollbar { width: 6px; height: 6px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
  ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
  header { display: flex; align-items: center; gap: 12px; padding: 16px 28px; border-bottom: 1px solid var(--border); }
  .logo { width: 30px; height: 30px; border: 1.5px solid var(--text); transform: rotate(45deg); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .logo span { transform: rotate(-45deg); font-size: 11px; font-weight: 700; }
  header .title { font-weight: 600; font-size: 15px; }
  header .sub { color: var(--text-dim); font-size: 12px; margin-left: 4px; }
  .tabs { display: flex; gap: 8px; padding: 0 32px; border-bottom: 1px solid var(--border); background: #ffffff; }
  .tab { position: relative; padding: 14px 16px; font-size: 14px; font-weight: 500; color: #6b7280; cursor: pointer; transition: color 0.3s ease; }
  .tab:hover { color: #111827; }
  .tab::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background-color: #111827; transform: scaleX(0); transform-origin: right; transition: transform 0.3s ease; }
  .tab:hover::after { transform: scaleX(1); transform-origin: left; }
  .tab.active { color: #111827; font-weight: 600; }
  .tab.active::after { transform: scaleX(1); transform-origin: left; }
  .subtabs { display: flex; gap: 24px; border-bottom: 1px solid var(--border); margin: 0 0 28px; }
  .subtab { display: flex; align-items: center; gap: 8px; padding: 0 0 12px 0; font-size: 14px; color: #64748b; cursor: pointer; transition: color 0.2s; position: relative; }
  .subtab:hover { color: #000; }
  .subtab.active { color: #000; font-weight: 600; }
  .subtab::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: #000; transform: scaleX(0); transition: transform 0.2s ease; transform-origin: left; }
  .subtab.active::after { transform: scaleX(1); }
  .subpage { display: none; }
  .subpage.active { display: block; }
  #build-cards { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px; margin-top: 8px; }
  .build-card { background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; cursor: pointer; text-align: left; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.05); position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; min-height: 120px; }
  .build-card:hover { border-color: #d1d5db; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); transform: translateY(-2px); }
  .build-card::before { content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: #111827; }
  .build-card .stage-chip { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: #f3f4f6; color: #4b5563; padding: 4px 10px; border-radius: 20px; display: inline-block; }
  .build-card-new { border: 2px dashed #e5e7eb; border-radius: 12px; padding: 16px; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 120px; color: #6b7280; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.2s ease; background: #f9fafb; }
  .build-card-new:hover { border-color: #d1d5db; color: #111827; background: #f3f4f6; transform: translateY(-2px); }
  .back-link { font-size: 12.5px; color: var(--text-dim); cursor: pointer; margin-bottom: 10px; display: inline-block; }
  .back-link:hover { color: var(--text); }
  main { flex: 1; padding-bottom: 60px; }
  h1 { font-size: 20px; font-weight: 600; margin: 0 0 4px; }
  .lede { color: var(--text-dim); font-size: 13px; margin: 0 0 20px; }
  .section-label { font-size: 11px; font-weight: 600; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 8px; }
  .page { display: none; max-width: 1280px; margin: 0 auto; padding: 24px 28px; }
  .page.active { display: block; }
  #page-vehicle { max-width: none; padding: 32px; margin: 0; background: #f8fafc; min-height: calc(100vh - 130px); }

  /* Compliance styles */
  .panel { border: 1px solid var(--border); border-radius: 12px; padding: 16px; margin-bottom: 24px; }
  .field-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 12px; }
  .field label { display: block; font-size: 11px; color: var(--text-dim); margin-bottom: 4px; }
  .field input, .field select { width: 100%; border: 1px solid var(--border); border-radius: 6px; padding: 7px 8px; font-size: 12.5px; color: var(--text); background: #fff; }
  .dropzone { border: 1px dashed var(--border); border-radius: 8px; padding: 14px; text-align: center; font-size: 12px; color: var(--text-faint); cursor: pointer; }
  .dropzone:hover { border-color: var(--text-dim); }
  .save-btn { background: var(--orange); color: #fff; border: none; border-radius: 6px; padding: 8px 16px; font-weight: 600; font-size: 12.5px; cursor: pointer; margin-top: 10px; }

  table.adr-tbl { width: 100%; border-collapse: collapse; }
  table.adr-tbl th { text-align: left; font-size: 11px; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.04em; padding: 0 8px 8px; border-bottom: 1px solid var(--border); }
  table.adr-tbl td { padding: 12px 8px; border-bottom: 1px solid var(--border); vertical-align: top; font-size: 12.5px; }
  .adr-num { font-weight: 600; }
  .status-pill { font-size: 11px; padding: 2px 9px; border-radius: 20px; display: inline-block; }
  .status-full { background: #e6f4ea; color: var(--green); }
  .status-pending { background: #f7f2e6; color: var(--amber); }
  .evi-list { font-size: 11px; color: var(--text-dim); display: flex; flex-direction: column; gap: 3px; }
  .evi-list label { display: flex; gap: 5px; align-items: center; }
  .mini-drop { border: 1px dashed var(--border); border-radius: 6px; padding: 8px; text-align: center; font-size: 10.5px; color: var(--text-faint); width: 90px; }
  .row-actions { display: flex; flex-direction: column; gap: 4px; }
  .row-actions button { font-size: 11px; padding: 5px 10px; border-radius: 5px; border: 1px solid var(--border); background: #fff; cursor: pointer; }
  .row-actions button.del { color: #b3352c; }

  /* Parts Table Styling */
  .parts-table-wrap { background: var(--card); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .parts-table { width: 100%; border-collapse: collapse; text-align: left; }
  .parts-table th { padding: 16px 24px; font-size: 11px; font-weight: 600; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid var(--border); background: var(--panel); }
  .parts-table td { padding: 16px 24px; font-size: 13px; color: var(--text); border-bottom: 1px solid var(--border); vertical-align: middle; }
  .parts-table tr:last-child td { border-bottom: none; }
  .parts-table tr:hover { background: var(--panel); }

  .build-row { display: flex; justify-content: space-between; align-items: center; border: 1px solid var(--border); border-radius: 10px; padding: 12px 14px; margin-bottom: 8px; }
  .build-row .vin { font-size: 12px; color: var(--text-faint); }
  .build-row .vin.set { color: var(--text); font-family: monospace; }

  /* Parts styles */
  .cat { margin-bottom: 32px; }
  .cat-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; cursor: pointer; }
  .cat-title { display: flex; align-items: center; gap: 12px; }
  .cat-badge { background: #111827; color: #fff; font-weight: 700; font-size: 11px; padding: 6px 14px; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.05em; }
  .cat-total { font-size: 13px; color: #6b7280; font-weight: 500; }
  .chevron { color: #9ca3af; font-size: 12px; transition: transform 0.15s; }
  .cat.collapsed .chevron { transform: rotate(-90deg); }
  .cat.collapsed .board { display: none; }

  .board { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 16px; }
  .col-head { font-size: 11px; font-weight: 700; color: #4b5563; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; }
  .col-count { background: #f3f4f6; color: #4b5563; border-radius: 12px; padding: 2px 8px; font-size: 10px; font-weight: 700; }
  .col-body { display: flex; flex-direction: column; gap: 12px; min-height: 40px; width: 100%; align-items: stretch; }

  .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px 16px; position: relative; box-shadow: 0 1px 3px rgba(0,0,0,0.05); cursor: grab; width: 90%; margin: 0; box-sizing: border-box; overflow: hidden; transition: box-shadow 0.2s, border-color 0.2s; }
  .card:hover { border-color: #d1d5db; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
  .card.dragging { opacity: 0.4; }
  .col-body.drop-ok { background: #f0fdf4; border: 2px dashed #22c55e; border-radius: 12px; }
  .col-body.drop-no { opacity: 0.5; }
  .card .comp { font-weight: 700; font-size: 13px; color: #111827; margin: 0 0 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .card .desc { font-size: 12px; color: #6b7280; margin: 0 0 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .card .meta { font-size: 12px; color: #374151; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 4px; margin-bottom: 4px; }
  .card .meta span { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; }
  .card .meta span:last-child { font-weight: 600; color: #111827; }
  .card .pn { font-family: monospace; color: #6b7280; font-size: 11px; background: #f3f4f6; padding: 2px 6px; border-radius: 4px; }
  .empty { color: #9ca3af; font-size: 12px; padding: 12px 0; text-align: center; }

  form.addrow { display: grid; grid-template-columns: 1fr 1fr 1.6fr 1fr 0.8fr 1fr 1fr auto; gap: 12px; align-items: end; margin: 0 0 32px; padding: 24px; background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); box-sizing: border-box; }
  form.addrow label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; }
  form.addrow input, form.addrow select { width: 100%; background: #fff; border: 1px solid #d1d5db; border-radius: 8px; color: #111827; padding: 10px 12px; font-size: 14px; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
  form.addrow input:focus, form.addrow select:focus { border-color: #9ca3af; }
  form.addrow button { background: #111827; color: #fff; border: none; border-radius: 8px; padding: 12px 20px; font-weight: 600; font-size: 14px; cursor: pointer; height: 42px; transition: background 0.2s; }
  form.addrow button:hover { background: #000; }

  .newcat-row { display: none; grid-template-columns: 1fr auto auto; gap: 12px; align-items: end; margin: -24px 0 32px; padding: 24px; background: #f9fafb; border: 1px solid #e5e7eb; border-top: none; border-radius: 0 0 12px 12px; box-sizing: border-box; }
  .newcat-row.show { display: grid; }
  .newcat-row label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; }
  .newcat-row input { width: 100%; background: #fff; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; outline: none; }
  .newcat-row button.create { background: #111827; color: #fff; border: none; border-radius: 8px; padding: 12px 20px; font-weight: 600; font-size: 14px; cursor: pointer; height: 42px; }
  .newcat-row button.cancel { background: #fff; color: #4b5563; border: 1px solid #d1d5db; border-radius: 8px; padding: 12px 20px; font-size: 14px; font-weight: 500; cursor: pointer; height: 42px; }

  .summary { display: flex; gap: 32px; margin-top: 16px; padding-top: 24px; border-top: 1px solid #e5e7eb; font-size: 14px; color: #6b7280; }
  .summary b { color: #111827; font-weight: 700; font-size: 16px; }

  /* Build process / diary */
  .proc-wrap { display: flex; gap: 0; border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
  .proc-sidebar { width: 300px; flex-shrink: 0; background: #ffffff; color: #1e293b; border-right: 1px solid var(--border); display: flex; flex-direction: column; }
  .proc-sidebar-head { padding: 24px 20px 20px; background: #000000; color: #ffffff; }
  .proc-brand { font-family: ui-monospace, SFMono-Regular, monospace; font-size: 10px; color: #d97706; text-transform: uppercase; letter-spacing: 0.15em; font-weight: 700; margin: 0 0 6px; }
  .proc-title { font-size: 18px; font-weight: 900; margin: 0 0 4px; letter-spacing: -0.02em; color: #fff; }
  .proc-meta { font-size: 12px; color: #94a3b8; }
  .proc-overall { padding: 16px 20px; background: #ffffff; border-bottom: 1px solid var(--border); }
  .proc-overall .lbl { display: flex; justify-content: space-between; font-family: ui-monospace, SFMono-Regular, monospace; font-size: 11px; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px; font-weight: 700; align-items: center; }
  .proc-overall .lbl span.big { color: #0f172a; font-size: 14px; font-weight: 900; }
  .proc-bar { height: 8px; background: var(--border); border-radius: 4px; overflow: hidden; }
  .proc-bar-fill { height: 100%; background: linear-gradient(90deg, #d97706 0%, #f59e0b 100%); border-radius: 4px; transition: width 0.5s; box-shadow: inset 0 -1px 1px rgba(0,0,0,0.1); }
  .proc-station-list { padding: 12px; flex: 1; overflow-y: auto; }
  .proc-station { margin-bottom: 4px; border: none; }
  .proc-station-head { display: flex; align-items: center; gap: 10px; padding: 10px 12px; cursor: pointer; border-radius: 8px; border: 1px solid transparent; transition: all 0.2s ease; font-size: 13px; }
  .proc-station-head:hover { background: #f8fafc; }
  .proc-station.active .proc-station-head { background: #0f172a; color: #ffffff; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); transform: translateY(-1px); }
  .proc-station-num { font-family: ui-monospace, SFMono-Regular, monospace; font-size: 10px; color: #64748b; background: #f8fafc; border: 1px solid var(--border); border-radius: 4px; padding: 2px 6px; font-weight: 700; flex: 0 0 auto; }
  .proc-station.active .proc-station-num { color: #ffffff; background: transparent; border-color: rgba(255,255,255,0.2); }
  .proc-station-name { flex: 1; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .proc-station-pct { font-family: ui-monospace, SFMono-Regular, monospace; font-size: 11px; font-weight: 700; color: #64748b; }
  .proc-station.active .proc-station-pct { color: #ffffff; }
  .proc-op-list { display: none; padding: 4px 0 4px 12px; }
  .proc-station.active .proc-op-list { display: block; }
  .proc-op-item { display: flex; flex-direction: column; align-items: flex-start; gap: 2px; padding: 8px 12px; border-radius: 8px; font-size: 12px; color: #1e293b; cursor: pointer; border: 1px solid transparent; transition: all 0.2s ease; margin: 2px 0; }
  .proc-op-item:hover { background: #f8fafc; transform: translateX(2px); }
  .proc-op-item.selected { background: #f1f5f9; border-color: var(--border); font-weight: 600; }
  .proc-op-item .op-no { font-family: ui-monospace, SFMono-Regular, monospace; font-size: 10px; color: #64748b; font-weight: 700; }
  .proc-content { flex: 1; padding: 32px 48px; background: #f0f2f5; min-width: 0; }
  .proc-op-badge { display: inline-block; background: #fbe8c9; color: #8a5a10; font-size: 10.5px; font-weight: 600; letter-spacing: 0.04em; padding: 4px 10px; border-radius: 5px; margin-bottom: 10px; }
  .proc-op-title { font-size: 18px; font-weight: 700; margin: 0 0 16px; }
  .proc-meta-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 1px; background: var(--border); border: 1px solid var(--border); border-radius: 8px; overflow: hidden; margin-bottom: 20px; }
  .proc-meta-grid .cell { background: #fff; padding: 10px 12px; }
  .proc-meta-grid .cell .k { font-size: 10px; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.04em; margin: 0 0 3px; }
  .proc-meta-grid .cell .v { font-size: 14px; font-weight: 600; margin: 0; }
  .proc-sec-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin: 20px 0 10px; }
  .ppe-badge { display: inline-flex; align-items: center; gap: 6px; background: #1a1c24; color: #fff; font-size: 12px; font-weight: 500; padding: 7px 12px; border-radius: 6px; margin: 0 8px 8px 0; }
  .ppe-badge .warn-icn { color: var(--orange); }
  table.hazard-tbl { width: 100%; border-collapse: collapse; background: #fff; border: 1px solid var(--border); border-radius: 8px; overflow: hidden; }
  table.hazard-tbl th { text-align: left; font-size: 10.5px; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.04em; padding: 10px 12px; background: var(--panel); }
  table.hazard-tbl td { padding: 10px 12px; font-size: 12.5px; border-top: 1px solid var(--border); }
  table.hazard-tbl td.ctrl { color: #4552c4; }
  .tm-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1px; background: var(--border); border: 1px solid var(--border); border-radius: 8px; overflow: hidden; }
  .tm-col { background: #fff; padding: 12px 16px; }
  .tm-col .lbl { font-size: 10px; font-weight: 700; letter-spacing: 0.05em; border-left: 3px solid var(--orange); padding-left: 6px; margin: 0 0 8px; }
  .tm-col ul { margin: 0; padding: 0; list-style: none; }
  .tm-col li { font-size: 12.5px; color: #4552c4; padding: 3px 0; }
  .step-card { border: 1px solid var(--border); border-radius: 10px; background: #fff; padding: 14px 16px; margin-bottom: 10px; display: flex; gap: 12px; }
  .step-card input[type=checkbox] { margin-top: 3px; width: 16px; height: 16px; flex-shrink: 0; }
  .step-card .step-body { flex: 1; }
  .step-card .step-num { font-size: 10.5px; color: var(--text-faint); margin: 0 0 2px; }
  .step-card .step-text { font-size: 13px; margin: 0; }
  .step-card.done .step-text { color: var(--text-faint); text-decoration: line-through; }
  .step-warn { margin-top: 8px; background: #fdf1cf; color: #8a5a10; font-size: 11.5px; padding: 8px 10px; border-radius: 6px; display: flex; gap: 6px; align-items: flex-start; }
  .step-ref-img { width: 140px; height: 66px; border: 1px dashed var(--border); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: var(--text-faint); flex-shrink: 0; }
  .step-card.readonly input[type=checkbox] { pointer-events: none; opacity: 0.5; }

  /* Timeline */
  .tl-panel { background: #fff; color: #000; border: 1px solid var(--border); border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .tl-h1 { font-size: 18px; font-weight: 700; margin: 0 0 4px; color: #000; }
  .tl-lede { font-size: 12.5px; color: var(--text-faint); margin: 0 0 18px; }
  .tl-section-label { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #000; margin: 0 0 10px; }
  .tl-addform { display: grid; grid-template-columns: 1fr 1fr 1.4fr 0.8fr 0.8fr 0.8fr auto; gap: 10px; align-items: end; background: #fafbfc; border: 1px solid #000; box-shadow: 2px 4px 10px rgba(0,0,0,0.12); border-radius: 10px; padding: 14px; }
  .tl-addform label { display: block; font-size: 10.5px; font-weight: 600; color: #000; margin-bottom: 4px; }
  .tl-addform input, .tl-addform select { width: 100%; background: #fff; border: 1px solid var(--border); border-radius: 6px; color: #000; padding: 7px 8px; font-size: 12.5px; }
  .tl-add-btn { background: var(--orange); color: #fff; border: none; border-radius: 6px; padding: 8px 14px; font-weight: 700; font-size: 12.5px; cursor: pointer; }
  table.tl-table { width: 100%; border-collapse: collapse; font-size: 12.5px; }
  table.tl-table th { text-align: left; font-size: 10.5px; font-weight: 700; color: #000; text-transform: uppercase; letter-spacing: 0.04em; padding: 8px 6px; border-bottom: 1px solid var(--border); }
  table.tl-table td { padding: 8px 6px; border-bottom: 1px solid var(--border); vertical-align: middle; color: #000; }
  table.tl-table input, table.tl-table select { background: #fff; border: 1px solid var(--border); border-radius: 5px; color: #000; padding: 4px 6px; font-size: 12px; width: 100%; }
  .tl-swatch { width: 9px; height: 9px; border-radius: 2px; display: inline-block; }
  .tl-rm { color: #e74c3c; background: none; border: none; cursor: pointer; font-size: 12px; }
  .tl-rm:hover { text-decoration: underline; }
  .tl-gantt-wrap { background: #fafbfc; border: 1px solid var(--border); border-radius: 10px; padding: 16px; margin-top: 4px; }
  .tl-gantt-header { display: flex; font-size: 10.5px; color: var(--text-dim); margin-bottom: 6px; padding-left: 130px; }
  .tl-gantt-week { flex: 1; text-align: left; }
  .tl-gantt-row { display: flex; align-items: center; margin-bottom: 6px; }
  .tl-gantt-track { width: 130px; flex-shrink: 0; font-size: 12.5px; font-weight: 500; color: var(--text); }
  .tl-gantt-bars { flex: 1; position: relative; height: 30px; background: #eef0f3; border-radius: 6px; }
  .tl-gantt-bar { position: absolute; top: 2px; bottom: 2px; border-radius: 5px; display: flex; align-items: center; padding: 0 8px; font-size: 11px; font-weight: 500; color: #fff; white-space: nowrap; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
  .tl-legend { display: flex; gap: 16px; margin-top: 16px; padding-top: 14px; border-top: 1px solid var(--border); font-size: 11.5px; color: var(--text-faint); }
  .tl-legend span { display: inline-flex; align-items: center; gap: 6px; }
  .tl-summary { display: flex; gap: 24px; margin-top: 10px; font-size: 12.5px; color: var(--text-faint); }
  .tl-summary b { color: var(--text); }
</style>
</style>
<div style="font-family: -apple-system,'Segoe UI',Helvetica,Arial,sans-serif; font-size: 14px; color: var(--text);">
<header class="flex items-center justify-between px-8 py-5 border-b border-gray-200 bg-white">
  <div class="flex items-center gap-6">
      <img src="{{ asset('images/jpl-system-logo.png') }}" alt="JPL Logo" style="height: 84px; width: auto;">
      <div class="flex flex-col border-l border-gray-300 pl-6">
          <div class="flex items-center gap-3">
              <h1 class="text-2xl font-black tracking-tight text-gray-900">{{ $vehicle->name ?? 'Vehicle' }}</h1>
              @if($vehicle->make || $vehicle->model)
                  <span class="bg-black text-white text-xs font-bold px-3 py-1 uppercase tracking-wider rounded-md shadow-sm">
                      {{ $vehicle->make }} {{ $vehicle->model }}
                  </span>
              @endif
          </div>
          <div class="text-xs font-semibold text-gray-500 uppercase tracking-widest mt-1">Model Report</div>
      </div>
  </div>
  
  <div>
      <a href="{{ route('vehicles.index') }}" class="group flex items-center gap-2 text-gray-600 hover:text-black transition-colors font-semibold text-sm bg-gray-50 hover:bg-gray-100 px-4 py-2 rounded-lg border border-gray-200">
          <i class="fas fa-arrow-left text-lg transition-transform group-hover:-translate-x-1"></i> 
          Back to Vehicles
      </a>
  </div>
</header>
<div class="tabs">
  <div class="tab active" data-page="builds" onclick="showTab('builds')"><i class="fas fa-list-alt" style="margin-right: 6px;"></i> Builds</div>
  <div class="tab" data-page="vehicle" onclick="showTab('vehicle')"><i class="fas fa-car" style="margin-right: 6px;"></i> Vehicle details</div>
  <div class="tab" data-page="compliance" onclick="showTab('compliance')"><i class="fas fa-shield-alt" style="margin-right: 6px;"></i> Compliance</div>
  <div class="tab" data-page="process" onclick="showTab('process')" style="display: none;"><i class="fas fa-cog" style="margin-right: 6px;"></i> Build process</div>
  <div class="tab" data-page="parts" onclick="showTab('parts')"><i class="fas fa-box" style="margin-right: 6px;"></i> Parts list</div>
  <div class="tab" data-page="suppliers" onclick="showTab('suppliers')"><i class="fas fa-users" style="margin-right: 6px;"></i> Suppliers</div>
</div>

<main>

  <div class="page" id="page-vehicle">
    @include('pages.vehicles.partials.vehicle-details')
  </div>

  <div class="page active" id="page-builds">
    <div id="builds-list-view" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 40px;">
      <div style="margin-bottom: 32px; display: flex; justify-content: space-between; align-items: flex-start;">
        <div>
          <div style="display: inline-block; background: #000; color: #fff; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 4px 12px; border-radius: 20px; letter-spacing: 0.05em; margin-bottom: 12px;">478 &mdash; BUILDS</div>
          <h1 style="font-size: 32px; font-weight: 800; color: #111827; margin: 0 0 8px;">Your commissioned builds</h1>
          <p class="lede" style="font-size: 14px; color: #6b7280; margin: 0;">Every commissioned build against this model report. Click a build for its production detail.</p>
        </div>
        <button onclick="addBuildCard()" style="background: #000; color: #fff; border: none; padding: 12px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 14px; transition: transform 0.2s;"><i class="fas fa-plus"></i> Add new build</button>
      </div>
      <div id="build-cards"></div>
    </div>
    
    <div id="build-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:999; justify-content:center; align-items:center;">
      <div class="panel" style="background:#fff; width:400px; padding:24px;">
        <h2 style="font-size:18px; font-weight:600; margin-bottom:16px; margin-top:0;">Add New Build</h2>
        <form action="{{ route('vehicles.builds.store', $vehicle->id) }}" method="POST">
          @csrf
          <div class="field" style="margin-bottom:12px;">
            <label>Build Name</label>
            <input name="name" required placeholder="e.g. Build 2">
          </div>
          <div class="field" style="margin-bottom:16px;">
            <label>VIN</label>
            <input name="vin" placeholder="Enter VIN">
          </div>
          <div style="display:flex; justify-content:flex-end; gap:8px;">
            <button type="button" class="cancel" style="padding:6px 12px; border:1px solid #ccc; border-radius:4px; background:#fff; cursor:pointer;" onclick="document.getElementById('build-modal').style.display='none'">Cancel</button>
            <button type="submit" class="save-btn" style="margin-top:0;">Save Build</button>
          </div>
        </form>
      </div>
    </div>
    <div id="builds-detail-view" style="display:none">
      <div style="margin-bottom: 16px;">
        <span class="back-link" onclick="closeBuildDetail()" style="display: inline-flex; align-items: center; gap: 6px; color: #111827; font-size: 13px; font-weight: 600; cursor: pointer; margin-bottom: 8px; padding: 8px 14px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); background: #fff;">&larr; Builds</span>
        <h1 id="build-detail-title" style="font-size: 32px; font-weight: 700; margin: 0 0 4px; color: #111827;">Build</h1>
        <div id="build-detail-meta" style="font-size: 14px; color: #6b7280; margin: 0; display: flex; align-items: center; gap: 8px;"></div>
      </div>
      <div class="subtabs">
        <div class="subtab active" data-sub="overview" onclick="showSubTab('overview')"><i class="fas fa-info-circle"></i> Overview</div>
        <div class="subtab" data-sub="process" onclick="showSubTab('process')"><i class="fas fa-tools"></i> Build process</div>
        <div class="subtab" data-sub="bparts" onclick="showSubTab('bparts')"><i class="fas fa-box"></i> Parts</div>
        <div class="subtab" data-sub="btimeline" onclick="showSubTab('btimeline')"><i class="far fa-clock"></i> Timeline</div>
      </div>

      <div class="subpage active" id="sub-overview">
        <div class="field-grid" style="grid-template-columns:repeat(4,1fr)">
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">Stage</p><p style="margin:0;font-weight:500">In build</p></div>
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">Parts installed</p><p style="margin:0;font-weight:500" id="ov-parts-pct">&mdash;</p></div>
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">Build diary</p><p style="margin:0;font-weight:500" id="ov-diary-stat">0 / 0 steps</p></div>
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">VIN</p><p id="ov-vin-display" style="margin:0;font-weight:500;color:var(--text-faint)">Assigned on completion</p></div>
        </div>
      </div>

      <div class="subpage" id="sub-process">
        <p class="lede">Live build diary for this specific car — check off each step as it's completed on the floor.</p>
        <div class="proc-wrap" id="proc-build-wrap"></div>
      </div>

      <div class="subpage" id="sub-bparts">
        <p class="lede">This build's parts, tracked as procurement &rarr; ordered &rarr; in transit &rarr; received &rarr; installed.</p>
        <form class="addrow" id="global-add" onsubmit="addPart(event)">
          <div><label>Category</label><select id="g-cat" onchange="onCatChange()"></select></div>
          <div><label>Component</label><input required id="g-comp"></div>
          <div><label>Description</label><input required id="g-desc"></div>
          <div><label>Part number</label><input id="g-pn"></div>
          <div><label>Price</label><input type="number" min="0" step="0.01" value="0" id="g-price"></div>
          <div>
            <label>Supplier</label>
            <select id="g-supplier">
              <option value="">Select Supplier</option>
              @foreach($vehicleSuppliers as $supplier)
                <option value="{{ $supplier->business_name }}">{{ $supplier->business_name }}</option>
              @endforeach
            </select>
          </div>
          <div><label>Status</label><select id="g-status"><option value="procurement">Procurement</option><option value="ordered">Ordered</option><option value="transit">In transit</option><option value="received">Received</option><option value="installed">Installed</option></select></div>
          <button type="submit">Add</button>
        </form>
        <div class="newcat-row" id="newcat-row">
          <div><label style="display:block;font-size:10px;color:var(--text-dim);margin-bottom:3px">New category name</label><input id="newcat-name" placeholder="e.g. Electrical"></div>
          <button type="button" class="create" onclick="createCategory()">Create category</button>
          <button type="button" class="cancel" onclick="cancelNewCat()">Cancel</button>
        </div>
        <div id="categories"></div>
        <div class="summary" id="grand-summary"></div>
      </div>

      <div class="subpage" id="sub-btimeline">
        <div class="tl-panel">
          <p class="tl-h1">478 prototype completion timeline</p>
          <p class="tl-lede">Editable task list drives the timeline below &mdash; add, edit, or remove items and it updates automatically.</p>

          <p class="tl-section-label">Add task</p>
          <div class="tl-addform">
            <div>
              <label>Track</label>
              <input id="tl-track" list="tl-track-list" placeholder="e.g. Electrical" autocomplete="off">
              <datalist id="tl-track-list"></datalist>
            </div>
            <div><label>Phase</label>
              <select id="tl-phase">
                <option value="procurement">Procurement</option>
                <option value="design">Design</option>
                <option value="production">Production</option>
                <option value="shipping">Shipping</option>
                <option value="installation">Installation</option>
                <option value="testing">Testing</option>
              </select>
            </div>
            <div><label>Task label</label><input id="tl-label" placeholder="e.g. Wiring harness"></div>
            <div><label>Cost ($)</label><input id="tl-cost" type="number" min="0" value="0"></div>
            <div><label>Start (wk)</label><input id="tl-start" type="number" min="1" value="1"></div>
            <div><label>Duration (wk)</label><input id="tl-dur" type="number" min="1" value="1"></div>
            <button class="tl-add-btn" onclick="addTimelineTask()">Add task</button>
          </div>

          <p class="tl-section-label" style="margin-top:22px">Task list</p>
          <table class="tl-table">
            <tr><th>Track</th><th></th><th style="width:130px">Phase</th><th>Label</th><th style="width:80px">Cost</th><th style="width:80px">Start wk</th><th style="width:80px">Dur wk</th><th style="width:60px"></th></tr>
            <tbody id="tl-tbody"></tbody>
          </table>

          <div style="display:flex; justify-content:space-between; align-items:center; margin-top:22px; margin-bottom:10px">
            <p class="tl-section-label" style="margin:0">Timeline</p>
            <select id="tl-scale" onchange="renderTimeline()" style="background:#1a1c24; border:1px solid #313340; border-radius:6px; color:#e8e8e6; padding:4px 8px; font-size:11.5px;">
              <option value="weekly">Weekly</option>
              <option value="monthly">Monthly</option>
            </select>
          </div>
          <div id="tl-gantt"></div>

          <div class="tl-legend" id="tl-legend"></div>
          <div class="tl-summary" id="tl-summary"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="page" id="page-compliance">
    <div style="margin-bottom: 32px;">
      <span style="background: #0f172a; color: #fff; font-size: 11.5px; font-weight: 700; padding: 4px 12px; border-radius: 20px; letter-spacing: 0.02em; display: inline-block; margin-bottom: 12px;">478 - COMPLIANCE</span>
      <h1 style="font-size: 28px; font-weight: 800; color: #111827; margin: 0 0 8px 0; letter-spacing: -0.02em;">Compliance</h1>
      <p style="color: #6b7280; font-size: 14px; margin: 0; max-width: 800px; line-height: 1.5;">ADR evidence for the model report, plus the RAV approval record and per-build VIN assignment.</p>
    </div>    <p class="section-label" style="font-size: 12px; font-weight: 700; color: #4b5563; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 16px;">Model report approval &mdash; ROVER / RAV</p>
    <div class="parts-table-wrap" style="padding: 24px; margin-bottom: 24px; box-sizing: border-box;">
      <div class="field-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 24px;">
        <div class="field"><label style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">Approval pathway</label>
          <select id="rover-pathway" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; background: #fff; outline: none; transition: border-color 0.2s;"><option selected>Vehicle type approval - low volume (LVS)</option><option>Vehicle type approval (VTA) - standard</option><option>Concessional RAV entry (CRE)</option></select>
        </div>
        <div class="field"><label style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">RAV entry reference</label><input id="rover-rav-ref" placeholder="Not yet entered" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; background: #fff; outline: none; transition: border-color 0.2s;"></div>
        <div class="field"><label style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">Approval date</label><input id="rover-date" type="date" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; background: #fff; outline: none; transition: border-color 0.2s;"></div>
        <div class="field"><label style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">Department reference</label><input id="rover-dept-ref" placeholder="Pending" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; background: #fff; outline: none; transition: border-color 0.2s;"></div>
      </div>
      <div style="position:relative; margin-bottom: 24px;">
        <div id="rover-file-display" class="dropzone" style="border: 2px dashed #d1d5db; border-radius: 12px; padding: 32px; text-align: center; color: #6b7280; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.2s; background: #f9fafb;">Attach approval correspondence / RAV certificate</div>
        <input type="file" id="rover-certificate" onchange="document.getElementById('rover-file-display').innerHTML = '<span style=\'color:#10b981\'>Selected: ' + this.files[0].name + '</span>'" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0; cursor:pointer;">
      </div>
      <button class="save-btn" id="rover-save-btn" onclick="saveRoverApproval()" style="background: #111827; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 600; font-size: 14px; cursor: pointer; transition: background 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">Save approval record</button>
    </div>

    <!-- Saved Rover Approvals List -->
    @if($vehicle->modelReportApprovals && $vehicle->modelReportApprovals->count() > 0)
    <div class="parts-table-wrap" style="padding: 24px; margin-bottom: 40px; box-sizing: border-box; background: #f3f4f6;">
      <h3 style="font-size: 14px; font-weight: 600; color: #111827; margin-top: 0; margin-bottom: 16px;">Saved Approvals</h3>
      <div style="display:flex; flex-direction:column; gap:12px;">
        @foreach($vehicle->modelReportApprovals as $appr)
        <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display:flex; justify-content:space-between; align-items:center;">
          <div>
            <div style="font-size:14px; font-weight:600; color:#111827;">{{ $appr->approval_pathway }}</div>
            <div style="font-size:12px; color:#6b7280; margin-top:4px;">
              RAV: {{ $appr->rav_entry_reference ?: 'N/A' }} &bull; Date: {{ $appr->approval_date ?: 'N/A' }} &bull; Dept: {{ $appr->department_reference ?: 'N/A' }}
            </div>
          </div>
          <div style="display:flex; align-items:center; gap: 16px;">
            @if($appr->certificate_file_path)
              <a href="{{ asset('storage/' . $appr->certificate_file_path) }}" target="_blank" style="font-size:13px; color:#2563eb; text-decoration:underline; font-weight:500;">View Certificate</a>
            @else
              <span style="font-size:12px; color:#9ca3af;">No file</span>
            @endif
            <form action="{{ route('vehicles.model-report-approvals.destroy', $appr->id) }}" method="POST" style="margin:0;" onsubmit="return confirm('Are you sure you want to delete this approval record?');">
              @csrf
              @method('DELETE')
              <button type="submit" style="background:none; border:none; padding:0; cursor:pointer; color:#ef4444;" title="Delete">
                  <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif

    <p class="section-label" style="font-size: 12px; font-weight: 700; color: #4b5563; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 16px;">ADR evidence</p>
    <div class="parts-table-wrap" style="margin-bottom: 40px;">
      <table class="parts-table">
        <thead>
          <tr>
            <th style="width:60px">ADR</th>
            <th style="width:150px">Title</th>
            <th style="width:70px">Status</th>
            <th style="width:140px">Evidence type</th>
            <th style="width:100px">ECE number</th>
            <th style="width:100px">Documents</th>
            <th style="width:100px">Images</th>
            <th style="width:150px">Component</th>
            <th style="width:80px"></th>
          </tr>
        </thead>
        <tbody id="adr-body">
          <!-- Populated by JS -->
        </tbody>
      </table>
    </div>
    <div id="adr-pagination" style="text-align: center; margin-bottom: 40px; display: flex; flex-direction: column; align-items: center; gap: 12px;"></div>

    <p class="section-label" style="font-size: 12px; font-weight: 700; color: #4b5563; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 16px;">Builds &mdash; VIN record</p>
    <div id="builds" style="margin-bottom: 16px;"></div>
    <div class="parts-table-wrap" style="padding: 24px; box-sizing: border-box;">
      <form action="{{ route('vehicles.builds.store', $vehicle->id) }}" method="POST" style="display:flex;gap:16px;align-items:end;margin:0">
        @csrf
        <div class="field" style="flex:1"><label style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">New build name</label><input name="name" required placeholder="e.g. Build 2" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; background: #fff; outline: none;"></div>
        <div class="field" style="flex:1"><label style="font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px;">VIN</label><input name="vin" placeholder="Enter VIN" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 12px; font-size: 14px; color: #111827; background: #fff; outline: none;"></div>
        <button type="submit" class="save-btn" style="background: #111827; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 600; font-size: 14px; cursor: pointer; transition: background 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.05); height: 42px;">+ Add build</button>
      </form>
    </div>
  </div>

  <div class="page" id="page-process">
    <h1>478 — build process</h1>
    <p class="lede">The master procedure for this model — reference only. Steps here aren't checkable; each build gets its own live diary under Builds.</p>
    <div class="proc-wrap" id="proc-template-wrap"></div>
  </div>

  <div class="page" id="page-parts">
    <div style="margin-bottom: 32px;">
      <span style="background: #0f172a; color: #fff; font-size: 11.5px; font-weight: 700; padding: 4px 12px; border-radius: 20px; letter-spacing: 0.02em; display: inline-block; margin-bottom: 12px;">478 - PARTS LIST</span>
      <h1 style="font-size: 22px; font-weight: 800; color: #111827; margin: 0 0 8px 0; letter-spacing: -0.02em;">Bill of materials</h1>
      <p style="color: #6b7280; font-size: 14px; margin: 0; max-width: 800px; line-height: 1.5;">The default bill of materials for this model, tied to the compliance record. Every build inherits this list as its starting point.</p>
    </div>

    <div class="parts-table-wrap">
      <table class="parts-table">
        <thead>
          <tr>
            <th style="width:15%">Category</th>
            <th style="width:20%">Component</th>
            <th style="width:30%">Description</th>
            <th style="width:12%">Part number</th>
            <th style="width:11%">Price</th>
            <th style="width:12%">Supplier</th>
          </tr>
        </thead>
        <tbody id="bom-body">
          @forelse($partCategories as $category)
              @foreach($category->parts as $part)
                  <tr>
                      <td style="font-weight: 500; color: #374151;">{{ $category->category_name }}</td>
                      <td style="font-weight: 600; color: #111827;">{{ $part->component ? $part->component->component_name : 'N/A' }}</td>
                      <td style="color: #4b5563;">{{ $part->description }}</td>
                      <td style="font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 12px; color: #6b7280;">{{ $part->part_number ?? 'N/A' }}</td>
                      <td style="font-weight: 600; color: #111827;">{{ str_starts_with($part->price, '$') ? $part->price : '$' . number_format((float)$part->price, 2) }}</td>
                      <td>
                        @if($part->supplier)
                          <span style="display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 6px; background: #f3f4f6; color: #374151; font-size: 12px; font-weight: 500;">
                            {{ $part->supplier->business_name }}
                          </span>
                        @else
                          <span style="color: #9ca3af; font-style: italic;">N/A</span>
                        @endif
                      </td>
                  </tr>
              @endforeach
          @empty
              <tr><td colspan="6" style="text-align:center; padding: 32px 24px; color: #6b7280; font-size: 14px;">No parts found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div id="page-suppliers" class="page" style="padding: 24px;">
    <div class="md:flex justify-around">
        <x-partlistmodel :vehicle-id="$vehicle->id" />
    </div>

    <div class="mx-4 w-40 bg-black text-center flex justify-center items-center rounded-md h-10 mb-6">
        <a href="#" onclick="toggleModal()" class="text-white font-bold text-sm" style="text-decoration: none;">
            Add New Supplier
        </a>
    </div>

    @if($vehicleSuppliers->isNotEmpty())
        <div class="md:grid grid-cols-3 gap-6">
            @foreach ($vehicleSuppliers as $supplier)
                <div class="flex flex-col bg-white rounded-2xl overflow-hidden" style="border: 1px solid #e5e7eb; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); transition: box-shadow 0.3s ease;">
                    
                    <!-- Header with Image & Actions -->
                    <div class="relative bg-gray-50 flex items-center justify-center" style="height: 140px; border-bottom: 1px solid #f3f4f6;">
                        @if($supplier->upload_image)
                            <img src="{{ asset('storage/profile_images/' . $supplier->upload_image) }}" class="h-full w-full object-contain p-4" alt="Supplier Logo">
                        @else
                            <div class="text-gray-400 font-medium tracking-wide uppercase text-sm">No Image</div>
                        @endif

                        <!-- Top Right Actions -->
                        <div class="absolute top-3 right-3 flex flex-col gap-2 items-end">
                            <div class="flex gap-2 bg-white rounded-lg shadow-sm px-2 py-1" style="border: 1px solid #e5e7eb;">
                                <button onclick="editSupplier({{ $supplier->id }})" class="text-xs font-semibold text-gray-600 hover:text-orange-500 transition-colors">Edit</button>
                                <span class="text-gray-300">|</span>
                                <form action="{{ route('deletesupplier', $supplier->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-gray-600 hover:text-red-600 transition-colors">Delete</button>
                                </form>
                            </div>
                            <a href="#" class="block bg-white rounded-lg shadow-sm overflow-hidden" style="border: 1px solid #e5e7eb; transition: transform 0.2s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                <img class="h-8" src="{{ asset('images/partlist01.jpg') }}" alt="Parts List">
                            </a>
                        </div>
                    </div>

                    <!-- Body content -->
                    <div class="p-6 flex-1 flex flex-col">
                        
                        <!-- Title & Web -->
                        <div class="mb-4">
                            <h1 class="font-bold text-xl text-gray-900 leading-tight">{{ $supplier->business_name }}</h1>
                            <a href="{{ str_starts_with($supplier->business_web, 'http') ? $supplier->business_web : 'https://'.$supplier->business_web }}" target="_blank" class="text-sm font-medium text-blue-600 hover:underline break-all">{{ $supplier->business_web }}</a>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm mb-5">
                            <div class="flex flex-col pb-2 border-b border-gray-100">
                                <span class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Country</span>
                                <span class="font-medium text-gray-800 break-all">{{ $supplier->country ?: '-' }}</span>
                            </div>
                            <div class="flex flex-col pb-2 border-b border-gray-100">
                                <span class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Account Contact</span>
                                <span class="font-medium text-gray-800 break-all">{{ $supplier->contact_name ?: '-' }}</span>
                            </div>
                            <div class="flex flex-col pb-2 border-b border-gray-100">
                                <span class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Phone</span>
                                <span class="font-medium text-gray-800 break-all">{{ $supplier->phone ?: '-' }}</span>
                            </div>
                            <div class="flex flex-col pb-2 border-b border-gray-100">
                                <span class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Email</span>
                                <span class="font-medium text-gray-800 break-all">{{ $supplier->email ?: '-' }}</span>
                            </div>
                        </div>

                        <!-- System Details Box -->
                        <div class="mt-auto bg-gray-50 rounded-xl p-4 text-xs" style="border: 1px solid #f3f4f6;">
                            <div class="grid grid-cols-2 gap-4">
                                <!-- CRM Side -->
                                <div class="flex flex-col gap-1.5">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-600">CRM Configured</span>
                                        <span class="px-2 py-0.5 rounded-full {{ $supplier->supplier_crm ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }} font-bold" style="font-size: 10px;">{{ $supplier->supplier_crm ? 'YES' : 'NO' }}</span>
                                    </div>
                                    <div class="truncate" title="{{ $supplier->crm_url }}">
                                        <span class="text-gray-400">URL:</span> <span class="font-medium">{{ $supplier->crm_url ?: '-' }}</span>
                                    </div>
                                    <div class="truncate" title="{{ $supplier->crm_username }}">
                                        <span class="text-gray-400">User:</span> <span class="font-medium">{{ $supplier->crm_username ?: '-' }}</span>
                                    </div>
                                </div>
                                
                                <!-- Trade Side -->
                                <div class="flex flex-col gap-1.5 pl-4 border-l border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-600">Trade Account</span>
                                        <span class="px-2 py-0.5 rounded-full {{ $supplier->trade_account ? 'bg-blue-100 text-blue-700' : 'bg-gray-200 text-gray-600' }} font-bold" style="font-size: 10px;">{{ $supplier->trade_account ? 'YES' : 'NO' }}</span>
                                    </div>
                                    <div class="flex flex-col mt-1">
                                        <span class="text-gray-400">Agreement:</span> 
                                        @if($supplier->trade_agreement_pdf)
                                            <span class="font-medium text-blue-600 hover:underline truncate" title="{{ basename($supplier->trade_agreement_pdf) }}">{{ basename($supplier->trade_agreement_pdf) }}</span>
                                        @else
                                            <span class="font-medium text-gray-400">No Agreement</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 40px; color: var(--text-dim);">
            No suppliers found for this vehicle's parts.
        </div>
    @endif
  </div>

</main>

<script>
window.AppUrl = '{{ url("") }}';
function showTab(page) {
  document.querySelectorAll('.tab').forEach(t => t.classList.toggle('active', t.dataset.page === page));
  document.querySelectorAll('.page').forEach(p => p.classList.toggle('active', p.id === 'page-' + page));
}

document.addEventListener("DOMContentLoaded", function() {
  showTab('builds');
});
let adrRows = @json($adrDataForFrontend);

let builds = [
  @foreach($vehicle->builds as $build)
  { name: '{{ addslashes($build->name) }}', vin: '{{ addslashes($build->vin) }}', modelVersion: '{{ $vehicle->name ?? "478" }} — v1 (current)' },
  @endforeach
];

let adrCurrentPage = 1;
const adrRowsPerPage = 6;

function renderAdr() {
  const body = document.getElementById('adr-body');
  const startIndex = (adrCurrentPage - 1) * adrRowsPerPage;
  const endIndex = startIndex + adrRowsPerPage;
  const paginatedRows = adrRows.slice(startIndex, endIndex);

  body.innerHTML = paginatedRows.map((r, pageIdx) => {
    const i = startIndex + pageIdx;
    return `
    <tr>
      <td style="font-weight: 700; color: var(--text);">${r.adr}</td>
      <td style="font-weight: 500; color: var(--text-dim);">${r.title}</td>
      <td><span style="background: ${r.status==='full'?'#eaf3ed':'#faebd6'}; color: ${r.status==='full'?'var(--green)':'var(--orange)'}; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px;">${r.status==='full'?'Full':'Pending'}</span></td>
      <td><div style="font-size: 11px; color: var(--text-dim); display: flex; flex-direction: column; gap: 4px;">
        <label style="display:flex; align-items:center; gap:6px; cursor:pointer;"><input type="checkbox" style="accent-color: var(--text);" onchange="toggleEvidence(${i}, 'ece')" ${r.evidence.includes('ece')?'checked':''}> ECE approval</label>
        <label style="display:flex; align-items:center; gap:6px; cursor:pointer;"><input type="checkbox" style="accent-color: var(--text);" onchange="toggleEvidence(${i}, 'test')" ${r.evidence.includes('test')?'checked':''}> Test report</label>
        <label style="display:flex; align-items:center; gap:6px; cursor:pointer;"><input type="checkbox" style="accent-color: var(--text);" onchange="toggleEvidence(${i}, 'cta')" ${r.evidence.includes('cta')?'checked':''}> Component type approval</label>
      </div></td>
      <td><input value="${r.ece}" placeholder="ECE number" onchange="adrRows[${i}].ece=this.value" style="width:100%; border:1px solid var(--border); border-radius:6px; padding:6px 8px; font-size:12px; color:var(--text); outline:none; font-family: monospace;"></td>
      <td>
        <div style="border:1px dashed var(--border); border-radius:8px; padding:12px; text-align:center; font-size:11px; color:var(--text-faint); background:var(--panel); position:relative; overflow:hidden;">
            ${r.documentFile ? `<span style="color:var(--green); z-index:10; position:relative; font-weight:600;">Selected: ${r.documentFile.name}</span>` : (r.document ? `<a href="${r.document}" target="_blank" style="color:var(--text); text-decoration:underline; z-index:10; position:relative;">View File</a>` : 'Drop files')}
            <input type="file" onchange="adrRows[${i}].documentFile=this.files[0]; renderAdr();" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0; cursor:pointer; z-index:5;">
        </div>
      </td>
      <td>
        <div style="border:1px dashed var(--border); border-radius:8px; padding:12px; text-align:center; font-size:11px; color:var(--text-faint); background:var(--panel); position:relative; overflow:hidden;">
            ${r.imageFile ? `<span style="color:var(--green); z-index:10; position:relative; font-weight:600;">Selected: ${r.imageFile.name}</span>` : (r.image ? `<a href="${r.image}" target="_blank" style="color:var(--text); text-decoration:underline; z-index:10; position:relative;">View Image</a>` : 'Drop files')}
            <input type="file" accept="image/*" onchange="adrRows[${i}].imageFile=this.files[0]; renderAdr();" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:0; cursor:pointer; z-index:5;">
        </div>
      </td>
      <td><div style="display:flex; flex-direction:column; gap:4px; max-width: 200px;">
        <input value="${r.component}" placeholder="Component" onchange="adrRows[${i}].component=this.value" style="width:100%; border:1px solid var(--border); border-radius:6px; padding:6px 8px; font-size:12px; color:var(--text); outline:none; box-sizing:border-box;">
        <div style="display:flex; flex-direction:row; gap:4px;">
          <input value="${r.type}" placeholder="Type" onchange="adrRows[${i}].type=this.value" style="flex:1; min-width:0; border:1px solid var(--border); border-radius:6px; padding:6px 8px; font-size:12px; color:var(--text); outline:none; box-sizing:border-box;">
          <input value="${r.qty}" placeholder="Qty." onchange="adrRows[${i}].qty=this.value" style="flex:1; min-width:0; border:1px solid var(--border); border-radius:6px; padding:6px 8px; font-size:12px; color:var(--text); outline:none; box-sizing:border-box;">
          <input value="${r.part}" placeholder="Part" onchange="adrRows[${i}].part=this.value" style="flex:1; min-width:0; border:1px solid var(--border); border-radius:6px; padding:6px 8px; font-size:12px; color:var(--text); outline:none; box-sizing:border-box;">
        </div>
      </div></td>
      <td><div style="display:flex; flex-direction:column; gap:6px;">
        <button onclick="toggleStatus(${i})" style="font-size:11px; font-weight:500; padding:4px 8px; border-radius:6px; border:1px solid var(--border); background:var(--card); cursor:pointer; color:var(--text);">Toggle status</button>
        <button onclick="saveSingleApproval(${i}, this)" style="font-size:11px; font-weight:600; padding:4px 8px; border-radius:6px; border:1px solid var(--border); background:var(--card); cursor:pointer; color:var(--text);">Save Row</button>
      </div></td>
    </tr>
  `}).join('');
  
  renderAdrPagination();
}

function renderAdrPagination() {
  const container = document.getElementById('adr-pagination');
  if (!container) return;
  const totalPages = Math.ceil(adrRows.length / adrRowsPerPage) || 1;
  container.innerHTML = `
    <p style="font-size: 13px; color: #4b5563; margin: 0;">Page ${adrCurrentPage} of ${totalPages}</p>
    <div style="display: flex; gap: 8px;">
      <button onclick="changeAdrPage(-1)" ${adrCurrentPage === 1 ? 'disabled' : ''} style="font-size: 13px; padding: 6px 12px; border-radius: 6px; border: 1px solid #d1d5db; background: ${adrCurrentPage === 1 ? '#f3f4f6' : '#fff'}; color: ${adrCurrentPage === 1 ? '#9ca3af' : '#374151'}; cursor: ${adrCurrentPage === 1 ? 'not-allowed' : 'pointer'};">&laquo; Previous</button>
      <button onclick="changeAdrPage(1)" ${adrCurrentPage === totalPages ? 'disabled' : ''} style="font-size: 13px; padding: 6px 12px; border-radius: 6px; border: 1px solid #d1d5db; background: ${adrCurrentPage === totalPages ? '#f3f4f6' : '#fff'}; color: ${adrCurrentPage === totalPages ? '#9ca3af' : '#374151'}; cursor: ${adrCurrentPage === totalPages ? 'not-allowed' : 'pointer'};">Next &raquo;</button>
    </div>
  `;
}

function changeAdrPage(dir) {
  const totalPages = Math.ceil(adrRows.length / adrRowsPerPage) || 1;
  adrCurrentPage += dir;
  if (adrCurrentPage < 1) adrCurrentPage = 1;
  if (adrCurrentPage > totalPages) adrCurrentPage = totalPages;
  renderAdr();
}

function toggleEvidence(i, type) {
    const idx = adrRows[i].evidence.indexOf(type);
    if (idx > -1) {
        adrRows[i].evidence.splice(idx, 1);
    } else {
        adrRows[i].evidence.push(type);
    }
}

function toggleStatus(i) { adrRows[i].status = adrRows[i].status === 'full' ? 'pending' : 'full'; renderAdr(); }

function saveSingleApproval(i, btn) {
    const row = adrRows[i];
    btn.textContent = 'Saving...';
    btn.disabled = true;

    let formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('adr_id', row.id);
    formData.append('status', row.status);
    row.evidence.forEach(ev => formData.append('evidence[]', ev));
    formData.append('ece', row.ece);
    formData.append('component', row.component);
    formData.append('type', row.type);
    formData.append('part', row.part);
    formData.append('qty', row.qty);
    if (row.documentFile) formData.append('document', row.documentFile);
    if (row.imageFile) formData.append('image', row.imageFile);

    fetch("{{ route('vehicles.compliance.update', ['id' => $vehicle->id]) }}", {
        method: "POST",
        body: formData
    }).then(r => r.json()).then(data => {
        btn.textContent = 'Saved';
        setTimeout(() => {
            btn.textContent = 'Save Row';
            btn.disabled = false;
        }, 1200);
        
        if (data.document_url) row.document = data.document_url;
        if (data.image_url) row.image = data.image_url;
        row.documentFile = null;
        row.imageFile = null;
        renderAdr();
    }).catch(err => {
        console.error(err);
        btn.textContent = 'Error';
        setTimeout(() => {
            btn.textContent = 'Save Row';
            btn.disabled = false;
        }, 1200);
    });
}

function saveRoverApproval() {
    const btn = document.getElementById('rover-save-btn');
    btn.textContent = 'Saving...';
    btn.disabled = true;

    let formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('approval_pathway', document.getElementById('rover-pathway').value);
    formData.append('rav_entry_reference', document.getElementById('rover-rav-ref').value);
    formData.append('approval_date', document.getElementById('rover-date').value);
    formData.append('department_reference', document.getElementById('rover-dept-ref').value);
    
    let fileInput = document.getElementById('rover-certificate');
    if (fileInput.files.length > 0) {
        formData.append('certificate', fileInput.files[0]);
    }

    fetch("{{ route('vehicles.model-report-approvals.store', ['id' => $vehicle->id]) }}", {
        method: 'POST',
        body: formData
    }).then(r => r.json()).then(data => {
        if (data.success) {
            btn.textContent = 'Saved!';
            setTimeout(() => {
                window.location.reload(); // Reload to show the newly saved record
            }, 1000);
        } else {
            btn.textContent = 'Error';
            setTimeout(() => { btn.textContent = 'Save approval record'; btn.disabled = false; }, 2000);
        }
    }).catch(err => {
        console.error(err);
        btn.textContent = 'Error';
        setTimeout(() => { btn.textContent = 'Save approval record'; btn.disabled = false; }, 2000);
    });
}

function saveApproval() {
  const btn = event.target;
  btn.textContent = 'Saving all...';
  
  Promise.all(adrRows.map(row => {
      let formData = new FormData();
      formData.append('_token', '{{ csrf_token() }}');
      formData.append('adr_id', row.id);
      formData.append('status', row.status);
      row.evidence.forEach(ev => formData.append('evidence[]', ev));
      formData.append('ece', row.ece);
      formData.append('component', row.component);
      formData.append('type', row.type);
      formData.append('part', row.part);
      formData.append('qty', row.qty);
      if (row.documentFile) formData.append('document', row.documentFile);
      if (row.imageFile) formData.append('image', row.imageFile);

      return fetch("{{ route('vehicles.compliance.update', ['id' => $vehicle->id]) }}", {
          method: 'POST',
          body: formData
      });
  })).then((responses) => Promise.all(responses.map(r => r.json())))
  .then((dataArray) => {
      dataArray.forEach((data, index) => {
          let row = adrRows[index];
          if (data.document_url) row.document = data.document_url;
          if (data.image_url) row.image = data.image_url;
          row.documentFile = null;
          row.imageFile = null;
      });
      renderAdr();
      
      btn.textContent = 'Saved';
      setTimeout(() => btn.textContent = 'Save approval record', 1200);
  });
}

function renderBuilds() {
  document.getElementById('builds').innerHTML = builds.map((b,i) => `
    <div style="display:flex; justify-content:space-between; align-items:center; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; margin-bottom:8px; background:#fff;">
      <div>
        <p style="margin:0; font-weight:600; font-size:14px; color:#111827;">${b.name}</p>
        <p style="margin:2px 0 0; font-size:12px; color:#6b7280;">Built against ${b.modelVersion}</p>
      </div>
      <div style="display:flex; align-items:center; gap:10px;">
        <input placeholder="VIN — assigned on completion" value="${b.vin}" readonly style="text-align:center; border:1px solid #d1d5db; border-radius:8px; padding:8px 12px; font-size:13px; width:220px; background:#f9fafb; color:#374151; font-family: monospace; font-weight:600;">
      </div>
    </div>
  `).join('');
}

renderAdr();
renderBuilds();

// ---- Parts ----
const STATUSES = [
  { key: 'procurement', label: 'Procurement' },
  { key: 'ordered', label: 'Ordered' },
  { key: 'transit', label: 'In transit' },
  { key: 'received', label: 'Received' },
  { key: 'installed', label: 'Installed' },
];

let masterCategories = {!! json_encode(\App\Models\PartCategory::pluck('category_name')) !!};
let categories = [];

let dragState = null;

function onCardDragStart(e) {
  const ci = Number(e.currentTarget.dataset.ci);
  const pid = Number(e.currentTarget.dataset.pid);
  const part = categories[ci].parts.find(p => p.id === pid);
  const currentIdx = STATUSES.findIndex(s => s.key === part.status);
  dragState = { ci, pid, currentIdx };
  e.currentTarget.classList.add('dragging');
  e.dataTransfer.effectAllowed = 'move';
}

function onCardDragEnd(e) {
  e.currentTarget.classList.remove('dragging');
  document.querySelectorAll('.col-body').forEach(b => b.classList.remove('drop-ok', 'drop-no'));
  dragState = null;
}

function onColDragOver(e) {
  if (!dragState) return;
  const colIdx = Number(e.currentTarget.dataset.statusIdx);
  if (colIdx === dragState.currentIdx + 1) {
    e.preventDefault();
    e.currentTarget.classList.add('drop-ok');
    e.dataTransfer.dropEffect = 'move';
  } else {
    e.currentTarget.classList.add('drop-no');
  }
}

function onColDragLeave(e) {
  e.currentTarget.classList.remove('drop-ok', 'drop-no');
}

function onColDrop(e) {
  if (!dragState) return;
  const colIdx = Number(e.currentTarget.dataset.statusIdx);
  if (colIdx !== dragState.currentIdx + 1) return; // only the applicable next stage accepts the drop
  e.preventDefault();
  const part = categories[dragState.ci].parts.find(p => p.id === dragState.pid);
  const oldStatus = part.status;
  const newStatus = STATUSES[colIdx].key;
  part.status = newStatus;
  render();

  fetch(window.AppUrl + `/builds/parts/${part.id}/status`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify({ status: newStatus, _token: '{{ csrf_token() }}' })
  }).then(res => res.json()).catch(err => {
    part.status = oldStatus;
    render();
  });
  dragState = null;
}

function fmt(n) { return n ? '$' + Number(n).toLocaleString(undefined,{minimumFractionDigits:2,maximumFractionDigits:2}) : '$0.00'; }

function render() {
  populateCatSelect();
  const root = document.getElementById('categories');
  root.innerHTML = '';
  let grandTotal = 0, grandCount = 0;

  categories.forEach((cat, ci) => {
    if (cat.parts.length === 0) return;

    const catTotal = cat.parts.reduce((a,p)=>a+Number(p.price||0),0);
    grandTotal += catTotal; grandCount += cat.parts.length;

    const el = document.createElement('div');
    el.className = 'cat';
    el.innerHTML = `
      <div class="cat-head" onclick="toggleCat(this)">
        <div class="cat-title"><span class="cat-badge">Parts &mdash; ${cat.name}</span><span class="cat-total">${cat.parts.length} parts &middot; ${fmt(catTotal)}</span></div>
        <span class="chevron">&#9660;</span>
      </div>
      <div class="board"></div>
    `;
    root.appendChild(el);

    const board = el.querySelector('.board');
    STATUSES.forEach((s, si) => {
      const items = cat.parts.filter(p => p.status === s.key);
      const col = document.createElement('div');
      col.innerHTML = `<div class="col-head">${s.label}<span class="col-count">${items.length}</span></div>`;
      const body = document.createElement('div');
      body.className = 'col-body';
      body.dataset.statusIdx = si;
      body.addEventListener('dragover', onColDragOver);
      body.addEventListener('dragleave', onColDragLeave);
      body.addEventListener('drop', onColDrop);
      if (items.length === 0) {
        body.innerHTML = '<div class="empty">&mdash;</div>';
      } else {
        items.forEach(p => {
          const card = document.createElement('div');
          card.className = 'card';
          card.draggable = true;
          card.dataset.ci = ci;
          card.dataset.pid = p.id;
          card.addEventListener('dragstart', onCardDragStart);
          card.addEventListener('dragend', onCardDragEnd);
          card.innerHTML = `
            <p class="comp">${p.component}</p>
            <p class="desc">${p.desc}</p>
            <div class="meta"><span class="pn">${p.pn||'N/A'}</span><span>${fmt(p.price)}</span></div>
            <div class="meta"><span>${p.supplier||'N/A'}</span></div>
          `;
          body.appendChild(card);
        });
      }
      col.appendChild(body);
      board.appendChild(col);
    });
  });

  document.getElementById('grand-summary').innerHTML = `
    <span>Total parts: <b>${grandCount}</b></span>
    <span>Total cost: <b>${fmt(grandTotal)}</b></span>
  `;
}

function toggleCat(el) {
  el.closest('.cat').classList.toggle('collapsed');
}

function populateCatSelect() {
  const sel = document.getElementById('g-cat');
  const current = sel.value;
  sel.innerHTML = categories.map((c,i) => `<option value="${i}">${c.name}</option>`).join('') + `<option value="__new">+ New category</option>`;
  if (current && current !== '__new' && categories[current]) sel.value = current;
}

function onCatChange() {
  const sel = document.getElementById('g-cat');
  const row = document.getElementById('newcat-row');
  if (sel.value === '__new') {
    row.classList.add('show');
    document.getElementById('newcat-name').focus();
  } else {
    row.classList.remove('show');
  }
}

function createCategory() {
  const nameInput = document.getElementById('newcat-name');
  const name = nameInput.value.trim();
  if (!name) { nameInput.focus(); return; }
  categories.push({ name, parts: [] });
  nameInput.value = '';
  document.getElementById('newcat-row').classList.remove('show');
  populateCatSelect();
  render();
  document.getElementById('g-cat').value = categories.length - 1;
}

function cancelNewCat() {
  document.getElementById('newcat-name').value = '';
  document.getElementById('newcat-row').classList.remove('show');
  document.getElementById('g-cat').value = 0;
}

function addPart(e) {
  e.preventDefault();
  const g = id => document.getElementById(`g-${id}`);
  const comp = g('comp').value.trim(), desc = g('desc').value.trim();
  const catVal = g('cat').value;
  if (catVal === '__new') { document.getElementById('newcat-name').focus(); return; }
  if (!comp || !desc) return;
  const ci = Number(catVal);
  const catName = categories[ci].name;

  const payload = {
    category: catName,
    component: comp,
    description: desc,
    part_number: g('pn').value.trim() || 'N/A',
    price: Number(g('price').value) || 0,
    supplier: g('supplier').value.trim() || 'N/A',
    status: g('status').value,
    _token: '{{ csrf_token() }}'
  };

  fetch(window.AppUrl + `/builds/${activeBuildId}/parts`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(payload)
  })
  .then(res => res.json())
  .then(p => {
    categories[ci].parts.push({
      id: p.id,
      component: p.component,
      desc: p.description,
      pn: p.part_number,
      price: p.price,
      supplier: p.supplier,
      status: p.status
    });
    const b = buildCards.find(x => x.id === activeBuildId);
    if (!b.parts) b.parts = [];
    b.parts.push(p);

    g('comp').value = ''; g('desc').value = ''; g('pn').value = ''; g('price').value = 0; g('supplier').value = '';
    render();
    document.getElementById('g-cat').value = ci;
  });
}


let buildCards = [
  @foreach($vehicle->builds as $build)
  { 
      id: {{ $build->id }}, 
      name: '{!! addslashes($build->name) !!}', 
      vin: '{!! addslashes($build->vin) !!}', 
      stage: 'In build', 
      parts: {!! json_encode($build->parts) !!}, 
      timelineTasks: {!! json_encode($build->timelineTasks) !!},
      processState: {!! json_encode($build->processState) !!}
  },
  @endforeach
];
let activeBuildId = null;

function renderBuildCards() {
  const wrap = document.getElementById('build-cards');
  wrap.innerHTML = buildCards.map(b => {
    const dotColor = (b.stage && b.stage.toLowerCase().includes('build')) ? '#22c55e' : '#111827';
    return `
    <div class="build-card" onclick="openBuildDetail(${b.id})" style="border: 1px solid #e5e7eb; border-left: 4px solid #111827; border-radius: 12px; overflow: hidden; cursor: pointer; transition: all 0.2s; background: #fff; min-height: 120px; display: flex; flex-direction: column; position: relative;">
      <div style="position: absolute; top: 12px; right: 12px;">
        <button onclick="event.stopPropagation(); toggleBuildMenu(${b.id})" style="width: 28px; height: 28px; border-radius: 14px; background: #fff; border: 1px solid #e5e7eb; cursor: pointer; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center;"><i class="fas fa-ellipsis-v" style="color: #4b5563; font-size: 12px;"></i></button>
        <div id="build-menu-${b.id}" style="display: none; position: absolute; top: 32px; right: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); width: 120px; z-index: 10; text-align: left;">
          <div onclick="event.stopPropagation(); editBuild(${b.id})" style="padding: 10px 12px; font-size: 13px; color: #374151; cursor: pointer; border-bottom: 1px solid #f3f4f6;">Edit name</div>
          <div onclick="event.stopPropagation(); deleteBuild(${b.id})" style="padding: 10px 12px; font-size: 13px; color: #dc2626; cursor: pointer;">Delete</div>
        </div>
      </div>
      <div style="padding: 16px; flex: 1; display: flex; flex-direction: column; justify-content: flex-end;">
        <div>
          <div style="font-weight:800; font-size:18px; color:#111827; margin-bottom: 8px;">${b.name}</div>
          <div style="font-size: 11px; color: #6b7280; display: flex; align-items: flex-start; gap: 4px; margin-bottom: 16px; line-height: 1.4;">
            <span style="background: #0f172a; color: #fff; font-size: 9px; font-weight: 700; padding: 2px 6px; border-radius: 20px; letter-spacing: 0.02em; white-space: nowrap;">478</span> 
            <span>&middot; 1967 Mustang Fastback &middot; v1</span>
          </div>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f3f4f6; padding-top: 12px;">
          <span style="font-size: 12px; font-weight: 500; color: #4b5563; display: flex; align-items: center; gap: 6px;"><div style="width: 6px; height: 6px; background: ${dotColor}; border-radius: 3px;"></div>${b.stage}</span>
          <i class="fas fa-arrow-right" style="color: #111827; font-size: 12px;"></i>
        </div>
      </div>
    </div>
  `}).join('') + `
    <div onclick="addBuildCard()" style="border: 1px dashed #cbd5e1; border-radius: 12px; padding: 16px; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 120px; cursor: pointer; transition: all 0.2s; background: #fff;">
      <div style="width: 40px; height: 40px; border-radius: 20px; border: 1px dashed #cbd5e1; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; font-size: 14px; color: #94a3b8;"><i class="fas fa-plus"></i></div>
      <div style="font-weight: 700; color: #111827; font-size: 14px; margin-bottom: 2px;">Add new build</div>
      <div style="font-size: 12px; color: #6b7280;">Create a new build entry</div>
    </div>`;
}

function toggleBuildMenu(id) {
  const menu = document.getElementById(`build-menu-${id}`);
  const isVisible = menu.style.display === 'block';
  document.querySelectorAll('[id^="build-menu-"]').forEach(m => m.style.display = 'none');
  if (!isVisible) {
    menu.style.display = 'block';
  }
}

document.addEventListener('click', () => {
  document.querySelectorAll('[id^="build-menu-"]').forEach(m => m.style.display = 'none');
});

function editBuild(id) {
  document.querySelectorAll('[id^="build-menu-"]').forEach(m => m.style.display = 'none');
  const b = buildCards.find(x => x.id === id);
  if(!b) return;
  const newName = prompt("Edit build name:", b.name);
  if(newName) {
    b.name = newName;
    renderBuildCards();
  }
}

function deleteBuild(id) {
  document.querySelectorAll('[id^="build-menu-"]').forEach(m => m.style.display = 'none');
  if(confirm("Are you sure you want to delete this build?")) {
    const idx = buildCards.findIndex(x => x.id === id);
    if(idx !== -1) {
      buildCards.splice(idx, 1);
      renderBuildCards();
    }
  }
}

function addBuildCard() {
  document.getElementById('build-modal').style.display = 'flex';
}

function openBuildDetail(id) {
  activeBuildId = id;
  const b = buildCards.find(x => x.id === id);
  document.getElementById('builds-list-view').style.display = 'none';
  document.getElementById('builds-detail-view').style.display = 'block';
  document.getElementById('build-detail-title').textContent = b.name;
  document.getElementById('build-detail-meta').innerHTML = '<span style="background: #0f172a; color: #fff; font-size: 11.5px; font-weight: 700; padding: 3px 10px; border-radius: 20px; letter-spacing: 0.02em;">478</span> <span>&middot; 1967 Mustang Fastback &middot; Built against 478 &mdash; v1</span>';
  document.getElementById('ov-parts-pct').textContent = computePartsInstalledPct() + '%';
  document.getElementById('ov-vin-display').textContent = b.vin || 'Assigned on completion';
  document.getElementById('ov-vin-display').style.color = b.vin ? 'var(--text)' : 'var(--text-faint)';

  const catsMap = {};
  masterCategories.forEach(cName => {
    catsMap[cName] = { name: cName, parts: [] };
  });

  if (b.parts) {
    b.parts.forEach(p => {
      if (!catsMap[p.category]) {
        catsMap[p.category] = { name: p.category, parts: [] };
      }
      catsMap[p.category].parts.push({
        id: p.id,
        component: p.component,
        desc: p.description,
        pn: p.part_number,
        price: p.price,
        supplier: p.supplier,
        status: p.status
      });
    });
  }
  categories = Object.values(catsMap);

  updateOverviewDiaryStat();
  showSubTab('overview');
}

function closeBuildDetail() {
  document.getElementById('builds-detail-view').style.display = 'none';
  document.getElementById('builds-list-view').style.display = 'block';
}

function showSubTab(sub) {
  document.querySelectorAll('.subtab').forEach(t => t.classList.toggle('active', t.dataset.sub === sub));
  document.querySelectorAll('.subpage').forEach(p => p.classList.toggle('active', p.id === 'sub-' + sub));
  if (sub === 'bparts') render();
  if (sub === 'process') renderProcessBuild(activeBuildId);
  if (sub === 'btimeline') renderTimeline();
}

function computePartsInstalledPct() {
  const all = categories.flatMap(c => c.parts);
  const installed = all.filter(p => p.status === 'installed').length;
  return all.length ? Math.round((installed/all.length)*100) : 0;
}

// ---- Build process (master template) ----
const PROCESS = [
  { id:1, name:'Body Shell', ops:[
    { code:'OP-101', section:'Body Shell', station:'Receiving Bay',
      title:'New Body Shell Receiving, Inspection & Fixture Check',
      ppe:['Safety Glasses','Gloves','Steel-Cap Boots'],
      hazards:[
        { h:'Manual handling of shell/panels', c:'Two-plus person lift or hoist for shell; use body cart/rotisserie once landed.' },
        { h:'Shell on stands — stability', c:'Confirm stands/fixture rated for shell weight before releasing hoist.' },
      ],
      tools:['Body cart / rotisserie','Dimensional check fixture / tape','Inspection light','Camera'],
      materials:['Dynacorn shell spec sheet'],
      steps:[
        { label:'Uncrate and inspect the new Dynacorn reproduction shell for shipping damage, panel alignment and e-coat/paint condition.', warn:'No teardown required — shell arrives as new sheet metal, not a restored body.' },
        { label:'Mount shell on rotisserie or chassis fixture; confirm level and square before any structural work begins.' },
        { label:'Dimensional check against spec sheet at all reference points.' },
        { label:'Confirm panel gaps and alignment across doors, decklid and fenders.' },
      ],
    },
  ]},
  { id:2, name:'Chassis — Rear', ops:[
    { code:'OP-201', section:'Chassis — Rear', station:'Chassis Bay',
      title:'Rear 4-Link and Panhard Bar Installation',
      ppe:['Safety Glasses','Gloves'],
      hazards:[{ h:'Suspension under load during fitment', c:'Support on stands; never work under a hoisted, unsecured chassis.' }],
      tools:['Torque wrench','Chassis stands'],
      materials:['Rear 4-link kit spec sheet'],
      steps:[
        { label:'Fit rear 4-link mounts to chassis rails.' },
        { label:'Install panhard bar bracket.' },
        { label:'Torque check all mounting points to spec.' },
      ],
    },
  ]},
  { id:3, name:'Front IFS', ops:[
    { code:'OP-301', section:'Front IFS', station:'Chassis Bay',
      title:'Front Independent Suspension Installation',
      ppe:['Safety Glasses','Gloves'],
      hazards:[{ h:'Crossmember handling', c:'Two-person lift; secure on stand before fitting.' }],
      tools:['Torque wrench','Alignment gauge'],
      materials:[],
      steps:[
        { label:'Install front IFS crossmember.' },
        { label:'Fit power rack and steering linkage.' },
        { label:'Align and torque to spec.' },
      ],
    },
  ]},
  { id:4, name:'Rear Suspension', ops:[
    { code:'OP-401', section:'Rear Suspension', station:'Chassis Bay',
      title:'Rear Spring and Shock Fitment',
      ppe:['Safety Glasses','Gloves'],
      hazards:[{ h:'Spring compression', c:'Use rated spring compressor; never hand-force a loaded spring.' }],
      tools:['Spring compressor','Torque wrench'],
      materials:[],
      steps:[
        { label:'Fit rear springs and shocks.' },
        { label:'Torque all mounting hardware to spec.' },
      ],
    },
  ]},
  { id:5, name:'Brakes & Fuel', ops:[
    { code:'OP-501', section:'Brakes & Fuel', station:'Chassis Bay',
      title:'Wilwood Brake and Fuel System Installation',
      ppe:['Safety Glasses','Gloves'],
      hazards:[{ h:'Brake fluid contact', c:'Wear gloves; wipe spills immediately, avoid contact with paint.' }],
      tools:['Brake bleeding kit','Torque wrench'],
      materials:['Aeromotive fuel tank spec sheet'],
      steps:[
        { label:'Install Wilwood brake calipers and rotors, front and rear.' },
        { label:'Fit Aeromotive fuel tank and lines.' },
        { label:'Bleed brake system and pressure test.' },
      ],
    },
  ]},
  { id:6, name:'Drivetrain', ops:[
    { code:'OP-601', section:'Drivetrain', station:'Engine Bay',
      title:'Coyote Engine and Transmission Installation',
      ppe:['Safety Glasses','Gloves','Steel-Cap Boots'],
      hazards:[{ h:'Engine hoist operation', c:'Rated hoist only; clear the swing area before lifting.' }],
      tools:['Engine hoist','Torque wrench'],
      materials:['4R70W install spec sheet'],
      steps:[
        { label:'Mount 5.0L Coyote engine on chassis.' },
        { label:'Install 4R70W transmission.' },
        { label:'Connect driveline and torque all mounts.' },
      ],
    },
  ]},
  { id:7, name:'Electrical', ops:[
    { code:'OP-701', section:'Electrical', station:'Electrical Bay',
      title:'Haltech ECU and Wiring Harness Installation',
      ppe:['Safety Glasses'],
      hazards:[{ h:'Battery connected during wiring', c:'Disconnect battery before harness work.' }],
      tools:['Multimeter','Crimp tool'],
      materials:['Wiring diagram'],
      steps:[
        { label:'Install Haltech ECU and engine harness.' },
        { label:'Wire digital dash and gauge cluster.' },
        { label:'Function test all circuits before reassembly.' },
      ],
    },
  ]},
  { id:8, name:'Paint & Body', ops:[
    { code:'OP-801', section:'Paint & Body', station:'Paint Bay',
      title:'Final Panel Fit and Paint Preparation',
      ppe:['Respirator','Gloves'],
      hazards:[{ h:'Paint booth fumes', c:'Respirator required; ensure booth extraction is running.' }],
      tools:['Panel gap gauge'],
      materials:[],
      steps:[
        { label:'Confirm final panel gaps prior to paint.' },
        { label:'Mask and prep for customer-specified colour.' },
      ],
    },
  ]},
  { id:9, name:'Trim & Glass', ops:[
    { code:'OP-901', section:'Trim & Glass', station:'Trim Bay',
      title:'Interior Trim and Glass Fitment',
      ppe:['Gloves'],
      hazards:[{ h:'Glass handling', c:'Two-person lift for all glass; use suction handles.' }],
      tools:['Trim tools','Glass install kit'],
      materials:[],
      steps:[
        { label:'Fit custom interior trim per customer specification.' },
        { label:'Install windscreen and door glass.' },
      ],
    },
  ]},
  { id:10, name:'Commissioning', ops:[
    { code:'OP-1001', section:'Commissioning', station:'Commissioning Bay',
      title:'Final Commissioning and Road Test',
      ppe:['Safety Glasses'],
      hazards:[{ h:'Road test of uncommissioned vehicle', c:'Complete full pre-drive checklist before any road test.' }],
      tools:['Diagnostic scanner'],
      materials:[],
      steps:[
        { label:'Complete full systems check against build sheet.' },
        { label:'Road test and confirm no faults.' },
        { label:'Sign off ready for VIN assignment.' },
      ],
    },
  ]},
];

function opStepCount(op) { return op.steps.length; }
function stationStepCount(st) { return st.operations.reduce((a,o)=>a+opStepCount(o),0); }

function renderProcessGeneric(wrapId, data, interactive) {
  const wrap = document.getElementById(wrapId);
  const totalSteps = data.reduce((a,st)=>a+stationStepCount(st),0);
  const doneSteps = interactive ? data.reduce((a,st)=>a+st.operations.reduce((b,o)=>b+o.steps.filter(s=>s.is_completed).length,0),0) : 0;
  const overallPct = totalSteps ? Math.round((doneSteps/totalSteps)*100) : 0;

  let selected = wrap._selected;
  if (!selected || !data.find(s => s.id === selected.stId)) {
    selected = { stId: data[0].id, opIdx: 0 };
  }
  wrap._selected = selected;
  const st = data.find(s => s.id === selected.stId);
  const op = st.operations[selected.opIdx];
  const b = interactive ? buildCards.find(x => x.id === activeBuildId) : null;

  const sidebar = `
    <div class="proc-sidebar">
      <div class="proc-sidebar-head">
        <p class="proc-brand">JPL Automotive</p>
        <p class="proc-title">Full Build &mdash; ${b ? b.name : 'Template'}</p>
        <p class="proc-meta">1967 Mustang Fastback &middot; Rev A</p>
      </div>
      <div class="proc-overall">
        <div class="lbl"><span>Overall build progress</span><span>${overallPct}%</span></div>
        <div class="proc-bar"><div class="proc-bar-fill" style="width:${overallPct}%"></div></div>
      </div>
      ${data.map((s, si) => {
        const sDone = interactive ? s.operations.reduce((b,o)=>b+o.steps.filter(x=>x.is_completed).length,0) : 0;
        const sTotal = stationStepCount(s);
        const sPct = sTotal ? Math.round((sDone/sTotal)*100) : 0;
        const isActive = s.id === selected.stId;
        return `
          <div class="proc-station ${isActive?'active':''}">
            <div class="proc-station-head" onclick="procSelectStation('${wrapId}', ${s.id})">
              <span class="proc-station-num">${String(si + 1).padStart(2,'0')}</span>
              <span class="proc-station-name">${s.name}</span>
              <span class="proc-station-pct">${sPct}%</span>
            </div>
            <div class="proc-op-list">
              ${s.operations.map((o,oi) => {
                const isOpActive = isActive && oi === selected.opIdx;
                return `<div class="proc-op-item ${isOpActive ? 'selected' : ''}" onclick="procSelectOp('${wrapId}', ${s.id}, ${oi}, event)">
                  <div class="op-no">${o.code}</div>
                  <div>${o.title}</div>
                </div>`;
              }).join('')}
            </div>
          </div>
        `;
      }).join('')}
    </div>
  `;

  const opDone = interactive ? op.steps.filter(s=>s.is_completed).length : 0;
  const opPct = op.steps.length ? Math.round((opDone/op.steps.length)*100) : 0;

  const content = `
    <div class="proc-content">
      <span class="proc-op-badge">${op.code} &middot; ${op.station.toUpperCase()}</span>
      <p class="proc-op-title">${op.title}</p>
      <div class="proc-meta-grid">
        <div class="cell"><p class="k">Operation</p><p class="v">${op.code}</p></div>
        <div class="cell"><p class="k">Station</p><p class="v">${op.station}</p></div>
        <div class="cell"><p class="k">Section</p><p class="v">${op.section}</p></div>
        <div class="cell"><p class="k">Progress</p><p class="v">${interactive ? opPct+'%' : '&mdash;'}</p></div>
      </div>

      <p class="proc-sec-label">PPE required</p>
      <div>${op.ppe.map(p=>`<span class="ppe-badge"><span class="warn-icn">&#9888;</span>${p}</span>`).join('')}</div>

      <p class="proc-sec-label">Hazards &amp; controls</p>
      <table class="hazard-tbl">
        <tr><th>Hazard</th><th>Control</th></tr>
        ${op.hazards.map(h=>`<tr><td>${h.h}</td><td class="ctrl">${h.c}</td></tr>`).join('')}
      </table>

      <p class="proc-sec-label">Tools &amp; materials</p>
      <div class="tm-grid">
        <div class="tm-col"><p class="lbl">TOOLS</p><ul>${op.tools.map(t=>`<li>${t}</li>`).join('') || '<li style="color:var(--text-faint)">None listed</li>'}</ul></div>
        <div class="tm-col"><p class="lbl">MATERIALS</p><ul>${op.materials.map(m=>`<li>${m}</li>`).join('') || '<li style="color:var(--text-faint)">None listed</li>'}</ul></div>
      </div>

      <p class="proc-sec-label">Work steps</p>
      ${op.steps.map((s,si) => `
        <div class="step-card ${interactive?'':'readonly'} ${s.is_completed?'done':''}">
          <input type="checkbox" ${s.is_completed?'checked':''} ${interactive?`onchange="procToggleStep('${wrapId}', ${st.id}, ${selected.opIdx}, ${si}, ${s.id})"`:'disabled'}>
          <div class="step-body">
            <p class="step-num">${String(si+1).padStart(2,'0')}</p>
            <p class="step-text">${s.label}</p>
            ${s.warn ? `<div class="step-warn"><span>&#9888;</span><span>${s.warn}</span></div>` : ''}
          </div>
          <div class="step-ref-img" ${interactive?`onclick="procUploadImage(${s.id})"`:''} style="${s.image_path ? `background-image:url(/storage/${s.image_path});background-size:cover;background-position:center;` : ''}">
            ${!s.image_path ? `
              <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; gap:8px; color:#9ca3af;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                <span style="font-size:12px;font-weight:500">[ No reference image ]</span>
              </div>
            ` : ''}
          </div>
        </div>
      `).join('')}
    </div>
  `;

  wrap.innerHTML = sidebar + content;
}

function procSelectStation(wrapId, stId) {
  const wrap = document.getElementById(wrapId);
  wrap._selected = { stId, opIdx: 0 };
  if (wrapId === 'proc-template-wrap') renderProcessGeneric(wrapId, PROCESS, false);
  else renderProcessGeneric(wrapId, activeBuildProcessData(), true);
}

function procSelectOp(wrapId, stId, opIdx, evt) {
  evt.stopPropagation();
  const wrap = document.getElementById(wrapId);
  wrap._selected = { stId, opIdx };
  if (wrapId === 'proc-template-wrap') renderProcessGeneric(wrapId, PROCESS, false);
  else renderProcessGeneric(wrapId, activeBuildProcessData(), true);
}

function procToggleStep(wrapId, stId, opIdx, stepIdx, dbStepId) {
  const data = activeBuildProcessData();
  const st = data.find(s => s.id === stId);
  const step = st.operations[opIdx].steps[stepIdx];
  step.is_completed = !step.is_completed;
  
  const wrap = document.getElementById(wrapId);
  wrap._selected = { stId, opIdx };
  renderProcessGeneric(wrapId, data, true);
  updateOverviewDiaryStat();

  if (dbStepId) {
    fetch(window.AppUrl + `/builds/${activeBuildId}/steps/${dbStepId}/toggle`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ _token: '{{ csrf_token() }}', is_completed: step.is_completed })
    });
  }
}

function procUploadImage(stepId) {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';
    input.onchange = (e) => {
        const file = e.target.files[0];
        if (!file) return;
        const fd = new FormData();
        fd.append('image', file);
        fd.append('_token', '{{ csrf_token() }}');
        
        fetch(window.AppUrl + `/builds/${activeBuildId}/steps/${stepId}/image`, {
            method: 'POST',
            body: fd
        })
        .then(r => r.json())
        .then(res => {
            if (res.success) {
                // Update local data
                const data = activeBuildProcessData();
                for (const st of data) {
                    for (const op of st.operations) {
                        for (const step of op.steps) {
                            if (step.id === stepId) {
                                step.image_path = res.image_path;
                            }
                        }
                    }
                }
                const wrapId = 'proc-build-wrap';
                renderProcessGeneric(wrapId, data, true);
            }
        });
    };
    input.click();
}

function activeBuildProcessData() {
  const b = buildCards.find(x => x.id === activeBuildId);
  if (!b.processState) {
    b.processState = [];
  }
  return b.processState;
}

function updateOverviewDiaryStat() {
  const data = activeBuildProcessData();
  const total = data.reduce((a,st)=>a+stationStepCount(st),0);
  const done = data.reduce((a,st)=>a+st.operations.reduce((b,o)=>b+o.steps.filter(x=>x.is_completed).length,0),0);
  const el = document.getElementById('ov-diary-stat');
  if (el) el.textContent = `${done} / ${total} steps`;
}

function renderProcessTemplate() {
  renderProcessGeneric('proc-template-wrap', PROCESS, false);
}

function renderProcessBuild(buildId) {
  if (!buildId) return;
  renderProcessGeneric('proc-build-wrap', activeBuildProcessData(), true);
}

// ---- Timeline ----
const TL_PHASES = {
  procurement:  { label: 'Procurement',  color: '#e0a058' },
  design:       { label: 'Design',       color: '#5b8fd9' },
  production:   { label: 'Production',   color: '#e0c14a' },
  shipping:     { label: 'Shipping',     color: '#9d7de0' },
  installation: { label: 'Installation', color: '#4fbf6f' },
  testing:      { label: 'Testing',      color: '#e0655a' },
};

const TL_DEFAULT_TASKS = [
  { track:'ABS / plumbing', phase:'procurement',  label:'Order ABS',       cost:3000, start:1, dur:1 },
  { track:'ABS / plumbing', phase:'shipping',     label:'Ship ABS unit',   cost:0,    start:2, dur:2 },
  { track:'ABS / plumbing', phase:'installation', label:'Install ABS',     cost:0,    start:4, dur:1 },
  { track:'ABS / plumbing', phase:'installation', label:'Plumbing (Josh)', cost:0,    start:5, dur:1 },
  { track:'Climate (A/C)',  phase:'procurement',  label:'Source pump',     cost:500,  start:1, dur:1 },
  { track:'Climate (A/C)',  phase:'shipping',     label:'Ship new unit',   cost:1000, start:2, dur:2 },
  { track:'Digital gauges', phase:'design',       label:'Gauge design',    cost:0,    start:1, dur:2 },
  { track:'Digital gauges', phase:'production',   label:'Gauge production',cost:3000, start:3, dur:2 },
  { track:'Digital gauges', phase:'production',   label:'SW integration',  cost:1000, start:5, dur:1 },
  { track:'Electrical',     phase:'design',       label:'Diagram eng',     cost:3000, start:1, dur:2 },
  { track:'Electrical',     phase:'production',   label:'Harness (prod)',  cost:1000, start:3, dur:3 },
  { track:'Electrical',     phase:'installation', label:'Install (Josh)',  cost:0,    start:6, dur:1 },
  { track:'Interior / 3D',  phase:'design',       label:'3D modelling',    cost:0,    start:1, dur:3 },
  { track:'Interior / 3D',  phase:'production',   label:'Panel milling',   cost:3000, start:4, dur:2 },
  { track:'Interior / 3D',  phase:'installation', label:'Trim',            cost:2000, start:6, dur:1 },
  { track:'Interior / 3D',  phase:'installation', label:'Install (Josh)',  cost:0,    start:7, dur:1 },
  { track:'Seats',          phase:'procurement',  label:'Order seats',     cost:800,  start:1, dur:1 },
  { track:'Seats',          phase:'shipping',     label:'Ship from US',    cost:0,    start:2, dur:3 },
  { track:'Seats',          phase:'design',       label:'Belt eng',        cost:1000, start:5, dur:1 },
  { track:'Testing',        phase:'testing',      label:'Testing',         cost:7000, start:8, dur:2 },
];

function activeBuildTimelineData() {
  const b = buildCards.find(x => x.id === activeBuildId);
  if (!b.timelineTasks) {
    b.timelineTasks = [];
  }
  return b;
}

function renderTimeline() {
  if (!activeBuildId) return;
  const b = activeBuildTimelineData();
  const tasks = b.timelineTasks;

  document.getElementById('tl-tbody').innerHTML = tasks.map((t,i) => `
    <tr>
      <td><input value="${t.track}" onchange="tlEdit(${i},'track',this.value)"></td>
      <td><span class="tl-swatch" style="background:${TL_PHASES[t.phase].color}"></span></td>
      <td><select onchange="tlEdit(${i},'phase',this.value)">${Object.keys(TL_PHASES).map(k=>`<option value="${k}" ${k===t.phase?'selected':''}>${TL_PHASES[k].label}</option>`).join('')}</select></td>
      <td><input value="${t.label}" onchange="tlEdit(${i},'label',this.value)"></td>
      <td><input type="number" min="0" value="${t.cost}" onchange="tlEdit(${i},'cost',Number(this.value))"></td>
      <td><input type="number" min="1" value="${t.start}" onchange="tlEdit(${i},'start',Number(this.value))"></td>
      <td><input type="number" min="1" value="${t.dur}" onchange="tlEdit(${i},'dur',Number(this.value))"></td>
      <td><button class="tl-rm" onclick="tlRemove(${i})">Remove</button></td>
    </tr>
  `).join('');

  const maxEnd = tasks.length ? Math.max(...tasks.map(t => t.start + t.dur - 1)) : 1;
  let timelineMax = Math.max(9, maxEnd);

  const scale = document.getElementById('tl-scale') ? document.getElementById('tl-scale').value : 'weekly';
  if (scale === 'monthly') {
    timelineMax = Math.ceil(timelineMax / 4) * 4;
  }

  const divisor = scale === 'monthly' ? 4 : 1;
  const columns = timelineMax / divisor;

  const tracks = [...new Set(tasks.map(t => t.track))];

  const trackList = document.getElementById('tl-track-list');
  if (trackList) {
    trackList.innerHTML = tracks.map(t => `<option value="${t}"></option>`).join('');
  }

  const gantt = document.getElementById('tl-gantt');
  let header = `<div class="tl-gantt-header">`;
  for (let c=1; c<=columns; c++) header += `<span class="tl-gantt-week" style="width:${100/columns}%">${c}</span>`;
  header += `</div>`;

  const rows = tracks.map(track => {
    const trackTasks = tasks.filter(t => t.track === track);
    const bars = trackTasks.map(t => {
      const leftPct = ((t.start - 1) / timelineMax) * 100;
      const widthPct = (t.dur / timelineMax) * 100;
      const costLabel = t.cost ? ` $${t.cost.toLocaleString()}` : '';
      return `<div class="tl-gantt-bar" style="left:${leftPct}%;width:${widthPct}%;background:${TL_PHASES[t.phase].color}">${t.label}${costLabel}</div>`;
    }).join('');
    return `<div class="tl-gantt-row"><div class="tl-gantt-track">${track}</div><div class="tl-gantt-bars">${bars}</div></div>`;
  }).join('');

  gantt.innerHTML = `<div class="tl-gantt-wrap">${header}${rows}</div>`;

  document.getElementById('tl-legend').innerHTML = Object.keys(TL_PHASES).map(k =>
    `<span><span class="tl-swatch" style="background:${TL_PHASES[k].color}"></span>${TL_PHASES[k].label}</span>`
  ).join('');

  const totalCost = tasks.reduce((a,t)=>a+Number(t.cost||0),0);
  document.getElementById('tl-summary').innerHTML = `
    <span>Critical path: <b>${maxEnd} weeks</b></span>
    <span>Costed total: <b>$${totalCost.toLocaleString()}</b></span>
    <span>Tasks: <b>${tasks.length}</b></span>
  `;
}

function tlEdit(i, field, value) {
  const b = activeBuildTimelineData();
  const task = b.timelineTasks[i];
  task[field] = value;
  
  fetch(window.AppUrl + `/builds/timeline-tasks/${task.id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
    body: JSON.stringify({ [field]: value })
  });

  renderTimeline();
}

function tlRemove(i) {
  const b = activeBuildTimelineData();
  const task = b.timelineTasks[i];
  b.timelineTasks.splice(i, 1);
  
  fetch(window.AppUrl + `/builds/timeline-tasks/${task.id}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
  });

  renderTimeline();
}

function addTimelineTask() {
  const b = activeBuildTimelineData();
  const track = document.getElementById('tl-track').value.trim();
  const label = document.getElementById('tl-label').value.trim();
  if (!track || !label) return;

  const payload = {
    track, label,
    phase: document.getElementById('tl-phase').value,
    cost: Number(document.getElementById('tl-cost').value) || 0,
    start: Number(document.getElementById('tl-start').value) || 1,
    dur: Number(document.getElementById('tl-dur').value) || 1,
  };

  fetch(window.AppUrl + `/builds/${b.id}/timeline-tasks`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
    body: JSON.stringify(payload)
  })
  .then(r => r.json())
  .then(newTask => {
    b.timelineTasks.push(newTask);
    document.getElementById('tl-track').value = '';
    document.getElementById('tl-label').value = '';
    document.getElementById('tl-cost').value = 0;
    document.getElementById('tl-start').value = 1;
    document.getElementById('tl-dur').value = 1;
    renderTimeline();
  });
}

render();

renderBuildCards();
renderProcessTemplate();
</script>
</div>
</div>
@endsection
