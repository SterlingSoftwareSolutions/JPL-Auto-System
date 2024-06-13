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
        right: -20px; /* Adjust to position the triangle */
        top: 50%;
        transform: translateY(-50%);
    }

    .url {
    word-break: break-all; /* Allows breaking anywhere */
}

/* Alternatively, for more control, use this: */
.url {
    white-space: pre-wrap; /* Preserves whitespace and allows wrapping */
}

/* You can add specific media queries for better control on mobile devices */
@media (max-width: 600px) {
    .url {
        word-break: break-all;
    }
}
</style>

<div class="w-full  " style="background-color: #F9F9F9">

    <div class="">

    <div class="md:flex justify-around">

    {{-- box 1 --}}
    <div class="flex flex-col bg-white md:w-[550px] mx-4  p-10  rounded-2xl ">
        <div class="flex items-end">
            <div>
                <img src="{{ asset('images/supplier-logo.png') }}" alt="profile Pic">
            </div>
            <a href="#" onclick="toggleModal()" class="ml-auto">
                <img class="h-14" src="{{ asset('images/partlist01.jpg') }}" alt="profile Pic">
            </a>

            <!-- Modal Overlay and Content -->
            <x-partlistmodel />

        </div>




        <div class="mt-5 border-b-2 border-black pb-2">
            <h1 class="font-bold text-xl">Car Parts Supplier</h1>
            <h2 class="font-bold">www.cars.com.au</h2>
        </div>

        <div class="flex flex-col mt-5">
            <div class="grid grid-cols-2 items-center border-b border-black">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">Country :</h1>
                    <h1 class="text-left">United States</h1>
                </div>
                <div class="flex items-center border-l-4 border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">Account Contact :</h1>
                    <h1 class="text-left">John</h1>
                </div>
            </div>
            <div class="grid grid-cols-2 items-center"  >
                <div class="flex items-center border-b-4 border-black ">
                    <h1 class="font-bold pr-2">P :</h1>
                    <h1 class="text-left">1300 231 456</h1>

                </div>
                <div class="flex items-center border-l-4 border-b-4 border-black pl-2">
                    <h1 class="font-bold pr-2">E :</h1>
                    <h1 class="text-left">john@carparts.com</h1>
                </div>
            </div>

            <div class="grid grid-cols-2" >
                <div class="flex   ">
                    <div class="flex-col mt-5">
                        <div class="flex">
                            <h1 class=" pr-2 font-semibold">CRM</h1>
                        </div>
                        <div class="flex">
                            <h1 class="pr-2 font-semibold">url:<span class="text-left text-balance url">www.cjponyparts.com/login</span></h1>

                        </div>
                        <div class="flex">
                            <h1 class="text-left font-semibold">Username:cjpony</h1>
                        </div>
                        <div class="flex">
                            <h1 class="text-left font-semibold">Password:******</h1>
                        </div>

                    </div>

                </div>
                <div class="flex  border-l-4  border-black pl-2">
                    <div class="flex-col mt-4">
                        <div class="flex">
                            <h1 class=" pr-2">Trade Account:</h1>
                            <h1 class="text-left">Yes</h1>
                        </div>
                        <div class="flex">
                            <h1 class=" pr-2">Agreement:</h1>
                            <h1 class="text-left">Agreemnet.pdf</h1>
                        </div>

                    </div>
                </div>

            </div>



        </div>

    </div>
    {{-- box 1 --}}

     {{-- box 2 --}}
     <div class="flex flex-col bg-white md:w-[550px] mx-4  p-10  rounded-2xl">
        <div>
            <img src="{{ asset('images/supplier-logo.png') }}" alt="profile Pic">
        </div>
        <div class="mt-5 border-b-2 border-black pb-2">
            <h1 class="font-bold text-xl">Car Parts Supplier</h1>
            <h2 class="font-bold">www.cars.com.au</h2>
        </div>



        <div class="flex flex-col mt-5">
            <div class="grid grid-cols-2 items-center border-b border-black">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">Country :</h1>
                    <h1 class="text-left">United States</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">Account Contact :</h1>
                    <h1 class="text-left">John</h1>
                </div>
            </div>
            <div class="grid grid-cols-2 items-center">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">P :</h1>
                    <h1 class="text-left">1300 231 456</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">E :</h1>
                    <h1 class="text-left">john@carparts.com</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center py-5  gap-10">
            <div class="relative rounded-sm w-44 h-10 flex items-center justify-center hover:bg-black bg-black transition-colors duration-300">
                <button class="text-white text-center font-bold z-10">Parts List</button>
                <div class="triangle"></div>
            </div>
            <div class="flex flex-col items-start ml-5">
                <h1 class="font-bold">Trade Account: <span class="font-normal"> Yes</span></h1>
                <h1 class="font-bold">Agreement: <span class="font-normal"> agreement.pdf</span></h1>
            </div>
        </div>

    </div>
    {{-- box 2 --}}


     {{-- box 3 --}}
     <div class="flex flex-col bg-white md:w-[550px] mx-4  p-10 rounded-2xl ">
        <div>
            <img src="{{ asset('images/supplier-logo.png') }}" alt="profile Pic">
        </div>
        <div class="mt-5 border-b-2 border-black pb-2">
            <h1 class="font-bold text-xl">Car Parts Supplier</h1>
            <h2 class="font-bold">www.cars.com.au</h2>
        </div>

        <div class="flex flex-col mt-5">
            <div class="grid grid-cols-2 items-center border-b border-black">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">Country :</h1>
                    <h1 class="text-left">United States</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">Account Contact :</h1>
                    <h1 class="text-left">John</h1>
                </div>
            </div>
            <div class="grid grid-cols-2 items-center">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">P :</h1>
                    <h1 class="text-left">1300 231 456</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">E :</h1>
                    <h1 class="text-left">john@carparts.com</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center py-5  gap-10">
            <div class="relative rounded-sm w-44 h-10 flex items-center justify-center hover:bg-black bg-black transition-colors duration-300">
                <button class="text-white text-center font-bold z-10">Parts List</button>
                <div class="triangle"></div>
            </div>
            <div class="flex flex-col items-start ml-5">
                <h1 class="font-bold">Trade Account: <span class="font-normal"> Yes</span></h1>
                <h1 class="font-bold">Agreement: <span class="font-normal"> agreement.pdf</span></h1>
            </div>
        </div>

    </div>
    {{-- box 3 --}}



