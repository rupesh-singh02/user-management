<div>

    @include('components.message_modal')

    <!-- Top Container -->
    <div class="flex flex-wrap p-2 mt-5 rounded-lg items-stretch">

        <!-- Adding User -->
        <div class="w-full xl:w-1/2 pl-5 pr-2">
            <div class="bg-gray-800 rounded-lg shadow-md">
                <div class="flex items-center border-b border-gray-600 p-3 pl-7">
                    <h4 class="text-lg font-bold text-white flex-grow">ADD USER</h4>
                </div>
                <div class="px-10 py-7">
                    <form id="userForm" wire:submit.prevent="store" class="space-y-4">
                        <!-- Full Name -->
                        <div>
                            <label for="userName" class="block text-gray-400 mb-1">Full Name</label>
                            <input type="text" id="userName" name="name" wire:model="name"
                                placeholder="Enter employee name"
                                class="w-full p-2 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-gray-400 mb-1">Email</label>
                            <input type="email" id="email" name="email" wire:model="email"
                                placeholder="Enter employee email"
                                class="w-full p-2 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <!-- Password -->
                        <div x-data="{ showPassword: false }">
                            <label for="password" class="block text-gray-400 mb-1">Password</label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                    wire:model="password" placeholder="Enter employee password"
                                    class="w-full p-2 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                    required>

                                <!-- Eye icon (visible when password is hidden) -->
                                <button type="button" @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 focus:outline-none">
                                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22 12.0002C20.2531 15.5764 15.8775 19 11.9998 19C8.12201 19 3.74646 15.5764 2 11.9998"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22 12.0002C20.2531 8.42398 15.8782 5 12.0005 5C8.1227 5 3.74646 8.42314 2 11.9998"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>

                                    <!-- Eye slash icon (visible when password is shown) -->
                                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M4 4L9.87868 9.87868M20 20L14.1213 14.1213M9.87868 9.87868C9.33579 10.4216 9 11.1716 9 12C9 13.6569 10.3431 15 12 15C12.8284 15 13.5784 14.6642 14.1213 14.1213M9.87868 9.87868L14.1213 14.1213M6.76821 6.76821C4.72843 8.09899 2.96378 10.026 2 11.9998C3.74646 15.5764 8.12201 19 11.9998 19C13.7376 19 15.5753 18.3124 17.2317 17.2317M9.76138 5.34717C10.5114 5.12316 11.2649 5 12.0005 5C15.8782 5 20.2531 8.42398 22 12.0002C21.448 13.1302 20.6336 14.2449 19.6554 15.2412"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- Contact No -->
                        <div>
                            <label for="phoneNo" class="block text-gray-400 mb-1">Contact No.</label>
                            <input type="text" id="phoneNo" name="phone" wire:model="contact_no"
                                placeholder="Enter contact number"
                                class="w-full p-2 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-gray-400 mb-1">Status</label>
                            <select id="status" name="status" wire:model="status"
                                class="w-full p-2 rounded border border-gray-600 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                        </div>
                        <!-- Submit Button -->
                        <div class="text-right pt-3">
                            <button
                                class="px-8 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>