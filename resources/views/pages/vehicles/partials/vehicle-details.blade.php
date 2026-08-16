<style>
    @media (max-width: 1366px) {
        .tableee {
            width: 100%;
        }
    }

    @media (max-width: 1440px) {
        .tableee {
            width: 100%;
        }
    }

    @media (max-width: 1280px) {
        .tableee {
            width: 100%;
        }
    }

    @media (max-width: 1024px) {
        .tableee {
            width: 100%;
        }
    }

    .tableee {
        width: 80%;
        /* Adjust the percentage as needed */
        margin: auto;
        /* Center the table horizontally */
    }

    /* Media queries for adjusting table width on smaller screens */
    @media (max-width: 1366px) {
        .tableee {
            width: 100%;
        }
    }

    @media (max-width: 1366px) {
        .tableee {
            width: 95%;
        }
    }


    @media (max-width: 1920px) {
        .tableee {
            width: 95%;
        }
    }

    .tableee {
        width: 95%;
        /* Adjust the percentage as needed */
        margin: auto;
        /* Center the table horizontally */
    }

    @media (max-width: 1366px) {
        .tableee {
            width: 100%;
        }
    }

    /* For smaller resolutions like 1024x768 */
    @media (max-width: 1024px) {
        .tableee {
            width: 100%;
        }
    }
    
    .fig-block {
        background: #27272a; /* Dark gray for pending state */
        border: 1px solid #3f3f46;
        border-radius: 0.75rem;
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    }
    .fig-block:hover {
        border-color: #b4975a;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.2), 0 4px 6px -2px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    .fig-overlay {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        padding: 1rem;
        z-index: 1;
        background: #27272a;
    }
    .fig-block.has-image .fig-overlay {
        display: none;
    }
    .fig-title-num {
        color: #b4975a;
        font-weight: 700;
        font-size: 11px;
        margin-bottom: 2px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .fig-title-text {
        color: #ffffff;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
    }
    .fig-pending {
        color: #a1a1aa;
        font-size: 10px;
        font-style: italic;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }
    .fig-pending svg {
        width: 16px;
        height: 16px;
        stroke: #9ca3af;
        fill: none;
    }
    .fig-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 5;
    }
    .fig-zoom {
        position: absolute;
        bottom: 8px;
        right: 8px;
        width: 24px;
        height: 24px;
        background: #b4975a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .fig-zoom svg {
        width: 12px;
        height: 12px;
    }
    .fig-block input[type="file"] {
        display: none;
    }
    .fig-loading {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255,255,255,0.8);
        color: #111;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 20;
        display: none;
    }
    .fig-remove {
        position: absolute;
        top: 0;
        right: 0;
        background: rgba(220, 38, 38, 0.9);
        color: white;
        border-bottom-left-radius: 6px;
        width: 20px;
        height: 20px;
        line-height: 18px;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        z-index: 15;
        transition: background 0.2s;
    }
    .fig-remove:hover {
        background: #b91c1c;
    }

    /* ===== Measurement Section ===== */
    .measurement-card {
        background: linear-gradient(145deg, #0a0a0a 0%, #2a2a2a 60%, #ffffff 100%);
        border: 1px solid rgba(180, 151, 90, 0.4);
        border-radius: 1rem;
        padding: 1.5rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .measurement-card:hover {
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.4), 0 10px 10px -5px rgba(0,0,0,0.2);
        transform: translateY(-4px);
        border-color: #b4975a;
    }
    .measurement-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }
    .measurement-icon {
        width: 32px;
        height: 32px;
        background: #27272a;
        border: 1px solid #3f3f46;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b4975a;
    }
    .measurement-icon svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        fill: none;
    }
    .measurement-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: #ffffff;
        line-height: 1.2;
    }
    .measurement-title span {
        display: block;
        font-size: 0.65rem;
        font-weight: 600;
        color: #a1a1aa;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 2px;
    }
    .measurement-desc {
        font-size: 0.75rem;
        color: #a1a1aa;
        line-height: 1.6;
        margin-bottom: 1rem;
    }
    .btn-blueprint {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #b4975a;
        color: #ffffff;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 4px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 1rem;
        align-self: flex-start;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-blueprint:hover {
        background: #9a7f45;
    }
    .measurement-img-wrap {
        border-radius: 0.5rem;
        overflow: hidden;
        background: #000;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        max-height: 220px;
    }
    .measurement-img-wrap img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }
    
    .fade-in { animation: fadeIn 0.4s ease-out forwards; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 3px;
        height: 3px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent; 
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: transparent; 
        border-radius: 4px;
    }
    .custom-scrollbar:hover::-webkit-scrollbar-thumb {
        background: #cbd5e1; 
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8; 
    }
