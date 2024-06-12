@extends('layouts.layout')

@section('content')

@include('components.landingpagenavbar')

<!-- Ensure you only include these once in your layout or at the top of your content -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="md:flex">
    <div class="w-full md:w-6/12 bg-white   overflow-y-auto max-h-screen">

        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md  ">


                <div class="ml-8  mt-5">
                    <button class="w-20 h-10 bg-black text-white font-bold rounded-lg text-2xl">Body</button>
                </div>

                <div class="mx-10">

                    <thead class="border-b-2 border-black w-60 mx-10">
                        <tr class="text-start items-start">
                            <th class="px-8 py-6 text-left items-start w-3/12">Item</th>
                            <th class="px-8 py-6 items-start text-left w-9/12">Description</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1  --}}
                <tbody>
                    <tr>

                        <td class="px-8 py-2 border-l  font-bold">Complete Shell</td>
                        <td class="px-8 py-2  border-b border-black ">RHD 67 Ford Mustang Fastback</td>



                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b  border-black">Hood</td>



                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Hood Hinge Set (billet)</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Hood Catch/Grille Support</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black ">Hood Latch</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Fender (RH)</td>


                    </tr>

                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Fender (LH)</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black ">Front Valance</td>


                    </tr>

                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Headlamp Assembly (RH)</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Headlamp Assembly (LH)</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Front Stone Guard</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2  border-b border-black">Front Bumper</td>


                    </tr>



                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>






        {{-- table 2 --}}
        <div class="mx-10">

            <table class="w-full text-sm bg-white rounded shadow-md  ">

                <div class="ml-8 mt-5">
                    <button class="w-28 h-10 bg-black text-white font-bold rounded-lg text-2xl">Labour</button>
                </div>
                <thead class="border-b-2 border-black ">
                    <tr class="text-start items-start">
                        <th class="px-8 py-6 text-left items-start w-3/12">Item</th>
                        <th class="px-8 py-6 items-start text-left w-9/12">Description</th>
                    </tr>
                </thead>




                {{-- body 1  --}}
                <tbody>


                    <tr>

                        <td class="px-8 py-2 border-b font-bold border-black">Complete Shell</td>
                        <td class="px-8 py-2 border-b border-black">RHD 67 Ford Mustang Fastback</td>



                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Fabrication - Kenmer</td>
                        <td class="px-8 py-2 border-b border-black">Pre Fit, Bending & Torsional Test, Final Fit</td>



                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Fabrication - FabRAIcations</td>
                        <td class="px-8 py-2 border-b border-black">nothing, jig</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Fabrication - Mammoth Custom</td>
                        <td class="px-8 py-2 border-b border-black">Rear Parcel Shelf, Sterring Column Bracket</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Engineering</td>
                        <td class="px-8 py-2 border-b border-black">remove Kenmer works, install new</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Fabrication - WeldOne</td>
                        <td class="px-8 py-2 border-b border-black">suspension and interior parts</td>


                    </tr>

                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Engineering - JC Bonnevile</td>
                        <td class="px-8 py-2 border-b border-black">Twist test</td>


                    </tr>
                    <tr>
                        <td class="px-8 py-2 border-b font-bold border-black">Engineering - APS Engineering</td>
                        <td class="px-8 py-2 border-b border-black">Bump teest</td>


                    </tr>





                </tbody>


            </table>
        </div>
    </div>

    {{-- section 2  --}}


    <div class="w-11/12 md:w-6/12  mx-5 md:mx-0">

{{-- /// --}}
<div class="flex gap-5  md:mx-20 mx-5 mt-5">
    <h1 class="underline">Body</h1>
    <h1><i class="fas fa-arrow-alt-circle-right"></i></h1>
    <h1 class="underline">Complete Shell</h1>
    <h1><i class="fas fa-arrow-alt-circle-right"></i></h1>
    <h1>RHD 67 Ford Mustang Fastback</h1>
</div>


{{-- /// --}}

        <div class="flex justify-center  w-12/12 md:mx-20 mx-5 mt-5 ">
            <div x-data="carousel()" class="relative w-full max-w-4xl ">
                <!-- Big Image -->
                <div class="relative ">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index" class="w-full transition-opacity duration-1000 ease-in-out ">
                            <img :src="slide" alt="" class="w-full h-full border border-black rounded-3xl">
                        </div>
                    </template>
                    <div class=" border ">
                        <!-- Prev/Next Buttons -->
                        <button @click="prevSlide"
                                class="w-12 h-12 absolute left-0 p-2 ml-5 transition duration-1000 transform -translate-y-1/2 bg-white top-1/2">
                            <i class="fa-solid fa-arrow-left  fa-2x"></i>
                        </button>
                        <button @click="nextSlide"
                                class="w-12 h-12 absolute right-0 p-2 mr-5 transition duration-1000 transform -translate-y-1/2 bg-white top-1/2">
                            <i class="fa-solid fa-arrow-right  fa-2x"></i>
                        </button>
                    </div>
                </div>

                <!-- Thumbnails -->
                               <!-- Thumbnails -->
                               <div class="flex justify-between mt-4 mx-2 md:mx-4 md:gap-1  gap-1 ">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <img :src="slide" @click="activeSlide = index" :class="{'': activeSlide === index}"
                                         class=" inline-flex object-cover w-16 h-16 md:w-44 md:h-28  rounded-xl cursor-pointer border border-black">
                                </template>
                            </div>




            </div>
        </div>
        {{-- // --}}
        <div class="md:mx-20 mx-5 mt-5">
            <h1>4 photos</h1>
        </div>

        {{-- // --}}

    </div>
</div>

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
                this.activeSlide = this.activeSlide > 0 ? this.activeSlide - 1 : this.slides.length - 1;
            },
            nextSlide() {
                this.activeSlide = this.activeSlide < this.slides.length - 1 ? this.activeSlide + 1 : 0;
            }
        }
    }
</script>

@endsection
