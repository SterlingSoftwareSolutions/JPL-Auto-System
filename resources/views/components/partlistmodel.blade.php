<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden">

    <!-- Modal Overlay -->
    <div id="modal-overlay" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden" onclick="toggleModal()"></div>

    <!-- Modal -->
    <form action="{{ route('storagesupplier') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto">
                <h2 class="text-lg font-bold mb-4">Add Supplier</h2>

                <div class="space-y-4">
                    <div class="w-full h-full p-2 gap-4 ">
                        <div class="form-group flex flex-wrap md:flex-nowrap w-full">
                            <label for="progress-photos" class="block text-gray-700 w-full mb-1 md:mb-0 pr-4">
                                Logo
                            </label>
                            <div class="progress-photos flex flex-col cursor-pointer items-center justify-center min-h-40 h-auto bg-[#F8F9FA] rounded w-full px-4 py-6 relative"
                                id="progressPhotosDropArea">
                                <div id="uploadedFiles" class="w-full h-full">
                                    <!-- Uploaded files will be shown here -->
                                </div>
                                <div id="uploadInstructions" class="flex flex-col items-center">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-600 mb-2"></i>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <input type="file" name="profile_image" id="fileInput" style="display:none;"
                                    accept="image/jpeg, image/png, ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="businessName" class="w-1/3">Business Name</label>
                        <input type="text" name="business_name" id="businessName"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="businessWeb" class="w-1/3">Business Web</label>
                        <input type="text" name="business_web" id="businessWeb"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="county" class="w-1/3">Country</label>
                        <input type="text" name="country" id="country"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="contactName" class="w-1/3">Contact Name</label>
                        <input type="text" name="contact_name" id="contactName"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="phone" class="w-1/3">Phone</label>
                        <input type="tel" id="phone" name="phone"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="email" class="w-1/3">Email</label>
                        <input type="email" id="email" name="email"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="tradeAccount" class="w-1/3">Trade Account</label>
                        <select id="tradeAccount" name="trade_account"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="tradeAgreement" class="w-1/3">Upload Trade Agreement PDF</label>
                        <input type="file" id="tradeAgreement" name="trade_agreement_pdf" accept="application/pdf"
                            class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="supplierCRM" class="w-1/3">Supplier CRM</label>
                        <select id="supplierCRM" name="supplier_crm"
                            class="block w-full p-2 border border-gray-300 rounded-md" onchange="toggleCRMFields()">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
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
                <div class="flex justify-end mt-6 space-x-4">
                    <button type="button"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none"
                        onclick="toggleModal()">Close</button>
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">Save</button>
                </div>
            </div>
        </div>
    </form>



    <!-- JavaScript for Modal Toggle -->
    <script>
        function toggleModal() {
            var modalOverlay = document.getElementById('modal-overlay');
            var modal = document.getElementById('modal');

            modalOverlay.classList.toggle('hidden'); // Toggle visibility of the overlay
            modal.classList.toggle('hidden'); // Toggle visibility of the modal
            document.body.classList.toggle('overflow-hidden'); // Optional: Prevent scrolling background
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



        //drag & dropdown Image

        document.addEventListener("DOMContentLoaded", function() {
            const dropArea = document.getElementById('progressPhotosDropArea');
            const fileInput = document.getElementById('fileInput');
            const uploadedFilesContainer = document.getElementById('uploadedFiles');
            const uploadInstructions = document.getElementById('uploadInstructions');
            let imageCounter = 1; // Initialize counter for image names

            dropArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropArea.classList.add('border-blue-500'); // Add border highlight when dragging over
            });

            dropArea.addEventListener('dragleave', function() {
                dropArea.classList.remove('border-blue-500'); // Remove border highlight when leaving
            });

            dropArea.addEventListener('drop', function(e) {
                e.preventDefault();
                dropArea.classList.remove('border-blue-500'); // Remove border highlight when dropping
                const files = e.dataTransfer.files;
                handleFiles(files);
            });

            fileInput.addEventListener('change', function(e) {
                const files = e.target.files;
                handleFiles(files);
            });

            dropArea.addEventListener('click', function() {
                fileInput.click();
            });

            function handleFiles(files) {
                const file = files[0]; // Get only the first file
                if (file) {
                    displayFile(file);
                }
            }

            function displayFile(file) {
                const fileReader = new FileReader();
                fileReader.onload = function(e) {
                    const fileUrl = e.target.result;
                    const fileElement = document.createElement('div');
                    fileElement.classList.add('file-item', 'flex', 'items-center', 'justify-between', 'w-full',
                        'h-full');
                    const imageName = `img_${imageCounter++}`; // Generate custom name for the image

                    // Clear any existing content and hide upload instructions
                    uploadedFilesContainer.innerHTML = '';
                    uploadInstructions.style.display = 'none';

                    fileElement.innerHTML = `
                <div class="flex items-center w-full h-full">
                    <img src="${fileUrl}" alt="${file.name}" class="object-cover w-full h-full rounded" name="${imageName}">
                </div>
                <button class="text-red-500 hover:text-red-700 absolute top-1 right-2" onclick="removeFile()">Remove</button>
            `;
                    uploadedFilesContainer.appendChild(fileElement);
                };
                fileReader.readAsDataURL(file);
            }

            function removeFile() {
                uploadedFilesContainer.innerHTML = ''; // Clear the container
                uploadInstructions.style.display = ''; // Show upload instructions again
            }
        });
    </script>

</body>

</html>
