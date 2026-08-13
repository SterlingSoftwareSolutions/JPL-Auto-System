<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPL Automotive</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.AppUrl = "{{ url('/') }}";
    </script>
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
<body class="flex h-screen bg-gray-50 font-sans antialiased text-gray-900 overflow-hidden">
    <!-- Sidebar -->
    <div class="w-[250px] bg-white border-r border-gray-100 text-gray-900 flex flex-col shrink-0 h-full overflow-y-auto no-scrollbar">
        <!-- Logo Area -->
        <div class="pt-8 pb-6 px-6 flex flex-col justify-center items-center">
            <img src="{{ asset('images/jpl-system-logo.png') }}" alt="JPL Logo" class="h-20 w-auto">
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 py-4 text-sm font-medium">
            <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-4 hover:bg-gray-100 hover:text-black transition-colors {{ Route::currentRouteName() === 'dashboard' ? 'bg-black text-white font-semibold rounded-r-2xl mr-4' : 'text-gray-900' }}">
                <i class="fas fa-th-large w-6 text-center mr-3"></i> Dashboard
            </a>
            <a href="{{ route('vehicles.index') }}" class="flex items-center px-6 py-4 hover:bg-gray-100 hover:text-black transition-colors {{ Route::currentRouteName() === 'vehicles.index' ? 'bg-black text-white font-semibold rounded-r-2xl mr-4' : 'text-gray-900' }}">
                <i class="fas fa-car w-6 text-center mr-3"></i> Vehicles
            </a>
            <a href="#" class="flex items-center px-6 py-4 hover:bg-gray-100 hover:text-black transition-colors text-gray-900">
                <i class="fas fa-lock w-6 text-center mr-3"></i> Access
            </a>
            <a href="{{ route('customerlist') }}" class="flex items-center px-6 py-4 hover:bg-gray-100 hover:text-black transition-colors text-gray-900">
                <i class="fas fa-users w-6 text-center mr-3"></i> Customer clients
            </a>
            <a href="#" class="flex items-center px-6 py-4 hover:bg-gray-100 hover:text-black transition-colors text-gray-900">
                <i class="fas fa-cog w-6 text-center mr-3"></i> Settings
            </a>
        </div>
        
        <!-- User Profile Footer -->
        <div class="m-4 p-4 border border-gray-200 rounded-xl flex items-center cursor-pointer hover:bg-gray-50 transition-colors bg-white shadow-sm">
            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 shrink-0">
                <i class="fas fa-user"></i>
            </div>
            <div class="ml-3 flex-1">
                <div class="text-sm font-bold text-gray-900">Admin User</div>
                <div class="text-xs text-gray-500 font-medium">Administrator</div>
            </div>
            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Top Header -->
        <div class="shrink-0 z-10">
            @include('layouts.header')
        </div>
        
        <!-- Content -->
        <div class="flex-1 overflow-y-auto no-scrollbar bg-gray-50">
            @yield('content')
        </div>
    </div>
</body>
</html>
