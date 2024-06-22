@extends('layouts.layout')

@section('content')
    @include('components.landingpagenavbar')

    <style>
        .triangle {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 20px solid black;
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .url {
            word-break: break-all;
        }

        .url {
            white-space: pre-wrap;
        }

        @media (max-width: 600px) {
            .url {
                word-break: break-all;
            }
        }
    </style>

    <div class="w-full h-screen" style="background-color: #F9F9F9">
        <div class="">
            <div id="modal-overlay" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50" onclick="toggleModal()"></div>

            <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                <!-- Modal content will be loaded here -->
            </div>

            <!-- Always show the Add New Supplier button -->
            <div class="flex items-center justify-center w-40 h-10 mx-4 text-center bg-black rounded-md">
                <a href="#" onclick="addnewSupplier()" class="text-sm font-bold text-white">
                    Add New Supplier
                </a>
            </div>

            <!-- Show supplier details only if there are suppliers -->
            @if($suppliers->isNotEmpty())
                <div class="grid-cols-3 border md:grid">
                    @foreach ($suppliers as $supplier)
                        <div class="flex flex-col bg-white md:w-[420px] mx-4 p-10 rounded-2xl mt-10">
                            <div class="flex items-end">
                                <div>
                                    <img src="{{ asset('storage/profile_images/' . $supplier->upload_image) }}" class="h-24 w-52" alt="profile Pic">
                                </div>
                                <a href="#" class="ml-auto">
                                    <img class="h-14" src="{{ asset('images/partlist01.jpg') }}" alt="profile Pic">
                                </a>
                                <div class="gap-3">
                                    <button onclick="editSupplier({{ $supplier->id }})">Edit</button>
                                    <form action="{{ route('deletesupplier', $supplier->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                </div>
                            </div>
                            <div class="pb-2 mt-5 border-b-2 border-black">
                                <h1 class="text-xl font-bold">{{ $supplier->business_name }}</h1>
                                <h2 class="font-bold">{{ $supplier->business_web }}</h2>
                            </div>
                            <div class="flex flex-col mt-5">
                                <div class="grid items-center grid-cols-2 border-b border-black">
                                    <div class="flex items-center">
                                        <h1 class="pr-2 font-bold">Country:</h1>
                                        <h1 class="text-left break-all">{{ $supplier->country }}</h1>
                                    </div>
                                    <div class="flex items-center pl-2 border-l-4 border-black" style="padding: 10px;">
                                        <h1 class="pr-2 font-bold">Account Contact:</h1>
                                        <h1 class="text-left break-all">{{ $supplier->contact_name }}</h1>
                                    </div>
                                </div>
                                <div class="grid items-center grid-cols-2">
                                    <div class="flex items-center border-b-4 border-black">
                                        <h1 class="pr-2 font-bold">P:</h1>
                                        <h1 class="text-left break-all">{{ $supplier->phone }}</h1>
                                    </div>
                                    <div class="flex items-center pl-2 border-b-4 border-l-4 border-black">
                                        <h1 class="pr-2 font-bold">E:</h1>
                                        <h1 class="text-left break-all">{{ $supplier->email }}</h1>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="flex">
                                        <div class="flex-col mt-5">
                                            <div class="flex">
                                                <h1 class="pr-2 font-semibold">CRM</h1>
                                                <h1>{{ $supplier->supplier_crm ? 'Yes' : 'No' }}</h1>
                                            </div>
                                            <div class="flex">
                                                <h1 class="pr-2 font-semibold">url: <span class="text-left text-balance url">{{ $supplier->crm_url }}</span></h1>
                                            </div>
                                            <div class="flex">
                                                <h1 class="font-semibold text-left">Username: {{ $supplier->crm_username }}</h1>
                                            </div>
                                            <div class="flex">
                                                <h1 class="font-semibold text-left">Password: ******</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex pl-2 border-l-4 border-black">
                                        <div class="flex-col mt-4">
                                            <div class="flex">
                                                <h1 class="pr-2">Trade Account:</h1>
                                                <h1 class="text-left">{{ $supplier->trade_account ? 'Yes' : 'No' }}</h1>
                                            </div>
                                            <div class="flex">
                                                <h1 class="pr-2">Agreement:</h1>
                                                <h1 class="text-left">{{ $supplier->trade_agreement_pdf ? basename($supplier->trade_agreement_pdf) : 'No Agreement' }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>

    $(document).on('click', '#supplierForm', function(e) {
        e.preventDefault()

        const $form = $(this);
        const url = $form.attr('action');
        const method = $form.attr('method') || 'GET';

        $.ajax({
            url: url,
            type: method,
            data: $form.serialize(),
            success: function(response) {
                console.log(response);
            },
            error: function(xhr) {
            const errors = xhr.responseJSON.errors;
            $('.error').remove();

            $.each(errors, function(key, messages) {
                const input = $form.find(`[name="${key}"]`);
                if (input.length) {
                    messages.forEach(message => {
                        input.after(`<span class="text-red-600 error">${message}</span>`);
                    });
                }
            });

            console.error('An error occurred:', xhr.responseJSON);
        }
        });

    })

    function addnewSupplier() {
        $.ajax({
            url: "/suppliers/create",
            type: "GET",
            success: function(response) {
                $('#modal').html(response.html);
                toggleModal();
            }
        });
    }

    function editSupplier(supplierId) {
        $.ajax({
            url: "/suppliers/" + supplierId,
            type: "GET",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#modal').html(response.html);
                toggleModal();
            }
        });
    }

    function toggleModal() {
        var modalOverlay = document.getElementById('modal-overlay');
        var modal = document.getElementById('modal');
        var form = document.getElementById('supplierForm');

        modalOverlay.classList.toggle('hidden'); // Toggle visibility of the overlay
        modal.classList.toggle('hidden'); // Toggle visibility of the modal
        document.body.classList.toggle('overflow-hidden'); // Optional: Prevent scrolling background

        if (modal.classList.contains('hidden')) {
            form.reset();
            document.getElementById('modalTitle').textContent = '{{ isset($supplier) ? "Update Supplier" : "Add Supplier" }}';
            document.getElementById('submitButton').textContent = '{{ isset($supplier) ? "Update" : "Save" }}';
            window.location.reload();  //page refresh
        }
    }

    function removeFile(type) {
        if (type === 'logo') {
            document.getElementById('uploadedFiles').innerHTML = '';
            document.getElementById('uploadInstructions').classList.remove('hidden');
        } else if (type === 'tradeAgreement') {
            document.getElementById('tradeAgreementContainer').innerHTML = `
                <input type="file" id="tradeAgreement" name="trade_agreement_pdf" accept="application/pdf" class="block w-full p-2 border border-gray-300 rounded-md">
            `;
        }
    }


// =========================================================================================================
function toggleCRMFields() {
        var supplierCRM = document.getElementById('supplierCRM').value;
        var crmFields = document.getElementById('crmFields');
        if (supplierCRM === 'yes') {
            crmFields.classList.remove('hidden');
        } else {
            crmFields.classList.add('hidden');
        }
    }

    // Call the function on page load to ensure the correct state is set based on the initial value
    document.addEventListener('DOMContentLoaded', (event) => {
        toggleCRMFields();

        window.toggleCRMFields = function() {
        const crmFields = document.getElementById('crmFields');
        const supplierCRM = document.getElementById('supplierCRM');
        if (supplierCRM.value === 'yes') {
            crmFields.classList.remove('hidden');
        } else {
            crmFields.classList.add('hidden');
        }
    }
    });




        // Drag and Drop Handling
        const progressPhotosDropArea = document.getElementById('progressPhotosDropArea');
        const fileInput = document.getElementById('fileInput');

        progressPhotosDropArea.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        progressPhotosDropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            progressPhotosDropArea.classList.add('bg-gray-200');
        });

        progressPhotosDropArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            progressPhotosDropArea.classList.remove('bg-gray-200');
        });

        progressPhotosDropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            progressPhotosDropArea.classList.remove('bg-gray-200');
            handleFiles(e.dataTransfer.files);
        });

        function handleFiles(files) {
            const file = files[0];
            if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploadedFiles').innerHTML = `
                        <div class="flex items-center w-full h-full">
                            <img src="${e.target.result}" alt="Logo" class="object-cover w-full h-full rounded">
                        </div>
                        <button class="absolute text-red-500 hover:text-red-700 top-1 right-2" onclick="removeFile('logo')">Remove</button>
                    `;
                    document.getElementById('uploadInstructions').classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
</script>
@endpush
