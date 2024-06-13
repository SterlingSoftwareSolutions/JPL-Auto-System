@extends('layouts.layout')

@section('content')
@include('components.landingpagenavbar')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div>
    <div>
        <section id="services" class="py-8 bg-gray-100">
            <div class="container px-6 mx-10">
                <div class="flex flex-wrap">
                    <div class="flex w-full mb-6 md:w-4/12">
                        <div class="bg-white rounded shadow full">
                            <div class="overflow-x-auto">
                                <div class="overflow-x-auto">
                                    <table class="w-full bg-white rounded shadow-md md:w-4/12 md:text-sm">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="px-8 py-6">Item</th>
                                                <th class="px-8 py-6">Vehicle Information</th>
                                                <th class="px-8 py-6" colspan="2">Details</th>
                                            </tr>
                                            <tr>
                                                <th class="px-4 py-2"></th>
                                                <th class="px-4 py-2"></th>
                                                <th class="px-4 py-2">Variant 1</th>
                                                <th class="px-4 py-2">Variant 2</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $vehicleInfo = [
                                        ['id' => '01.', 'label' => 'Vehicle Make', 'variant1' => 'TBD', 'variant2' =>
                                        'TBD'],
                                        ['id' => '02.', 'label' => 'Vehicle Model', 'variant1' => 'TBD', 'variant2' =>
                                        'TBD'],
                                        ['id' => '03.', 'label' => 'Body Shape (NSW Body Code/Shape)', 'variant1' =>
                                        'COUPE COUPE', 'variant2' => 'TBD'],
                                        ['id' => '04.', 'label' => 'Number of Side Doors', 'variant1' => '2', 'variant2'
                                        => 'TBD'],
                                        ['id' => '05.', 'label' => 'Number of Rear Doors', 'variant1' => '0', 'variant2'
                                        => 'TBD'],
                                        ['id' => '06.', 'label' => 'Vehicle Category', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '07.', 'label' => 'Tare Mass (kg)', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '08.', 'label' => 'Unladen Mass (kg)', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '09.', 'label' => 'Vehicle Model', 'variant1' => 'TBD', 'variant2' =>
                                        'TBD'],
                                        ['id' => '10.', 'label' => 'Body Shape (NSW Body Code/Shape)', 'variant1' =>
                                        'COUPE COUPE', 'variant2' => 'TBD'],
                                        ['id' => '11.', 'label' => 'Number of Side Doors', 'variant1' => '2', 'variant2'
                                        => 'TBD'],
                                        ['id' => '12.', 'label' => 'Number of Rear Doors', 'variant1' => '0', 'variant2'
                                        => 'TBD'],
                                        ['id' => '13.', 'label' => 'Vehicle Category', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '14.', 'label' => 'Tare Mass (kg)', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '15.', 'label' => 'Unladen Mass (kg)', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '16.', 'label' => 'Body Shape (NSW Body Code/Shape)', 'variant1' =>
                                        'COUPE COUPE', 'variant2' => 'TBD'],
                                        ['id' => '17.', 'label' => 'Number of Side Doors', 'variant1' => '2', 'variant2'
                                        => 'TBD'],
                                        ['id' => '18.', 'label' => 'Number of Rear Doors', 'variant1' => '0', 'variant2'
                                        => 'TBD'],
                                        ['id' => '19.', 'label' => 'Vehicle Category', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '20.', 'label' => 'Tare Mass (kg)', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ['id' => '21.', 'label' => 'Unladen Mass (kg)', 'variant1' => '0', 'variant2' =>
                                        'TBD'],
                                        ];
                                        @endphp
                                        <tbody>
                                            @foreach($vehicleInfo as $index => $info)
                                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-white' }}">
                                                <td class="px-4 py-2">{{ $info['id'] }}</td>
                                                <td class="px-4 py-2">{{ $info['label'] }}</td>
                                                <td class="px-4 py-2">{{ $info['variant1'] }}</td>
                                                <td class="px-4 py-2">{{ $info['variant2'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="w-full px-4 mb-4 md:w-4/12">
                        <div class="p-6 bg-black rounded-lg shadow">
                            <h3 class="mb-4 text-2xl font-bold"></h3>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <img src="{{ asset('images/fig-1.png') }}" alt="fig 1" class="w-full rounded shadow">
                                <img src="{{ asset('images/fig-2.png') }}" alt="fig 2" class="w-full rounded shadow">

                            </div>
                            <h3 class="mb-4 text-sm text-center text-white">Fig 3 Dashboard / Interior view</h3>


                            <div class="grid grid-cols-1 gap-4 mb-2 place-items-center">
                                <div class="col-span-1"></div>
                                {{-- <img src="{{ asset('images/fig-3.png') }}" alt="fig 3"
                                    class="w-full rounded shadow"> --}}
                                <img src="{{ asset('images/fig-3.png') }}" alt="fig 3" class="w-48 rounded shadow">

                                <div class="col-span-1"></div>
                            </div>
                            <h3 class="mb-4 text-sm text-center text-white">Fig 1 and Fig 2 Front and rear view

                            </h3>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <img src="{{ asset('images/fig-4.png') }}" alt="fig 4" class="w-full rounded shadow">
                                <img src="{{ asset('images/fig-5.png') }}" alt="fig 5" class="w-full rounded shadow">

                            </div>
                            <h3 class="mb-4 text-sm text-center text-white">Fig 4 and Fig 5. Engine bay view and
                                underbody view

                            </h3>

                        </div>
                    </div>



                    <div class="flex w-full h-[400px] md:w-3/12">
                        <div class="bg-white rounded shadow ">
                            <h3 class="mb-4 text-2xl font-bold">Measurement</h3>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <img src="{{ asset('images/measurement.png') }}" alt="fig 5" class="w-full rounded shadow">
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </div>

    <!--------------------Second div---------------------------------------------------------->
    {{-- <div>


        <div> --}}
            <section class="py">
                <div class="container px-6 mx-auto">
                    <div class="flex flex-wrap">


                        {{-- <div class="container flex mx-auto mb-4"> --}}
                            <h1 class="text-2xl font-bold">Specifications</h1>
                        </div>

                        {{-- <input type="text" id="searchInput" placeholder="Search Specific attribute..."
                            class="flex justify-center p-2 mx-auto mb-16"> --}}

                            {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}

                            <div class="flex justify-center items-center p-2 mb-16 w-[40%] mx-auto">
                                <input type="text" id="searchInput" placeholder="Search Specific attribute..." class="flex-grow p-2" style="h-[40%]">
                                <i class="fas fa-search" style="font-size: 20px; margin-top: 5px;"></i>
                            </div>
                            

                            <div class="flex items-center justify-center mb-10 text-sm text-gray-600 md:w-[80%] mx-auto gap-10">
                                <p>
                                    <span class="font-bold">Explanation:</span>
                                </p>
                                
                                <style>
                                    .icon-text {
                                        display: flex;
                                        align-items: center;
                                        gap: 5px; 
                                    }
                                </style>
                                
                                <p class="icon-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0" />
                                    </svg>
                                    <span class="font-bold">Included</span>
                                </p>
                                
                                
                                <p class="icon-text">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1"/>
                                    </svg>
                                    <span class="font-bold">Unavailable</span>
                                </p>
                                
                                <p class="icon-text">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                                    </svg>
                                    <span class="font-bold">Optional</span>
                                </p>
                                
                                <p class="icon-text">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16">
                                        <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0m1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627"/>
                                    </svg>
                                    <span class="font-bold">Information is missing</span>
                                </p>
                            </div>
                            <div class="w-128 h-0.5 bg-black mx-auto mt-10"></div>


                        <nav class="flex items-center justify-center mb-4 border border-b">
                            <a href="#" onclick="showTab('engine')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black">Engine &
                                Performance</a>
                            <a href="#" onclick="showTab('dimensions')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black">Dimensions
                                &
                                Weight</a>
                            <a href="#" onclick="showTab('exterior')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black ">Exterior</a>
                            <a href="#" onclick="showTab('interior')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black">Interior</a>
                            <a href="#" onclick="showTab('features')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black">Features</a>
                            <a href="#" onclick="showTab('safety')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black">Safety &
                                Security</a>
                            <a href="#" onclick="showTab('other')"
                                class="inline-block px-4 py-2 text-gray-600 hover:text-black focus:text-black">Other</a>
                        </nav>

                        <div
                            class="overflow-hidden bg-white border rounded-lg shadow-md justify-betweenw-5xl justify-bet">
                            <div id="engine" class="hidden tab-content">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">


                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td
                                                                class="items-start px-2 py-2 border-b border-black text-start">
                                                                Length</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                4,612 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,513 mm
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1507 - 1513
                                                                - 1,513 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm</td>

                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">

                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Similar structure for other tabs -->
                            <div id="exterior" class="hidden tab-content">
                                <!-- Dimensions & Weight content -->
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/2">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">




                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td class="px-2 py-2 border-b border-black">Length</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                4,612 mm</td>



                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,782 mm</td>



                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,513 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1507 - 1513
                                                                - 1,513 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm</td>


                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="dimensions" class="hidden tab-content">
                                <!-- Dimensions & Weight content -->
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">




                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td class="px-2 py-2 border-b border-black">Length</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                4,612 mm</td>



                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,782 mm</td>



                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1,513 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                1507 - 1513
                                                                - 1,513 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm</td>


                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td
                                                                class="items-end px-2 py-2 border-b border-black text-end">
                                                                2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td
                                                                    class="items-end px-2 py-2 border-b border-black text-end">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="interior" class="hidden tab-content">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">

                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td class="px-2 py-2 border-b border-black">Length</td>
                                                            <td class="px-2 py-2 border-b border-black ">
                                                                4,612 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 1,513 mm
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black ">1507 - 1513
                                                                - 1,513 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm</td>

                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black "> 2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">

                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td class="px-2 py-2 border-b border-black "> 1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="features" class="hidden tab-content">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">

                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td class="px-2 py-2 border-b border-black">Length</td>
                                                            <td class="px-2 py-2 border-b border-black ">
                                                                4,612 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 1,513 mm
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black ">1507 - 1513
                                                                - 1,513 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm</td>

                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black "> 2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">

                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td class="px-2 py-2 border-b border-black "> 1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="safety" class="hidden tab-content">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">

                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td class="px-2 py-2 border-b border-black">Length</td>
                                                            <td class="px-2 py-2 border-b border-black ">
                                                                4,612 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 1,513 mm
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black ">1507 - 1513
                                                                - 1,513 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm</td>

                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black "> 2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">

                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td class="px-2 py-2 border-b border-black "> 1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="other" class="hidden tab-content">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3">
                                        <img src="{{ asset('images/dimensions-and-weight.png') }}" alt="fig 5"
                                            class="w-full rounded shadow">
                                    </div>
                                    <div class="w-full p-4 md:w-2/3">
                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                            <div class="mx-10 ">

                                                <table class="w-full text-sm bg-white rounded shadow-md ">

                                                    <div class="mx-10">

                                                        <thead class="mx-10 border-b-2 w-60">
                                                            <tr class="items-start text-start">
                                                                <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                    Exterior</th>
                                                            </tr>
                                                        </thead>
                                                    </div>



                                                    {{-- body 1 --}}
                                                    <tbody>
                                                        <tr>

                                                            <td class="px-2 py-2 border-b border-black">Length</td>
                                                            <td class="px-2 py-2 border-b border-black ">
                                                                4,612 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Width, with
                                                                Mirrors</td>
                                                            <td class="px-2 py-2 border-b border-black">
                                                                1,782 mm</td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 1,513 mm
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Track, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black ">1507 - 1513
                                                                - 1,513 mm</td>

                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Wheel Base</td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm</td>

                                                        </tr>

                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Front
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black"> 2,760 mm
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-black ">Overhang, Rear
                                                            </td>
                                                            <td class="px-2 py-2 border-b border-black "> 2,760 mm
                                                            </td>


                                                        </tr>

                                                    </tbody>
                                                    {{-- body 1 end --}}



                                                </table>

                                            </div>

                                            <div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">

                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Interior
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Head Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    4,612 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Head Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Front</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    1,782 mm</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Hip Room,
                                                                    Rear</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1,782
                                                                    mm</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                                <div class="mx-10 ">

                                                    <table class="w-full text-sm bg-white rounded shadow-md ">




                                                        <div class="mx-10">

                                                            <thead class="mx-10 border-b-2 w-60">
                                                                <tr class="items-start text-start">
                                                                    <th class="items-start w-3/12 px-8 py-6 text-left">
                                                                        Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>



                                                        {{-- body 1 --}}
                                                        <tbody>
                                                            <tr>

                                                                <td class="px-2 py-2 border-b border-black">Curb Weight
                                                                </td>
                                                                <td class="px-2 py-2 border-b border-black ">
                                                                    1670 - 1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Gross
                                                                    Weight</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 -
                                                                    1905 kg</td>



                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Trailer
                                                                    Load,
                                                                    braked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 12% 1670 -
                                                                    1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black">Max Trailer
                                                                    Load,
                                                                    Nunbreaked</td>
                                                                <td class="px-2 py-2 border-b border-black"> 1670 - 1905
                                                                    kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Cargo
                                                                    Capacity</td>
                                                                <td class="px-2 py-2 border-b border-black "> 1670
                                                                    - 1905 kg</td>


                                                            </tr>
                                                            <tr>
                                                                <td class="px-2 py-2 border-b border-black ">Max Towbar
                                                                    Download</td>
                                                                <td class="px-2 py-2 border-b border-black">
                                                                    75 kg</td>


                                                            </tr>

                                                        </tbody>
                                                        {{-- body 1 end --}}



                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="ajax-container">
                            <!-- Content will be dynamically loaded here -->
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                            // Add event listeners to navigation links
                            document.querySelectorAll('nav a').forEach(link => {
                                link.addEventListener('click', function(event) {
                                    event.preventDefault(); // Prevent default link behavior
                                    const tabId = this.getAttribute('href').substring(1); // Get tab ID from href attribute
                    
                                    // Make AJAX request
                                    const xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                // Update content with response
                                                document.getElementById('ajax-container').innerHTML = xhr.responseText;
                                                // Call showTab function to update active tab styling
                                                showTab(tabId);
                                            } else {
                                                console.error('Error fetching content: ' + xhr.status);
                                            }
                                        }
                                    };
                                    xhr.open('GET', 'tab_contents/' + tabId + '.html', true); // Adjust the path as needed
                                    xhr.send();
                                });
                            });
                        });
                    
                        function showTab(tabId) {
                            // Hide all tab contents
                            document.querySelectorAll('.tab-content').forEach(tab => {
                                tab.classList.add('hidden');
                            });
                    
                            // Show the selected tab content
                            const selectedTab = document.getElementById(tabId);
                            selectedTab.classList.remove('hidden');
                    
                            // Remove active class from all links
                            document.querySelectorAll('nav a').forEach(link => {
                                link.classList.remove('text-blue-500');
                                link.classList.add('text-gray-600');
                            });
                    
                            // Add active class to the clicked link
                            const activeLink = document.querySelector('nav a[href="#' + tabId + '"]');
                            activeLink.classList.remove('text-gray-600');
                            activeLink.classList.add('text-blue-500');
                        }
                        </script>
            </section>


        </div>

    </div>

    @endsection