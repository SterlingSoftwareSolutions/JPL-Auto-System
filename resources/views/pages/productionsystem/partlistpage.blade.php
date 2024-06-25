@extends('layouts.layout')

@section('content')
@include('components.landingpagenavbar')


<div class="flex flex-wrap">
    <div class="w-full max-h-screen overflow-y-auto bg-white md:w-[95%]">

          <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
          <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
            }
            .modal-content-container {
                position: relative;
                width: 100%;
                max-width: 600px;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }
            .modal-content {
                display: block;
                max-width: 70%;
                height: auto;
                margin: 0 auto;
            }
            .close-button {
                position: absolute;
                top: 10px;
                right: 10px;
                width: 32px;
                height: 32px;
                cursor: pointer;
            }
            #caption {
                margin-top: 10px;
                text-align: center;
                color: #333;
            }
        </style>

        <div class="mx-10">

            <table class="w-full text-sm bg-white rounded shadow-md ">

                <div class="flex ">
                    <div class="mt-5 ml-8">
                        <button class="w-20 h-10 text-2xl font-bold text-white bg-black rounded-lg">Body</button>
                    </div>
                
                    <div class="flex items-end justify-end flex-grow mt-5 mr-8">
                        <button class="w-40 h-10 text-2xl font-bold text-white bg-black rounded-lg">+Add Part</button>
                    </div>  
                </div>
                


                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                    
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg" data-img-src="{{ asset('images/dimensions-and-weight.png') }}" data-part-number="Part NO: 3641H">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>






        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md ">


                <div class="mt-5 ml-8">
                    <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Labour
                    </button>
                </div>

                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="gap-8 border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>


        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md ">


                <div class="mt-5 ml-8">
                    <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Power Plant
                    </button>
                </div>

                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="gap-8 border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>



        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md ">


                <div class="mt-5 ml-8">
                    <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Suspension
                    </button>
                </div>

                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="gap-8 border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>

        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md ">


                <div class="mt-5 ml-8">
                    <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Wheels & Tyres
                    </button>
                </div>

                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="gap-8 border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>

        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md ">


                <div class="mt-5 ml-8">
                    <button class="h-10 text-2xl font-bold text-white bg-black rounded-lg w-30">Parts - Interior
                    </button>
                </div>

                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="gap-8 border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>


        <div class="mx-10 ">

            <table class="w-full text-sm bg-white rounded shadow-md ">


                <div class="mt-5 ml-8">
                    <button class="text-2xl font-bold text-white bg-black rounded-lg w-35 h-30">Parts - Exterior
                    </button>
                </div>

                <div class="mx-10">

                    <thead class="mx-10 border-b-2 border-black w-60">
                        <tr class="items-start text-start">
                            <th class="items-start w-[] px-8 py-6 text-left">Category </th>
                            <th class="items-start w-[] px-8 py-6 text-left">Component</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Description</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Part Number</th>
                            <th class="items-start w-[] px-8 py-6 text-left"> Image</th>

                            

                            <th class="items-start w-[] px-8 py-6 text-left">Price</th>
                            <th class="items-start w-[] px-8 py-6 text-left">Supplier</th>
                        </tr>
                    </thead>
                </div>



                {{-- body 1 --}}
                <tbody>
                    <tr class="gap-8 border-b border-black">


                        <td class="px-8 py-2">Body</td>
                        <td class="px-8 py-2">Complete Shell</td>
                        <td class="px-8 py-2">RHD 67 Ford Mustang Fastback</td>
                        <td class="px-8 py-2">3641H</td>
                        <td class="px-8 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="w-12 h-12 cursor-pointer bi bi-image" viewBox="0 0 16 16" id="myImg">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                        </td>
                        <td class="px-8 py-2"> US$ 15,000.00 </td>
                        <td class="px-8 py-2">TheBOG</td>




                    </tr>
                    <tr class="border-b border-black">

                        <td class="px-8 py-2 border-l "></td>
                        <td class="px-8 py-2">Hood</td>



                    </tr>
                  


                </tbody>
                {{-- body 1 end --}}



            </table>

        </div>
        <div id="myModal" class="flex items-center justify-center modal">
            <div class="relative w-full max-w-3xl p-4 bg-white rounded-lg shadow-xl modal-content-container">
                <span class="absolute text-2xl font-bold text-gray-700 cursor-pointer top-2 right-2 close-button" id="closeModal">&times;</span>
                <div id="partNumber" class="mt-2 text-center text-gray-700"></div>
                <img class="max-w-full max-h-screen rounded-md modal-content" id="img01">
            </div>
        </div>
  
  {{-- <script>
     // Get the modal
var modal = document.getElementById("myModal");

var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function() {
    modal.style.display = "flex";
    modalImg.src = this.src;
    var partNumber = this.getAttribute("data-part-number");
    var description = this.getAttribute("data-description");
    captionText.innerHTML = `<strong>Part Number:</strong> ${partNumber}`;
}

var closeModal = document.getElementById("closeModal");

closeModal.onclick = function() { 
    modal.style.display = "none";
}

  </script> --}}
  
  {{-- <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the SVG element
    var img = document.getElementById("myImg");

    // Get the modal image and caption elements
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    // Set the onclick event for the SVG
    img.onclick = function() {
        modal.style.display = "flex";
        modalImg.src = this.getAttribute("data-img-src");
        captionText.innerHTML = "Your caption or additional information here";
    }

    // Get the close button
    var closeModal = document.getElementById("closeModal");

    // Set the onclick event for the close button
    closeModal.onclick = function() { 
        modal.style.display = "none";
    }
    
</script> --}}



<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the SVG element
    var img = document.getElementById("myImg");

    // Get the modal image and part number elements
    var modalImg = document.getElementById("img01");
    var partNumberText = document.getElementById("partNumber");

    // Set the onclick event for the SVG
    img.onclick = function() {
        modal.style.display = "flex";
        modalImg.src = this.getAttribute("data-img-src");
        partNumberText.innerHTML = this.getAttribute("data-part-number");
    }

    // Get the close button
    var closeModal = document.getElementById("closeModal");

    // Set the onclick event for the close button
    closeModal.onclick = function() { 
        modal.style.display = "none";
    }
</script>



    </div>



    @endsection