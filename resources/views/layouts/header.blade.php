<header>


    <nav class="ml-3">
        {{-- Left side with logo and "Production" button --}}
        <div class="bg-white border-gray-200 flex justify-between ml-2 border-red-500">

        <div class="flex items-center space-x-4">
            {{-- Logo --}}
            <div class='md:mt-2 mr-4'>
                <img src="{{ asset('images/jpl-system-logo.png') }}" alt="profile Pic">

            </div>

              {{-- Conditionally display "Production" button --}}


             @if (Route::currentRouteName() === 'vehicledetailspage' || Route::currentRouteName() === 'workingstructions' || Route::currentRouteName() === 'compliancepage' || Route::currentRouteName() === 'partlistpage' || Route::currentRouteName() === 'supplierspage')
    <div class="rounded-sm w-44 h-10 flex items-center justify-center mt-5 hover:bg-black bg-black transition-colors duration-300">
        <button class="text-white text-center font-bold">Production</button>
    </div>
@endif

        </div>

        {{-- Right side with icons --}}
        <div class="flex items-center justify-end space-x-4">
            {{-- "Logged in as" text --}}
            <div class="hidden md:block">
                <h1>Logged in as <span class="font-bold">{{Auth::user()->name}}</span></h1>
            </div>

            {{-- Power off icon --}}
            <div class="flex items-center justify-center border bg-black h-20 w-20">
                <form id="logout-form" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-power-off text-4xl text-white" aria-hidden="true"></i>
                    </button>
        </form>
            </div>
        </div>

    </div>


    </nav>
</header>
