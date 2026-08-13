@extends('layouts.layout')

@section('content')
    @include('components.landingpagenavbar')

    <style>
        .triangle {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 20px solid black;
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .url {
            word-break: break-all;
        }

        .url {
            white-space: pre-wrap;
        }

        @media (max-width: 600px) {
            .url {
                word-break: break-all;
            }
        }
    </style>

    <div class=" w-full h-auto py-2 " style="background-color: #F9F9F9">
        <div class="">
            <div class="md:flex justify-around">
                <!-- Modal Overlay and Content -->
                <x-partlistmodel />
            </div>

            <!-- Always show the Add New Supplier button -->
            <div class="mx-4 w-40 bg-black text-center flex justify-center items-center rounded-md h-10">
                <a href="#" onclick="toggleModal()" class="text-white font-bold text-sm">
                    Add New Supplier
                </a>
            </div>

            <!-- Show supplier details only if there are suppliers -->
            @if($suppliers->isNotEmpty())
            <div class="md:grid grid-cols-3 ">

                @foreach ($suppliers as $supplier)
                    <div class="flex flex-col bg-white rounded-2xl overflow-hidden mt-10" style="border: 1px solid #e5e7eb; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); transition: box-shadow 0.3s ease;">
                        
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

            @endif
        </div>
    </div>
@endsection
