<div id="modal-overlay" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden" onclick="toggleModal()"></div>

<div id="modal" class="fixed z-50 bg-white rounded-lg p-6 hidden">
    <h2 class="text-lg font-bold mb-4">Modal Title</h2>
    <p class="text-gray-700">Modal content goes here.</p>
    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none" onclick="toggleModal()">Close</button>
</div>

            <!-- JavaScript for Modal Toggle -->

<script>
    function toggleModal() {
        var modalOverlay = document.getElementById('modal-overlay');
        var modal = document.getElementById('modal');

        modalOverlay.classList.toggle('hidden'); // Toggle visibility of the overlay
        modal.classList.toggle('hidden'); // Toggle visibility of the modal
        document.body.classList.toggle('overflow-hidden'); // Optional: Prevent scrolling background
    }
</script>
