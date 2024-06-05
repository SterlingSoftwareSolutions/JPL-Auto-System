<nav class="bg-white " x-data="{ open: false }">
    <div class=" px-4 py-3 flex ">
        <div class="flex ">

            <!-- Toggle button for mobile -->
            <button @click="open = !open" class="inline-flex items-center ml-3 text-sm text-gray-500 dark:text-gray-400 md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div class="hidden md:flex w-full border  ">
            <!-- Container for left-aligned items -->
        <!-- Container for left-aligned items -->
<div class="flex justify-start items-start gap-5">
    @if(Route::currentRouteName() === 'vehicledetailspage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000 ">Vehicle Details</a>
    @else
        <a href="{{ route('vehicledetailspage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">Vehicle Details</a>
    @endif
    @if(Route::currentRouteName() === 'workingstructions')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000 ">Work Instructions</a>
    @else
        <a href="{{ route('workingstructions') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">Work Instructions</a>
    @endif
    @if(Route::currentRouteName() === 'compliancepage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000">Compliance</a>
    @else
        <a href="{{ route('compliancepage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">Compliance</a>
    @endif
    @if(Route::currentRouteName() === 'partlistpage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000">Parts List</a>
    @else
        <a href="{{ route('partlistpage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">Parts List</a>
    @endif
    @if(Route::currentRouteName() === 'supplierspage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000">Suppliers</a>
    @else
        <a href="{{ route('supplierspage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">Suppliers</a>
    @endif
</div>



            <!-- Spacer -->
            <div class="flex-grow"></div>
            <!-- Container for right-aligned item -->
            <div class="flex justify-end items-end ">
                <a href="{{route('dashboard')}}" class="text-black hover:text-orange-700 w-44 h-16 flex justify-end items-center font-bol ">Dashboard</a>
            </div>

        </div>

    </div>


    <div x-show="open" class="md:hidden">
        <ul class="flex flex-col ">
            <li><a href="#" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">Vehicle Details</a></li>
            <li><a href="#" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">Work Instructions</a></li>
            <li><a href="#" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">Compliance</a></li>
            <li><a href="#" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">Parts List</a></li>
            <li><a href="#" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">Suppliers</a></li>
            <li><a href="#" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">Dashboard</a></li>
        </ul>
    </div>


</nav>
