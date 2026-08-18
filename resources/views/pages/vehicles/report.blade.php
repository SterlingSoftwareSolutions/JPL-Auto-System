@extends('layouts.layout')

@section('hide_header', true)

@section('content')
<div style="background: var(--bg); display: flex; flex-direction: column; min-height: 100vh; width: 100%;">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=JetBrains+Mono:wght@400;700&family=Oswald:wght@500;600;700&display=swap');

  :root {
    --bg: #F8FAFC; --panel: #F1F5F9; --card: #FFFFFF; --border: #E2E8F0;
    --text: #0F172A; --text-dim: #475569; --text-faint: #94A3B8;
    --orange: #0F172A; --green: #10B981; --amber: #0F172A;
    --mono: 'JetBrains Mono', monospace; 
    --disp: 'Oswald', sans-serif; 
    --font-main: 'Inter', sans-serif;
  }
  * { box-sizing: border-box; }
  body { margin: 0; background: var(--bg); color: var(--text); font-family: var(--font-main); font-size: 14px; }
  h1, h2, h3, header .title, .summary b, [style*="font-weight: 800"], [style*="font-weight: 700"] { font-family: var(--disp) !important; letter-spacing: -0.01em; }
  th, .tab, .vin.set, .pn, [style*="font-family: monospace"], [style*="ui-monospace"] { font-family: var(--mono) !important; }
  .tab { text-transform: uppercase; letter-spacing: 0.08em; font-size: 12px !important; }
  header .title { font-size: 22px !important; }

  ::-webkit-scrollbar { width: 6px; height: 6px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
  ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
  header { display: flex; align-items: center; gap: 12px; padding: 16px 28px; border-bottom: 1px solid var(--border); }
  .logo { width: 30px; height: 30px; border: 1.5px solid var(--text); transform: rotate(45deg); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .logo span { transform: rotate(-45deg); font-size: 11px; font-weight: 700; }
  header .title { font-weight: 600; font-size: 15px; }
  header .sub { color: var(--text-dim); font-size: 12px; margin-left: 4px; }
  .tabs { display: flex; gap: 8px; padding: 0 32px; border-bottom: 1px solid var(--border); background: #ffffff; overflow-x: auto; white-space: nowrap; -ms-overflow-style: none; scrollbar-width: none; }
  .tabs::-webkit-scrollbar { display: none; }
  .tab { position: relative; padding: 14px 16px; font-size: 14px; font-weight: 500; color: #6b7280; cursor: pointer; transition: color 0.3s ease; }
  .tab:hover { color: #111827; }
  .tab::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background-color: #111827; transform: scaleX(0); transform-origin: right; transition: transform 0.3s ease; }
  .tab:hover::after { transform: scaleX(1); transform-origin: left; }
  .tab.active { color: #111827; font-weight: 600; }
  .tab.active::after { transform: scaleX(1); transform-origin: left; }
  .subtabs { display: flex; gap: 24px; border-bottom: 1px solid var(--border); margin: 0 0 28px; overflow-x: auto; white-space: nowrap; -ms-overflow-style: none; scrollbar-width: none; }
  .subtabs::-webkit-scrollbar { display: none; }
  .subtab { display: flex; align-items: center; gap: 8px; padding: 0 0 12px 0; font-size: 14px; color: #64748b; cursor: pointer; transition: color 0.2s; position: relative; }
  .subtab:hover { color: #000; }
  .subtab.active { color: #000; font-weight: 600; }
  .subtab.active::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: #000; transform: scaleX(1); }
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
  main { flex: 1; padding-bottom: 60px; overflow-x: hidden; }
  h1 { font-size: 20px; font-weight: 600; margin: 0 0 4px; }
  .lede { color: var(--text-dim); font-size: 13px; margin: 0 0 20px; }
  .section-label { font-size: 11px; font-weight: 600; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 8px; }
  .page { display: none; max-width: 1600px; width: 100%; margin: 0 auto; padding: 32px 40px; box-sizing: border-box; }
  .page.active { display: block; }
  #page-vehicle { max-width: none; padding: 32px; margin: 0; background: var(--bg); min-height: calc(100vh - 130px); }

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
  .cat.collapsed .board-wrapper { display: none; }

  .board-wrapper { overflow-x: auto; padding-bottom: 24px; margin-bottom: -24px; -ms-overflow-style: none; scrollbar-width: none; }
  .board-wrapper::-webkit-scrollbar { display: none; }
  .board { display: grid; grid-template-columns: repeat(5, minmax(280px, 1fr)); gap: 16px; min-width: max-content; }
  .col-head { font-size: 11px; font-weight: 700; color: #4b5563; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; }
  .col-count { background: #f3f4f6; color: #4b5563; border-radius: 12px; padding: 2px 8px; font-size: 10px; font-weight: 700; }
  .col-wrapper { display: flex; flex-direction: column; height: 100%; min-height: 200px; }
  .col-body { display: flex; flex-direction: column; gap: 12px; flex: 1; width: 100%; align-items: stretch; padding-bottom: 20px; border: 2px dashed transparent; transition: background 0.2s, border 0.2s; border-radius: 12px; }

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

  /* Build process / diary CSS removed - now in public/css/build_process.css */

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
<link rel="stylesheet" href="{{ asset('css/build_process.css') }}">
<script src="{{ asset('js/images.js') }}"></script>
<script src="{{ asset('js/build_process.js') }}?v={{ rand() }}"></script>
<div style="font-size: 14px; color: var(--text);">
<header class="flex items-center justify-between px-8 py-5 border-b border-gray-200" style="background: #ffffff;">
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
  <div class="tab" data-page="process" onclick="showTab('process')"><i class="fas fa-cog" style="margin-right: 6px;"></i> Build process</div>
  <div class="tab" data-page="parts" onclick="showTab('parts')"><i class="fas fa-box" style="margin-right: 6px;"></i> Parts list</div>
  <div class="tab" data-page="suppliers" onclick="showTab('suppliers')"><i class="fas fa-users" style="margin-right: 6px;"></i> Suppliers</div>
</div>

<main>

  <div class="page" id="page-vehicle">
    @include('pages.vehicles.partials.vehicle-details')
  </div>

  <div class="page active" id="page-builds">
    <div id="builds-list-view" style="background: var(--bg); border: 1px solid var(--border); border-radius: 12px; padding: 40px;">
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
      <div id="build-detail-header" style="margin-bottom: 24px;">
        <span class="back-link" onclick="closeBuildDetail()" style="display: inline-flex; align-items: center; gap: 6px; color: #6b7280; font-size: 15px; font-weight: 500; cursor: pointer; margin-bottom: 12px; transition: color 0.2s;">&larr; Builds</span>
        <h1 id="build-detail-title" style="font-size: 32px; font-weight: 700; margin: 0; color: #111827;">Build</h1>
      </div>
      <div id="build-detail-subtabs" class="subtabs">
        <div class="subtab active" data-sub="overview" onclick="showSubTab('overview')"><i class="fas fa-info-circle"></i> Overview</div>
        <div class="subtab" data-sub="process" onclick="showSubTab('process')"><i class="fas fa-tools"></i> Build process</div>
        <div class="subtab" data-sub="bparts" onclick="showSubTab('bparts')"><i class="fas fa-box"></i> Parts</div>
        <div class="subtab" data-sub="btimeline" onclick="showSubTab('btimeline')"><i class="far fa-clock"></i> Timeline</div>
      </div>

      <div class="subpage active" id="sub-overview">
        <div class="field-grid" style="grid-template-columns:repeat(4,1fr)">
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">Stage</p><p style="margin:0;font-weight:500">In build</p></div>
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">Parts installed</p><p style="margin:0;font-weight:500" id="ov-parts-pct">&mdash;</p></div>
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">Build process</p><p style="margin:0;font-weight:500" id="ov-diary-stat">0 / 0 steps</p></div>
          <div class="panel" style="padding:12px"><p class="section-label" style="margin:0 0 4px">VIN</p><p id="ov-vin-display" style="margin:0;font-weight:500;color:var(--text-faint)">Assigned on completion</p></div>
        </div>
      </div>

      <div class="subpage" id="sub-process">
        <div class="proc-wrap" id="proc-build-wrap"></div>
      </div>

      <div class="subpage" id="sub-bparts">
        <p class="lede">This build's parts, tracked as procurement &rarr; ordered &rarr; in transit &rarr; received &rarr; installed.</p>

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
    <div class="proc-wrap" id="proc-template-wrap"></div>
  </div>

  <div class="page" id="page-parts">
    <div style="margin-bottom: 32px; display: flex; justify-content: space-between; align-items: flex-end;">
      <div>
        <span style="background: #0f172a; color: #fff; font-size: 11.5px; font-weight: 700; padding: 4px 12px; border-radius: 20px; letter-spacing: 0.02em; display: inline-block; margin-bottom: 12px;">478 - PARTS LIST</span>
        <h1 style="font-size: 22px; font-weight: 800; color: #111827; margin: 0 0 8px 0; letter-spacing: -0.02em;">Bill of materials</h1>
        <p style="color: #6b7280; font-size: 14px; margin: 0; max-width: 800px; line-height: 1.5;">The default bill of materials for this model, tied to the compliance record. Every build inherits this list as its starting point.</p>
      </div>
      <button id="add-model-part-btn" onclick="document.getElementById('add-model-part-form').style.display='block'; this.style.display='none';" style="background:#0f172a; color:#fff; border:none; padding:12px 20px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; display:flex; align-items:center; gap:8px; box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); transition:background 0.2s, transform 0.2s; white-space:nowrap;" onmouseover="this.style.background='#1e293b'; this.style.transform='translateY(-1px)';" onmouseout="this.style.background='#0f172a'; this.style.transform='translateY(0)';">
        <i class="fas fa-plus"></i> Add Part
      </button>
    </div>

    <div id="add-model-part-form" style="display:none; background:var(--panel2); border:1px solid var(--line); border-radius:10px; padding:16px; margin-bottom:16px;">
      <form onsubmit="addModelPart(event, '{{ $vehicle->id }}')" style="display:flex; gap:12px; align-items:flex-end; flex-wrap:wrap;">
        <div style="flex:1; min-width:140px; position:relative;">
          <label style="display:block; font-size:11px; color:var(--muted); margin-bottom:4px; font-weight:500; letter-spacing:0.02em;">Category</label>
          <select id="m-cat-sel" required onchange="if(this.value==='__NEW__'){this.style.display='none';document.getElementById('m-cat-new').style.display='block';document.getElementById('m-cat-new').focus();document.getElementById('m-cat-new').setAttribute('required', 'required');this.removeAttribute('required');}" style="width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
            <option value="" disabled selected>Select...</option>
            @foreach(\App\Models\PartCategory::all() as $c)
              <option value="{{ $c->category_name }}">{{ $c->category_name }}</option>
            @endforeach
            <option value="__NEW__" style="font-weight:bold;">+ New category</option>
          </select>
          <input id="m-cat-new" type="text" placeholder="New category..." style="display:none; width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
        </div>
        <div style="flex:1.5; min-width:180px; position:relative;">
          <label style="display:block; font-size:11px; color:var(--muted); margin-bottom:4px; font-weight:500; letter-spacing:0.02em;">Component</label>
          <select id="m-comp-sel" required onchange="if(this.value==='__NEW__'){this.style.display='none';document.getElementById('m-comp-new').style.display='block';document.getElementById('m-comp-new').focus();document.getElementById('m-comp-new').setAttribute('required', 'required');this.removeAttribute('required');}" style="width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
            <option value="" disabled selected>Select...</option>
            @foreach(\App\Models\PartComponent::all() as $comp)
              <option value="{{ $comp->component_name }}">{{ $comp->component_name }}</option>
            @endforeach
            <option value="__NEW__" style="font-weight:bold;">+ New component</option>
          </select>
          <input id="m-comp-new" type="text" placeholder="New component..." style="display:none; width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
        </div>
        <div style="flex:2; min-width:200px;">
          <label style="display:block; font-size:11px; color:var(--muted); margin-bottom:4px; font-weight:500; letter-spacing:0.02em;">Description</label>
          <input id="m-desc" required style="width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
        </div>
        <div style="flex:1; min-width:120px;">
          <label style="display:block; font-size:11px; color:var(--muted); margin-bottom:4px; font-weight:500; letter-spacing:0.02em;">Part number</label>
          <input id="m-pn" style="width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
        </div>
        <div style="flex:0.8; min-width:80px;">
          <label style="display:block; font-size:11px; color:var(--muted); margin-bottom:4px; font-weight:500; letter-spacing:0.02em;">Price</label>
          <input id="m-price" type="number" step="0.01" style="width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
        </div>
        <div style="flex:1; min-width:140px; position:relative;">
          <label style="display:block; font-size:11px; color:var(--muted); margin-bottom:4px; font-weight:500; letter-spacing:0.02em;">Supplier</label>
          <select id="m-supplier-sel" onchange="if(this.value==='__NEW__'){this.style.display='none';document.getElementById('m-supplier-new').style.display='block';document.getElementById('m-supplier-new').focus();}" style="width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
            <option value="" disabled selected>Select...</option>
            @foreach(\App\Models\Supplier::all() as $s)
              <option value="{{ $s->business_name }}">{{ $s->business_name }}</option>
            @endforeach
            <option value="__NEW__" style="font-weight:bold;">+ New supplier</option>
          </select>
          <input id="m-supplier-new" type="text" placeholder="New supplier..." style="display:none; width:100%; border:1px solid var(--line); border-radius:6px; padding:8px 10px; font-size:13px; color:var(--text); background:var(--panel);">
        </div>
        <div>
          <button type="submit" style="background:#c1720e; color:#fff; border:none; border-radius:6px; padding:8.5px 20px; font-weight:600; font-size:13px; cursor:pointer; box-shadow:0 1px 2px rgba(0,0,0,0.05); transition:background 0.2s;">Add</button>
          <button type="button" onclick="resetModelPartForm(this.closest('form'));" style="background:transparent; color:var(--muted); border:none; padding:8.5px 12px; font-weight:500; font-size:13px; cursor:pointer;">Cancel</button>
        </div>
      </form>
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
            <th style="width:10%">Supplier</th>
            <th style="width:2%"></th>
          </tr>
        </thead>
        <tbody id="bom-body">
          @forelse($partCategories as $category)
              @foreach($category->parts as $part)
                  <tr data-part-id="{{ $part->id }}">
                      <td style="font-weight: 500; color: #374151;">{{ $category->category_name }}</td>
                      <td style="font-weight: 600; color: #111827;">{{ $part->component ? $part->component->component_name : 'N/A' }}</td>
                      <td style="color: #4b5563;">{{ $part->description }}</td>
                      <td style="font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 12px; color: #6b7280;">
                        <span id="pn-val-{{ $part->id }}">{{ $part->part_number ?? 'N/A' }}</span>
                        <div id="pn-edit-{{ $part->id }}" style="display:none;">
                          <input type="text" id="pn-input-{{ $part->id }}" value="{{ $part->part_number === 'N/A' ? '' : $part->part_number }}" style="width:100px; border:1px solid var(--line); border-radius:4px; padding:4px 8px; font-size:12px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;">
                        </div>
                      </td>
                      <td style="font-weight: 600; color: #111827;">
                        <span id="price-val-{{ $part->id }}">{{ str_starts_with($part->price, '$') ? $part->price : '$' . number_format((float)$part->price, 2) }}</span>
                        <div id="price-edit-{{ $part->id }}" style="display:none;">
                          <input type="number" step="0.01" id="price-input-{{ $part->id }}" value="{{ str_replace(['$', ','], '', $part->price) }}" style="width:80px; border:1px solid var(--line); border-radius:4px; padding:4px 8px; font-size:12px;">
                        </div>
                      </td>
                      <td>
                        @if($part->supplier)
                          <span style="display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 6px; background: #f3f4f6; color: #374151; font-size: 12px; font-weight: 500;">
                            {{ $part->supplier->business_name }}
                          </span>
                        @else
                          <span style="color: #9ca3af; font-style: italic;">N/A</span>
                        @endif
                      </td>
                      <td style="text-align:right; white-space:nowrap;">
                        <div id="actions-display-{{ $part->id }}">
                          <button onclick="editModelPart({{ $part->id }})" style="background:transparent; border:none; color:#9ca3af; cursor:pointer; padding:4px; font-size:14px; opacity:0.6; transition:opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'" title="Edit part">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button onclick="deleteModelPart({{ $part->id }}, this)" style="background:transparent; border:none; color:#ef4444; cursor:pointer; padding:4px; font-size:14px; opacity:0.6; transition:opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'" title="Remove part">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                        <div id="actions-edit-{{ $part->id }}" style="display:none; gap:4px; justify-content:flex-end;">
                          <button onclick="saveModelPart({{ $part->id }})" style="background:#10b981; color:#fff; border:none; border-radius:4px; padding:4px 8px; cursor:pointer; font-size:11px;"><i class="fas fa-check"></i></button>
                          <button onclick="cancelEditModelPart({{ $part->id }})" style="background:transparent; border:none; color:#6b7280; cursor:pointer; font-size:12px; padding:4px;"><i class="fas fa-times"></i></button>
                        </div>
                      </td>
                  </tr>
              @endforeach
          @empty
              <tr><td colspan="7" style="text-align:center; padding: 32px 24px; color: #6b7280; font-size: 14px;">No parts found.</td></tr>
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
  render();
}

function onColDragOver(e) {
  if (!dragState) return;
  const colIdx = Number(e.currentTarget.dataset.statusIdx);
  if (colIdx !== dragState.currentIdx) {
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
  if (colIdx === dragState.currentIdx) return;
  e.preventDefault();
  const part = categories[dragState.ci].parts.find(p => p.id === dragState.pid);
  const oldStatus = part.status;
  const newStatus = STATUSES[colIdx].key;
  part.status = newStatus;

  fetch(window.AppUrl + `/builds/parts/${part.id}/status`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify({ status: newStatus, _token: '{{ csrf_token() }}' })
  }).then(res => {
    if (!res.ok) throw new Error('HTTP ' + res.status);
    return res.json();
  }).catch(err => {
    console.error(err);
    alert('Error saving status: ' + err.message + '. Try refreshing the page.');
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
      <div class="board-wrapper">
        <div class="board"></div>
      </div>
    `;
    root.appendChild(el);

    const board = el.querySelector('.board');
    STATUSES.forEach((s, si) => {
      const items = cat.parts.filter(p => p.status === s.key);
      const col = document.createElement('div');
      col.className = 'col-wrapper';
      col.innerHTML = `<div class="col-head">${s.label}<span class="col-count">${items.length}</span></div>`;
      const body = document.createElement('div');
      body.className = 'col-body';
      body.dataset.statusIdx = si;
      body.addEventListener('dragenter', e => {
        if (dragState && Number(e.currentTarget.dataset.statusIdx) !== dragState.currentIdx) {
          e.preventDefault();
        }
      });
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
  if (!sel) return;
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

function inlineAddPart(e, ci) {
  e.preventDefault();
  const g = id => document.getElementById(`g-${id}-${ci}`);
  const comp = g('comp').value.trim(), desc = g('desc').value.trim();
  if (!comp || !desc) return;
  const catName = categories[ci].name;

  const payload = {
    category: catName,
    component: comp,
    description: desc,
    part_number: g('pn').value.trim() || 'N/A',
    price: Number(g('price').value) || 0,
    supplier: g('supplier').value.trim() || 'N/A',
    status: 'procurement',
    _token: '{{ csrf_token() }}'
  };

  fetch(window.AppUrl + `/builds/${activeBuildId}/parts`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(payload)
  })
  .then(res => res.json())
  .then(p => {
    const b = buildCards.find(x => x.id === activeBuildId);
    if (!b.parts) b.parts = [];
    b.parts.push(p);

    g('comp').value = ''; g('desc').value = ''; g('pn').value = ''; g('price').value = ''; g('supplier').value = '';
    
    const form = e.target;
    form.style.display = 'none';
    form.previousSibling.style.display = 'block';
    render();
  })
  .catch(err => {
    console.error(err);
    alert('Error adding part.');
  });
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
    fetch(`{{ url('builds') }}/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      },
      body: JSON.stringify({ name: newName })
    }).then(res => {
      if(res.ok) {
        b.name = newName;
        renderBuildCards();
      } else {
        alert("Error updating build name.");
      }
    }).catch(err => {
      alert("Error updating build name.");
    });
  }
}

function deleteBuild(id) {
  document.querySelectorAll('[id^="build-menu-"]').forEach(m => m.style.display = 'none');
  if(confirm("Are you sure you want to delete this build?")) {
    fetch(`{{ url('builds') }}/${id}`, {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      }
    }).then(res => {
      if(res.ok) {
        const idx = buildCards.findIndex(x => x.id === id);
        if(idx !== -1) {
          buildCards.splice(idx, 1);
          renderBuildCards();
        }
      } else {
        alert("Error deleting build.");
      }
    }).catch(err => {
      alert("Error deleting build.");
    });
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
const PROCESS = {!! $masterTemplateProcess->toJson() !!};

function opStepCount(op) { return op.steps.length; }
function stationStepCount(st) { return st.operations.reduce((a,o)=>a+opStepCount(o),0); }

function renderProcessGeneric(wrapId, data, interactive) {
  let bId = activeBuildId;
  if (wrapId === 'proc-template-wrap') {
      bId = 'master';
  }
  initBuildProcess(wrapId, data, interactive, buildCards, bId);
}

function procSelectStation(wrapId, stId) {
  const wrap = document.getElementById(wrapId);
  wrap._selected = { stId, opIdx: 0 };
  if (wrapId === 'proc-template-wrap') renderProcessGeneric(wrapId, PROCESS, true);
  else renderProcessGeneric(wrapId, activeBuildProcessData(), true);
}

function procSelectOp(wrapId, stId, opIdx, evt) {
  evt.stopPropagation();
  const wrap = document.getElementById(wrapId);
  wrap._selected = { stId, opIdx };
  if (wrapId === 'proc-template-wrap') renderProcessGeneric(wrapId, PROCESS, true);
  else renderProcessGeneric(wrapId, activeBuildProcessData(), true);
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
  renderProcessGeneric('proc-template-wrap', PROCESS, true);
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

function addModelPart(e, vid) {
  e.preventDefault();
  const g = id => document.getElementById(`m-${id}`);
  
  const getVal = (id) => {
    const sel = document.getElementById(`m-${id}-sel`);
    if(sel) {
      if(sel.value === '__NEW__') return document.getElementById(`m-${id}-new`).value.trim();
      return sel.value.trim();
    }
    return g(id) ? g(id).value.trim() : '';
  };

  const payload = {
    category: getVal('cat'),
    component: getVal('comp'),
    description: g('desc').value.trim(),
    part_number: g('pn').value.trim() || 'N/A',
    price: Number(g('price').value) || 0,
    supplier: getVal('supplier') || 'N/A',
    _token: '{{ csrf_token() }}'
  };

  fetch(window.AppUrl + `/vehicles/${vid}/parts`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(payload)
  })
  .then(res => res.json())
  .then(p => {
    const tbody = document.getElementById('bom-body');
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td style="font-weight: 500; color: #374151;">${p.category}</td>
      <td style="font-weight: 600; color: #111827;">${p.component}</td>
      <td style="color: #4b5563;">${p.description}</td>
      <td style="font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 12px; color: #6b7280;">
        <span id="pn-val-${p.id}">${p.part_number}</span>
        <div id="pn-edit-${p.id}" style="display:none;">
          <input type="text" id="pn-input-${p.id}" value="${p.part_number === 'N/A' ? '' : p.part_number}" style="width:100px; border:1px solid var(--line); border-radius:4px; padding:4px 8px; font-size:12px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;">
        </div>
      </td>
      <td style="font-weight: 600; color: #111827;">
        <span id="price-val-${p.id}">$${Number(p.price).toFixed(2)}</span>
        <div id="price-edit-${p.id}" style="display:none;">
          <input type="number" step="0.01" id="price-input-${p.id}" value="${p.price}" style="width:80px; border:1px solid var(--line); border-radius:4px; padding:4px 8px; font-size:12px;">
        </div>
      </td>
      <td>
        ${p.supplier ? `<span style="display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 6px; background: #f3f4f6; color: #374151; font-size: 12px; font-weight: 500;">${p.supplier}</span>` : `<span style="color: #9ca3af; font-style: italic;">N/A</span>`}
      </td>
      <td style="text-align:right; white-space:nowrap;">
        <div id="actions-display-${p.id}">
          <button onclick="editModelPart(${p.id})" style="background:transparent; border:none; color:#9ca3af; cursor:pointer; padding:4px; font-size:14px; opacity:0.6; transition:opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'" title="Edit part">
            <i class="fas fa-edit"></i>
          </button>
          <button onclick="deleteModelPart(${p.id}, this)" style="background:transparent; border:none; color:#ef4444; cursor:pointer; padding:4px; font-size:14px; opacity:0.6; transition:opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'" title="Remove part">
            <i class="fas fa-trash"></i>
          </button>
        </div>
        <div id="actions-edit-${p.id}" style="display:none; gap:4px; justify-content:flex-end;">
          <button onclick="saveModelPart(${p.id})" style="background:#10b981; color:#fff; border:none; border-radius:4px; padding:4px 8px; cursor:pointer; font-size:11px;"><i class="fas fa-check"></i></button>
          <button onclick="cancelEditModelPart(${p.id})" style="background:transparent; border:none; color:#6b7280; cursor:pointer; font-size:12px; padding:4px;"><i class="fas fa-times"></i></button>
        </div>
      </td>
    `;
    tbody.appendChild(tr);
    
    // Hide empty message if exists
    const emptyRow = tbody.querySelector('td[colspan="7"]');
    if (emptyRow) emptyRow.parentElement.remove();

    if (p.inserted_build_parts && Array.isArray(p.inserted_build_parts)) {
      p.inserted_build_parts.forEach(bp => {
        const build = buildCards.find(b => b.id === bp.vehicle_model_id);
        if (build) {
          if (!build.parts) build.parts = [];
          build.parts.push(bp);
        }
      });
      // Re-render build parts if we are currently viewing one
      if (activeBuildId) render();
    }

    resetModelPartForm(e.target);
  })
  .catch(err => {
    console.error(err);
    alert('Error adding model part.');
  });
}

function deleteModelPart(partId, btn) {
  if(!confirm('Are you sure you want to remove this part from the model?')) return;
  fetch(window.AppUrl + `/vehicles/parts/${partId}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
  })
  .then(r => r.json())
  .then(res => {
    btn.closest('tr').remove();
    const tbody = document.getElementById('bom-body');
    if (tbody.children.length === 0) {
      tbody.innerHTML = `<tr><td colspan="7" style="text-align:center; padding: 32px 24px; color: #6b7280; font-size: 14px;">No parts found.</td></tr>`;
    }
    if (res.deleted_build_part_ids && Array.isArray(res.deleted_build_part_ids)) {
      buildCards.forEach(b => {
        if (b.parts) {
          b.parts = b.parts.filter(p => !res.deleted_build_part_ids.includes(p.id));
        }
      });
      if (activeBuildId) render();
    }
  }).catch(err => {
    console.error(err);
    alert('Failed to remove part.');
  });
}

function editModelPart(id) {
  document.getElementById(`pn-val-${id}`).style.display = 'none';
  document.getElementById(`price-val-${id}`).style.display = 'none';
  document.getElementById(`actions-display-${id}`).style.display = 'none';
  
  document.getElementById(`pn-edit-${id}`).style.display = 'block';
  document.getElementById(`price-edit-${id}`).style.display = 'block';
  document.getElementById(`actions-edit-${id}`).style.display = 'flex';
  document.getElementById(`price-input-${id}`).focus();
}

function cancelEditModelPart(id) {
  document.getElementById(`pn-val-${id}`).style.display = 'inline';
  document.getElementById(`price-val-${id}`).style.display = 'inline';
  document.getElementById(`actions-display-${id}`).style.display = 'block';
  
  document.getElementById(`pn-edit-${id}`).style.display = 'none';
  document.getElementById(`price-edit-${id}`).style.display = 'none';
  document.getElementById(`actions-edit-${id}`).style.display = 'none';
}

function saveModelPart(id) {
  const price = document.getElementById(`price-input-${id}`).value;
  const pn = document.getElementById(`pn-input-${id}`).value;
  
  fetch(window.AppUrl + `/vehicles/parts/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
    body: JSON.stringify({ price: price, part_number: pn })
  })
  .then(r => r.json())
  .then(res => {
    if(res.success) {
      document.getElementById(`price-val-${id}`).innerText = '$' + Number(res.price).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
      document.getElementById(`pn-val-${id}`).innerText = res.part_number || 'N/A';
      cancelEditModelPart(id);
      
      if (res.updated_build_part_ids && Array.isArray(res.updated_build_part_ids)) {
        buildCards.forEach(b => {
          if (b.parts) {
            b.parts.forEach(p => {
              if (res.updated_build_part_ids.includes(p.id)) {
                p.price = res.price;
                p.part_number = res.part_number || 'N/A';
              }
            });
          }
        });
        if (activeBuildId) render();
      }
    }
  })
  .catch(err => {
    console.error(err);
    alert('Failed to update part.');
  });
}

function resetModelPartForm(form) {
  form.reset();
  ['cat', 'comp', 'supplier'].forEach(id => {
    const sel = document.getElementById(`m-${id}-sel`);
    const newInp = document.getElementById(`m-${id}-new`);
    if(sel) {
      sel.style.display = 'block';
      sel.setAttribute('required', 'required');
    }
    if(newInp) {
      newInp.style.display = 'none';
      newInp.removeAttribute('required');
    }
  });
  
  // Make supplier select not required
  const sSel = document.getElementById('m-supplier-sel');
  if(sSel) sSel.removeAttribute('required');

  document.getElementById('add-model-part-form').style.display = 'none';
  document.getElementById('add-model-part-btn').style.display = 'flex';
}

render();

renderBuildCards();
renderProcessTemplate();
</script>
</div>
</div>
@endsection
