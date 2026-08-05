<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="py-10 flex justify-center w-full">
        <div class="md:w-6/12 w-10/12">

            {{-- Reset Password --}}
            <form action="{{ route('reset') }}" method="POST" id="resetPasswordForm">
                @csrf
                <input type="hidden" name="token" value="{{$token}}" id="">

                <div class="flex justify-center rounded-xl p-8 mt-10 md:w-7/12 md:mx-auto" style="background-color: #F9F9F9; min-height: 46vh;">
                    <div class="text-center w-full mt-10">
                        <h1 class="text-4xl">FORGET PIN</h1>

                        {{-- Display Error Message --}}

                        <div id="errorMessage" class=" text-white text-md rounded-md mt-10  mx-10 " style="background-color: #B02B2B"></div>

                        <h1 class="text-sm font-semibold text-black mt-10">New Password</h1>
                        <div class="flex justify-center space-x-6 mt-10">
                            <input type="password" name="pin1" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                            <input type="password" name="pin2" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                            <input type="password" name="pin3" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                            <input type="password" name="pin4" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                        </div>

                        <h1 class="text-sm font-semibold text-black mt-10">Confirm Password</h1>
                        <div class="flex justify-center space-x-6 mt-10">
                            <input type="password" name="confirm_pin1" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                            <input type="password" name="confirm_pin2" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                            <input type="password" name="confirm_pin3" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                            <input type="password" name="confirm_pin4" class="pin-input rounded-md h-28 w-2/6 md:w-24 text-2xl text-center" placeholder="">
                        </div>

                        <div class="rounded-sm w-44 h-10 flex items-center justify-center mx-auto mt-5 hover:bg-black bg-gray-500 transition-colors duration-300">
                            <button type="submit" class="text-white text-center font-bold">RESET PASSWORD</button>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Reset Password --}}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const pinInputs = document.querySelectorAll('.pin-input');

            pinInputs.forEach((input, index) => {
                input.addEventListener('input', (event) => {
                    if (input.value.length === 1 && index < pinInputs.length - 1) {
                        pinInputs[index + 1].focus();
                    }

                    if (index === pinInputs.length - 1) {
                        validateAndSubmit();
                    }
                });
                             //backspacke remove script
    input.addEventListener('keydown', (event) => {
                if (event.key === 'Backspace' && input.value === '') {
                    if (index > 0) {
                        pinInputs[index - 1].focus();
                    }
                }
            });
            });
        });

        function validateAndSubmit() {
            const pin1 = document.querySelector('input[name="pin1"]').value;
            const pin2 = document.querySelector('input[name="pin2"]').value;
            const pin3 = document.querySelector('input[name="pin3"]').value;
            const pin4 = document.querySelector('input[name="pin4"]').value;

            const confirmPin1 = document.querySelector('input[name="confirm_pin1"]').value;
            const confirmPin2 = document.querySelector('input[name="confirm_pin2"]').value;
            const confirmPin3 = document.querySelector('input[name="confirm_pin3"]').value;
            const confirmPin4 = document.querySelector('input[name="confirm_pin4"]').value;

            const pin = pin1 + pin2 + pin3 + pin4;
            const confirmPin = confirmPin1 + confirmPin2 + confirmPin3 + confirmPin4;

            if (pin === confirmPin) {
                document.getElementById('resetPasswordForm').submit();
            } else {
                // Display Error Message
                document.getElementById('errorMessage').innerText = 'New PIN and Confirm PIN do not match.';
            }
        }
    </script>
</body>
</html>
