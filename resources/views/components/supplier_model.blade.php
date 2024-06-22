    <!-- Modal -->
    <form id="supplierForm" action="{{ $action }}" method="POST" enctype="multipart/form-data">

        @csrf
        @if(isset($supplier))
            @method('PUT')
        @endif

            <div class="w-full max-w-2xl p-6 mx-auto bg-white rounded-lg">
                <h2 id="modalTitle" class="mb-4 text-lg font-bold">{{ isset($supplier) ? 'Update Supplier' : 'Add Supplier' }}</h2>
                <div class="space-y-4">
                    <div class="w-full gap-4 p-2">
                        <div class="flex flex-wrap w-full form-group md:flex-nowrap">
                            <label for="progress-photos" class="block w-full pr-4 mb-1 text-gray-700 md:mb-0">
                                Logo
                            </label>
                            <div class="border border-red-500 progress-photos flex flex-col cursor-pointer items-center justify-center  bg-[#F8F9FA] rounded h-20 w-full px-4 py-6 relative" id="progressPhotosDropArea" onclick="enableFileInput(this)">
                                <div id="uploadedFiles" class="w-full h-full ">
                                    @if (isset($supplier) && $supplier->upload_image)

                                    <div class="flex items-center w-full h-full">
                                        <img src="/storage/profile_images/{{$supplier->upload_image}}" alt="Logo" class="object-cover w-full h-full rounded">

                                    </div>
                                    <button class="absolute text-red-500 hover:text-red-700 top-1 right-2" onclick="removeFile('logo')">Remove</button>
                                    <!-- Uploaded files will be shown here -->
                                    @endif
                                </div>

                                <div id="uploadInstructions" class="flex flex-col items-center {{ isset($supplier->upload_image) ? 'hidden' : '' }}">
                                    <i class="mb-2 text-3xl text-gray-600 fas fa-cloud-upload-alt"></i>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <input type="file" name="profile_image" id="fileInput" style="display:none;"
                                    accept="image/jpeg, image/png">
                                </div>


                                <span class="error">{{$errors->first('profile_image')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="businessName" class="w-1/3">Business Name</label>
                            <input type="text" name="business_name" id="businessName" value="{{$supplier->business_name ?? ''}}"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="businessWeb" class="w-1/3">Business Web</label>
                            <input type="text" name="business_web" id="businessWeb" value="{{$supplier->business_web ?? ''}}"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="country" class="w-1/3">Country</label>
                            <input type="text" name="country" id="country" value="{{$supplier->country ?? ''}}"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="contactName" class="w-1/3">Contact Name</label>
                            <input type="text" name="contact_name" id="contactName" value="{{$supplier->contact_name ?? ''}}"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="phone" class="w-1/3">Phone</label>
                            <input type="tel" id="phone" name="phone" value="{{$supplier->phone ?? ''}}"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="email" class="w-1/3">Email</label>
                            <input type="email" id="email" name="email" value="{{$supplier->email ?? ''}}"
                                class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="tradeAccount" class="w-1/3">Trade Account</label>
                            <select id="tradeAccount" name="trade_account" class="block w-full p-2 border border-gray-300 rounded-md">
                                <option value="yes" {{ isset($supplier) && $supplier->trade_account === 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ isset($supplier) && $supplier->trade_account === 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="flex items-center w-1/2">
                            <label for="tradeAgreement" class="w-1/3">Upload Trade Agreement PDF</label>
                            <div id="tradeAgreementContainer"   class="block w-full p-2 border border-gray-300 rounded-md">

                                @if (isset($supplier->trade_agreement_pdf))
                                    <div class="flex items-center justify-between">
                                        <a href="/storage/{{$supplier->trade_agreement_pdf}}" target="_blank" class="text-blue-500 hover:text-blue-700"download>Download Agreement</a>
                                        <button class="ml-4 text-red-500 hover:text-red-700" onclick="removeFile('tradeAgreement')">Remove</button>
                                    </div>
                                    <input type="file" id="tradeAgreement" name="trade_agreement_pdf" accept="application/pdf" class="hidden">
                                @else
                                <input type="file" id="tradeAgreement" name="trade_agreement_pdf"
                                accept="application/pdf"
                                class="block w-full p-2 border border-gray-300 rounded-md ">

                                    @endif

                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex items-center w-1/2">
                            <label for="supplierCRM" class="w-1/3">Supplier CRM</label>
                            <select id="supplierCRM" name="supplier_crm" class="block w-full p-2 border border-gray-300 rounded-md" onchange="toggleCRMFields()">
                                <option value="no" {{ isset($supplier) && $supplier->supplier_crm === 'no' ? 'selected' : '' }}>No</option>
                                <option value="yes" {{ isset($supplier) && $supplier->supplier_crm === 'yes' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div id="crmFields" class="{{ isset($supplier) && $supplier->supplier_crm === 'yes' ? '' : 'hidden' }} space-y-4">
                        <div class="flex space-x-4">
                            <div class="flex items-center w-1/2">
                                <label for="crmUrl" class="w-1/3">URL</label>
                                <input type="url" id="crmUrl" name="crm_url" value="{{ $supplier->crm_url ?? '' }}" class="block w-full p-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="flex items-center w-1/2">
                                <label for="crmUsername" class="w-1/3">Username</label>
                                <input type="text" id="crmUsername" name="crm_username" value="{{ $supplier->crm_username ?? '' }}" class="block w-full p-2 border border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="flex items-center w-1/2 space-x-4">
                            <label for="crmPassword" class="w-1/3">Password</label>
                            <input type="password" id="crmPassword" name="crm_password" value="{{ $supplier->crm_password ?? '' }}" class="block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button"
                        class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none"
                        onclick="toggleModal()">Close</button>
                        <button type="submit"
                        id="submitButton"
                        class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none">
                    {{ isset($supplier) ? 'Update' : 'Save' }}
                </button>

                    </div>
            </div>
    </form>
