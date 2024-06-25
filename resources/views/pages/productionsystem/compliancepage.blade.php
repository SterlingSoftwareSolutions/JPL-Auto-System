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


        <table class="text-sm text-left divide-y divide-gray-200 tableee">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="border-b-4 border-gray-900">
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
                @foreach ($adrData as $adr)
                <tr class="bg-white border-b border-gray-900">
                    <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                        {{ $adr->adrtext }}
                    </td>
                    <td class="px-2 py-2">
                        {{ $adr->title }}
                    </td>
                    <td class="px-2 py-2">
                        {{ $adr->compliancetext }}
                    </td>
                    @if($adr->compliancetext == 'Exemption')
                    <td class="px-2 py-2" colspan="5">
                        <div class="flex flex-col items-start space-y-2">@if ($adr->exemption)
                            {{ $adr->exemption->description }}
                        @endif</div>
                    </td>
                    @else
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
                    @endif
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
                            <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Save </button>
                            <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Edit </button>
                            <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Delete </button>
                        </div>
                    </td>




                </tr>
                @endforeach
                {{-- table row 1 --}}

                {{-- table row 2 --}}

                {{-- <tr class="bg-white ">
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
                        <div class="flex flex-col items-center space-y-2"> --}}

                            <!-- PNG Document -->
                            {{-- <div class="flex flex-col items-center">
                                <img src="path/to/png-icon.png" alt="PNG Icon" class="w-10 h-10">
                                <span class="text-sm">photo.jpg</span>
                            </div>
                        </div>
                    </td>


                    <td class="px-2 py-2"> --}}
                        <!-- PDF Document -->
                        {{-- <div class="flex flex-col items-center">
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
                                    <h1>Front Outboard</h1> --}}
                                    {{-- <input type="text" placeholder="Front Outboar"
                                        class="w-32 h-8 placeholder-gray-600 border border-black "> --}}
                                {{-- </div>
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
                </tr> --}}

                {{-- table row 2 --}}


                {{-- table row 3 --}}
                {{-- <tr class="bg-white ">
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
                </tr> --}}

                {{-- table row 3 --}}



                {{-- table row 4 --}}
                {{-- <tr class="bg-white ">
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
                </tr> --}}


                {{-- table row 4 --}}


            </tbody>

        </table>
        <div class="mt-4 flex flex-col items-center">
            <div class="mb-2 text-gray-600">
                Page {{ $adrData->currentPage() }} of {{ $adrData->lastPage() }}
            </div>
            <div>
                {{ $adrData->links() }}
            </div>
        </div>

    </div>


</div>

@endsection
