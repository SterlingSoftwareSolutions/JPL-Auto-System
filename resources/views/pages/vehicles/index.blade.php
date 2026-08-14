@extends('layouts.sidebar')

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-3xl font-bold text-black mb-1">Select vehicle</h1>
            <p class="text-gray-500 text-sm font-medium">Manage and view all vehicles in your inventory.</p>
        </div>
        <button onclick="document.getElementById('addVehicleModal').classList.remove('hidden')" class="bg-black text-white px-5 py-2.5 rounded-lg shadow-sm font-semibold hover:bg-gray-800 transition-colors flex items-center">
            <i class="fas fa-plus mr-2 text-sm"></i> Add Vehicle
        </button>
    </div>

    @if(session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 flex justify-between items-center" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').remove()" class="text-green-700 hover:text-green-900 font-bold ml-4">
                &times;
            </button>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($vehicles as $vehicle)
            <div class="relative group bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden border border-gray-200 flex flex-col">
                <a href="{{ route('vehicles.report', $vehicle->id) }}" class="block flex-1 flex flex-col">
                    <div class="h-40 bg-gray-100 flex items-center justify-center relative p-4">
                        @if($vehicle->image_path)
                            <img src="{{ asset('storage/' . $vehicle->image_path) }}" alt="{{ $vehicle->name }}" class="h-full object-contain mix-blend-multiply">
                        @else
                            <svg class="w-32 h-auto text-gray-300" viewBox="0 0 100 50" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M10,40 L10,30 L30,15 L70,15 L90,30 L90,40 M10,40 L90,40" />
                                <circle cx="25" cy="40" r="4" />
                                <circle cx="75" cy="40" r="4" />
                            </svg>
                        @endif
                    </div>
                    <div class="px-5 py-4 flex-1">
                        <h3 class="font-bold text-black text-xl mb-1 pr-6">{{ $vehicle->name }}</h3>
                        <p class="text-xs text-gray-500 font-medium">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</p>
                    </div>

                <!-- Card Footer (Active Status) -->
                <div class="border-t border-gray-100 px-5 py-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 rounded-full bg-green-500 mr-2"></div>
                        <span class="text-xs font-semibold text-black">Active</span>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 text-sm"></i>
                </div>
                </a>

                <!-- 3 Dot Menu Button -->
                <div class="absolute top-3 right-3 z-10">
                    <button onclick="toggleDropdown({{ $vehicle->id }})" class="w-8 h-8 flex items-center justify-center bg-white rounded-full hover:bg-gray-50 focus:outline-none shadow-sm border border-gray-200">
                        <i class="fas fa-ellipsis-v text-gray-600 text-xs"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdown-{{ $vehicle->id }}" class="hidden absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg py-1 border border-gray-100">
                        <button onclick="openEditModal({{ $vehicle->id }}, '{{ addslashes($vehicle->name) }}', '{{ $vehicle->year }}', '{{ addslashes($vehicle->make) }}', '{{ addslashes($vehicle->model) }}', {{ $vehicle->image_path ? 'true' : 'false' }})" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium">
                            Edit
                        </button>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vehicle?');" class="hidden">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Add Vehicle Modal -->
    <div id="addVehicleModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Add New Vehicle</h3>
                <button onclick="document.getElementById('addVehicleModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Identifier / Name (e.g., 478)</label>
                    <input type="text" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Year</label>
                    <input type="number" name="year" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Make</label>
                    <input type="text" name="make" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                    <input type="text" name="model" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Vehicle Image</label>
                    <input type="file" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" onclick="document.getElementById('addVehicleModal').classList.add('hidden')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Edit Vehicle Modal -->
    <div id="editVehicleModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Edit Vehicle</h3>
                <button onclick="document.getElementById('editVehicleModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <form id="editVehicleForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Identifier / Name (e.g., 478)</label>
                    <input type="text" id="edit_name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Year</label>
                    <input type="number" id="edit_year" name="year" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Make</label>
                    <input type="text" id="edit_make" name="make" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                    <input type="text" id="edit_model" name="model" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">New Vehicle Image (optional)</label>
                    <input type="file" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    
                    <div id="remove_image_wrapper" class="mt-3 hidden">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remove_image" value="1" class="form-checkbox h-4 w-4 text-red-600">
                            <span class="ml-2 text-sm text-red-600">Remove current image</span>
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" onclick="document.getElementById('editVehicleModal').classList.add('hidden')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleDropdown(id) {
        // Hide all other dropdowns
        document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
            if (el.id !== 'dropdown-' + id) {
                el.classList.add('hidden');
            }
        });
        
        const dropdown = document.getElementById('dropdown-' + id);
        dropdown.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = event.target.closest('[id^="dropdown-"]');
        const isClickOnButton = event.target.closest('button[onclick^="toggleDropdown"]');
        
        if (!isClickInsideMenu && !isClickOnButton) {
            document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
                el.classList.add('hidden');
            });
        }
    });

    function openEditModal(id, name, year, make, model, hasImage) {
        document.getElementById('editVehicleForm').action = '/vehicles/' + id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_year').value = year;
        document.getElementById('edit_make').value = make;
        document.getElementById('edit_model').value = model;
        
        // Handle remove image checkbox
        const removeImageWrapper = document.getElementById('remove_image_wrapper');
        const removeImageCheckbox = document.querySelector('input[name="remove_image"]');
        removeImageCheckbox.checked = false; // Reset checkbox
        
        if (hasImage) {
            removeImageWrapper.classList.remove('hidden');
        } else {
            removeImageWrapper.classList.add('hidden');
        }
        
        // Hide dropdown
        document.getElementById('dropdown-' + id).classList.add('hidden');
        
        // Show modal
        document.getElementById('editVehicleModal').classList.remove('hidden');
    }
</script>
@endsection
