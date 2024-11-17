<div class="xl:px-28">

        <!-- Main Container -->
        <div class="flex flex-wrap p-3 mt-14 rounded-lg items-stretch">
    
            <!-- Left Column: User Form -->
            <div class="w-full xl:w-2/5 pl-5 pr-3">
                <div class="bg-gray-800 rounded-lg shadow-md">
                    <div class="flex items-center border-b border-gray-600 p-3 pl-10">
                        <h4 class="text-lg font-bold text-white flex-grow">Add User</h4>
                    </div>
                    <div class="px-10 py-7">
                        <form id="userForm" wire:submit.prevent="store" class="space-y-4">
                            <!-- Full Name -->
                            <div>
                                <label for="userName" class="block text-gray-400 mb-1 text-sm">Full Name</label>
                                <input type="text" id="userName" name="name" wire:model="name"
                                    placeholder="Enter employee name"
                                    class="w-full py-1 px-3 rounded border border-gray-900 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                            </div>
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-gray-400 mb-1 text-sm">Email</label>
                                <input type="email" id="email" name="email" wire:model="email"
                                    placeholder="Enter employee email"
                                    class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                            </div>
                            <!-- Contact No -->
                            <div>
                                <label for="phoneNo" class="block text-gray-400 mb-1 text-sm">Contact No.</label>
                                <input type="text" id="phoneNo" name="phone" wire:model="contact_no"
                                    placeholder="Enter contact number"
                                    class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                            </div>
                            <!-- Password -->
                            <div x-data="{ showPassword: false }">
                                <label for="password" class="block text-gray-400 mb-1 text-sm">Password</label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                        wire:model="password" placeholder="Enter employee password"
                                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm pr-10"
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
                            <!-- Role -->
                            <div>
                                <label for="role_id" class="block text-gray-400 mb-1 text-sm">Role</label>
                                <select id="role_id" name="role_id" wire:model="role_id"
                                    class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                                    <option value="" disabled selected>Asssign a role</option>
                                    @foreach ($roles as $role)
                                        <option value={{ $role->id }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-gray-400 mb-1 text-sm">Status</label>
                                <select id="status" name="status" wire:model="status"
                                    class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                                    <option value="" disabled selected>Choose...</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-right pt-3">
                                <button
                                    class="px-6 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
            <!-- Center Column: Last Added User -->
            <div class="w-full xl:w-2/5">
                <div class="h-full bg-gray-800 rounded-lg shadow-md flex flex-col justify-between">
                    <div class="flex items-center border-b border-gray-600 p-3 pl-6">
                        <h4 class="text-lg font-bold text-white">Last Added User</h4>
                    </div>
                    <div class="flex flex-col items-center justify-between px-10 py-8 mt-0 h-full">
                        <!-- User Image -->
                        <div class="w-24 mb-5 rounded-full overflow-hidden">
                            <img src="{{ $last_user->image_url ?? asset('assets/user.png') }}" alt="User"
                                class="w-full h-full object-cover">
                        </div>
                        <!-- User Details -->
                        <div class="w-full space-y-3">
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-id-card text-blue-300 text-2xl"></i>
                                <p id="last-id" class="ml-3 text-sm">{{ $last_user->id ?? "ID" }}</p>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-user text-blue-300 text-2xl"></i>
                                <p id="last-username" class="ml-3 text-sm">{{ $last_user->name ?? "Full Name" }}</p>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-envelope text-blue-300 text-2xl"></i>
                                <p id="last-email" class="ml-3 text-sm">{{ $last_user->email ?? "Email" }}</p>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-phone text-blue-300 text-2xl"></i>
                                <p id="last-phone" class="ml-3 text-sm">{{ $last_user->contact_no ?? "Contact No." }}</p>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-calendar-days text-blue-300 text-2xl"></i>
                                <p id="last-date" class="ml-3 text-sm">{{ $last_user->created_at ?? "User Created Date" }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-hat-cowboy text-blue-300 text-2xl"></i>
                                <span id="last-status" class="ml-3 text-sm">
                                    {{ $last_user && $last_user->role_id ? $last_user->role->name : "Role Assigned" }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <i class="fa-solid fa-briefcase text-blue-300 text-2xl"></i>
                                <span id="last-status"
                                    class="ml-3 inline-block px-4 py-1 rounded-full text-xs font-bold {{ $last_user && $last_user->status === '1' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ $last_user ? ($last_user->status === '1' ? 'ACTIVE' : 'INACTIVE') : 'Status' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 pl-6 border-t border-gray-600 text-white">
                    </div>
                </div>
            </div>
    
            <!-- Right Column: Current user log -->
            <div class="w-full xl:w-1/5 pr-5 pl-3">
                <div class="h-full bg-gray-800 rounded-lg shadow-md flex flex-col justify-between">
                    <div class="flex items-center border-b border-gray-600 p-3 pl-6">
                        <h4 class="text-lg font-bold text-white flex-grow">Logs</h4>
                    </div>
                    <div class="flex flex-col items-center justify-between px-6 pt-7 h-full">
                        <!-- Log Image -->
                        <div class="w-24 h-24 rounded-full overflow-hidden mb-4">
                            <img src="{{ asset('assets/log.png') }}" alt="User" class="w-full h-full object-cover">
                        </div>
                        <!-- Log Details -->
                        <div class="w-full space-y-3 mt-5 flex-grow">
                            <ul class="list-none text-white text-sm">
                                @foreach ($logs as $log)
                                    <li class="mb-3 flex">
                                        <!-- Custom Bullet -->
                                        <span class="w-2.5 h-2.5 bg-white rounded-full mr-3 mt-1"></span>
                                        <div>
                                            <!-- Action -->
                                            <p class="font-bold">{{ $log->action }}</p>
                                            <!-- Detail -->
                                            <p class="text-gray-400">{{ $log->description }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
    
    
    
                    </div>
                    <div class="p-3 pl-4 border-t border-gray-600 text-white">
                        <p class="text-red-400 text-xs">*Note : Only last 6 logs will be shown here</p>
                    </div>
                </div>
            </div>
    
        </div>
    
        <div class="w-full px-7 mb-14">
            <div class="bg-gray-800 rounded-lg shadow-md">
                <div class="flex items-center border-b border-gray-600 p-3 pl-10">
                    <h4 class="text-lg font-bold text-white flex-grow">All Users</h4>
                </div>
                <div class="px-10 py-7">
                    @if($users->isEmpty())
                        <div class="text-center text-gray-400 py-4">
                            No users found.
                        </div>
                    @else
                        <table class="min-w-full table-auto text-gray-300 rounded-lg">
                            <thead>
                                <tr class="border-b border-gray-600 ">
                                    <th class="px-4 py-4 text-center">ID</th>
                                    <th class="px-4 py-4 text-center">Name</th>
                                    <th class="px-4 py-4 text-center">Email</th>
                                    <th class="px-4 py-4 text-center">Phone</th>
                                    <th class="px-4 py-4 text-center">Role</th>
                                    <th class="px-4 py-4 text-center">Status</th>
                                    <th class="px-4 py-4 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-600 border-b border-gray-600">
                                        <td class="px-4 py-2 text-center text-sm">#test_{{ $user->id }}</td>
                                        <td class="px-4 py-2 text-center text-sm">{{ $user->name }}</td>
                                        <td class="px-4 py-2 text-center text-sm">{{ $user->email }}</td>
                                        <td class="px-4 py-2 text-center text-sm">{{ $user->contact_no }}</td>
                                        <td class="px-4 py-2 text-center text-sm">{{ $user->role->name }}</td>
                                        <td class="px-4 py-2 text-center text-sm">
                                            <span
                                                class="inline-block px-4 py-1 rounded-full text-sm {{ $user->status === '1' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                                {{ $user->status === '1' ? 'ACTIVE' : 'INACTIVE' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <button wire:click="viewUser({{ $user->id }})" class="py-0 px-1 rounded-lg">
                                                <i class="fa-solid fa-pen-to-square text-blue-600"></i>
                                            </button>
                                            <button wire:click="askDeleteConfirmation({{ $user->id }})"
                                                class="py-0 px-1 rounded-lg">
                                                <i class="fa-solid fa-trash text-red-600"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        @include('components.message_modal')
        @include('components.confirmation_modal')
        @include('components.edit_user_modal')


</div>