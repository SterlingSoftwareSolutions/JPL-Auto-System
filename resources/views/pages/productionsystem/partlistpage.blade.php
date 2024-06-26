@extends('layouts.layout')

@section('content')
    @include('components.landingpagenavbar')


    <div class="flex flex-wrap">
        <div class="w-full max-h-screen overflow-y-auto bg-white md:w-[95%]">
            <link rel="stylesheet" href="{{ asset('css/partlist.css') }}">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <style>
                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.5);
                    justify-content: center;
                    align-items: center;
                }

                .modal-content-container {
                    position: relative;
                    width: 100%;
                    max-width: 600px;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                }

                .modal-content {
                    display: block;
                    max-width: 70%;
                    height: auto;
                    margin: 0 auto;
                }

                .close-button {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    width: 32px;
                    height: 32px;
                    cursor: pointer;
                }

                #caption {
                    margin-top: 10px;
                    text-align: center;
                    color: #333;
                }
            </style>

            <div class="mx-10">

                <table class="w-full text-sm bg-white rounded shadow-md">
                    <div class="flex">
                        <div class="mt-5 ml-8">
                            <button class="w-20 h-10 text-2xl font-bold text-white bg-black rounded-lg">Body</button>
                        </div>
                        <div class="flex items-end justify-end flex-grow mt-5 mr-8">
                            <button id="openPopupBtn"
                                class="h-10 px-6 text-sm font-bold text-white bg-gray-500 rounded-sm">+ ADD PART</button>
                        </div>
                    </div>
                    <div class="mx-10">
                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>


                    @php
                        $showCategory = true;
                    @endphp

                    @php
                        $previousComponentName = null;
                    @endphp
                    @foreach ($bodyParts as $bodyPart)
                        <tbody>
                            <tr class="border-b border-black">
                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $bodyPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif
                                @if ($previousComponentName !== $bodyPart->component->component_name)
                                    <td class="px-8 py-2">{{ $bodyPart->component->component_name }}</td>
                                    @php
                                        $previousComponentName = $bodyPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2">{{ $bodyPart->description }}</td>
                                <td class="px-8 py-2">{{ $bodyPart->part_number }}</td>
                                <td class="px-8 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16"
                                        id="myImg-{{ $bodyPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $bodyPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $bodyPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2">{{ $bodyPart->price }}</td>
                                <td class="px-8 py-2">{{ $bodyPart->supplier }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>


            </div>




            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Labour
                        </button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>



                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>


                    @php
                        $showCategory = true;
                    @endphp


                    @php
                        $previousComponentName = null;
                    @endphp

                    {{-- body 1 --}}
                    @foreach ($labourParts as $labourPart)
                        <tbody>
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $labourPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif
                                @if ($previousComponentName !== $labourPart->component->component_name)
                                    <td class="px-8 py-2">{{ $labourPart->component->component_name }}</td>
                                    @php
                                        $previousComponentName = $labourPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2">{{ $labourPart->description }}</td>
                                <td class="px-8 py-2">{{ $labourPart->part_number }}</td>
                                <td class="px-8 py-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16"
                                        id="myImg-{{ $labourPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $labourPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $labourPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2">{{ $labourPart->price }} </td>
                                <td class="px-8 py-2">{{ $labourPart->supplier }}</td>




                            </tr>




                        </tbody>
                    @endforeach
                    {{-- body 1 end --}}



                </table>

            </div>


            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Power Plant
                        </button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>



                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>




                    @php
                        $showCategory = true;
                    @endphp

                    @php
                        $previousComponentName = null;
                    @endphp



                    {{-- body 1 --}}
                    @foreach ($powerPlantParts as $powerPlantPart)
                        <tbody>
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $powerPlantPart->category->category_name }}</td>

                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif

                                @if ($previousComponentName !== $powerPlantPart->component->component_name)
                                    <td class="px-8 py-2">{{ $powerPlantPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $powerPlantPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2">{{ $powerPlantPart->description }}</td>
                                <td class="px-8 py-2">{{ $powerPlantPart->part_number }}</td>
                                <td class="px-8 py-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image"
                                        viewBox="0 0 16 16" id="myImg-{{ $powerPlantPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $powerPlantPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $powerPlantPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2">{{ $powerPlantPart->price }} </td>
                                <td class="px-8 py-2">{{ $powerPlantPart->supplier }}</td>




                            </tr>



                        </tbody>
                    @endforeach

                    {{-- body 1 end --}}



                </table>

            </div>



            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Suspension
                        </button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>



                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>


                    @php
                        $showCategory = true;
                    @endphp

                    @php
                        $previousComponentName = null;
                    @endphp


                    {{-- body 1 --}}
                    @foreach ($suspensionParts as $suspensionPart)
                        <tbody>
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $suspensionPart->category->category_name }}</td>

                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif

                                @if ($previousComponentName !== $suspensionPart->component->component_name)
                                    <td class="px-8 py-2">{{ $suspensionPart->component->component_name }}</td>
                                    @php
                                        $previousComponentName = $suspensionPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2">{{ $suspensionPart->description }}</td>
                                <td class="px-8 py-2">{{ $suspensionPart->part_number }}</td>
                                <td class="px-8 py-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image"
                                        viewBox="0 0 16 16" id="myImg-{{ $suspensionPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $suspensionPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $suspensionPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                </td>
                                <td class="px-8 py-2">{{ $suspensionPart->price }}</td>
                                <td class="px-8 py-2">{{ $suspensionPart->supplier }}</td>




                            </tr>



                        </tbody>
                    @endforeach

                    {{-- body 1 end --}}



                </table>

            </div>

            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Wheels & Tyres
                        </button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>



                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>


                    @php
                        $showCategory = true;
                    @endphp

                    @php
                        $previousComponentName = null;
                    @endphp



                    {{-- body 1 --}}
                    @foreach ($wheelsTyresParts as $wheelsTyresPart)
                        <tbody>
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $wheelsTyresPart->category->category_name }}</td>

                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif

                                @if ($previousComponentName !== $wheelsTyresPart->component->component_name)
                                    <td class="px-8 py-2">{{ $wheelsTyresPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $wheelsTyresPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif

                                <td class="px-8 py-2">{{ $wheelsTyresPart->description }}</td>
                                <td class="px-8 py-2">{{ $wheelsTyresPart->part_number }}</td>
                                <td class="px-8 py-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image"
                                        viewBox="0 0 16 16" id="myImg-{{ $wheelsTyresPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $wheelsTyresPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $wheelsTyresPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2"> {{ $wheelsTyresPart->price }} </td>
                                <td class="px-8 py-2">{{ $wheelsTyresPart->supplier }}</td>




                            </tr>




                        </tbody>
                    @endforeach

                    {{-- body 1 end --}}



                </table>

            </div>

            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Interior
                        </button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>



                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>


                    @php
                        $showCategory = true;
                    @endphp

                    @php
                        $previousComponentName = null;
                    @endphp

                    {{-- body 1 --}}
                    @foreach ($interiorParts as $interiorPart)
                        <tbody>
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $interiorPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif

                                @if ($previousComponentName !== $interiorPart->component->component_name)
                                    <td class="px-8 py-2">{{ $interiorPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $interiorPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif

                                <td class="px-8 py-2">{{ $interiorPart->description }}</td>
                                <td class="px-8 py-2">{{ $interiorPart->part_number }}</td>
                                <td class="px-8 py-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image"
                                        viewBox="0 0 16 16" id="myImg-{{ $interiorPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $interiorPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $interiorPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2">{{ $interiorPart->price }}</td>
                                <td class="px-8 py-2">{{ $interiorPart->supplier }}</td>




                            </tr>



                        </tbody>
                    @endforeach

                    {{-- body 1 end --}}



                </table>

            </div>


            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="text-2xl font-bold text-white bg-black rounded-lg w-35 h-30">Parts - Exterior
                        </button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                                <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                                <th class="items-start w-[] px-8 py-6 text-left"> Image</th>



                                <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                                <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                            </tr>
                        </thead>
                    </div>



                    @php
                        $showCategory = true;
                    @endphp


                    @php
                        $previousComponentName = null;
                    @endphp


                    {{-- body 1 --}}
                    @foreach ($exteriorParts as $exteriorPart)
                        <tbody>
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2">{{ $exteriorPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                @endif

                                @if ($previousComponentName !== $exteriorPart->component->component_name)
                                    <td class="px-8 py-2">{{ $exteriorPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $exteriorPart->component->component_name; // Update the previous component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2">{{ $exteriorPart->description }}</td>
                                <td class="px-8 py-2">{{ $exteriorPart->partnumber }}</td>
                                <td class="px-8 py-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image"
                                        viewBox="0 0 16 16" id="myImg-{{ $exteriorPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $exteriorPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $exteriorPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2"> {{ $exteriorPart->price }} </td>
                                <td class="px-8 py-2">{{ $exteriorPart->supplier }}</td>




                            </tr>


                        </tbody>
                    @endforeach

                    {{-- body 1 end --}}



                </table>
                {{-- pop up view start --}}
                <div id="popupForm"
                    class="fixed inset-0 flex items-start justify-center hidden bg-gray-800 bg-opacity-50 border popup">

                    <div class="inset-0 w-7/12 p-6 rounded-lg shadow-lg popup-content">
                        <div
                            class="flex flex-row items-center justify-between p-4 text-black bg-white border rounded-t-lg">
                            <h4 class="text-xl font-semibold">Add Part</h4>
                            <div class="flex items-center space-x-4">
                                {{-- <a href="#" class="text-white hover:underline">Edit</a>
           <a class="text-white">|</a> --}}
                                <span class="text-4xl cursor-pointer close">&times;</span>
                            </div>
                        </div>
                        <div class="p-6 bg-white">
                            <form class="space-y-4" action="{{ route('addpart') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="workoutId" name="id">
                                <div class="flex items-center space-x-4">
                                    <label for="category" class="w-32 font-semibold">Category <span
                                            class="text-red-500">*</span></label>
                                    <select onchange="passcategory()" id="category" name="category"
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                        <option value=""selected disabled>Choose a Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" class="p-2 hover:bg-gray-100">
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="type" class="w-32 font-semibold">Component <span
                                            class="text-red-500">*</span></label>
                                    <select id="type" name="component"
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                        <option value=""selected disabled>Choose a Component</option>
                                    </select>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="workout" class="w-32 font-semibold">Description <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="description" name="description"
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="link" class="w-32 font-semibold">Part Number <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="partnumber" name="partnumber"
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="link" class="w-32 font-semibold">Price($)<span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="price" name="price"
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                </div>


                                <div class="flex items-center space-x-4">
                                    <label for="link" class="w-32 font-semibold">Supplier <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="supplier" name="supplier"
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="partnumber" class="font-semibold w-34">Upload Part Image <span
                                            class="text-red-500">*</span></label>
                                    <input type="file" id="partnumber" name="uploadpartimage"
                                        accept="image/jpeg, image/png" class="flex-1 p-2 border border-gray-300 rounded">
                                </div>

                                <div class="flex items-end justify-end gap-2 p-4 text-center rounded-b-lg">
                                    <button class="w-20 py-2 font-bold text-white bg-gray-500 rounded" type="submit"
                                        id="addButton">ADD</button>
                                    <button type="submit" class="px-8 py-2 mr-2 text-white bg-black rounded"
                                        type="submit" id="updateButton" hidden>Update</button>
                                    <button type="button" class="w-20 py-2 font-bold text-gray-600 bg-gray-300 rounded"
                                        onclick="closePopup()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- pop up view end --}}

            </div>
            <div id="myModal" class="flex items-center justify-center modal">
                <div class="relative w-full max-w-3xl p-4 bg-white rounded-lg shadow-xl modal-content-container">
                    <span class="absolute text-2xl font-bold text-gray-700 cursor-pointer top-2 right-2 close-button"
                        id="closeModal">&times;</span>
                    <div id="partNumber" class="mt-2 text-center text-gray-700"></div>
                    <img class="max-w-full max-h-screen rounded-md modal-content" id="img01">
                </div>
            </div>
            <script src="{{ asset('js/customerlist.js') }}" defer></script>



            <script>
                // Get all SVG elements
                document.querySelectorAll('[id^="myImg-"]').forEach(function(img) {
                    img.addEventListener('click', function() {
                        var modal = document.getElementById("myModal");
                        var modalImg = document.getElementById("img01");
                        var partNumberText = document.getElementById("partNumber");

                        modal.style.display = "flex";
                        modalImg.src = img.getAttribute("data-img-src");
                        partNumberText.innerHTML = img.getAttribute("data-part-number");
                    });
                });

                // Get the close button
                var closeModal = document.getElementById("closeModal");

                // Set the onclick event for the close button
                closeModal.onclick = function() {
                    document.getElementById("myModal").style.display = "none";
                }



                //componenet dtielas selction depend wit category _id
                function passcategory() {
                    var categoryId = document.getElementById('category').value;

                    $.ajax({
                        url: '/components/' + categoryId,
                        type: 'GET',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);

                            var componentDropdown = document.getElementById('type');

                            // Clear existing options
                            componentDropdown.innerHTML = '';

                            for (var i = 0; i < componentDropdown.options.length; i++) {
                                if (componentDropdown.options[i].value ===
                                    type) { // assuming 'type' is defined elsewhere
                                    componentDropdown.selectedIndex = i;
                                    break;
                                }
                            }

                            $.each(response, function(index, component) {
                                console.log(component.component_name);
                                // Append new options
                                var option = document.createElement('option');
                                option.value = component.id;
                                option.text = component.component_name;
                                componentDropdown.appendChild(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching components:', error);
                        }
                    });
                }
            </script>



        </div>
    @endsection
