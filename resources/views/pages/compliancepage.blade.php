@extends('layouts.layout')

    @section('content')

    @include('components.landingpagenavbar')

  <style>
        /* Add your existing styles here */

        /* Media queries for hiding columns on smaller screens */
        @media (max-width: 1366px) {
            .tableee{
            }
        }


        @media (max-width: 1440px) {
            .tableee{
            }
        }

        @media (max-width: 1280px) {
            .tableee{
            }
        }


        @media (max-width: 1440) {
            .tableee{
            }
        }

    </style>
    <div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="tableee w-full text-sm text-left divide-y divide-gray-200">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                           ADR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                         </th>
                         <th scope="col" class="px-6 py-3">
                            Compliance
                         </th>
                         <th scope="col" class="px-6 py-3">
                            Evidence Type
                         </th>
                         <th scope="col" class="px-6 py-3">
                            ECE Number
                         </th>
                         <th scope="col" class="px-6 py-3">
                            Supporting Documents
                         </th>
                        <th scope="col" class="px-6 py-3">
                            Supporting Images
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Component Details
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Component/ System Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ADR Requirements
                        </th>
                    </tr>
                </thead>
                <tbody>

                    {{-- table row 1  --}}
                    <tr class="bg-white ">
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                           04/06
                        </td>
                        <td class="px-6 py-4">
                            Seatbelts
                        </td>
                        <td class="px-6 py-4">
                            Full
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col items-start space-y-2">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox h-4 w-4">
                                    <span>ECE Approval</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox h-4 w-4">
                                    <span>Test Report from Approved Test Facility</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox h-4 w-4">
                                    <span>Component Type Approval (CTA)</span>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <input type="text" class="border border-black h-10">
                        </td>

                        <td class="px-6 py-4">
                            <div class="w-52 h-36 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 p-6 border border-red-500 rounded-md cursor-pointer " style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                                <h1 class="text-md font-bold text-gray-500">Drop files here</h1>
                                <h3 class="text-sm text-gray-500 text-center" style=>drag and drop, or browse your file</h3>
                                <button class="mt-4 border w-32 py-2 font-semibold text-gray-800 rounded-md " style="background-color: #F9F9F9">Browse</button>
                                <input id="fileInput" type="file" class="hidden" />
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="w-52 h-36 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 p-6 border border-red-500 rounded-md cursor-pointer " style="background-color: #F9F9F9" onclick="document.getElementById('fileInput').click();">
                                <h1 class="text-md font-bold text-gray-500">Drop files here</h1>
                                <h3 class="text-sm text-gray-500 text-center" style=>drag and drop, or browse your file</h3>
                                <button class="mt-4 border w-32 py-2 font-semibold text-gray-800 rounded-md " style="background-color: #F9F9F9">Browse</button>
                                <input id="fileInput" type="file" class="hidden" />
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <input type="text" placeholder="Component" class="border border-black h-8 px-2 w-46 placeholder-gray-600">

                                <div class="flex flex-col items-start space-y-2 mt-1">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-10">Type:</span>
                                        <input type="text" placeholder="" class="border border-black w-32 h-8 placeholder-gray-600 ">
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-10">Part:</span>
                                        <input type="text" placeholder=" "  class="border border-black w-32 h-8 placeholder-gray-600">
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-10">Qty.:</span>
                                        <input type="text" placeholder="" class="border border-black h-8 w-32 ">
                                    </div>
                                </div>
                        </div>

                        </td>

                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div>
                                    <h1>Brand New</h1>
                                </div>
                            </div>
                        </td>

                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4">
                            </div>
                        </td>

                        <tr class="border-b border-gray-200">
                    </tr>
                    {{-- table row 1  --}}

                    {{-- table row 2  --}}
                    <tr class="bg-white ">
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                           04/06
                        </td>
                        <td class="px-6 py-4">
                            Seatbelts
                        </td>
                        <td class="px-6 py-4">
                            Full
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col items-start space-y-2">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox h-4 w-4">
                                    <span>ECE Approval</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox h-4 w-4">
                                    <span>Test Report from Approved Test Facility</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox h-4 w-4">
                                    <span>Component Type Approval (CTA)</span>
                                </div>
                            </div>
                        </td>

                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                R00-4768-0023
                            </div>
                            </td>

                        <td class="px-6 py-4 ">
                            <div class="flex flex-col items-center space-y-2">

                                <!-- PNG Document -->
                                <div class="flex flex-col items-center">
                                    <img src="path/to/png-icon.png" alt="PNG Icon" class="h-10 w-10">
                                    <span class="text-sm">photo.jpg</span>
                                </div>
                            </div>
                        </td>


                        <td class="px-6 py-4">
                              <!-- PDF Document -->
                              <div class="flex flex-col items-center">
                                <img src="path/to/pdf-icon.png" alt="PDF Icon" class="h-10 w-10">
                                <span class="text-sm">file.pdf</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div>
                                <input type="text" placeholder="" class="border border-black h-8 px-2 w-46">

                                <div class="flex flex-col items-start space-y-2 mt-1">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-10">Type:</span>
                                        <input type="text" placeholder="Front Outboar" class="border border-black w-32 h-8 placeholder-gray-600 ">
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-10">Part:</span>
                                        <input type="text" placeholder="VPW Retractor "  class="border border-black w-32 h-8 placeholder-gray-600">
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-10">Qty.:</span>
                                        <input type="text" placeholder="1" class="border border-black h-8 w-32 ">
                                    </div>
                                </div>
                        </div>

                        </td>
                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div>
                                    <h1>Brand New</h1>
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4">
                            </div>
                        </td>

                        <tr class="border-b border-gray-200">
                    </tr>

                    {{-- table row 2  --}}


                      {{-- table row 3  --}}
                      <tr class="bg-white ">
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                           04/06
                        </td>
                        <td class="px-6 py-4">
                            Seatbelts
                        </td>
                        <td class="px-6 py-4">
                            Full
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col items-start space-y-2">
                                <ul class="list-disc pl-5">
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

                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div class="bg-red w-14 h-10 rounded-xl flex justify-center items-center p-0" style="background-color: #DC3545">
                                    <h1 class="text-center text-white font-bold m-0">TBD</h1>
                                </div>
                            </div>
                        </td>



                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div class="bg-red w-14 h-10 rounded-xl flex justify-center items-center p-0" style="background-color: #DC3545">
                                    <h1 class="text-center text-white font-bold m-0">TBD</h1>
                                </div>
                            </div>
                        </td>


                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div class="bg-red w-14 h-10 rounded-xl flex justify-center items-center p-0" style="background-color: #DC3545">
                                    <h1 class="text-center text-white font-bold m-0">TBD</h1>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div>
                                <input type="text" placeholder="" class="border border-black h-8 px-2 w-46 placeholder-gray-600">

                            <div class="flex flex-col items-start space-y-2 mt-1">
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Type:</span>
                                    <input type="text" placeholder="Front Outboar" class="border border-black w-32 h-8 placeholder-gray-600 ">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Part:</span>
                                    <input type="text" placeholder="VPW Retractor "  class="border border-black w-32 h-8 placeholder-gray-600">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-10">Qty.:</span>
                                    <input type="text" placeholder="1" class="border border-black h-8 w-32 ">
                                </div>
                            </div>
                        </div>

                        </td>
                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div>
                                    <h1>Brand New</h1>
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4">
                            </div>
                        </td>

                        <tr class="border-b border-gray-200">
                    </tr>

                    {{-- table row 3  --}}



                      {{-- table row 4  --}}
                      <tr class="bg-white ">
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                           04/06
                        </td>
                        <td class="px-6 py-4">
                            Seatbelts
                        </td>
                        <td class="px-6 py-4">
                            Full
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col items-start space-y-2">
                                <ul class="list-disc pl-5">
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

                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div class="bg-red w-14 h-10 rounded-xl flex justify-center items-center p-0" style="background-color: #DC3545">
                                    <h1 class="text-center text-white font-bold m-0">TBD</h1>
                                </div>
                            </div>
                        </td>



                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div class="bg-red w-14 h-10 rounded-xl flex justify-center items-center p-0" style="background-color: #DC3545">
                                    <h1 class="text-center text-white font-bold m-0">TBD</h1>
                                </div>
                            </div>
                        </td>


                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div class="bg-red w-14 h-10 rounded-xl flex justify-center items-center p-0" style="background-color: #DC3545">
                                    <h1 class="text-center text-white font-bold m-0">TBD</h1>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span>Lower Anchorages</span>
                                <span>Lower Anchorages</span>
                                <span>Upper Anchorages</span>
                            </div>
                        </td>

                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                                <div>
                                    <h1>Brand New</h1>
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex flex-col justify-center items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4">
                            </div>
                        </td>

                        <tr class="border-b border-gray-200">
                    </tr>

                    {{-- table row 4  --}}


                </tbody>
            </table>
        </div>


    </div>

    @endsection
