
<title>ForgetPassword</title>
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

    {{-- Forget Password --}}

    <div class="flex justify-center rounded-lg p-8 mt-10 md:w-7/12 md:mx-auto" style="background-color: #F9F9F9; min-height: 46vh;">
        <div class="text-center  w-full mt-10">
            <h1 class="text-4xl">FORGET PIN</h1>
            <h1 class=" text-sm font-semibold text-black mt-10">Email</h1>

            <input type="text" class="w-11/12 mt-5 h-10 border">
            <div class="rounded-sm w-44 h-10 flex items-center justify-center mx-auto mt-5 hover:bg-black bg-gray-500 transition-colors duration-300" style="background-color: #676768,">
                <button class="text-white text-center font-bold ">RESET PASSWORD</button>
            </div>

        </div>

    </div>

    {{-- Forget Password --}}

</div>



</div>


</body>
</html>
