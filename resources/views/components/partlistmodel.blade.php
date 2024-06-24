<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="overflow-x-hidden">

    <!-- Modal Overlay -->
    <div id="modal-overlay" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50" onclick="toggleModal()"></div>

    <!-- Modal -->
    <!-- Modal -->
    <form id="supplierForm" action="{{ route('storagesupplier') }}" method="POST" enctype="multipart/form-data">

        @csrf
        @if (isset($supplier))
            @method('PUT')
        @endif
        <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
            <div class="w-full max-w-2xl p-6 mx-auto bg-white rounded-lg">
                <h2 id="modalTitle" class="mb-4 text-lg font-bold">
                    {{ isset($supplier) ? 'Update Supplier' : 'Add Supplier' }}</h2>
                <div class="space-y-4">
                    <div class="w-full gap-4 p-2">
                        {{-- <input type="text" name="supplier_id" value="" id="supplierId"
                            class="border border-red-500"> --}}

                        <div class="flex flex-wrap w-full form-group md:flex-nowrap">
                            <label for="progress-photos" class="block w-full pr-4 mb-1 text-gray-700 md:mb-0">
                                Logo
                            </label>
                            <div class="progress-photos flex flex-col cursor-pointer items-center justify-center min-h-40 h-auto bg-[#F8F9FA] rounded w-full px-4 py-6 relative"
                                id="progressPhotosDropArea">
                                <div id="uploadedFiles" class="w-full h-full">
                                    <!-- Uploaded files will be shown here -->
                                </div>
                                <div id="uploadInstructions" class="flex flex-col items-center">
                                    <i class="mb-2 text-3xl text-gray-600 fas fa-cloud-upload-alt"></i>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <input type="file" name="profile_image" id="fileInput" style="display:none;"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="businessName" class="w-1/3">Business Name</label>
                            <input type="text" name="business_name" id="businessName"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="businessWeb" class="w-1/3">Business Web</label>
                            <input type="text" name="business_web" id="businessWeb"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="country" class="w-1/3">Country</label>
                            <input type="text" name="country" id="country"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="contactName" class="w-1/3">Contact Name</label>
                            <input type="text" name="contact_name" id="contactName"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="phone" class="w-1/3">Phone</label>
                            <input type="tel" id="phone" name="phone"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="email" class="w-1/3">Email</label>
                            <input type="email" id="email" name="email"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="tradeAccount" class="w-1/3">Trade Account</label>
                            <select id="tradeAccount" name="trade_account"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="tradeAgreement" class="w-1/3">Upload Trade Agreement PDF</label>
                            <div id="tradeAgreementContainer"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                                <input type="file" id="tradeAgreement" name="trade_agreement_pdf"
                                    accept="application/pdf"
                                    class="block w-full p-2 border border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="supplierCRM" class="w-1/3">Supplier CRM</label>
                            <select id="supplierCRM" name="supplier_crm"
                                class="block w-full p-2 border border-gray-300 rounded-md"
                                onchange="toggleCRMFields()">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div id="crmFields" class="hidden space-y-4">
                        <div class="flex items-center space-x-4">
                            <label for="crmUrl" class="w-1/3">URL</label>
                            <input type="url" id="crmUrl" name="crm_url"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="crmUsername" class="w-1/3">Username</label>
                            <input type="text" id="crmUsername" name="crm_username"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="crmPassword" class="w-1/3">Password</label>
                            <input type="password" id="crmPassword" name="crm_password"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end  space-x-4">
                    <button type="button"
                        class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none"
                        onclick="toggleModal()">Close</button>
                    <button type="submit" id="submitButton"
                        class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none">{{ isset($supplier) ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </div>
    </form>

    <!-- JavaScript for Modal Toggle -->
    <script>
        function editSupplier(supplierId) {
            console.log('Edit Supplier' + supplierId);

            $.ajax({
                url: "/suppliers/" + supplierId,
                type: "GET",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    document.getElementById('businessName').value = response.business_name;
                    document.getElementById('businessWeb').value = response.business_web;
                    document.getElementById('country').value = response.country;
                    document.getElementById('contactName').value = response.contact_name;
                    document.getElementById('phone').value = response.phone;
                    document.getElementById('email').value = response.email;
                    document.getElementById('tradeAccount').value = response.trade_account ? 'yes' : 'no';
                    document.getElementById('supplierCRM').value = response.supplier_crm ? 'yes' : 'no';
                    document.getElementById('supplierId').value = response.id;


                    if (response.supplier_crm === 1) {
                        document.getElementById('crmUrl').value = response.crm_url;
                        document.getElementById('crmUsername').value = response.crm_username;
                        document.getElementById('crmPassword').value = response.crm_password;
                        document.getElementById('crmFields').classList.remove('hidden');
                    } else {
                        document.getElementById('crmFields').classList.add('hidden');
                        document.getElementById('crmUrl').value = '';
                        document.getElementById('crmUsername').value = '';
                        document.getElementById('crmPassword').value = '';
                    }

                    // Adjust modal title and submit button text
                    document.getElementById('modalTitle').textContent = 'Update Supplier';
                    document.getElementById('submitButton').textContent = 'Update';

                    // Handle Logo
                    if (response.upload_image) {
                        document.getElementById('uploadedFiles').innerHTML = `
                            <div class="flex items-center w-full h-full">
                                <img src="/storage/profile_images/${response.upload_image}" alt="Logo" class="object-cover w-full h-full rounded">

                            </div>
                            <button class="absolute text-red-500 hover:text-red-700 top-1 right-2" onclick="removeFile('logo')">Remove</button>
                        `;
                        document.getElementById('uploadInstructions').classList.add('hidden');
                    } else {
                        document.getElementById('uploadInstructions').classList.remove('hidden');
                    }

                    if (response.trade_agreement_pdf) {
                        document.getElementById('tradeAgreementContainer').innerHTML = `
        <div class="flex items-center justify-between">
            <a href="/storage/${response.trade_agreement_pdf}" target="_blank" class="text-blue-500 hover:text-blue-700"download>Download Agreement</a>
            <button class="ml-4 text-red-500 hover:text-red-700" onclick="removeFile('tradeAgreement')">Remove</button>
        </div>
        <input type="file" id="tradeAgreement" name="trade_agreement_pdf" accept="application/pdf" class="hidden">
    `;
                    } else {
                        document.getElementById('tradeAgreementContainer').innerHTML = `
        <input type="file" id="tradeAgreement" name="trade_agreement_pdf" accept="application/pdf" class="block w-full p-2 border border-gray-300 rounded-md">
    `;
                    }

                    toggleModal();
                },

                error: function(xhr, status, error) {
                    console.error("Error fetching supplier details:", error);
                }
            });
        }


        // function updatesupplier(supplierId){
        //     console.log('hello' + supplierId);
        // }

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

        function toggleModal() {
            var modalOverlay = document.getElementById('modal-overlay');
            var modal = document.getElementById('modal');
            var form = document.getElementById('supplierForm');


            modalOverlay.classList.toggle('hidden'); // Toggle visibility of the overlay
            modal.classList.toggle('hidden'); // Toggle visibility of the modal
            document.body.classList.toggle('overflow-hidden'); // Optional: Prevent scrolling background
            // Reset input field values when closing the modal
            if (modal.classList.contains('hidden')) {
                form.reset();
                document.getElementById('modalTitle').textContent =
                    '{{ isset($supplier) ? 'Update Supplier' : 'Add Supplier' }}';
                document.getElementById('submitButton').textContent = '{{ isset($supplier) ? 'Update' : 'Save' }}';
                window.location.reload(); //page refresh

            }
        }

        function toggleCRMFields() {
            var supplierCRM = document.getElementById('supplierCRM').value;
            var crmFields = document.getElementById('crmFields');

            if (supplierCRM === 'yes') {
                crmFields.classList.remove('hidden');
            } else {
                crmFields.classList.add('hidden');
            }
        }

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

</body>

</html>
