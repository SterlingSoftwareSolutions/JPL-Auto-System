@extends('layouts.layout')

@section('content')

@include('components.landingpagenavbar')


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
</style>

</style>
<div class="w-full">
    <div class="h-1/3">

<!-- Tables -->
<div class="tables-container">

    <table id="table1" class="text-sm text-left divide-y divide-gray-200 tableee">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-2 py-2">
                        ADR
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Title
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Compliance
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Evidence Type
                    </th>
                    <th scope="col" class="px-2 py-2">
                        ECE Number
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Supporting Documents
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Supporting Images
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Component Details
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Component/ System Status
                    </th>
                    <th scope="col" class="px-2 py-2">
                        ADR Requirements
                    </th>
                    <th scope="col" class="px-2 py-2">
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- table row 1 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        01/00
                    </td>
                    <td class="px-2 py-2">
                        Reversing Lamps
                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-2">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-3 form-checkbox">
                                <span>ECE Approval</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-3 form-checkbox">
                                <span>Test Report from Approved Test Facility</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-3 form-checkbox">
                                <span>Component Type Approval (CTA)</span>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <input type="text" class="h-10 border border-black">
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                            style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                            <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                            <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                            <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                                style="background-color: #F9F9F9">Browse</button>
                            <input id="fileInput" type="file" class="hidden" />
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                            style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                            <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                            <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                            <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                                style="background-color: #F9F9F9">Browse</button>
                            <input id="fileInput" type="file" class="hidden" />
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div>
                            <input type="text" placeholder="Component"
                                class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                            <div class="flex flex-col items-start mt-1 space-y-1">
                                <div class="flex items-center space-x-1">
                                    <span class="w-8">Type:</span>
                                    <input type="text" placeholder=""
                                        class="h-8 placeholder-gray-600 border border-black w-14 ">
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span class="w-8">Part:</span>
                                    <input type="text" placeholder=" "
                                        class="h-8 placeholder-gray-600 border border-black w-14">
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span class="w-8">Qty.:</span>
                                    <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                                </div>
                            </div>
                        </div>

                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <button>Save </button>
                            <button>Edit </button>
                            <button>Delete </button>
                        </div>
                    </td>



                <tr class="border-b border-gray-200">
                </tr>
                {{-- table row 1 --}}

                {{-- table row 2 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        02/01
                    </td>
                    <td class="px-2 py-2">
                        Side Door Latches and Hinges
                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-1">
                            <div class="flex items-center space-x-1">
                                <input type="checkbox" class="w-3 h-4 form-checkbox">
                                <span>ECE Approval</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-4 form-checkbox">
                                <span>Test Report from Approved Test Facility</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-4 form-checkbox">
                                <span>Component Type Approval (CTA)</span>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2 ">
                        <div class="flex flex-col items-center justify-center">
                            R00-4768-0023
                        </div>
                    </td>

                    <td class="px-2 py-2 ">
                        <div class="flex flex-col items-center space-y-2">

                            <!-- PNG Document -->
                            <div class="flex flex-col items-center">
                                <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                                <span class="text-sm">photo.jpg</span>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2">
                        <!-- PDF Document -->
                        <div class="flex flex-col items-center">
                            <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                            <span class="text-sm">file.pdf</span>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div>
                            <h1>Passanger Seatbelt LMS </h1>
                            <div class="flex flex-col items-start mt-1 space-y-2">
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Type:</span>
                                    <h1>Front Outboard</h1>
                                    {{-- <input type="text" placeholder="Front Outboar"
                                        class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Part:</span>
                                    <h1>VPN RESETRACTABLE BELT</h1>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Qty.:</span>
                                    <h1>1</h1>

                                </div>
                            </div>
                        </div>

                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                <tr class="border-b border-gray-200">
                </tr>

                {{-- table row 2 --}}


                {{-- table row 3 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        03/04
                    </td>
                    <td class="px-2 py-2">
                        Seats and Seat Anchorages                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-2">
                            <ul class="pl-5 list-disc">
                                <li>
                                    <span>ECE Approval</span>
                                </li>
                                <li>
                                    <span>Test Report from Approved Test Facility</span>
                                </li>
                                <li>
                                    <span>Component Type Approval (CTA)</span>
                                </li>
                            </ul>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>



                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div>
                            <input type="text" placeholder=""
                                class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                            <div class="flex flex-col items-start mt-1 space-y-2">
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Type:</span>
                                    <input type="text" placeholder="Front Outboar"
                                        class="w-24 h-4 placeholder-gray-600 border border-black ">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Part:</span>
                                    <input type="text" placeholder="VPW Retractor "
                                        class="w-24 h-4 placeholder-gray-600 border border-black">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Qty.:</span>
                                    <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                                </div>
                            </div>
                        </div>

                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                <tr class="border-b border-gray-200">
                </tr>

                {{-- table row 3 --}}



                {{-- table row 4 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        03/04
                    </td>
                    <td class="px-2 py-2">
                        Seats and Seat Anchorages
                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-2">
                            <ul class="pl-5 list-disc">
                                <li>
                                    <span>ECE Approval</span>
                                </li>
                                <li>
                                    <span>Test Report from Approved Test Facility</span>
                                </li>
                                <li>
                                    <span>Component Type Approval (CTA)</span>
                                </li>
                            </ul>
                        </div>

                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>



                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col">
                            <span>Lower Anchorages</span>
                            <span>Lower Anchorages</span>
                            <span>Upper Anchorages</span>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                <tr class="border-b border-gray-200">
                </tr>

                {{-- table row 4 --}}


            </tbody>
    </table>
    <!-- Repeat the above structure for each table, changing the ID -->
    <table id="table2" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-2 py-2">
                        ADR
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Title
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Compliance
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Evidence Type
                    </th>
                    <th scope="col" class="px-2 py-2">
                        ECE Number
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Supporting Documents
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Supporting Images
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Component Details
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Component/ System Status
                    </th>
                    <th scope="col" class="px-2 py-2">
                        ADR Requirements
                    </th>
                    <th scope="col" class="px-2 py-2">
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- table row 1 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        04/06
                    </td>
                    <td class="px-2 py-2">

                        Seatbelts
                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-2">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-3 form-checkbox">
                                <span>ECE Approval</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-3 form-checkbox">
                                <span>Test Report from Approved Test Facility</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-3 form-checkbox">
                                <span>Component Type Approval (CTA)</span>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <input type="text" class="h-10 border border-black">
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                            style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                            <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                            <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                            <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                                style="background-color: #F9F9F9">Browse</button>
                            <input id="fileInput" type="file" class="hidden" />
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                            style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                            <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                            <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                            <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                                style="background-color: #F9F9F9">Browse</button>
                            <input id="fileInput" type="file" class="hidden" />
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div>
                            <input type="text" placeholder="Component"
                                class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                            <div class="flex flex-col items-start mt-1 space-y-1">
                                <div class="flex items-center space-x-1">
                                    <span class="w-8">Type:</span>
                                    <input type="text" placeholder=""
                                        class="h-8 placeholder-gray-600 border border-black w-14 ">
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span class="w-8">Part:</span>
                                    <input type="text" placeholder=" "
                                        class="h-8 placeholder-gray-600 border border-black w-14">
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span class="w-8">Qty.:</span>
                                    <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                                </div>
                            </div>
                        </div>

                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <button>Save </button>
                            <button>Edit </button>
                            <button>Delete </button>
                        </div>
                    </td>



                <tr class="border-b border-gray-200">
                </tr>
                {{-- table row 1 --}}

                {{-- table row 2 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        04/06
                    </td>
                    <td class="px-2 py-2">
                        Seatbelts
                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-1">
                            <div class="flex items-center space-x-1">
                                <input type="checkbox" class="w-3 h-4 form-checkbox">
                                <span>ECE Approval</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-4 form-checkbox">
                                <span>Test Report from Approved Test Facility</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-3 h-4 form-checkbox">
                                <span>Component Type Approval (CTA)</span>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2 ">
                        <div class="flex flex-col items-center justify-center">
                            R00-4768-0023
                        </div>
                    </td>

                    <td class="px-2 py-2 ">
                        <div class="flex flex-col items-center space-y-2">

                            <!-- PNG Document -->
                            <div class="flex flex-col items-center">
                                <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                                <span class="text-sm">photo.jpg</span>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2">
                        <!-- PDF Document -->
                        <div class="flex flex-col items-center">
                            <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                            <span class="text-sm">file.pdf</span>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div>
                            <h1>Passanger Seatbelt LMS </h1>
                            <div class="flex flex-col items-start mt-1 space-y-2">
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Type:</span>
                                    <h1>Front Outboard</h1>
                                    {{-- <input type="text" placeholder="Front Outboar"
                                        class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Part:</span>
                                    <h1>VPN RESETRACTABLE BELT</h1>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Qty.:</span>
                                    <h1>1</h1>

                                </div>
                            </div>
                        </div>

                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                <tr class="border-b border-gray-200">
                </tr>

                {{-- table row 2 --}}


                {{-- table row 3 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        04/06
                    </td>
                    <td class="px-2 py-2">
                        Seatbelts
                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-2">
                            <ul class="pl-5 list-disc">
                                <li>
                                    <span>ECE Approval</span>
                                </li>
                                <li>
                                    <span>Test Report from Approved Test Facility</span>
                                </li>
                                <li>
                                    <span>Component Type Approval (CTA)</span>
                                </li>
                            </ul>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>



                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div>
                            <input type="text" placeholder=""
                                class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                            <div class="flex flex-col items-start mt-1 space-y-2">
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Type:</span>
                                    <input type="text" placeholder="Front Outboar"
                                        class="w-24 h-4 placeholder-gray-600 border border-black ">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Part:</span>
                                    <input type="text" placeholder="VPW Retractor "
                                        class="w-24 h-4 placeholder-gray-600 border border-black">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Qty.:</span>
                                    <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                                </div>
                            </div>
                        </div>

                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                <tr class="border-b border-gray-200">
                </tr>

                {{-- table row 3 --}}



                {{-- table row 4 --}}
                <tr class="bg-white ">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        05/06
                    </td>
                    <td class="px-2 py-2">
                        Anchorages for Seatbelts                    </td>
                    <td class="px-2 py-2">
                        Full
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-start space-y-2">
                            <ul class="pl-5 list-disc">
                                <li>
                                    <span>ECE Approval</span>
                                </li>
                                <li>
                                    <span>Test Report from Approved Test Facility</span>
                                </li>
                                <li>
                                    <span>Component Type Approval (CTA)</span>
                                </li>
                            </ul>
                        </div>

                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>



                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                                style="background-color: #DC3545">
                                <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                            </div>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col">
                            <span>Lower Anchorages</span>
                            <span>Lower Anchorages</span>
                            <span>Upper Anchorages</span>
                        </div>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <div>
                                <h1>Brand New</h1>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-2">
                        <div class="flex flex-col items-center justify-center">
                            <input type="checkbox" class="w-10 h-3 form-checkbox">
                        </div>
                    </td>

                <tr class="border-b border-gray-200">
                </tr>

                {{-- table row 4 --}}


            </tbody>
    </table>
    <!-- Repeat the above structure for each table, changing the ID -->
    <!-- End of Loop -->
    <table id="table3" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-2 py-2">
                    ADR
                </th>
                <th scope="col" class="px-2 py-2">
                    Title
                </th>
                <th scope="col" class="px-2 py-2">
                    Compliance
                </th>
                <th scope="col" class="px-2 py-2">
                    Evidence Type
                </th>
                <th scope="col" class="px-2 py-2">
                    ECE Number
                </th>
                <th scope="col" class="px-2 py-2">
                    Supporting Documents
                </th>
                <th scope="col" class="px-2 py-2">
                    Supporting Images
                </th>
                <th scope="col" class="px-2 py-2">
                    Component Details
                </th>
                <th scope="col" class="px-2 py-2">
                    Component/ System Status
                </th>
                <th scope="col" class="px-2 py-2">
                    ADR Requirements
                </th>
                <th scope="col" class="px-2 py-2">
                </th>
            </tr>
        </thead>
        <tbody>

            {{-- table row 1 --}}
            <tr class="bg-white ">
                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                    05/06
                </td>
                <td class="px-2 py-2">
                    Anchorages for Seatbelts
                </td>
                <td class="px-2 py-2">
                    Full
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-start space-y-2">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-3 h-3 form-checkbox">
                            <span>ECE Approval</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-3 h-3 form-checkbox">
                            <span>Test Report from Approved Test Facility</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-3 h-3 form-checkbox">
                            <span>Component Type Approval (CTA)</span>
                        </div>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <input type="text" class="h-10 border border-black">
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                        style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                        <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                        <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                        <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                            style="background-color: #F9F9F9">Browse</button>
                        <input id="fileInput" type="file" class="hidden" />
                    </div>
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                        style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                        <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                        <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                        <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                            style="background-color: #F9F9F9">Browse</button>
                        <input id="fileInput" type="file" class="hidden" />
                    </div>
                </td>
                <td class="px-2 py-2">
                    <div>
                        <input type="text" placeholder="Component"
                            class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                        <div class="flex flex-col items-start mt-1 space-y-1">
                            <div class="flex items-center space-x-1">
                                <span class="w-8">Type:</span>
                                <input type="text" placeholder=""
                                    class="h-8 placeholder-gray-600 border border-black w-14 ">
                            </div>
                            <div class="flex items-center space-x-1">
                                <span class="w-8">Part:</span>
                                <input type="text" placeholder=" "
                                    class="h-8 placeholder-gray-600 border border-black w-14">
                            </div>
                            <div class="flex items-center space-x-1">
                                <span class="w-8">Qty.:</span>
                                <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                            </div>
                        </div>
                    </div>

                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <h1>Brand New</h1>
                        </div>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <input type="checkbox" class="w-10 h-3 form-checkbox">
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <button>Save </button>
                        <button>Edit </button>
                        <button>Delete </button>
                    </div>
                </td>



            <tr class="border-b border-gray-200">
            </tr>
            {{-- table row 1 --}}

            {{-- table row 2 --}}
            <tr class="bg-white ">
                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                    06/00
                </td>
                <td class="px-2 py-2">
                    Direction Indicators
                </td>
                <td class="px-2 py-2">
                    Full
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-start space-y-1">
                        <div class="flex items-center space-x-1">
                            <input type="checkbox" class="w-3 h-4 form-checkbox">
                            <span>ECE Approval</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-3 h-4 form-checkbox">
                            <span>Test Report from Approved Test Facility</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-3 h-4 form-checkbox">
                            <span>Component Type Approval (CTA)</span>
                        </div>
                    </div>
                </td>

                <td class="px-2 py-2 ">
                    <div class="flex flex-col items-center justify-center">
                        R00-4768-0023
                    </div>
                </td>

                <td class="px-2 py-2 ">
                    <div class="flex flex-col items-center space-y-2">

                        <!-- PNG Document -->
                        <div class="flex flex-col items-center">
                            <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                            <span class="text-sm">photo.jpg</span>
                        </div>
                    </div>
                </td>


                <td class="px-2 py-2">
                    <!-- PDF Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                        <span class="text-sm">file.pdf</span>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div>
                        <h1>Passanger Seatbelt LMS </h1>
                        <div class="flex flex-col items-start mt-1 space-y-2">
                            <div class="flex items-center space-x-2">
                                <span class="w-10">Type:</span>
                                <h1>Front Outboard</h1>
                                {{-- <input type="text" placeholder="Front Outboar"
                                    class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-10">Part:</span>
                                <h1>VPN RESETRACTABLE BELT</h1>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-10">Qty.:</span>
                                <h1>1</h1>

                            </div>
                        </div>
                    </div>

                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <h1>Brand New</h1>
                        </div>
                    </div>
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <input type="checkbox" class="w-10 h-3 form-checkbox">
                    </div>
                </td>

            <tr class="border-b border-gray-200">
            </tr>

            {{-- table row 2 --}}


            {{-- table row 3 --}}
            <tr class="bg-white ">
                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                    06/00
                </td>
                <td class="px-2 py-2">
                    Direction Indicators                </td>
                <td class="px-2 py-2">
                    Full
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-start space-y-2">
                        <ul class="pl-5 list-disc">
                            <li>
                                <span>ECE Approval</span>
                            </li>
                            <li>
                                <span>Test Report from Approved Test Facility</span>
                            </li>
                            <li>
                                <span>Component Type Approval (CTA)</span>
                            </li>
                        </ul>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>



                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>


                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div>
                        <input type="text" placeholder=""
                            class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                        <div class="flex flex-col items-start mt-1 space-y-2">
                            <div class="flex items-center space-x-2">
                                <span class="w-10">Type:</span>
                                <input type="text" placeholder="Front Outboar"
                                    class="w-24 h-4 placeholder-gray-600 border border-black ">
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-10">Part:</span>
                                <input type="text" placeholder="VPW Retractor "
                                    class="w-24 h-4 placeholder-gray-600 border border-black">
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-10">Qty.:</span>
                                <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                            </div>
                        </div>
                    </div>

                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <h1>Brand New</h1>
                        </div>
                    </div>
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <input type="checkbox" class="w-10 h-3 form-checkbox">
                    </div>
                </td>

            <tr class="border-b border-gray-200">
            </tr>

            {{-- table row 3 --}}



            {{-- table row 4 --}}
            <tr class="bg-white ">
                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                    06/00
                </td>
                <td class="px-2 py-2">
                    Direction Indicators
                </td>
                <td class="px-2 py-2">
                    Full
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-start space-y-2">
                        <ul class="pl-5 list-disc">
                            <li>
                                <span>ECE Approval</span>
                            </li>
                            <li>
                                <span>Test Report from Approved Test Facility</span>
                            </li>
                            <li>
                                <span>Component Type Approval (CTA)</span>
                            </li>
                        </ul>
                    </div>

                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>



                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>


                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col">
                        <span>Lower Anchorages</span>
                        <span>Lower Anchorages</span>
                        <span>Upper Anchorages</span>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <h1>Brand New</h1>
                        </div>
                    </div>
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <input type="checkbox" class="w-10 h-3 form-checkbox">
                    </div>
                </td>

            <tr class="border-b border-gray-200">
            </tr>

            {{-- table row 4 --}}
            <tr class="bg-white ">
                <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                    06/00
                </td>
                <td class="px-2 py-2">
                    Direction Indicators
                </td>
                <td class="px-2 py-2">
                    Full
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-start space-y-2">
                        <ul class="pl-5 list-disc">
                            <li>
                                <span>ECE Approval</span>
                            </li>
                            <li>
                                <span>Test Report from Approved Test Facility</span>
                            </li>
                            <li>
                                <span>Component Type Approval (CTA)</span>
                            </li>
                        </ul>
                    </div>

                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>



                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>


                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                            style="background-color: #DC3545">
                            <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                        </div>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col">
                        <span>Lower Anchorages</span>
                        <span>Lower Anchorages</span>
                        <span>Upper Anchorages</span>
                    </div>
                </td>

                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <h1>Brand New</h1>
                        </div>
                    </div>
                </td>
                <td class="px-2 py-2">
                    <div class="flex flex-col items-center justify-center">
                        <input type="checkbox" class="w-10 h-3 form-checkbox">
                    </div>
                </td>

            <tr class="border-b border-gray-200">
            </tr>


        </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->

<table id="table4" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                08/01
            </td>
            <td class="px-2 py-2">
                Safety Glazing Materials            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white border border-red-500">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                10/02
            </td>
            <td class="px-2 py-2">
                Steering Column
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                    Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                    <br>
                    Division 3—Prescription of standards: concessional and additional standards
                Clause 21 Standards—rare vehicles
                <br>
                Section(3)
                <br>
                The standards in subsection (2) apply to the exclusion of the following:
                <br>
                (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
                <br>
                (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
                <br>
                (i) ADR 10—Steering Column;
                <br>
                (ii) ADR 29—Side Door Strength;
                 <br>
                (iii) ADR 69—Full Frontal Impact Occupant Protection;
                <br>
                (iv) ADR 72—Dynamic Side Impact Occupant Protection;
                 <br>
                (v) ADR 73—Offset Frontal Impact Occupant Protection;
                 <br>
                (vi) ADR 85—Pole Side Impact Performance;
                <br>
                Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
                 <br>
                vehicles, exclusion of ADR 10—Steering Column is permitted.
                <br>
                ADR 10—Steering Column - Exempt / Not Applicable.
                
                
            </td>


          




           
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1></h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}




    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->

<table id="table5" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                11/00
            </td>
            <td class="px-2 py-2">
                Internal Sun Visors
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                13/00
            </td>
            <td class="px-2 py-2">
                Installation of Lighting and Light-Signalling Devices on other than L-group Vehicles
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                13/00
            </td>
            <td class="px-2 py-2">
                Installation of Lighting and Light-Signalling Devices on other than L-group Vehicles
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}





    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table6" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                13/00
            </td>
            <td class="px-2 py-2">
                Installation of Lighting and Light-Signalling Devices on other than L-group Vehicles
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                14/02
            </td>
            <td class="px-2 py-2">
                Rear Vision Mirrors
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                14/02
            </td>
            <td class="px-2 py-2">
                Rear Vision Mirrors            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                18/03
            </td>
            <td class="px-2 py-2">
                Instrumentation            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                21/00
            </td>
            <td class="px-2 py-2">
                Instrument Panel         
             </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table7" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                21/00
            </td>
            <td class="px-2 py-2">
                Instrument Panel            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                22/00
            </td>
            <td class="px-2 py-2">
                Head Restraints
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>*</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                23/03
            </td>
            <td class="px-2 py-2">
                Passenger Car Tyres
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                23/03
            </td>
            <td class="px-2 py-2">
                Passenger Car Tyres
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table8" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                25/02
            </td>
            <td class="px-2 py-2">
                Anti-Theft Lock            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>TBD</span>
                    </div>
                   
                    
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                29/00
            </td>
            <td class="px-2 py-2">
                Side Door Strength
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                30/01
            </td>
            <td class="px-2 py-2">
                Smoke Emission Control for Diesel Vehicles
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                
                ADR 30/01 Not Applicable.
                <br>
                Vehicle exempt as engine is not a diesel.
                
            
            </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}




    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table9" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                31/04
            </td>
            <td class="px-2 py-2">
                Brake Systems for Passenger Cars
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                  
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                31/04
            </td>
            <td class="px-2 py-2">
                Brake Systems for Passenger Cars
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                31/04
            </td>
            <td class="px-2 py-2">
                Brake Systems for Passenger Cars
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>




    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table10" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                34/03
            </td>
            <td class="px-2 py-2">
                Child Restraint Anchorages and Child Restraint Anchor Fittings
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                42/05
            </td>
            <td class="px-2 py-2">
                General Safety Requirements
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Declaration</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                43/04
            </td>
            <td class="px-2 py-2">
                Vehicle Configuration & Dimensions
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Declaration</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                44/02
            </td>
            <td class="px-2 py-2">
                Specific Vehicle Requirements
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Exemption</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                45/01
            </td>
            <td class="px-2 py-2">
                Lighting & Light Signalling Devices not Covered by ECE Regulations            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Exemption</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table11" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                46/00
            </td>
            <td class="px-2 py-2">
                Headlamps
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                46/00
            </td>
            <td class="px-2 py-2">
                Headlamps
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                47/00
            </td>
            <td class="px-2 py-2">
                Retroreflectors
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                48/00
            </td>
            <td class="px-2 py-2">
                Devices for Illumination of Rear Registration Plates
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table12" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                49/00
            </td>
            <td class="px-2 py-2">
                Front and Rear Position (Side) Lamps, Stop Lamps and End-Outline Marker Lamps
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                49/00
            </td>
            <td class="px-2 py-2">
                Front and Rear Position (Side) Lamps, Stop Lamps and End-Outline Marker Lamps
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                49/00
            </td>
            <td class="px-2 py-2">
                Front and Rear Position (Side) Lamps, Stop Lamps and End-Outline Marker Lamps
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                50/00
            </td>
            <td class="px-2 py-2">
                Front Fog Lamps
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                51/00
            </td>
            <td class="px-2 py-2">
                Filament Lamps
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->

<table id="table13" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                52/00
            </td>
            <td class="px-2 py-2">
                Rear Fog Lamps
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                60/00
            </td>
            <td class="px-2 py-2">
                Centre High Mounted Stop Lamp
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                61/03
            </td>
            <td class="px-2 py-2">
                Vehicle Marking
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                62/02
            </td>
            <td class="px-2 py-2">
                Mechanical Connections Between Vehicles
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>ECE Approval</span>
                        </li>
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span>Component Type Approval (CTA)</span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->

<table id="table14" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                69/00
            </td>
            <td class="px-2 py-2">
                Full Frontal Impact Occupant Protection
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

    


    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table15" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                72/00
            </td>
            <td class="px-2 py-2">
                Dynamic Side Impact Occupant Protection
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>

           

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}



    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table16" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                73/00
            </td>
            <td class="px-2 py-2">
                Offset Frontal Impact Occupant Protection
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                74/00
            </td>
            <td class="px-2 py-2">
                Side Marker Lamps
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
           
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                75/00
            </td>
            <td class="px-2 py-2">
                Headlamp Cleaners
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>

            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
           
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}




    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table17" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                76/00
            </td>
            <td class="px-2 py-2">
                Daytime Running Lamps
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>ECE Approval</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span>Component Type Approval (CTA)</span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                77/00
            </td>
            <td class="px-2 py-2">
                Gas Discharge Headlamps 
            </td>
            <td class="px-2 py-2">
                Exemption            </td>
                
                            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
          
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                78/00
            </td>
            <td class="px-2 py-2">
                Gas Discharge Light Sources
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}



        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                79/04
            </td>
            <td class="px-2 py-2">
                Emission Control for Light Vehicles
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 4 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                81/02
            </td>
            <td class="px-2 py-2">
                Fuel Consumption Labelling for Light Vehicles
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col">
                    <span>Lower Anchorages</span>
                    <span>Lower Anchorages</span>
                    <span>Upper Anchorages</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>



    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->
<table id="table18" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                82/00
            </td>
            <td class="px-2 py-2">
                Engine Immobilisers
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                83/00
            </td>
            <td class="px-2 py-2">
                External Noise
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                85/00
            </td>
            <td class="px-2 py-2">
                Pole Side Impact Performance
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}




    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->

<table id="table19" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                86/00
            </td>
            <td class="px-2 py-2">
                Parking Lamps
            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                87/00
            </td>
            <td class="px-2 py-2">
                Cornering Lamps            </td>
            <td class="px-2 py-2">
                Exemption
            </td>
            <td colspan="5" class="px-2 py-2 whitespace-nowrap">              
                Road Vehicle Standards (Model Reports— Compliance with Standards) Determination 2021
                <br>
                Division 3—Prescription of standards: concessional and additional standards
            Clause 21 Standards—rare vehicles
            <br>
            Section(3)
            <br>
            The standards in subsection (2) apply to the exclusion of the following:
            <br>
            (a) an applicable ADR, to the extent it requires the vehicle to be right-hand drive;
            <br>
            (b) the following applicable ADRs, to the extent they require destructive testing to demonstrate compliance:
            <br>
            (i) ADR 10—Steering Column;
            <br>
            (ii) ADR 29—Side Door Strength;
             <br>
            (iii) ADR 69—Full Frontal Impact Occupant Protection;
            <br>
            (iv) ADR 72—Dynamic Side Impact Occupant Protection;
             <br>
            (v) ADR 73—Offset Frontal Impact Occupant Protection;
             <br>
            (vi) ADR 85—Pole Side Impact Performance;
            <br>
            Based on the Model Reports— Compliance with Standards Determination, Clause 21 Standards—rare
             <br>
            vehicles, exclusion of ADR 10—Steering Column is permitted.
            <br>
            ADR 10—Steering Column - Exempt / Not Applicable.
            
            
        </td>


      




       
        <td class="px-2 py-2">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1></h1>
                </div>
            </div>
        </td> 
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                88/00
            </td>
            <td class="px-2 py-2">
                Electronic Stability Control 
         </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                89/00
            </td>
            <td class="px-2 py-2">
                Brake Assist System           </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                90/00
            </td>
            <td class="px-2 py-2">
                Steering System           </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                92/00
            </td>
            <td class="px-2 py-2">
                External Projections           </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>





    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->

<table id="table20" class="hidden text-sm text-left divide-y divide-gray-200 tableee">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-2 py-2">
                ADR
            </th>
            <th scope="col" class="px-2 py-2">
                Title
            </th>
            <th scope="col" class="px-2 py-2">
                Compliance
            </th>
            <th scope="col" class="px-2 py-2">
                Evidence Type
            </th>
            <th scope="col" class="px-2 py-2">
                ECE Number
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Documents
            </th>
            <th scope="col" class="px-2 py-2">
                Supporting Images
            </th>
            <th scope="col" class="px-2 py-2">
                Component Details
            </th>
            <th scope="col" class="px-2 py-2">
                Component/ System Status
            </th>
            <th scope="col" class="px-2 py-2">
                ADR Requirements
            </th>
            <th scope="col" class="px-2 py-2">
            </th>
        </tr>
    </thead>
    <tbody>

        {{-- table row 1 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                93/00
            </td>
            <td class="px-2 py-2">
                Forward Field of View
            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-3 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <input type="text" class="h-10 border border-black">
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center w-32 p-2 border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-36 "
                    style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                    <h1 class="font-bold text-gray-500 text-md">Drop files here</h1>
                    <h3 class="text-sm text-center text-gray-500" style=>drag and drop, or browse your file</h3>
                    <button class="w-20 py-1 mt-2 font-semibold text-gray-800 border rounded-md "
                        style="background-color: #F9F9F9">Browse</button>
                    <input id="fileInput" type="file" class="hidden" />
                </div>
            </td>
            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder="Component"
                        class="h-8 px-0 placeholder-gray-600 border border-black w-18">

                    <div class="flex flex-col items-start mt-1 space-y-1">
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Type:</span>
                            <input type="text" placeholder=""
                                class="h-8 placeholder-gray-600 border border-black w-14 ">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Part:</span>
                            <input type="text" placeholder=" "
                                class="h-8 placeholder-gray-600 border border-black w-14">
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="w-8">Qty.:</span>
                            <input type="text" placeholder="" class="h-8 border border-black w-14 ">
                        </div>
                    </div>
                </div>

            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <button>Save </button>
                    <button>Edit </button>
                    <button>Delete </button>
                </div>
            </td>



        <tr class="border-b border-gray-200">
        </tr>
        {{-- table row 1 --}}

        {{-- table row 2 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                94/00
            </td>
            <td class="px-2 py-2">
                Audible Warning            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-1">
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span>Test Report from Approved Test Facility</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="w-3 h-4 form-checkbox">
                        <span></span>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center justify-center">
                    R00-4768-0023
                </div>
            </td>

            <td class="px-2 py-2 ">
                <div class="flex flex-col items-center space-y-2">

                    <!-- PNG Document -->
                    <div class="flex flex-col items-center">
                        <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                        <span class="text-sm">photo.jpg</span>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <!-- PDF Document -->
                <div class="flex flex-col items-center">
                    <img src="path/to/pdf-icon.png" alt="PDF Icon" class="w-10 h-10">
                    <span class="text-sm">file.pdf</span>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <h1>Passanger Seatbelt LMS </h1>
                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <h1>Front Outboard</h1>
                            {{-- <input type="text" placeholder="Front Outboar"
                                class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <h1>VPN RESETRACTABLE BELT</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <h1>1</h1>

                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

        {{-- table row 2 --}}


        {{-- table row 3 --}}
        <tr class="bg-white ">
            <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                95/00
            </td>
            <td class="px-2 py-2">
                Installation of Tyres            </td>
            <td class="px-2 py-2">
                Full
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-start space-y-2">
                    <ul class="pl-5 list-disc">
                        <li>
                            <span>Test Report from Approved Test Facility</span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </td>

            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>



            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>


            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-10 h-10 p-0 bg-red rounded-xl"
                        style="background-color: #DC3545">
                        <h1 class="m-0 font-bold text-center text-white">TBD</h1>
                    </div>
                </div>
            </td>

            <td class="px-2 py-2">
                <div>
                    <input type="text" placeholder=""
                        class="h-8 px-2 placeholder-gray-600 border border-black w-46">

                    <div class="flex flex-col items-start mt-1 space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Type:</span>
                            <input type="text" placeholder="Front Outboar"
                                class="w-24 h-4 placeholder-gray-600 border border-black ">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Part:</span>
                            <input type="text" placeholder="VPW Retractor "
                                class="w-24 h-4 placeholder-gray-600 border border-black">
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-10">Qty.:</span>
                            <input type="text" placeholder="1" class="w-24 h-4 border border-black ">
                        </div>
                    </div>
                </div>

            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <h1>Brand New</h1>
                    </div>
                </div>
            </td>
            <td class="px-2 py-2">
                <div class="flex flex-col items-center justify-center">
                    <input type="checkbox" class="w-10 h-3 form-checkbox">
                </div>
            </td>

        <tr class="border-b border-gray-200">
        </tr>

   




    </tbody>
</table>
<!-- Repeat the above structure for each table, changing the ID -->


</div>

<!-- Pagination Buttons -->
<div class="pagination">
    <button class="prev-page">Previous</button>
    <span class="page-number">Page 1 of 20</span>
    <button class="next-page">Next</button>
</div>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = 1;
        var totalPages = 18; // Change this to the total number of tables

        // Add event listeners to pagination buttons
        document.querySelector('.prev-page').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                updateTables();
            }
        });

        document.querySelector('.next-page').addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                updateTables();
            }
        });

        function updateTables() {
            // Hide all tables
            var tables = document.querySelectorAll('.tableee');
            tables.forEach(function(table) {
                table.classList.add('hidden');
            });

            // Show the current page table
            var currentTable = document.getElementById('table' + currentPage);
            if (currentTable) {
                currentTable.classList.remove('hidden');
            }
        }
    });
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = 1;
        var totalPages = 20; // Change this to the total number of tables

        // Add event listeners to pagination buttons
        document.querySelector('.prev-page').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                updateTables();
            }
        });

        document.querySelector('.next-page').addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                updateTables();
            }
        });

        function updateTables() {
            // Hide all tables
            var tables = document.querySelectorAll('.tableee');
            tables.forEach(function(table) {
                table.classList.add('hidden');
            });

            // Show the current page table
            var currentTable = document.getElementById('table' + currentPage);
            if (currentTable) {
                currentTable.classList.remove('hidden');
            }

            // Update the page number display
            document.querySelector('.page-number').textContent = 'Page ' + currentPage + ' of ' + totalPages;
        }

        // Initialize the display
        updateTables();
    });
</script>


    </div>


</div>

@endsection