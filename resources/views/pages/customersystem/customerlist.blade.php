<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel with Transition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

<div class="flex justify-center w-full mt-5">
    <div x-data="carousel()" class="relative w-full max-w-4xl">
        <!-- Big Image -->
        <div class="relative overflow-hidden rounded-3xl h-96">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index" x-transition:enter="transition-opacity ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in-out duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0 left-0 w-full h-full">
                    <img :src="slide" alt="" class="w-full h-full object-cover rounded-3xl">
                </div>
            </template>
            <button @click="prevSlide" class="absolute left-0 p-2 ml-5 bg-white rounded-full transform -translate-y-1/2 top-1/2 transition-transform duration-500 hover:scale-110">
                <i class="fa-solid fa-arrow-left fa-2x"></i>
            </button>
            <button @click="nextSlide" class="absolute right-0 p-2 mr-5 bg-white rounded-full transform -translate-y-1/2 top-1/2 transition-transform duration-500 hover:scale-110">
                <i class="fa-solid fa-arrow-right fa-2x"></i>
            </button>
        </div>

        <!-- Thumbnails -->
        <div class="flex justify-between mt-4 mx-2 md:mx-4 gap-1">
            <template x-for="(slide, index) in slides" :key="index">
                <div @click="activeSlide = index" :class="{'border-2 border-blue-500': activeSlide === index}" class="cursor-pointer border rounded-xl overflow-hidden w-16 h-16 md:w-44 md:h-28">
                    <img :src="slide" alt="" class="w-full h-full object-cover">
                </div>
            </template>
        </div>
    </div>
</div>

<div class="text-center mt-5">
    <h1>4 photos</h1>
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

</body>
</html>
