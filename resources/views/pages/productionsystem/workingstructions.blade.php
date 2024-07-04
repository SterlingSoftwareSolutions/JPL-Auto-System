@extends('layouts.layout')

@section('content')

@include('components.landingpagenavbar')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div style="background-color: #f9f9f9; border: 1px solid #f9f9f9;">


    <div class="bg-white mx-5 rounded-3xl mt-5">
        <div class="container flex flex-col gap-8 mx-auto ">
            <section class="py-8">

                <div class="flex flex-col gap-8">
                    <h2 class="text-2xl font-bold">Work Instructions</h2>
                </div>


                <div class="w-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-md">
                   <div class="flex flex-col gap-8">
                    <div>
                        <nav class="flex items-start justify-start">
                            <a href="#" onclick="showTab('essential')"
                                class="inline-block px-4 py-2 text-black border-r border-black hover:text-black focus:text-black">Essential Information</a>
                            <a href="#" onclick="showTab('engine')"
                                class="inline-block px-4 py-2 text-black border-r border-black hover:text-black focus:text-black">Engine</a>
                            <a href="#" onclick="showTab('audio')"
                                class="inline-block px-4 py-2 text-black border-r border-black hover:text-black focus:text-black">Audio System</a>
                            <a href="#" onclick="showTab('additional')"
                                class="inline-block px-4 py-2 text-black border-r border-black hover:text-black focus:text-black">Additional Features</a>
                            <a href="#" onclick="showTab('climate')"
                                class="inline-block px-4 py-2 text-black hover:text-black focus:text-black">Climate control</a>
                        </nav>
                    </div>
                    <div>
                        <!------------->

                    <div id="essential" class="tab-content">
                        <div class="container mx-auto">
                            <table class="h-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th class="items-start px-4 py-2 text-start">FUSES Eng</th>
                                        <th class="items-start px-4 py-2 text-start">CHANGING THE TIRES</th>
                                        <th class="items-start px-4 py-2 text-start">FUEL TANK CAPACITY</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="w-[100%]">
                                        <td class="w-1/3 px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="w-1/3 px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="w-1/3 px-4 py-8 border-b border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <thead>
                                        <tr>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">FUEL PUMP SHUT-OFF SWITCH</th>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">TIRE PRESSURE</th>
                                            <th class="items-start px-4 py-2 text-start">ROADSIDE ASSISTANCE</th>
                                        </tr>
                                    </thead>
                                    <tr class="w-[100%]">
                                        <td class="w-1/3 px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="w-1/3 px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="w-1/3 px-4 py-2 border-b">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87  >Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>




                    <div id="engine" class="tab-content">
                        <div class="container mx-auto">
                            <table class="border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th class="items-start px-4 py-2 text-start">FUSES</th>
                                        <th class="items-start px-4 py-2 text-start">CHANGING THE TIRES</th>
                                        <th class="items-start px-4 py-2 text-start">FUEL TANK CAPACITY</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <thead>
                                        <tr>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">FUEL PUMP SHUT-OFF SWITCH</th>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">TIRE PRESSURE</th>
                                            <th class="items-start px-4 py-2 text-start">ROADSIDE ASSISTANCE</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="audio" class="tab-content">
                        <div class="container mx-auto">
                            <table class="border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th class="items-start px-4 py-2 text-start">FUSES audio</th>
                                        <th class="items-start px-4 py-2 text-start">CHANGING THE TIRES</th>
                                        <th class="items-start px-4 py-2 text-start">FUEL TANK CAPACITY</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <thead>
                                        <tr>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">FUEL PUMP SHUT-OFF SWITCH</th>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">TIRE PRESSURE</th>
                                            <th class="items-start px-4 py-2 text-start">ROADSIDE ASSISTANCE</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div id="additional" class="tab-content">
                        <div class="container mx-auto">
                            <table class="border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th class="items-start px-4 py-2 text-start">FUSES additonal</th>
                                        <th class="items-start px-4 py-2 text-start">CHANGING THE TIRES</th>
                                        <th class="items-start px-4 py-2 text-start">FUEL TANK CAPACITY</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <thead>
                                        <tr>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">FUEL PUMP SHUT-OFF SWITCH</th>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">TIRE PRESSURE</th>
                                            <th class="items-start px-4 py-2 text-start">ROADSIDE ASSISTANCE</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="climate" class="tab-content">
                        <div class="container mx-auto">
                            <table class="border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th class="items-start px-4 py-2 text-start">FUSES climate</th>
                                        <th class="items-start px-4 py-2 text-start">CHANGING THE TIRES</th>
                                        <th class="items-start px-4 py-2 text-start">FUEL TANK CAPACITY</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-b border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center  text-white bg-black  rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <thead>
                                        <tr>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">FUEL PUMP SHUT-OFF SWITCH</th>
                                            <th class="items-start px-4 py-2 border-r border-black text-start">TIRE PRESSURE</th>
                                            <th class="items-start px-4 py-2 text-start">ROADSIDE ASSISTANCE</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">If your electrical components aren't working properly, a
                                                    fuse may have blown. For more detailed information, please refer to your
                                                    Owner's Guide.</span>
                                                <button
                                                    class="flex items-center justify-center text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-r border-black">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your vehicle is equipped with a temporary spare tire,
                                                    which is smaller than a regular tire and designed for emergency use
                                                    only. The jack, spare tire, jack handle and the lug</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex items-center">
                                                <span class="mr-2">Your tank holds 16 gallons (60.6 L) of fuel. For optimum
                                                    performance use "Regular" unleaded fuel with a pump (R+M)/2 octane
                                                    rating of at least 87</span>
                                                <button
                                                    class="flex items-center justify-center w-6 h-6 text-white bg-black rounded-[100%] min-w-8 min-h-8">+</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                    </div>
                   </div>



                </div>
            </section>
        </div>
    </div>



    <!-----------------------------------steps------->
    <div class="bg-white mx-5 rounded-3xl mt-10">
        <Section>
            <div class="container mx-auto flex flex-col md:flex-row">
                <div class="w-full md:w-1/2 p-4 border-b md:border-b-0 md:border-r">
                    <!-- Content for the left column -->
                    <h2 class="mb-4 text-xl font-bold">Steps</h2>
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="flex items-center justify-center p-6 bg-black shadow-lg rounded-full w-44 h-44 mx-auto">
                                <div class="text-center">
                                    <h2 class="mb-2 text-xl font-bold text-white">1</h2>
                                    <p class="text-white">Description of step 1.</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-center p-6 bg-black shadow-lg rounded-full w-44 h-44 mx-auto">
                                <div class="text-center">
                                    <h2 class="mb-2 text-xl font-bold text-white">2</h2>
                                    <p class="text-white">Description of step 2.</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-center p-6 bg-black shadow-lg rounded-full w-44 h-44 mx-auto">
                                <div class="text-center">
                                    <h2 class="mb-2 text-xl font-bold text-white">3</h2>
                                    <p class="text-white">Description of step 3.</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-center p-6 bg-black shadow-lg rounded-full w-44 h-44 mx-auto">
                                <div class="text-center">
                                    <h2 class="mb-2 text-xl font-bold text-white">4</h2>
                                    <p class="text-white">Description of step 4.</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-center p-6 bg-black shadow-lg rounded-full w-44 h-44 mx-auto">
                                <div class="text-center">
                                    <h2 class="mb-2 text-xl font-bold text-white">5</h2>
                                    <p class="text-white">Description of step 5.</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-center p-6 bg-black shadow-lg rounded-full w-44 h-44 mx-auto">
                                <div class="text-center">
                                    <h2 class="mb-2 text-xl font-bold text-white">6</h2>
                                    <p class="text-white">Description of step 6.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 p-4 bg-black rounded-[5%]">
                    <h2 class="mb-4 text-xl font-bold text-white">Quality Control</h2>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full p-4 md:w-[40%]">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="mx-auto md:mx-10">
                                    <table class="w-full bg-black rounded shadow-md text-base">
                                        <tbody>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">1.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">2.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">3.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">4.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">5.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">6.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">7.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">8.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">9.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-2 text-white border-b border-white">10.</td>
                                                <td class="px-2 py-2 pl-10 text-white border-b border-white whitespace-nowrap">
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                    <a href="#" class="ml-4 text-white hover:underline">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Section>
    </div>





    <!----------------------------------------part list and diagram---------------------------->

    <div class="bg-white mx-5 rounded-3xl  ">

        <Section class="my-5">
            <div class="container flex flex-col md:flex-row mx-auto py-14">
                <div class="w-full md:w-1/2 p-4 border-r">
                    <!-- Content for the left column -->
                    <h2 class="mb-4 text-xl font-bold">Part List</h2>
                    <div class="container mx-auto">
                        <div class="h-64 overflow-y-scroll">
                            <table class="w-full rounded shadow-md text-Base">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="px-2 py-2 text-xl font-bold text-black border-b border-black">01. Power Plant</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                        <tr>
                                            <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                            <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                                <span class="flex-grow text-center"># 123569</span>
                                                <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                            <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                                <span class="flex-grow text-center"># 123569</span>
                                                <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                            <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                                <span class="flex-grow text-center"># 123569</span>
                                                <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                            <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                                <span class="flex-grow text-center"># 123569</span>
                                                <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                            <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                                <span class="flex-grow text-center"># 123569</span>
                                                <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                            </td>
                                        </tr>
                                    </tr>
                                    <!-- Repeat for other items -->
                                </tbody>
                            </table>
                            <table class="w-full rounded shadow-md text-Base">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="px-2 py-2 text-xl font-bold text-black border-b border-black">02. Wheels & Tyres</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-black border-b border-black">. Engine</td>
                                        <td class="flex justify-between px-2 py-2 pl-10 text-black border-b border-black whitespace-nowrap">
                                            <span class="flex-grow text-center"># 123569</span>
                                            <a href="#" class="ml-4 text-right text-black hover:underline">View</a>
                                        </td>
                                    </tr>
                                    <!-- Repeat for other items -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-4 rounded-[5%]">
                    <h2 class="mb-4 text-xl font-bold text-black">Diagram</h2>
                    <div class="flex flex-col">
                        <div class="w-full p-4">
                            <div>
                                <div class="w-full">
                                    <img src="{{ asset('images/diagram.png') }}" alt="diagram" class="w-full rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Section>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
           showTab('essential') ;
        });
        function showTab(tabId) {
        // Hide all tab contents
        var tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(function(tabContent) {
            tabContent.classList.add('hidden');
        });

        // Show the selected tab content
        var selectedTab = document.getElementById(tabId);
        if (selectedTab) {
            selectedTab.classList.remove('hidden');
        }

        // Remove active class from all links
        var navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(function(navLink) {
            navLink.classList.remove('text-blue-500');
            navLink.classList.add('text-gray-600');
        });

        // Add active class to the clicked link
        var clickedLink = document.querySelector('a[onclick*="' + tabId + '"]');
        if (clickedLink) {
            clickedLink.classList.remove('text-gray-600');
            clickedLink.classList.add('text-blue-500');
        }
    }

    </script>
</div>

@endsection
