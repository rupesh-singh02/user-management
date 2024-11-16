<!-- Confirmation Modal -->
<div x-data="{ open: @entangle('confirmDelete') }" x-show="open" @keydown.escape.window="open = false" class="fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50 z-50">
    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-1/3">
        <h3 class="text-xl text-white mb-4">Are you sure you want to delete this user?</h3>
        <div class="flex justify-between">
            <button @click="open = false" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500">Cancel</button>
            <button @click="open = false; $wire.deleteUser()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500">Delete</button>
        </div>
    </div>
</div>
