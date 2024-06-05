@extends('layouts.layout')

@section('content')
    <div class="flex h-screen "
        style="background-image: url('{{ asset('Images/landing-bg.jpg') }}'); height: 900px; width: 100%; background-position: center; object-fit: cover; ">


        <div class="items-center justify-center mx-auto my-auto transform rotate-45">
            <div class="flex">
                <div class="flex image-container group">
                    <a href="{{ route('vehicledetailspage') }}">
                        <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 hidden group-hover:block  transition duration-1000 bg-white rounded-lg"
                            src="{{ asset('images/4.1.png') }}" alt="profile Pic">
                        <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 group-hover:hidden transition duration-1000  bg-white"
                            src="{{ asset('images/4.png') }}" alt="profile Pic">
                    </a>

                </div>


                <div class="flex image-container group">
                    <a href="">
                        <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 hidden group-hover:block transition duration-1000 bg-white rounded-lg"
                            src="{{ asset('images/1.1.png') }}" alt="profile Pic">
                        <img class=" m-5 md:w-[200px] md:h-[200px] w-28 h-28 group-hover:hidden transition duration-1000  bg-white"
                            src="{{ asset('images/1.png') }}" alt="profile Pic">
                    </a>

                </div>

            </div>

            <div class="flex ">

                <div class="flex image-container group">
                    <a href="">
                        <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 hidden group-hover:block transition duration-1000 bg-white rounded-lg"
                            src="{{ asset('images/2.1.png') }}" alt="profile Pic">
                        <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 group-hover:hidden transition duration-1000  bg-white"
                            src="{{ asset('images/2.png') }}" alt="profile Pic">
                    </a>

                </div>
                <div class="flex">
                    <div class="flex image-container group">
                        <a href="">
                            <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 hidden group-hover:block transition duration-1000 bg-white rounded-lg"
                                src="{{ asset('images/3.1.png') }}" alt="profile Pic">
                            <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28 group-hover:hidden transition duration-1000  bg-white"
                                src="{{ asset('images/3.png') }}" alt="profile Pic">
                        </a>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
