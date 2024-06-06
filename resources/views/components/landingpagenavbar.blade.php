<nav class=" " x-data="{ open: false }" style="background-color: #F9F9F9">
    <div class=" px-4 py-3 flex ">
        <div class="flex ">

            <!-- Toggle button for mobile -->
            <button @click="open = !open" class="inline-flex items-center ml-3 text-sm text-gray-500 dark:text-gray-400 md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div class="hidden md:flex w-full  bg-white ">
            <!-- Container for left-aligned items -->
        <!-- Container for left-aligned items -->
<div class="flex justify-start items-start gap-5 bg-white">
    @if(Route::currentRouteName() === 'vehicledetailspage')
      <a href="#"  class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000">  <i class="fa-solid fa-car mr-2"></i>Vehicle Details</a>
        @else
        <a href="{{ route('vehicledetailspage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">
            <i class="fa-solid fa-car mr-2 @if(Route::currentRouteName() === 'vehicledetailspage') text-white  @endif"></i>
            Vehicle Details
        </a>
    @endif
    @if(Route::currentRouteName() === 'workingstructions')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000"> <i class="fa-solid fa-bullhorn mr-2"></i>Work Instructions</a>
    @else

    <a href="{{ route('workingstructions') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">
        <i class="fa-solid fa-bullhorn mr-2 @if(Route::currentRouteName() === 'workingstructions') text-white  @endif"></i>
        Work Instructions
    </a>
    @endif

    @if(Route::currentRouteName() === 'compliancepage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000"><i class="fa-solid fa-sun mr-2"></i>Compliance</a>
    @else
    <a href="{{ route('compliancepage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">
        <i class="fa-solid fa-sun mr-2 @if(Route::currentRouteName() === 'compliancepage') text-white  @endif"></i>
        Compliance
    </a>
    @endif


    @if(Route::currentRouteName() === 'partlistpage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000"><i class="fa-solid fa-bars mr-2"></i> Parts List</a>
    @else

    <a href="{{ route('partlistpage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">
        <i class="fa-solid fa-bars mr-2 @if(Route::currentRouteName() === 'partlistpage') text-white  @endif"></i>
        Parts List
    </a>
    @endif


    @if(Route::currentRouteName() === 'supplierspage')
        <a href="#" class="text-white w-44 h-16 flex justify-center items-center font-bold bg-black hover:bg-black hover:text-white transition duration-1000"> <i class="fa-solid fa-user mr-2"></i>Suppliers</a>
    @else
    <a href="{{ route('supplierspage') }}" class="text-black w-44 h-16 flex justify-center items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000">
        <i class="fa-solid fa-user mr-2 @if(Route::currentRouteName() === 'supplierspage') text-white  @endif"></i>
        Suppliers
    </a>
    @endif
</div>



            <!-- Spacer -->
            <div class="flex-grow"></div>

            <!-- Container for right-aligned item -->

             <div class="items-center flex justify-center hover:text-orange-700 transition duration-500">
    <div class="flex items-center justify-center">
        <i class="fa-regular fa-rectangle-xmark"></i>
    </div>

    <div class="flex justify-end items-end w-full">
        <a href="{{ route('dashboard') }}" class="text-black w-full h-16 flex justify-end items-center  hover:text-orange-500 transition duration-500">Dashboard</a>
    </div>
</div>




        </div>

    </div>


   <div x-show="open" class="md:hidden">
    <ul class="flex flex-col">
        <li class="">
            <a href="{{ route('vehicledetailspage') }}" class="text-black w-full h-16 flex items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">
                <i class="fa-solid fa-car mr-2"></i>
                <span class="flex-1 text-left">Vehicle Details</span>
            </a>
        </li>

        <li>
            <a href="{{ route('workingstructions') }}" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">
                <i class="fa-solid fa-bullhorn mr-2 "></i>
                <span class="flex-1 text-left">Work Instructions</span>
            </a>
        </li>
        <li>
            <a href="{{ route('compliancepage') }}" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">
                <i class="fa-solid fa-sun mr-2 "></i>
                <span class="flex-1 text-left">Compliance</span>

            </a>
        </li>
        <li>
            <a href="{{ route('partlistpage') }}" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">
                <i class="fa-solid fa-bars mr-2 "></i>
                <span class="flex-1 text-left">Parts List</span>
            </a>
        </li>
        <li>
            <a href="{{ route('supplierspage') }}" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">
                <i class="fa-solid fa-user mr-2 "></i>
                <span class="flex-1 text-left">Suppliers</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="text-black w-full h-16 flex justify-between items-center font-bold bg-white hover:bg-black hover:text-white transition duration-1000 pl-8 pr-6">
                <i class="fa-regular fa-rectangle-xmark mr-2 "></i>
                <span class="flex-1 text-left">Dashboard</span>
            </a>
        </li>
    </ul>
</div>



</nav>
