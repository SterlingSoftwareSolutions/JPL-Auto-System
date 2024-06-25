
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Workout Library</title>
    <link rel="stylesheet" href="{{ asset('css/partlist.css') }}">
</head>


<body>
    @extends('layouts.layout')
    @section('content')
        <div class="container mx-4 mt-24 flex-grow min-h-screen" id="container">
            <div class="breadcrumb text-sm mb-4">
                <a href="#" class="text-gray-500 hover:underline ml-4">Home</a> / <span><strong class="font-source-sans"> Workout
                        Library </strong></span>
                <div class="flex justify-between p-5">
                    <h1 class="text-2xl  font-medium mb-5 font-source-sans"> Workout Library</h1>
                    <button id="openPopupBtn" class="bg-black h-10 px-6 text-white rounded-md">+ ADD</button>

                    {{-- pop up view start --}}
                    <div id="popupForm"
                        class="popup fixed inset-0 bg-gray-800 bg-opacity-50 items-start justify-center hidden border">
                        <div class="popup-content inset-0 rounded-lg shadow-lg w-7/12 p-6 ">
                            <div class="bg-white border border-b text-black p-4 flex justify-between items-center rounded-t-lg flex-row">
                                <h4 class="text-xl font-semibold">Add Part</h4>
                                <div class="flex items-center space-x-4">
                                    {{-- <a href="#" class="text-white hover:underline">Edit</a>
                                    <a class="text-white">|</a> --}}
                                    <span class="close text-4xl cursor-pointer">&times;</span>
                                </div>
                            </div>
                            <div class="p-6 bg-white">
                                <form class="space-y-4" action="" method="POST">
                                    @csrf
                                    <input type="hidden" id="workoutId" name="id">
                                    <div class="flex items-center space-x-4">
                                        <label for="category" class="w-32 font-semibold">Category <span class="text-red-500">*</span></label>
                                        <select id="category" name="category" class="p-2 border border-gray-300 rounded flex-1">
                                          <option value="body" class="p-2 hover:bg-gray-100">Body</option>
                                          <option value="labour" class="p-2 hover:bg-gray-100">Labour</option>
                                          <optgroup label="Parts" class="font-bold text-gray-700">
                                            <option value="power-plant" class="p-2 hover:bg-gray-100">Power Plant</option>
                                            <option value="suspension" class="p-2 hover:bg-gray-100">Suspension</option>
                                            <option value="wheels-tyres" class="p-2 hover:bg-gray-100">Wheels &amp; Tyres</option>
                                            <option value="interior" class="p-2 hover:bg-gray-100">Interior</option>
                                            <option value="exterior" class="p-2 hover:bg-gray-100">Exterior</option>
                                          </optgroup>
                                        </select>
                                      </div>


                                    <div class="flex items-center space-x-4">
                                        <label for="type" class="w-32 font-semibold">Component <span
                                                class="text-red-500">*</span></label>
                                        <select id="type" name="type"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                            <option value="warmup">Complete Shell</option>

                                        </select>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <label for="workout" class="w-32 font-semibold">Description <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="description" name="description"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <label for="link" class="w-32 font-semibold">Part Number <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="partnumber" name="partnumber"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <label for="link" class="w-32 font-semibold">Supplier <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="supplier" name="supplier"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                    </div>


                                    <div class="flex items-center space-x-4">
                                        <label for="partnumber" class="w-34 font-semibold">Upload Part Image <span class="text-red-500">*</span></label>
                                        <input type="file" id="partnumber" name="partnumber" accept="image/jpeg, image/png" class="p-2 border border-gray-300 rounded flex-1">
                                    </div>



                                    <div class="p-4 items-end justify-end  flex text-center rounded-b-lg gap-2 ">
                                        <button class="bg-gray-500 text-white font-bold w-20  py-2 rounded "
                                            type="submit" id="addButton">ADD</button>
                                        <button class="bg-black text-white px-8 py-2 rounded mr-2"
                                            type="submit" id="updateButton" hidden>Update</button>
                                            <button type="button"
                                            class="bg-gray-300 text-gray-600 font-bold w-20  py-2 rounded "
                                            type="submit" onclick="closePopup()">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- pop up view end --}}
                </div>

                <div class="bg-white p-5 rounded-lg shadow-md">
                    <table class="w-full border-collapse mb-5 text-sm">
                        <thead>
                            <tr>
                                <th class="p-3 border-s-2 border-y-2 border-gray-300 bg-white text-left" dir="ltr">
                                    Category</th>
                                <th class="p-3 border-y-2 border-gray-300 bg-white text-left">Type</th>
                                <th class="p-3 border-y-2 border-gray-300 bg-white text-left">Workout</th>
                                <th class="p-3 border-y-2 border-gray-300 bg-white text-left">Link</th>
                                <th class="p-3 border-s-2 border-y-2 border-gray-300 bg-white text-left" dir="rtl">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-100">
                                <td dir="ltr" class="p-3 border-s-2 border-y-2 border-gray-300 text-left">
                                    Category 1
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Type 1
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Workout 1
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Link 1
                                </td>
                                <td dir="rtl" class="p-3 border-s-2 border-y-2 border-gray-300">
                                    <div class="flex space-x-3">
                                        <form action="#" method="POST">
                                            <a href="#" onclick="edit(1, 'Category 1', 'Type 1', 'Workout 1', 'Link 1')" class="mr-8">
                                                <i class="text-[#fd8300] bi bi-pencil"></i>
                                                <span class="text-black">Edit</span>
                                            </a>
                                            <button type="submit" class="mr-7" onclick="return confirm('Are you sure you want to delete this entry?')">
                                                <i class="text-[#fd8300] bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td dir="ltr" class="p-3 border-s-2 border-y-2 border-gray-300 text-left">
                                    Category 2
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Type 2
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Workout 2
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Link 2
                                </td>
                                <td dir="rtl" class="p-3 border-s-2 border-y-2 border-gray-300">
                                    <div class="flex space-x-3">
                                        <form action="#" method="POST">
                                            <a href="#" onclick="edit(2, 'Category 2', 'Type 2', 'Workout 2', 'Link 2')" class="mr-8">
                                                <i class="text-[#fd8300] bi bi-pencil"></i>
                                                <span class="text-black">Edit</span>
                                            </a>
                                            <button type="submit" class="mr-7" onclick="return confirm('Are you sure you want to delete this entry?')">
                                                <i class="text-[#fd8300] bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td dir="ltr" class="p-3 border-s-2 border-y-2 border-gray-300 text-left">
                                    Category 3
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Type 3
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Workout 3
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Link 3
                                </td>
                                <td dir="rtl" class="p-3 border-s-2 border-y-2 border-gray-300">
                                    <div class="flex space-x-3">
                                        <form action="#" method="POST">
                                            <a href="#" onclick="edit(3, 'Category 3', 'Type 3', 'Workout 3', 'Link 3')" class="mr-8">
                                                <i class="text-[#fd8300] bi bi-pencil"></i>
                                                <span class="text-black">Edit</span>
                                            </a>
                                            <button type="submit" class="mr-7" onclick="return confirm('Are you sure you want to delete this entry?')">
                                                <i class="text-[#fd8300] bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td dir="ltr" class="p-3 border-s-2 border-y-2 border-gray-300 text-left">
                                    Category 4
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Type 4
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Workout 4
                                </td>
                                <td class="p-3 border-y-2 border-gray-300 text-left">
                                    Link 4
                                </td>
                                <td dir="rtl" class="p-3 border-s-2 border-y-2 border-gray-300">
                                    <div class="flex space-x-3">
                                        <form action="#" method="POST">
                                            <a href="#" onclick="edit(4, 'Category 4', 'Type 4', 'Workout 4', 'Link 4')" class="mr-8">
                                                <i class="text-[#fd8300] bi bi-pencil"></i>
                                                <span class="text-black">Edit</span>
                                            </a>
                                            <button type="submit" class="mr-7" onclick="return confirm('Are you sure you want to delete this entry?')">
                                                <i class="text-[#fd8300] bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    @endsection



    <script src="{{ asset('js/customerlist.js') }}" defer></script>
</body>



</html>




