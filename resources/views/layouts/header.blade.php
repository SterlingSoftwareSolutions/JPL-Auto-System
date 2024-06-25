<header>


    <nav class="ml-3">
        {{-- Left side with logo and "Production" button --}}
        <div class="flex justify-between ml-2 bg-white border-gray-200 border-red-500">

        <div class="flex items-center space-x-4">
            {{-- Logo --}}
            <div class='mr-4 md:mt-2'>
                <img src="{{ asset('images/jpl-system-logo.png') }}" alt="profile Pic">

            </div>

              {{-- Conditionally display "Production" button --}}


             @if (Route::currentRouteName() === 'vehicledetailspage' || Route::currentRouteName() === 'workingstructions' || Route::currentRouteName() === 'compliancepage' || Route::currentRouteName() === 'partlistpage' || Route::currentRouteName() === 'supplierspage')
    <div class="flex items-center justify-center h-10 mt-5 transition-colors duration-300 bg-black rounded-sm w-44 hover:bg-black">
        <button class="font-bold text-center text-white">Production</button>
    </div>
@endif

        </div>

        {{-- Right side with icons --}}
        <div class="flex items-center justify-end space-x-4">
            {{-- "Logged in as" text --}}
            <div class="hidden md:block">
                <h1>Logged in as <span class="font-bold">{{ Auth::user()->name }}</span></h1>

            </div>

            {{-- Power off icon --}}
            <div class="flex items-center justify-center w-20 h-20 bg-black border">
                <form id="logout-form" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <i class="text-4xl text-white fas fa-power-off" aria-hidden="true"></i>
                    </button>
        </form>
            </div>
        </div>

    </div>


    </nav>
</header>
