@extends('layouts.layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('components.landingpagenavbar')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">



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
        background: #27272a;
        border: 2px solid #b4975a;
        border-radius: 0.5rem;
        height: 175px;
        
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
        position: relative;
        overflow: hidden;
    }
    .fig-block:hover {
        background: #3f3f46;
        transform: scale(1.02);
    }
    .fig-overlay {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        z-index: 10;
        position: relative;
        transition: all 0.3s ease;
        padding: 10px;
    }
    .fig-block.has-image .fig-overlay {
        position: absolute;
        bottom: -100%;
        height: auto;
        padding: 15px 0;
        background: rgba(0, 0, 0, 0.75);
    }
    .fig-block.has-image:hover .fig-overlay {
        bottom: 0;
    }
    .fig-title-num {
        color: #b4975a;
        font-weight: 700;
        margin-bottom: 4px;
        z-index: 10;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    }
    .fig-title-text {
        color: #ffffff;
        font-size: 12px;
        margin-bottom: 12px;
        z-index: 10;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    }
    .fig-pending {
        color: #71717a;
        font-size: 11px;
        font-style: italic;
        z-index: 10;
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
    .fig-block input[type="file"] {
        display: none;
    }
    .fig-loading {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.7);
        color: white;
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
        border-bottom-left-radius: 8px;
        width: 24px;
        height: 24px;
        line-height: 22px;
        text-align: center;
        font-size: 14px;
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
        background: linear-gradient(145deg, #1a1a1d 0%, #0f0f10 100%);
        border: 1px solid #2e2e32;
        border-radius: 1.2rem;
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        box-shadow: 0 8px 32px rgba(0,0,0,0.5), inset 0 1px 0 rgba(180,151,90,0.15);
        transition: box-shadow 0.3s ease;
    }
    .measurement-card:hover {
        box-shadow: 0 12px 48px rgba(0,0,0,0.7), 0 0 0 1px rgba(180,151,90,0.3), inset 0 1px 0 rgba(180,151,90,0.2);
    }
    .measurement-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .measurement-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #b4975a, #d4b87a);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(180,151,90,0.4);
    }
    .measurement-icon svg {
        width: 20px;
        height: 20px;
        stroke: #1a1a1d;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .measurement-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #f5f5f5;
        letter-spacing: 0.03em;
        line-height: 1.2;
    }
    .measurement-title span {
        display: block;
        font-size: 0.7rem;
        font-weight: 500;
        color: #b4975a;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-bottom: 2px;
    }
    .measurement-divider {
        height: 1px;
        background: linear-gradient(90deg, #b4975a, transparent);
        border: none;
        margin: 0;
    }
    .measurement-desc {
        font-size: 0.8rem;
        color: #a1a1aa;
        line-height: 1.7;
        text-align: justify;
    }
    .measurement-img-wrap {
        position: relative;
        border-radius: 0.75rem;
        overflow: hidden;
        border: 1px solid #3f3f46;
        background: #111;
        flex: 1;
    }
    .measurement-img-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 60%, rgba(180,151,90,0.08) 100%);
        z-index: 1;
        pointer-events: none;
    }
    .measurement-img-wrap img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }
    .measurement-img-wrap:hover img {
        transform: scale(1.04);
    }
    .measurement-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(180,151,90,0.15);
        border: 1px solid rgba(180,151,90,0.4);
        color: #b4975a;
        font-size: 0.6rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 3px 8px;
        border-radius: 4px;
        z-index: 2;
        backdrop-filter: blur(4px);
    }
</style>