</div>


<div class="md:flex justify-around mt-10">

    {{-- box 4 --}}
    <div class="flex flex-col bg-white md:w-[550px] mx-4  p-10  rounded-2xl">
        <div>
            <img src="{{ asset('images/supplier-logo.png') }}" alt="profile Pic">
        </div>
        <div class="mt-5 border-b-2 border-black pb-2">
            <h1 class="font-bold text-xl">Car Parts Supplier</h1>
            <h2 class="font-bold">www.cars.com.au</h2>
        </div>

        <div class="flex flex-col mt-5">
            <div class="grid grid-cols-2 items-center border-b border-black">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">Country :</h1>
                    <h1 class="text-left">United States</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">Account Contact :</h1>
                    <h1 class="text-left">John</h1>
                </div>
            </div>
            <div class="grid grid-cols-2 items-center">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">P :</h1>
                    <h1 class="text-left">1300 231 456</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">E :</h1>
                    <h1 class="text-left">john@carparts.com</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center py-5  gap-10">
            <div class="relative rounded-sm w-44 h-10 flex items-center justify-center hover:bg-black bg-black transition-colors duration-300">
                <button class="text-white text-center font-bold z-10">Parts List</button>
                <div class="triangle"></div>
            </div>
            <div class="flex flex-col items-start ml-5">
                <h1 class="font-bold">Trade Account: <span class="font-normal"> Yes</span></h1>
                <h1 class="font-bold">Agreement: <span class="font-normal"> agreement.pdf</span></h1>
            </div>
        </div>

    </div>
    {{-- box 4 --}}

     {{-- box 5 --}}
     <div class="flex flex-col bg-white md:w-[550px] mx-4  p-10  rounded-2xl">
        <div>
            <img src="{{ asset('images/supplier-logo.png') }}" alt="profile Pic">
        </div>
        <div class="mt-5 border-b-2 border-black pb-2">
            <h1 class="font-bold text-xl">Car Parts Supplier</h1>
            <h2 class="font-bold">www.cars.com.au</h2>
        </div>

        <div class="flex flex-col mt-5">
            <div class="grid grid-cols-2 items-center border-b border-black">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">Country :</h1>
                    <h1 class="text-left">United States</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">Account Contact :</h1>
                    <h1 class="text-left">John</h1>
                </div>
            </div>
            <div class="grid grid-cols-2 items-center">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">P :</h1>
                    <h1 class="text-left">1300 231 456</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">E :</h1>
                    <h1 class="text-left">john@carparts.com</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center py-5  gap-10">
            <div class="relative rounded-sm w-44 h-10 flex items-center justify-center hover:bg-black bg-black transition-colors duration-300">
                <button class="text-white text-center font-bold z-10">Parts List</button>
                <div class="triangle"></div>
            </div>
            <div class="flex flex-col items-start ml-5">
                <h1 class="font-bold">Trade Account: <span class="font-normal"> Yes</span></h1>
                <h1 class="font-bold">Agreement: <span class="font-normal"> agreement.pdf</span></h1>
            </div>
        </div>

    </div>
    {{-- box 5 --}}


     {{-- box 6 --}}
     <div class="flex flex-col bg-white md:w-[550px] mx-4  p-10 rounded-2xl ">
        <div>
            <img src="{{ asset('images/supplier-logo.png') }}" alt="profile Pic">
        </div>
        <div class="mt-5 border-b-2 border-black pb-2">
            <h1 class="font-bold text-xl">Car Parts Supplier</h1>
            <h2 class="font-bold">www.cars.com.au</h2>
        </div>

        <div class="flex flex-col mt-5">
            <div class="grid grid-cols-2 items-center border-b border-black">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">Country :</h1>
                    <h1 class="text-left">United States</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">Account Contact :</h1>
                    <h1 class="text-left">John</h1>
                </div>
            </div>
            <div class="grid grid-cols-2 items-center">
                <div class="flex items-center">
                    <h1 class="font-bold pr-2">P :</h1>
                    <h1 class="text-left">1300 231 456</h1>
                </div>
                <div class="flex items-center border-l border-black pl-2" style="padding: 10px;">
                    <h1 class="font-bold pr-2">E :</h1>
                    <h1 class="text-left">john@carparts.com</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center py-5  gap-10">
            <div class="relative rounded-sm w-44 h-10 flex items-center justify-center hover:bg-black bg-black transition-colors duration-300">
                <button class="text-white text-center font-bold z-10">Parts List</button>
                <div class="triangle"></div>
            </div>
            <div class="flex flex-col items-start ml-5">
                <h1 class="font-bold">Trade Account: <span class="font-normal"> Yes</span></h1>
                <h1 class="font-bold">Agreement: <span class="font-normal"> agreement.pdf</span></h1>
            </div>
        </div>

    </div>
    {{-- box 6 --}}



</div>

</div>


</div>

@endsection
