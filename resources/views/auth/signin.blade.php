
    <title>Sign In</title>
    @vite('resources/css/app.css')

</head>
<body>
    <div class="py-10 flex justify-center w-full">
        <div class="md:w-6/12 w-10/12">

        {{-- logo --}}
        <div class="justify-center flex ">
            <img src="{{ asset('images/jpl-system-logo.png') }}" alt="profile Pic"  >
        </div>
        {{-- logo --}}

        {{-- login --}}

        <div class="flex justify-center items-center rounded-xl p-8 mt-10 md:w-8/12 md:mx-auto " style="background-color: #F9F9F9; min-height: 46vh;">
            <div class="text-center ">
                <h1 class="text-4xl">SIGN IN</h1>
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex justify-center space-x-6 mt-10">
                        <input type="password" name="pin1"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px]  text-2xl text-center"
                            placeholder="">
                        <input type="password" name="pin2"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px] text-2xl text-center"
                            placeholder="">
                        <input type="password" name="pin3"
                            class="pin-input rounded-md md:h-28 h-[60px] md:w-4/6 w-[60px] text-2xl text-center"
                            placeholder="">
                        <input type="password" name="pin4"
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
    document.addEventListener('DOMContentLoaded', (event) => {
        const pinInputs = document.querySelectorAll('.pin-input');

        pinInputs.forEach((input, index) => {
            input.addEventListener('input', (event) => {
                if (input.value.length === 1 && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }

                if (index === pinInputs.length - 1) {
                    document.getElementById('loginForm').submit();
                }
            });
        });
    });
</script>
</html>
