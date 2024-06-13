@extends('layouts.layout')



<style>
  /* resources/css/app.css */


.container {
    display: flex;
    height: 100vh;
    max-width: 100% !important;
    background-image: url('../images/landing-bg.jpg');
    background-position: center;
    background-size: cover;
}

.content {

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: auto;
    transform: rotate(45deg);
}


.row {
    display: flex;
    margin-bottom: 1rem;
}

.image-container {
    position: relative;
    margin: 1.25rem;
}

.image-container img {
    width: 7rem;
    height: 7rem;
    border-radius: 0.5rem;
    transition: opacity 1s ease, transform 1s ease;
}

.image-container .default-img {
    display: block;
    transform: rotate(-90deg);
    opacity: 1;
}

.image-container .hover-img {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    transform: rotate(-90deg);
    opacity: 0;
}

.image-container:hover .default-img {
    opacity: 0;
}

.image-container:hover .hover-img {
    opacity: 1;
}

@media (min-width: 768px) {
    .image-container img {
        width: 12.5rem;
        height: 12.5rem;
    }
}



</style>

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="image-container">
                    <a href="{{ route('vehicledetailspage') }}">
                        <img class="hover-img" src="{{ asset('images/4.1.png') }}" alt="profile Pic">
                        <img class="default-img" src="{{ asset('images/4.png') }}" alt="profile Pic">
                    </a>
                </div>

                <div class="image-container">
                    <a href="#">
                        <img class="hover-img" src="{{ asset('images/1.1.png') }}" alt="profile Pic">
                        <img class="default-img" src="{{ asset('images/1.png') }}" alt="profile Pic">
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="image-container">
                    <a href="{{ route('customerlist') }}">
                        <img class="hover-img" src="{{ asset('images/2.1.png') }}" alt="profile Pic">
                        <img class="default-img" src="{{ asset('images/2.png') }}" alt="profile Pic">
                    </a>
                </div>

                <div class="image-container">
                    <a href="#">
                        <img class="hover-img" src="{{ asset('images/3.1.png') }}" alt="profile Pic">
                        <img class="default-img" src="{{ asset('images/3.png') }}" alt="profile Pic">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
