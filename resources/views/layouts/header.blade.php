<header>


    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="flex items-center justify-between px-6 {{ Route::currentRouteName() === 'dashboard' ? 'h-28' : 'h-20' }}">

            {{-- Left side with logo and "Production" button --}}
            <div class="flex items-center space-x-8">
                {{-- Logo --}}
                <div class="flex items-center">
                    <img src="{{ asset('images/jpl-system-logo.png') }}" alt="JPL Logo" class="{{ Route::currentRouteName() === 'dashboard' ? 'h-24' : 'h-16' }} w-auto">
                </div>

                {{-- Conditionally display "Production" button --}}
                @if (Route::currentRouteName() === 'vehicledetailspage' || Route::currentRouteName() === 'workingstructions' || Route::currentRouteName() === 'compliancepage' || Route::currentRouteName() === 'partlistpage' || Route::currentRouteName() === 'supplierspage' || Route::currentRouteName() === 'buildprocedure')
                    <div class="hidden sm:block">
                        <span class="inline-flex items-center justify-center px-5 py-2 bg-black text-white text-sm font-bold rounded-md tracking-wider uppercase shadow-sm">
                            Production
                        </span>
                    </div>
                @endif
            </div>

            {{-- Right side with icons --}}
            <div class="flex items-center justify-end space-x-6">
                


                {{-- "Logged in as" text --}}
                <div class="hidden md:block {{ Route::currentRouteName() === 'dashboard' ? 'text-lg' : 'text-sm' }} text-gray-500">
                    Logged in as <span class="font-bold text-black">{{ Auth::user()->name }}</span>
                </div>

                {{-- Power off icon --}}
                <div class="flex items-center">
                    <form id="logout-form" method="post" action="{{ route('logout') }}" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="flex items-center justify-center {{ Route::currentRouteName() === 'dashboard' ? 'w-14 h-14 text-xl' : 'w-10 h-10' }} bg-black text-white rounded-full hover:bg-gray-800 transition-colors duration-200 shadow-sm" title="Log Out">
                            <i class="fas fa-power-off"></i>
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </nav>
</header>
