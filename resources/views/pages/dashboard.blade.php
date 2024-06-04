@extends('layouts.layout')

@section('content')
    <div class="flex h-screen "
        style="background-image: url('{{ asset('Images/landing-bg.jpg') }}'); height: 900px; width: 100%; background-position: center; object-fit: cover; ">

        {{-- <div class="items-center justify-center mx-auto my-auto  transform rotate-45 border border-red-500  ">

            <div class="flex border border-red-500 ">
                <div class="flex">
                    <img class="transform -rotate-45 " src="{{ asset('images/product-system.png') }}" alt="profile Pic">
                    <img class="transform -rotate-45 " src="{{ asset('images/build-system.png') }}" alt="profile Pic">
                </div>
            </div>

            <div class="flex border border-red-500">
                <div class="flex">
                    <img class="transform -rotate-45  " src="{{ asset('images/customer-system.png') }}" alt="profile Pic">
                    <img class="transform -rotate-45 " src="{{ asset('images/new-build.png') }}" alt="profile Pic">
                </div>
            </div>

        </div> --}}

        <div class="items-center justify-center mx-auto my-auto  transform rotate-45 ">

            <div class="flex">
                <div class="flex">
                    <img class="transform -rotate-90  m-5 md:w-[200px] md:h-[200px] w-28 h-28" src="{{ asset('images/4.png') }}" alt="profile Pic">
                    <img class="transform m-5 md:w-[200px] md:h-[200px] w-28 h-28" src="{{ asset('images/1.png') }}" alt="profile Pic">
                </div>
            </div>

            <div class="flex ">
                <div class="flex">
                    <img class="transform -rotate-90  m-5 md:w-[200px] md:h-[200px] w-28 h-28" src="{{ asset('images/2.png') }}" alt="profile Pic">
                    <img class="transform -rotate-90 m-5 md:w-[200px] md:h-[200px] w-28 h-28" src="{{ asset('images/3.png') }}" alt="profile Pic">

                </div>
            </div>

        </div>

    </div>
@endsection