<div class="w-full overflow-hidden">
    <div class="w-full px-4 mx-auto xl:px-8 max-w-[1920px]">
        <div class="flex flex-wrap">
            <!-- vehical details  table  -->
            <div class="w-full p-10 rounded bg-gray xl:w-4/12">
                {{-- <table class="bg-white rounded shadow-md md:text-sm"> --}}
                    <table class="min-w-full text-sm bg-white">

                        <thead class="mt-4 bg-gray-100 rounded-t-lg">
                            <tr>
                                <th class="px-8 py-6">Item</th>
                                <th class="px-8 py- text-start">Vehicle Information</th>
                                <th class="px-8 py-6" colspan="2">Details</th>
                            </tr>
                            <tr class="py-8 border-b-4 border-transparent">

                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">Variant 1</th>
                                <th class="px-4 py-2">Variant 2</th>
                            </tr>
                        </thead>

                        <td class="px-2 py-4">

                            <tbody>
                                @foreach ($vehicleInfo as $index => $info)
                                <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                                    <td class="px-2 py-2">{{ $info->item_number }}</td>
                                    <td class="px-2 py-2">{{ $info->label }}</td>
                                    <td class="px-2 py-2">{{ $info->variant1 }}</td>
                                    <td class="px-2 py-2">{{ $info->variant2 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </td>
                       
                    </table>
            </div>
            <div class="w-full p-4 xl:w-5/12">
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

                <div class="p-6 bg-black shadow xl:p-8 rounded-[5%] h-full flex flex-col justify-center">
                    <div class="grid grid-cols-3 gap-3 sm:gap-4">
                        @foreach(range(1, 9) as $num)
                            @php $hasImg = isset($vehicleImages) && isset($vehicleImages[$num]); @endphp
                            <label class="fig-block {{ $hasImg ? 'has-image' : '' }}" id="fig-block-{{ $num }}">
                                <div class="fig-overlay">
                                    <div class="fig-title-num">FIG {{ $num }}</div>
                                    <div class="fig-title-text">{{ $figures[$num] }}</div>
                                    <div class="fig-pending" id="fig-pending-{{ $num }}" style="display: {{ $hasImg ? 'none' : 'block' }};">[ PHOTOGRAPHY PENDING ]</div>
                                </div>
                                <img src="{{ $hasImg ? ($vehicleImages[$num]->image_url ?? asset('storage/' . $vehicleImages[$num]->image_path)) : '' }}" class="fig-img" id="fig-img-{{ $num }}" style="display: {{ $hasImg ? 'block' : 'none' }};">
                                <div class="fig-remove" id="fig-remove-{{ $num }}" style="display: {{ $hasImg ? 'block' : 'none' }};" onclick="removeFigureImage(event, {{ $num }})">&times;</div>
                                <div class="fig-loading" id="fig-loading-{{ $num }}">Uploading...</div>
                                <input type="file" accept="image/*" onchange="uploadFigureImage(this, {{ $num }})">
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!---------------- Measurement -------------------------- -->
            <div class="w-full p-4 xl:w-3/12">
                <div class="measurement-card">

                    <div class="measurement-header">
                        <div class="measurement-icon">
                            <svg viewBox="0 0 24 24"><path d="M3 3h18M3 9h18M3 15h18M3 21h18M9 3v18M15 3v18"/></svg>
                        </div>
                        <div class="measurement-title">
                            <span>Technical</span>
                            Measurements
                        </div>
                    </div>

                    <hr class="measurement-divider">

                    <p class="measurement-desc">Precise dimensional specifications and proportional blueprints for this vehicle. All measurements are factory-certified and verified against OEM documentation.
                    </p>

                    <div class="measurement-img-wrap">
                        <div class="measurement-badge">Blueprint View</div>
                        <img src="{{ asset('images/image006.jpg') }}" alt="Vehicle Measurement Specifications">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div>


        <section class='mx-10 py'>

            <div class="container px-6 mx-auto">
                <div class="flex flex-wrap">
                    <h1 class="text-2xl font-bold">Specifications</h1>



                </div>
            </div>

        </section>

        
        <section class="mx-10 py">
           
                <div class="flex items-center justify-center w-full mb-4 bg-white border-b border-gray-300 tab">
                    @foreach($categories as $index => $category)
                        <button class="px-4 py-2 text-gray-600 tab-links hover:text-gray-800 focus:outline-none {{ $index === 0 ? 'active' : '' }}" onclick="openTab(event, '{{ Str::slug($category->name) }}')">{{ $category->name }}</button>
                    @endforeach
                </div>

                <div class="overflow-hidden bg-white shadow-md justify-between-5xl">
                    @foreach($categories as $index => $category)
                    <div id="{{ Str::slug($category->name) }}" class="tab-content {{ $index === 0 ? '' : 'hidden' }}">
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full md:w-1/3">
                                <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="{{ $category->name }}" class="w-full rounded shadow">
                            </div>
                            <div class="w-full p-4 md:w-2/3">
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div class="mx-10 ">
                                        <table class="w-full text-sm bg-white rounded shadow-md ">
                                            <div class="mx-10">
                                                <thead class="mx-10 border-b-2 w-60">
                                                    <tr class="items-start text-start">
                                                        <th class="items-start w-3/12 px-8 py-6 text-left">{{ $category->name }}</th>
                                                    </tr>
                                                </thead>
                                            </div>
                                            <tbody>
                                                @forelse($category->specifications as $spec)
                                                <tr>
                                                    @if(empty($spec->value))
                                                    <td colspan="2" class="items-start px-2 py-2 border-b border-black text-start">{{ $spec->description }}</td>
                                                    @else
                                                    <td class="items-start px-2 py-2 border-b border-black text-start">{{ $spec->description }}</td>
                                                    <td class="items-end px-2 py-2 border-b border-black text-end">{{ $spec->value }}</td>
                                                    @endif
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="2" class="px-2 py-4 text-center text-gray-500">No data for this section</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

        </section>


 <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tab-links");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" border-b-2 border-black", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " border-b-2 border-black";
            }
    
            //set the first tab to be displayed by default
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".tab-links").click();
            });
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
    </div>
</div>


@endsection
