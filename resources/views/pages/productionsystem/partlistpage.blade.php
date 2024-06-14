@extends('layouts.layout')

@section('content')
    @include('components.landingpagenavbar')

    <!-- Ensure you only include these once in your layout or at the top of your content -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-wrapper {
            display: flex;
        }
        .swiper-slide {
            width: 100%;
            height: 100%;
        }
        .swiper-button-next,
.swiper-button-prev {
    color: black;
    background-color: white;

}

.swiper-button-next {
    right: 10px;
}
.swiper-button-prev {
    left: 10px;
}
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .small-image {
            width:200px;
            height: 100px;
            margin-right: 5px;
            cursor: pointer;
        }

        .swiper-container {
            position: relative;
            overflow: hidden;
        }
        .swiper-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .slide-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>

    <div class="flex flex-wrap">
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


        <div class="flex flex-col items-center justify-center w-full rounded-lg md:w-6/12">
            <div class="w-full">

                <div class="flex gap-5 mx-5 mt-5 md:mx-10">
                    <h1 class="underline">Body</h1>
                    <h1><i class="fas fa-arrow-alt-circle-right"></i></h1>
                    <h1 class="underline">Complete Shell</h1>
                    <h1><i class="fas fa-arrow-alt-circle-right"></i></h1>
                    <h1 class="underline">RHD 67 Ford Mustang Fastback</h1>

                </div>

                <div class="mx-10 mt-5">

                <div class="relative swiper-container ">
                    <div class=" swiper-wrapper">
                        <div class="border border-black rounded-3xl swiper-slide"><img src="/images/partlist-lg-img.jpg" alt="Slide 1"></div>
                        <div class="border border-black rounded-3xl swiper-slide"><img src="/images/partlist-lg-img-2.jpg" alt="Slide 2"></div>
                        <div class="border border-black rounded-3xl swiper-slide"><img src="/images/partlist-lg-img-3.jpg" alt="Slide 3"></div>
                        <div class="border border-black rounded-3xl swiper-slide"><img src="/images/partlist-lg-img-4.jpg" alt="Slide 4"></div>
                    </div>

                            <!-- Add Navigation Buttons -->
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}<!-- Add your custom buttons -->
                    <button @click="swiper.slidePrev()" class="absolute left-0 z-10 w-12 h-12 p-2 ml-5 transition duration-1000 transform -translate-y-1/2 bg-white swiper-button-prev1 top-1/2">
                        <i class="fas fa-arrow-left fa-2x"></i>
                    </button>
                    <button @click="swiper.slideNext()" class="absolute right-0 z-10 w-12 h-12 p-2 mr-5 transition duration-1000 transform -translate-y-1/2 bg-white swiper-button-next1 top-1/2">
                        <i class="fas fa-arrow-right fa-2x"></i>
                    </button>





                </div>
                <div class="flex justify-between  w-[75px] md:w-full">
                    <img src="/images/partlist-lg-img.jpg" alt="Slide 1" class="border border-black rounded-lg small-image" onclick="changeSlide(0)">
                    <img src="/images/partlist-lg-img-2.jpg" alt="Slide 2" class="border border-black rounded-lg small-image" onclick="changeSlide(1)">
                    <img src="/images/partlist-lg-img-3.jpg" alt="Slide 3" class="border border-black rounded-lg small-image" onclick="changeSlide(2)">
                    <img src="/images/partlist-lg-img-4.jpg" alt="Slide 4" class="border border-black rounded-lg small-image" onclick="changeSlide(3)">
                </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                navigation: {
                    nextEl: '.swiper-button-next1',
                    prevEl: '.swiper-button-prev1',
                },
            });

            window.changeSlide = function (index) {
                swiper.slideTo(index);
            };
        });
    </script>
@endsection
