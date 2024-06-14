@extends('layouts.layout')

@section('content')
    @include('components.landingpagenavbar')

    <!-- Ensure you only include these once in your layout or at the top of your content -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <div class="">
         <div class="md:flex">

        <div class="w-full max-h-screen overflow-y-auto bg-white md:w-6/12">

            <div class="mx-10 ">

                <table class="w-full text-sm bg-white rounded shadow-md ">


                    <div class="mt-5 ml-8">
                        <button class="w-20 h-10 text-2xl font-bold text-white bg-black rounded-lg">Body</button>
                    </div>

                    <div class="mx-10">

                        <thead class="mx-10 border-b-2 border-black w-60">
                            <tr class="items-start text-start">
                                <th class="items-start w-3/12 px-8 py-6 text-left">Item</th>
                                <th class="items-start w-9/12 px-8 py-6 text-left">Description</th>
                            </tr>
                        </thead>
                    </div>



                    {{-- body 1  --}}
                    <tbody>
                        <tr>

                            <td class="px-8 py-2 font-bold border-l">Complete Shell</td>
                            <td class="px-8 py-2 border-b border-black ">RHD 67 Ford Mustang Fastback</td>



                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Hood</td>



                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Hood Hinge Set (billet)</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Hood Catch/Grille Support</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black ">Hood Latch</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Fender (RH)</td>


                        </tr>

                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Fender (LH)</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black ">Front Valance</td>


                        </tr>

                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Headlamp Assembly (RH)</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Headlamp Assembly (LH)</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Front Stone Guard</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 border-l "></td>
                            <td class="px-8 py-2 border-b border-black">Front Bumper</td>


                        </tr>



                    </tbody>
                    {{-- body 1 end --}}



                </table>

            </div>






            {{-- table 2 --}}
            <div class="mx-10">

                <table class="w-full text-sm bg-white rounded shadow-md ">

                    <div class="mt-5 ml-8">
                        <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-28">Labour</button>
                    </div>
                    <thead class="border-b-2 border-black ">
                        <tr class="items-start text-start">
                            <th class="items-start w-3/12 px-8 py-6 text-left">Item</th>
                            <th class="items-start w-9/12 px-8 py-6 text-left">Description</th>
                        </tr>
                    </thead>




                    {{-- body 1  --}}
                    <tbody>


                        <tr>

                            <td class="px-8 py-2 font-bold border-b border-black">Complete Shell</td>
                            <td class="px-8 py-2 border-b border-black">RHD 67 Ford Mustang Fastback</td>



                        </tr>
                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Fabrication - Kenmer</td>
                            <td class="px-8 py-2 border-b border-black">Pre Fit, Bending & Torsional Test, Final Fit</td>



                        </tr>
                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Fabrication - FabRAIcations</td>
                            <td class="px-8 py-2 border-b border-black">nothing, jig</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Fabrication - Mammoth Custom</td>
                            <td class="px-8 py-2 border-b border-black">Rear Parcel Shelf, Sterring Column Bracket</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Engineering</td>
                            <td class="px-8 py-2 border-b border-black">remove Kenmer works, install new</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Fabrication - WeldOne</td>
                            <td class="px-8 py-2 border-b border-black">suspension and interior parts</td>


                        </tr>

                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Engineering - JC Bonnevile</td>
                            <td class="px-8 py-2 border-b border-black">Twist test</td>


                        </tr>
                        <tr>
                            <td class="px-8 py-2 font-bold border-b border-black">Engineering - APS Engineering</td>
                            <td class="px-8 py-2 border-b border-black">Bump teest</td>


                        </tr>





                    </tbody>


                </table>
            </div>
        </div>

        {{-- section 2  --}}




        <div class="w-8/12 mx-auto md:w-6/12 ">

                {{-- section 2  --}}



        {{-- /// --}}
        <div class="flex gap-5 mx-5 mt-5 md:mx-14">
            <h1 class="underline">Body</h1>
            <h1><i class="fas fa-arrow-alt-circle-right"></i></h1>
            <h1 class="underline">Complete Shell</h1>
            <h1><i class="fas fa-arrow-alt-circle-right"></i></h1>
            <h1>RHD 67 Ford Mustang Fastback</h1>
        </div>

            {{-- /// --}}
            <style>
                .carousel-slide {
                    @apply absolute top-0 left-0 w-full h-full opacity-0 transition-opacity duration-1000 ease-in-out;
                }

                .carousel-slide-active {
                    @apply opacity-100;
                }
            </style>
            </head>

            <body class="bg-gray-100">

                <div class="flex justify-center mx-auto mt-5 ">
                    <div x-data="carousel()" class="relative w-full max-w-4xl ">
                        <!-- Big Image -->
                        <div class="relative overflow-hidden rounded-3xl  md:mx-10 h-[200px] md:h-[700px] border border-black ">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div x-show="activeSlide === index"
                                    x-transition:enter="transition-opacity ease-in-out duration-1000"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition-opacity ease-in-out duration-1000"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute top-0 left-0 w-full h-full">
                                    <img :src="slide" alt=""
                                        class="object-cover w-full h-full rounded-3xl">
                                </div>
                            </template>
                            <button @click="prevSlide"
                                class="absolute left-0 p-2 ml-5 transition-transform duration-500 transform -translate-y-1/2 bg-white top-1/2 hover:scale-110">
                                <i class="fa-solid fa-arrow-left fa-2x"></i>
                            </button>
                            <button @click="nextSlide"
                                class="absolute right-0 p-2 mr-5 transition-transform duration-500 transform -translate-y-1/2 bg-white top-1/2 hover:scale-110">
                                <i class="fa-solid fa-arrow-right fa-2x"></i>
                            </button>
                        </div>

                        <!-- Thumbnails -->
                        <div class="flex justify-between mx-2 mt-4 md:mx-10 ">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div @click="activeSlide = index"
                                    :class="{ '': activeSlide === index }"
                                    class="w-24 h-24 overflow-hidden border border-black cursor-pointer rounded-xl md:w-48 md:h-36">
                                    <img :src="slide" alt="" class="object-cover w-full h-full">
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <h1>4 photos</h1>
                </div>

        </div>
    </div>


        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
        <script>
            function carousel() {
                return {
                    activeSlide: 0,
                    slides: [
                        '/images/partlist-lg-img.jpg',
                        '/images/partlist-lg-img-2.jpg',
                        '/images/partlist-lg-img-3.jpg',
                        '/images/partlist-lg-img-4.jpg',
                    ],
                    prevSlide() {
                        this.activeSlide = (this.activeSlide > 0) ? this.activeSlide - 1 : this.slides.length - 1;
                    },
                    nextSlide() {
                        this.activeSlide = (this.activeSlide < this.slides.length - 1) ? this.activeSlide + 1 : 0;
                    }
                }
            }
        </script>
    @endsection
