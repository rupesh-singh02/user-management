@if ($showEditModal)
    <div x-data="{ showModal: @entangle('showEditModal') }" x-show="showModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-gray-800 rounded-lg shadow-md w-96 py-3">
            <div class="flex justify-between items-center border-b border-gray-600 pb-3 px-4">
                <h4 class="text-lg font-bold text-white">Edit User</h4>
                <button @click="showModal = false" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            <div class="mt-4 space-y-4 px-4">
                <!-- Full Name -->
                <div>
                    <label for="editName" class="block text-gray-400 mb-1 text-sm">Full Name</label>
                    <input type="text" id="editName" wire:model="editName"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                        required>
                </div>
                <!-- Email -->
                <div>
                    <label for="editEmail" class="block text-gray-400 mb-1 text-sm">Email</label>
                    <input type="email" id="editEmail" wire:model="editEmail"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                        required>
                </div>
                <!-- Contact No -->
                <div>
                    <label for="editContact" class="block text-gray-400 mb-1 text-sm">Contact No.</label>
                    <input type="text" id="editContact" wire:model="editContact"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                        required>
                </div>
                <!-- Role -->
                <div>
                    <label for="editRole" class="block text-gray-400 mb-1 text-sm">Role</label>
                    <select id="editRole" wire:model="editRole"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        <option value="" disabled>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Status -->
                <div>
                    <label for="editStatus" class="block text-gray-400 mb-1 text-sm">Status</label>
                    <select id="editStatus" wire:model="editStatus"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mt-5 flex justify-end space-x-3 px-3 mb-2">
                <button @click="showModal = false"
                    class="px-4 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">Cancel</button>
                <button wire:click="updateUser"
                    class="px-4 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-sm">Save</button>
            </div>
        </div>
    </div>
@endif