</style>

<div class="w-full">
    <div class="w-full">
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 w-full">
            
            <!-- vehical details  table  -->
            <div class="xl:col-span-4 bg-white rounded-2xl shadow-sm border border-black overflow-hidden flex flex-col self-start hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <!-- Dark Header -->
                <div class="bg-[#1e1e1e] px-6 py-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#b4975a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h2 class="text-[#b4975a] font-bold text-xs uppercase tracking-widest">Core Specifications</h2>
                </div>
                <div class="p-2 overflow-auto max-h-[450px] custom-scrollbar">
                    <table class="min-w-full text-[11px] text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 font-semibold text-black uppercase tracking-wider">Item</th>
                                <th class="px-4 py-3 font-semibold text-black uppercase tracking-wider">Vehicle Information</th>
                                <th class="px-4 py-3 font-semibold text-black uppercase tracking-wider text-center">Variant 1</th>
                                <th class="px-4 py-3 font-semibold text-black uppercase tracking-wider text-center">Variant 2</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-black">
                            @foreach ($vehicleInfo as $index => $info)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 text-[#b4975a] font-bold">{{ str_pad($info->item_number, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $info->label }}</td>
                                <td class="px-4 py-3 text-center text-gray-600 font-medium">{{ $info->variant1 ?: '-' }}</td>
                                <td class="px-4 py-3 text-center text-gray-600 font-medium">{{ $info->variant2 ?: '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 9-Grid Images -->
            <div class="xl:col-span-5 flex flex-col self-start">
                @php
                $figures = [
                    1 => 'Front 3/4 Exterior',
                    2 => 'Rear 3/4 Exterior',
                    3 => 'Full-Length Side Profile',
                    4 => 'Dashboard / Front Interior',
                    5 => 'Rear Interior / Seats',
                    6 => 'Gauge Cluster Detail',
                    7 => 'Engine Bay View',
                    8 => 'Underbody View',
                    9 => 'Underbody - Fuel Tank Detail',
                ];
                @endphp

                <div class="grid grid-cols-3 gap-2">
                    @foreach(range(1, 9) as $num)
                        @php $hasImg = isset($vehicleImages) && isset($vehicleImages[$num]); @endphp
                        <label class="fig-block {{ $hasImg ? 'has-image' : '' }}" id="fig-block-{{ $num }}">
                            <div class="fig-overlay">
                                <div class="fig-title-num">FIG {{ $num }}</div>
                                <div class="fig-title-text">{{ $figures[$num] }}</div>
                                <div class="fig-pending" id="fig-pending-{{ $num }}" style="display: {{ $hasImg ? 'none' : 'flex' }};">
                                    [ PHOTOGRAPHY PENDING ]
                                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                            </div>
                            <img src="{{ $hasImg ? ($vehicleImages[$num]->image_url ?? asset('storage/' . $vehicleImages[$num]->image_path)) : '' }}" class="fig-img" id="fig-img-{{ $num }}" style="display: {{ $hasImg ? 'block' : 'none' }};">
                            
                            <div class="fig-zoom" id="fig-zoom-{{ $num }}" style="display: {{ $hasImg ? 'flex' : 'none' }};" onclick="openImageModal(event, 'fig-img-{{ $num }}')">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                            </div>
                            
                            <div class="fig-remove" id="fig-remove-{{ $num }}" style="display: {{ $hasImg ? 'block' : 'none' }};" onclick="removeFigureImage(event, {{ $num }})">&times;</div>
                            <div class="fig-loading" id="fig-loading-{{ $num }}">Uploading...</div>
                            <input type="file" accept="image/*" onchange="uploadFigureImage(this, {{ $num }})">
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Technical Measurements -->
            <div class="xl:col-span-3 flex flex-col self-start">
                <div class="measurement-card">
                    <div class="measurement-header">
                        <div class="measurement-icon">
                            <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        </div>
                        <div class="measurement-title">
                            <span>Technical</span>
                            Measurements
                        </div>
                    </div>
                    <p class="measurement-desc">Precise dimensional specifications and proportional blueprints for this vehicle. All measurements are factory-certified and verified against OEM documentation.</p>
                    <div class="btn-blueprint" onclick="openImageModal(event, 'blueprint-img')">Blueprint View &rarr;</div>
                    <div class="measurement-img-wrap cursor-pointer" onclick="openImageModal(event, 'blueprint-img')">
                        <img src="{{ asset('images/image006.jpg') }}" alt="Blueprint" id="blueprint-img">
                        <div class="fig-zoom" style="display: flex;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>


        <section class='py-8'>
            <div class="w-full">
                
                <!-- Header & Tabs -->
                <div class="mb-8 flex flex-col items-center">
                    <h1 class="text-2xl font-bold text-gray-900 mb-6 w-full text-left">Specifications</h1>
                    <div class="flex flex-wrap items-center justify-center gap-3 w-full">
                        @foreach($categories as $index => $category)
                            <button class="px-6 py-2 rounded-full text-xs font-bold tracking-wide border transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 active:scale-95 tab-links {{ $index === 0 ? 'bg-[#111] text-white border-[#b4975a] shadow-md shadow-[#b4975a]/20' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50 hover:border-[#b4975a] hover:text-[#b4975a] hover:shadow-md' }}" onclick="openTab(event, '{{ Str::slug($category->name) }}')">
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 w-full relative min-h-[400px]">
                    <!-- Left Side: Specs Content (Image + List) -->
                    <div class="xl:col-span-12">
                        @foreach($categories as $index => $category)
                        <div id="{{ Str::slug($category->name) }}" class="tab-content bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200 overflow-hidden w-full h-full {{ $index === 0 ? 'fade-in' : 'hidden' }}">
                            <div class="flex flex-col lg:flex-row items-stretch h-full">
                                
                                <!-- Image with dark overlay -->
                                <div class="w-full lg:w-5/12 relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent z-10 pointer-events-none"></div>
                                    <img src="{{ asset('images/dimensions-and-weight.png') }}" class="w-full h-full object-cover min-h-[350px]">
                                    <div class="absolute bottom-6 right-6 z-20 bg-[#111] text-white px-4 py-2 rounded-lg flex items-center gap-2 text-xs border border-gray-800">
                                        <svg class="w-4 h-4 text-[#b4975a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M3 13h18M5 5h14"></path></svg>
                                        <span>Built for<br>Precision</span>
                                    </div>
                                </div>

                                <!-- Stylized List -->
                                <div class="w-full lg:w-7/12 p-8 flex flex-col justify-start">
                                    <div class="flex items-center gap-4 mb-8 flex-shrink-0">
                                        <div class="w-12 h-12 rounded-full border border-[#b4975a] flex items-center justify-center bg-[#fefce8]">
                                            <svg class="w-6 h-6 text-[#b4975a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900 uppercase">{{ $category->name }}</h3>
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-4 overflow-y-auto custom-scrollbar pr-4 max-h-[280px]">
                                        @forelse($category->specifications as $spec)
                                        <div class="flex items-center gap-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                                            <div class="w-6 h-6 rounded flex items-center justify-center flex-shrink-0 bg-gray-50 border border-gray-200">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </div>
                                            <div class="flex-1 text-sm text-gray-600">
                                                @if(empty($spec->value))
                                                    {{ $spec->description }}
                                                @else
                                                    <span class="font-medium text-gray-900">{{ $spec->description }}</span> <span class="text-gray-300 mx-1">|</span> {{ $spec->value }}
                                                @endif
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="w-5 h-5 rounded-full border border-[#b4975a] flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-[#b4975a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="text-sm text-gray-500 italic">No specifications available.</div>
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </section>

        <script>
            function openTab(evt, tabName) {
                // Hide all tab content
                var tabcontent = document.getElementsByClassName("tab-content");
                for (var i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.add("hidden");
                    tabcontent[i].classList.remove("fade-in");
                }
                
                // Reset all tab buttons
                var tablinks = document.getElementsByClassName("tab-links");
                for (var i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("bg-[#111]", "text-white", "border-[#b4975a]", "shadow-md", "shadow-[#b4975a]/20");
                    tablinks[i].classList.add("bg-white", "text-gray-600", "border-gray-200", "hover:bg-gray-50", "hover:border-[#b4975a]", "hover:text-[#b4975a]", "hover:shadow-md");
                }
                
                // Show the active tab
                var activeTab = document.getElementById(tabName);
                if(activeTab) {
                    activeTab.classList.remove("hidden");
                    // Trigger reflow to restart animation
                    void activeTab.offsetWidth;
                    activeTab.classList.add("fade-in");
                }
                
                // Style the active button
                evt.currentTarget.classList.remove("bg-white", "text-gray-600", "border-gray-200", "hover:bg-gray-50", "hover:border-[#b4975a]", "hover:text-[#b4975a]", "hover:shadow-md");
                evt.currentTarget.classList.add("bg-[#111]", "text-white", "border-[#b4975a]", "shadow-md", "shadow-[#b4975a]/20");
            }
        </script> 


       


<script>
    async function uploadFigureImage(input, figureNumber) {
        if (!input.files || input.files.length === 0) return;
        
        const file = input.files[0];
        const formData = new FormData();
        formData.append('image', file);
        formData.append('figure_number', figureNumber);
        formData.append('title', 'Figure ' + figureNumber);
        formData.append('vehicle_id', 1);

        const loadingEl = document.getElementById('fig-loading-' + figureNumber);
        const imgEl = document.getElementById('fig-img-' + figureNumber);
        const pendingEl = document.getElementById('fig-pending-' + figureNumber);

        loadingEl.style.display = 'flex';

        try {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const response = await fetch(window.AppUrl + '/vehicle-images/upload', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                body: formData
            });

            const data = await response.json();
            
            if (data.success) {
                imgEl.src = data.image_url;
                imgEl.style.display = 'block';
                pendingEl.style.display = 'none';
                document.getElementById('fig-remove-' + figureNumber).style.display = 'block';
                document.getElementById('fig-block-' + figureNumber).classList.add('has-image');
            } else {
                alert(data.message || 'Upload failed');
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred during upload.');
        } finally {
            loadingEl.style.display = 'none';
            input.value = ''; // Reset input
        }
    }

    async function removeFigureImage(event, figureNumber) {
        event.preventDefault(); // Prevent opening file picker
        event.stopPropagation();
        
        if (!confirm('Are you sure you want to remove this image?')) {
            return;
        }

        const loadingEl = document.getElementById('fig-loading-' + figureNumber);
        const imgEl = document.getElementById('fig-img-' + figureNumber);
        const pendingEl = document.getElementById('fig-pending-' + figureNumber);
        const removeEl = document.getElementById('fig-remove-' + figureNumber);
        const inputEl = document.querySelector('#fig-block-' + figureNumber + ' input[type="file"]');

        loadingEl.style.display = 'flex';
        loadingEl.innerText = 'Removing...';

        try {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const response = await fetch(window.AppUrl + '/vehicle-images/remove', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    figure_number: figureNumber,
                    vehicle_id: 1
                })
            });

            const data = await response.json();
            
            if (data.success) {
                imgEl.src = '';
                imgEl.style.display = 'none';
                pendingEl.style.display = 'block';
                removeEl.style.display = 'none';
                inputEl.value = '';
                document.getElementById('fig-block-' + figureNumber).classList.remove('has-image');
            } else {
                alert(data.message || 'Remove failed');
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred while removing the image.');
        } finally {
            loadingEl.style.display = 'none';
            loadingEl.innerText = 'Uploading...';
        }
    }
</script>
    <!-- Image Zoom Modal -->
    <div id="imageZoomModal" class="fixed inset-0 z-[100] bg-black/90 hidden items-center justify-center p-4 opacity-0 transition-opacity duration-300 cursor-pointer" onclick="closeImageModal()">
        <button class="absolute top-6 right-6 text-white hover:text-[#b4975a] transition-colors" onclick="closeImageModal()">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <img id="zoomedImage" src="" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl transform scale-95 transition-transform duration-300 cursor-default" onclick="event.stopPropagation()">
    </div>

    <script>
        function openImageModal(event, imgElementId) {
            event.preventDefault();
            event.stopPropagation();
            const img = document.getElementById(imgElementId);
            if (img && img.src) {
                const modal = document.getElementById('imageZoomModal');
                const zoomedImg = document.getElementById('zoomedImage');
                zoomedImg.src = img.src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                // Trigger reflow for animation
                void modal.offsetWidth;
                modal.classList.remove('opacity-0');
                zoomedImg.classList.remove('scale-95');
                zoomedImg.classList.add('scale-100');
            }
        }

        function closeImageModal() {
            const modal = document.getElementById('imageZoomModal');
            const zoomedImg = document.getElementById('zoomedImage');
            modal.classList.add('opacity-0');
            zoomedImg.classList.remove('scale-100');
            zoomedImg.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                zoomedImg.src = '';
            }, 300);
        }
    </script>
    </div>
</div>
