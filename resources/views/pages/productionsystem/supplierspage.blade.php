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

    <div class=" w-full h-screen" style="background-color: #F9F9F9">
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
            <div class="md:grid grid-cols-3  j">

                @foreach ($suppliers as $supplier)
                    <div class="flex flex-col bg-white md:w-[570px] mx-4 p-10 rounded-2xl mt-2 ">
                        <div class="flex items-end">

                            <div>
                                <img src="{{ asset('storage/profile_images/' . $supplier->upload_image) }}" class="w-52 h-24" alt="profile Pic">


                            </div>
                            <a href="#" class="ml-auto">
                                <img class="h-14" src="{{ asset('images/partlist01.jpg') }}" alt="profile Pic">
                            </a>
                            <div class="gap-3">
                                <button>Edit</button>
                                <button>Delete</button>
                            </div>
                        </div>

                        <div class="mt-5 border-b-2 border-black pb-2">
                            <h1 class="font-bold text-xl">{{ $supplier->business_name }}</h1>
                            <h2 class="font-bold">{{ $supplier->business_web }}</h2>
                        </div>

                        <div class="flex flex-col mt-5">
                            <div class="grid grid-cols-2 items-center border-b border-black">
                                <div class="flex items-center">
                                    <h1 class="font-bold pr-2">Country:</h1>
                                    <h1 class="text-left">{{ $supplier->country }}</h1>
                                </div>
                                <div class="flex items-center border-l-4 border-black pl-2" style="padding: 10px;">
                                    <h1 class="font-bold pr-2">Account Contact:</h1>
                                    <h1 class="text-left">{{ $supplier->contact_name }}</h1>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 items-center">
                                <div class="flex items-center border-b-4 border-black">
                                    <h1 class="font-bold pr-2">P:</h1>
                                    <h1 class="text-left">{{ $supplier->phone }}</h1>
                                </div>
                                <div class="flex items-center border-l-4 border-b-4 border-black pl-2">
                                    <h1 class="font-bold pr-2">E:</h1>
                                    <h1 class="text-left">{{ $supplier->email }}</h1>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="flex">
                                    <div class="flex-col mt-5">
                                        <div class="flex">
                                            <h1 class="pr-2 font-semibold">CRM</h1>
                                        </div>
                                        <div class="flex">
                                            <h1 class="pr-2 font-semibold">url: <span class="text-left text-balance url">{{ $supplier->crm_url }}</span></h1>
                                        </div>
                                        <div class="flex">
                                            <h1 class="text-left font-semibold">Username: {{ $supplier->crm_username }}</h1>
                                        </div>
                                        <div class="flex">
                                            <h1 class="text-left font-semibold">Password: ******</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex border-l-4 border-black pl-2">
                                    <div class="flex-col mt-4">
                                        <div class="flex">
                                            <h1 class="pr-2">Trade Account:</h1>
                                            <h1 class="text-left">{{ $supplier->trade_account ? 'Yes' : 'No' }}</h1>
                                        </div>
                                        <div class="flex">
                                            <h1 class="pr-2">Agreement:</h1>
                                            <h1 class="text-left">{{ $supplier->trade_agreement_pdf ? 'Agreement.pdf' : 'No Agreement' }}</h1>
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
