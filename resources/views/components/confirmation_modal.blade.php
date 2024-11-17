@if ($confirmDelete)
    <div x-data="{ open: @entangle('confirmDelete'), loading: false }" x-show="open" @keydown.escape.window="open = false"
        class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-60 z-50">
        <div class="bg-gray-800 p-8 py-5 rounded-lg shadow-lg max-w-sm w-full text-center">
            <div x-show="!loading" x-clock class="flex justify-center mb-4">
                <iframe src="https://lottie.host/embed/6796b72e-f3a7-42c8-8a49-9f57e07c09b3/4B1vu4RIXn.json"></iframe>
            </div>
            <div x-show="loading" class="flex justify-center mb-4">
                <iframe src="https://lottie.host/embed/a2414ce6-873d-4622-b4c6-8c3ccd0a8217/WMiVWZkvKK.json"></iframe>
            </div>

            <h2 x-show="!loading" class="text-lg text-white mb-4 text-center">Are you sure you want to delete this user?
            </h2>
            <h2 x-show="loading" class="text-lg text-white mb-4 text-center">Deleting...</h2>

            <div class="flex justify-between mt-5">
                <button x-show="!loading" @click="open = false"
                    class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500">Cancel</button>
                <button x-show="!loading"
                    @click="loading = true; $wire.deleteUser().then(() => { loading = false; open = false; });"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500">
                    Delete
                </button>

            </div>
        </div>
    </div>
@endif