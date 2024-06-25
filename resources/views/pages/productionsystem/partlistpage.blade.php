@extends('layouts.layout')

@section('content')
    @include('components.landingpagenavbar')


    <div class="flex flex-wrap">
        <div class="w-full max-h-screen overflow-y-auto bg-white md:w-[95%]">
            <link rel="stylesheet" href="{{ asset('css/partlist.css') }}">

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

                    <div class="flex ">
                        <div class="mt-5 ml-8">
                            <button class="w-20 h-10 text-2xl font-bold text-white bg-black rounded-lg">Body</button>
                        </div>

                        <div class="flex items-end justify-end flex-grow mt-5 mr-8">
                            <button id="openPopupBtn"
                                class="bg-gray-500  h-10 px-6 text-white rounded-sm text-sm font-bold">+ ADD PART</button>
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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>

                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg"
                                    data-img-src="{{ asset('images/dimensions-and-weight.png') }}"
                                    data-part-number="Part NO: 3641H">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>

                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
                    {{-- body 1 end --}}



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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="gap-8 border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>
                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>
                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="gap-8 border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>
                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>
                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="gap-8 border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>
                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16"
                                    id="myImg">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>
                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="gap-8 border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>
                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16"
                                    id="myImg">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>
                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="gap-8 border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>
                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16"
                                    id="myImg">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>
                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
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



                    {{-- body 1 --}}
                    <tbody>
                        <tr class="gap-8 border-b border-black">


                            <td class="px-8 py-2">Body</td>
                            <td class="px-8 py-2">Complete Shell</td>
                            <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                            <td class="px-8 py-2">3641H</td>
                            <td class="px-8 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16"
                                    id="myImg">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </td>
                            <td class="px-8 py-2"> US$ 15,000.00 </td>
                            <td class="px-8 py-2">TheBOG</td>




                        </tr>
                        <tr class="border-b border-black">

                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2">Hood</td>



                        </tr>



                    </tbody>
                    {{-- body 1 end --}}



                </table>
                {{-- pop up view start --}}
                <div id="popupForm"
                    class="popup fixed inset-0 bg-gray-800 bg-opacity-50 items-start justify-center hidden border">
                    <div class="popup-content inset-0 rounded-lg shadow-lg w-7/12 p-6 ">
                        <div
                            class="bg-white border border-b text-black p-4 flex justify-between items-center rounded-t-lg flex-row">
                            <h4 class="text-xl font-semibold">Add Part</h4>
                            <div class="flex items-center space-x-4">
                                {{-- <a href="#" class="text-white hover:underline">Edit</a>
             <a class="text-white">|</a> --}}
                                <span class="close text-4xl cursor-pointer">&times;</span>
                            </div>
                        </div>
                        <div class="p-6 bg-white">
                            <form class="space-y-4" action="" method="POST">
                                @csrf
                                <input type="hidden" id="workoutId" name="id">
                                <div class="flex items-center space-x-4">
                                    <label for="category" class="w-32 font-semibold">Category <span
                                            class="text-red-500">*</span></label>
                                    <select id="category" name="category"
                                        class="p-2 border border-gray-300 rounded flex-1">
                                        <option value="body" class="p-2 hover:bg-gray-100">Body</option>
                                        <option value="labour" class="p-2 hover:bg-gray-100">Labour</option>
                                        <optgroup label="Parts" class="font-bold text-gray-700">
                                            <option value="power-plant" class="p-2 hover:bg-gray-100">Power Plant</option>
                                            <option value="suspension" class="p-2 hover:bg-gray-100">Suspension</option>
                                            <option value="wheels-tyres" class="p-2 hover:bg-gray-100">Wheels &amp; Tyres
                                            </option>
                                            <option value="interior" class="p-2 hover:bg-gray-100">Interior</option>
                                            <option value="exterior" class="p-2 hover:bg-gray-100">Exterior</option>
                                        </optgroup>
                                    </select>
                                </div>


                                <div class="flex items-center space-x-4">
                                    <label for="type" class="w-32 font-semibold">Component <span
                                            class="text-red-500">*</span></label>
                                    <select id="type" name="type"
                                        class="p-2 border border-gray-300 rounded flex-1">
                                        <option value="warmup">Complete Shell</option>

                                    </select>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="workout" class="w-32 font-semibold">Description <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="description" name="description"
                                        class="p-2 border border-gray-300 rounded flex-1">
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="link" class="w-32 font-semibold">Part Number <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="partnumber" name="partnumber"
                                        class="p-2 border border-gray-300 rounded flex-1">
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label for="link" class="w-32 font-semibold">Supplier <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="supplier" name="supplier"
                                        class="p-2 border border-gray-300 rounded flex-1">
                                </div>


                                <div class="flex items-center space-x-4">
                                    <label for="partnumber" class="w-34 font-semibold">Upload Part Image <span
                                            class="text-red-500">*</span></label>
                                    <input type="file" id="partnumber" name="partnumber"
                                        accept="image/jpeg, image/png" class="p-2 border border-gray-300 rounded flex-1">
                                </div>



                                <div class="p-4 items-end justify-end  flex text-center rounded-b-lg gap-2 ">
                                    <button class="bg-gray-500 text-white font-bold w-20  py-2 rounded " type="submit"
                                        id="addButton">ADD</button>
                                    <button class="bg-black text-white px-8 py-2 rounded mr-2" type="submit"
                                        id="updateButton" hidden>Update</button>
                                    <button type="button" class="bg-gray-300 text-gray-600 font-bold w-20  py-2 rounded "
                                        type="submit" onclick="closePopup()">Cancel</button>
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
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the SVG element
                var img = document.getElementById("myImg");

                // Get the modal image and part number elements
                var modalImg = document.getElementById("img01");
                var partNumberText = document.getElementById("partNumber");

                // Set the onclick event for the SVG
                img.onclick = function() {
                    modal.style.display = "flex";
                    modalImg.src = this.getAttribute("data-img-src");
                    partNumberText.innerHTML = this.getAttribute("data-part-number");
                }

                // Get the close button
                var closeModal = document.getElementById("closeModal");

                // Set the onclick event for the close button
                closeModal.onclick = function() {
                    modal.style.display = "none";
                }
            </script>



        </div>
    @endsection
