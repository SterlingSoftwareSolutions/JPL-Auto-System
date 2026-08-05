
    <title>Sign In</title>
    @vite('resources/css/app.css')

</head>
<body>
    <div class="py-10 flex justify-center w-full">
        <div class="md:w-6/12 w-10/12">

        {{-- logo --}}
        <div class="justify-center flex">
            <img src="{{ asset('images/jpl-system-logo.png') }}" alt="profile Pic" class="w-40 md:w-[100px] h-auto" >
        </div>
        {{-- logo --}}

        {{-- login --}}

        <div class="flex justify-center items-center rounded-xl p-8 mt-10 md:w-8/12 md:mx-auto " style="background-color: #F9F9F9; min-height: 46vh;">
            <div class="text-center ">
                <h1 class="text-4xl">SIGN IN</h1>
                @if(session('error'))
                    <div class="mt-4 text-red-600 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-4 text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                     {{-- Username --}}
                    <div class="mt-10">
                        <input
                            type="text"
                            name="name"
                            class="rounded-md h-14 w-full md:w-10/12 px-5 text-lg text-center
                            @error('name') border-red-500 @enderror"
                            placeholder="Username"
                            autocomplete="username"
                            required
                        >
                    </div>

                    {{-- PIN --}}
                    <div class="flex justify-center space-x-6 mt-10">
                        <input maxlength="1" accept=""type="password" name="pin1"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px]  text-2xl text-center"
                            placeholder="">
                        <input type="password" name="pin2"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px] text-2xl text-center"
                            placeholder="">
                        <input maxlength="1" type="password" name="pin3"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px] text-2xl text-center"
                            placeholder="">
                        <input maxlength="1" type="password" name="pin4"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px] text-2xl text-center"
                            placeholder="">
                    </div>
                </form>
                <div class="mt-4">
                    <h1><a href="{{route('forget-password')}}" class="underline text-sm font-bold text-gray-600 ">Forget Password?</a></h1>

                </div>
                <h1 class="text-md text-gray-800 font-normal mt-10">© Copyright 2024 JPL Automotive. All Rights Reserved.</h1>
            </div>

        </div>






        {{-- login --}}
    </div>



    </div>


</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const form = document.getElementById('loginForm');
        const pinInputs = document.querySelectorAll('.pin-input');
        const nameInput = document.querySelector('input[name="name"]');

        pinInputs.forEach((input, index) => {

            input.addEventListener('input', () => {

                // Allow only numbers
                input.value = input.value.replace(/[^0-9]/g, '');

                if (input.value.length === 1 && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }

                // Auto submit after last PIN
                if (index === pinInputs.length - 1 && input.value !== '') {
                    form.submit();
                }
            });


            // Backspace navigation
            input.addEventListener('keydown', (event) => {
                if (event.key === 'Backspace' && input.value === '') {
                    if (index > 0) {
                        pinInputs[index - 1].focus();
                    }
                }
            });

        });


        // Prevent submit without name and PIN
        form.addEventListener('submit', (event) => {

            let pinComplete = true;

            pinInputs.forEach(input => {
                if(input.value === '') {
                    pinComplete = false;
                }
            });


            if(nameInput.value.trim() === '') {
                event.preventDefault();
                alert('Please enter your name.');
                nameInput.focus();
                return;
            }


            if(!pinComplete) {
                event.preventDefault();
                alert('Please enter your 4 digit PIN.');
                pinInputs[0].focus();
            }

        });

    });




</script>
</html>
