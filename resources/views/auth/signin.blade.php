
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

        <div class="flex justify-center items-center rounded-lg p-8 mt-10 md:w-7/12 md:mx-auto " style="background-color: #F9F9F9; min-height: 46vh;">
            <div class="text-center ">
                <h1 class="text-4xl">SIGN IN</h1>
                <div class="flex justify-center space-x-6 mt-10">
                    <input type="password"
                           class="rounded-md h-28 w-2/6 md:w-24 text-2xl"
                           placeholder="">
                    <input type="password"
                           class="rounded-md h-28 w-2/6 md:w-24 text-2xl"
                           placeholder="">
                    <input type="password"
                           class="rounded-md h-28 w-2/6 md:w-24 text-2xl"
                           placeholder="">
                    <input type="password"
                           class="rounded-md h-28 w-2/6 md:w-24 text-2xl"
                           placeholder="">
                </div>
                <div class="mt-4">
                    <h1><a href="#" class="underline text-sm font-bold text-gray-600 ">Forget Password?</a></h1>

                </div>
                <h1 class="text-md text-gray-800 font-normal mt-10">© Copyright 2024 JPL Automotive. All Rights Reserved.</h1>
            </div>

        </div>






        {{-- login --}}
    </div>



    </div>


</body>
</html>
