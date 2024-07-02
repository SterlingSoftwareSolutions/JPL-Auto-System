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

                <table class="w-full text-sm bg-white rounded shadow-md ">
                    <div class="flex">

                        <div class="mx-4  px-4 w-auto bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                            <button class="text-white font-bold text-3xl">
                               Body
                            </button>
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
                    <tbody>
                        @foreach ($bodyParts as $bodyPart)
                            <tr class="border-b border-black">
                                @if ($showCategory)
                                    <td class="px-8 py-2   ">{{ $bodyPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2  max-w-xs break-words"></td>
                                @endif
                                @if ($previousComponentName !== $bodyPart->component->component_name)
                                    <td class="px-8 py-2  max-w-xs break-words">{{ $bodyPart->component->component_name }}</td>
                                    @php
                                        $previousComponentName = $bodyPart->component->component_name; // Update the previous component
                                        // name
                                    @endphp
                                @else
                                    <td class="px-8 py-2 "></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2  max-w-xs break-words">{{ $bodyPart->description }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $bodyPart->part_number }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image text-black hover:text-orange-500 transition duration-1000" viewBox="0 0 16 16"
                                        id="myImg-{{ $bodyPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $bodyPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $bodyPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>

                                <td class="px-8 py-2  max-w-xs break-words">{{ $bodyPart->price }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $bodyPart->supplier }}</td>
                            </tr>
                        @endforeach


                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $bodyPartPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>


                    </tbody>


                </table>







            </div>




            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">




                    <div class="mx-4  px-4 w-40 bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                        <button class="text-white font-bold text-3xl">
                            Labour
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
                    <tbody>
                        @foreach ($labourParts as $labourPart)
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2  max-w-xs break-words">{{ $labourPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2  max-w-xs break-words"></td>
                                @endif
                                @if ($previousComponentName !== $labourPart->component->component_name)
                                    <td class="px-8 py-2  max-w-xs break-words">{{ $labourPart->component->component_name }}</td>
                                    @php
                                        $previousComponentName = $labourPart->component->component_name; // Update the previous
                                        // component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2  max-w-xs break-words"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2  max-w-xs break-words">{{ $labourPart->description }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $labourPart->part_number }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image  text-black hover:text-orange-500 transition duration-1000" viewBox="0 0 16 16"
                                        id="myImg-{{ $labourPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $labourPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $labourPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $labourPart->price }} </td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $labourPart->supplier }}</td>




                            </tr>
                        @endforeach

                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $labourPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>

                    </tbody>
                    {{-- body 1 end --}}



                </table>

            </div>


            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">



                    <div class="mx-4  px-4 w-80 bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                        <button class="text-white font-bold text-3xl">
                            Parts - Power Plant
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
                    <tbody>
                        @foreach ($powerPlantParts as $powerPlantPart)
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="">{{ $powerPlantPart->category->category_name }}</td>

                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class=""></td>
                                @endif

                                @if ($previousComponentName !== $powerPlantPart->component->component_name)
                                    <td class="">{{ $powerPlantPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $powerPlantPart->component->component_name; // Update the previous
                                        // component name
                                    @endphp
                                @else
                                    <td class=""></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2  max-w-xs break-words">{{ $powerPlantPart->description }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $powerPlantPart->part_number }}</td>
                                <td class="px-8 py-2  max-w-xs break-words ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image text-black hover:text-orange-500 transition duration-1000"
                                        viewBox="0 0 16 16" id="myImg-{{ $powerPlantPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $powerPlantPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $powerPlantPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $powerPlantPart->price }} </td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $powerPlantPart->supplier }}</td>




                            </tr>
                        @endforeach


                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $powerPlantPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>

                    </tbody>

                    {{-- body 1 end --}}



                </table>



            </div>



            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">

                    <div class="mx-4  px-4 w-80 bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                        <button class="text-white font-bold text-3xl">
                            Parts - Suspension
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
                    <tbody>
                        @foreach ($suspensionParts as $suspensionPart)
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2  max-w-xs break-words">{{ $suspensionPart->category->category_name }}</td>

                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2  max-w-xs break-words"></td>
                                @endif

                                @if ($previousComponentName !== $suspensionPart->component->component_name)
                                    <td class="px-8 py-2  max-w-xs break-words">{{ $suspensionPart->component->component_name }}</td>
                                    @php
                                        $previousComponentName = $suspensionPart->component->component_name; // Update the previous
                                        // component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2  max-w-xs break-words"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2  max-w-xs break-words">{{ $suspensionPart->description }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">{{ $suspensionPart->part_number }}</td>
                                <td class="px-8 py-2  max-w-xs break-words">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image text-black hover:text-orange-500 transition duration-1000"
                                        viewBox="0 0 16 16" id="myImg-{{ $suspensionPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $suspensionPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $suspensionPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                </td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $suspensionPart->price }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $suspensionPart->supplier }}</td>




                            </tr>
                        @endforeach


                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $suspensionPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>

                    </tbody>

                    {{-- body 1 end --}}



                </table>



            </div>

            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">

                    <div class="mx-4  px-4 w-[420px] bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                        <button class="text-white font-bold text-3xl">
                            Parts - Wheels & Tyres
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
                    <tbody>
                        @foreach ($wheelsTyresParts as $wheelsTyresPart)
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $wheelsTyresPart->category->category_name }}</td>

                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"></td>
                                @endif

                                @if ($previousComponentName !== $wheelsTyresPart->component->component_name)
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $wheelsTyresPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $wheelsTyresPart->component->component_name; // Update the previous
                                        // component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif

                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $wheelsTyresPart->description }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $wheelsTyresPart->part_number }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image text-black hover:text-orange-500 transition duration-1000"
                                        viewBox="0 0 16 16" id="myImg-{{ $wheelsTyresPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $wheelsTyresPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $wheelsTyresPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"> {{ $wheelsTyresPart->price }} </td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $wheelsTyresPart->supplier }}</td>




                            </tr>
                        @endforeach



                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $wheelsTyresPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>

                    </tbody>
                    {{-- body 1 end --}}



                </table>



            </div>

            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mx-4  px-4 w-80 bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                        <button class="text-white font-bold text-3xl">
                            Parts - Interior
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
                    <tbody>
                        @foreach ($interiorParts as $interiorPart)
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $interiorPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"></td>
                                @endif

                                @if ($previousComponentName !== $interiorPart->component->component_name)
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $interiorPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $interiorPart->component->component_name; // Update the previous
                                        // component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif

                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $interiorPart->description }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $interiorPart->part_number }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image text-black hover:text-orange-500 transition duration-1000"
                                        viewBox="0 0 16 16" id="myImg-{{ $interiorPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $interiorPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $interiorPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $interiorPart->price }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $interiorPart->supplier }}</td>




                            </tr>
                        @endforeach


                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $interiorPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>


                    </tbody>

                    {{-- body 1 end --}}



                </table>


            </div>


            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">



                    <div class="mx-4  px-4 w-80 bg-black text-center flex justify-center items-center rounded-md h-12 mt-5">
                        <button class="text-white font-bold text-3xl">
                            Parts - Exterior
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
                    <tbody>
                        @foreach ($exteriorParts as $exteriorPart)
                            <tr class="gap-8 border-b border-black">

                                @if ($showCategory)
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $exteriorPart->category->category_name }}</td>
                                    @php
                                        $showCategory = false;
                                    @endphp
                                @else
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"></td>
                                @endif

                                @if ($previousComponentName !== $exteriorPart->component->component_name)
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $exteriorPart->component->component_name }}</td>

                                    @php
                                        $previousComponentName = $exteriorPart->component->component_name; // Update the previous
                                        // component name
                                    @endphp
                                @else
                                    <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"></td>
                                    <!-- Display an empty cell if component name is the same as the previous one -->
                                @endif
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $exteriorPart->description }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $exteriorPart->part_number }}</td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image text-black hover:text-orange-500 transition duration-1000"
                                        viewBox="0 0 16 16" id="myImg-{{ $exteriorPart->id }}"
                                        data-img-src="{{ asset('storage/PartImages/' . $exteriorPart->upload_part_image) }}"
                                        data-part-number="Part NO: {{ $exteriorPart->part_number }}">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                    </svg>
                                </td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words"> {{ $exteriorPart->price }} </td>
                                <td class="px-8 py-2 px-8 py-2  max-w-xs break-words">{{ $exteriorPart->supplier }}</td>




                            </tr>
                        @endforeach

                        <tr class="border-b border-black">
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">Cost</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">{{ $exteriorPriceTotal }}</td>
                            <td class="px-8 py-2"></td>
                        </tr>

                        <tr class="border-b border-black">
                            <td class="px-8 py-2 font-bold">Budget Cost to Date</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">
                                {{ $bodyPartPriceTotal + $labourPriceTotal + $powerPlantPriceTotal + $suspensionPriceTotal + $wheelsTyresPriceTotal + $interiorPriceTotal + $exteriorPriceTotal }}
                            </td>
                            <td class="px-8 py-2"></td>
                        </tr>

                        <tr class="border-b border-black">
                            <td class="px-8 py-2 font-bold">Budget</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">20000</td>
                            <td class="px-8 py-2"></td>
                        </tr>

                        <tr class="border-b border-black">
                            <td class="px-8 py-2 font-bold">Budget Remaining</td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2"></td>
                            <td class="px-8 py-2 font-bold">17800</td>
                            <td class="px-8 py-2"></td>
                        </tr>


                    </tbody>

                    {{-- body 1 end --}}



                </table>




            </div>



            {{-- pop up view start --}}
            <div id="popupForm"
                class="fixed inset-0 flex items-start justify-center hidden bg-gray-800 bg-opacity-50 border popup">

                <div class="inset-0 w-7/12 p-6 rounded-lg shadow-lg popup-content">
                    <div class="flex flex-row items-center justify-between p-4 text-black bg-white border rounded-t-lg">
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
                                    <option value="" selected disabled>Choose a Category</option>

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
                                    <option value="" selected disabled>Choose a Component</option>
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
                                <button type="submit" class="px-8 py-2 mr-2 text-white bg-black rounded" type="submit"
                                    id="updateButton" hidden>Update</button>
                                <button type="button" class="w-20 py-2 font-bold text-gray-600 bg-gray-300 rounded"
                                    onclick="closePopup()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="myModal"
                class="fixed inset-0 flex items-start justify-center hidden bg-gray-800 bg-opacity-50 popup">
                <div class="inset-0 w-7/12 p-6 rounded-lg shadow-lg popup-contents">
                    <div class="flex flex-row items-center justify-between p-4 text-black bg-white border-b">
                        <div class="flex items-center space-x-4">
                            <button onclick="closePopupImg()">
                                <span
                                    class="absolute text-2xl font-bold text-gray-700 cursor-pointer top-2 right-2 close-button">&times;</span>
                            </button>
                            <div id="partNumber" class="mt-2 text-center text-gray-700"></div>
                        </div>
                    </div>
                    <div class="p-6 bg-white">
                        <img class="max-w-full max-h-screen rounded-md modal-content" id="img01">
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/customerlist.js') }}" defer></script>

            <style>
                #myModal {
                    display: flex;
                    justify-content: center;
                    align-items: flex-start;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    opacity: 0;
                    visibility: hidden;
                    transition: opacity 0.3s ease, transform 0.3s ease;
                    transform: translateY(-100%);
                }

                #myModal.show {
                    opacity: 1;
                    visibility: visible;
                    transform: translateY(0%);
                }

                .popup-contents {
                    background-color: white;
                    width: 40%;
                    max-width: auto;
                    max-height: 70%;
                    overflow-y: auto;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    border-radius: 8px;
                    padding: 16px;
                    transition: transform 0.3s ease;
                    transform: translateY(-100%);
                }

                #myModal.show .popup-contents {
                    transform: translateY(0%);
                }
            </style>

            <script>
                // Function to open the popup and preload image
                function openPopup(imgSrc, partNumber) {
                    var modal = document.getElementById("myModal");
                    var modalImg = document.getElementById("img01");
                    var partNumberText = document.getElementById("partNumber");

                    // Preload the image
                    var img = new Image();
                    img.onload = function() {
                        modalImg.src = imgSrc;
                        partNumberText.innerHTML = partNumber;
                        modal.classList.add("show");
                    };
                    img.src = imgSrc;
                }

                // Function to close the popup
                function closePopupImg() {
                    console.log("image is Close");
                    var modal = document.getElementById("myModal");
                    modal.classList.remove("show");
                }

                // Get all SVG elements and add event listeners to open the popup
                document.querySelectorAll('[id^="myImg-"]').forEach(function(img) {
                    img.addEventListener('click', function() {
                        var imgSrc = img.getAttribute("data-img-src");
                        var partNumber = img.getAttribute("data-part-number");

                        openPopup(imgSrc, partNumber);
                    });
                });

                // Add event listener for closing the modal
                document.getElementById("closeModal").addEventListener('click', function() {
                    closePopup();
                    // location.reload();
                });

                // Add event listener for closing the modal when clicking outside of the content
                window.addEventListener('click', function(event) {
                    var modal = document.getElementById("myModal");
                    if (event.target == modal) {
                        closePopup();
                        // location.reload();
                    }
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
