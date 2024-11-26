




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <div class="container mt-5">
                        <!-- Flash Messages -->
                        @if (session()->has('message'))
                            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- Add Record Button -->
                        <button class="bg-blue-500 text-white p-2 rounded-md mb-4 hover:bg-blue-600 focus:outline-none" wire:click="openModal">
                            Add Record
                        </button>

                        <!-- Customers Table -->
                        <table class="min-w-full table-auto bg-white border border-gray-200 shadow-md rounded-lg">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left">ID</th>
                                    <th class="px-4 py-2 text-left">Name</th>
                                    <th class="px-4 py-2 text-left">Email</th>
                                    <th class="px-4 py-2 text-left">Phone Number</th>
                                    <th class="px-4 py-2 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ $customer->id }}</td>
                                        <td class="px-4 py-2">{{ $customer->name }}</td>
                                        <td class="px-4 py-2">{{ $customer->email }}</td>
                                        <td class="px-4 py-2">{{ $customer->phone_number }}</td>
                                        <td class="px-4 py-2">
                                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none" wire:click="openModal({{ $customer->id }})">
                                                View/Edit
                                            </button>
                                            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none" onclick="confirmDelete({{ $customer->id }})">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <!-- Modal -->
                        @if ($isModalOpen)
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                                    <div class="flex justify-between items-center border-b pb-4">
                                        <h5 class="text-xl font-semibold">{{ $customerId ? 'Edit Customer' : 'Add Customer' }}</h5>
                                        <button type="button" class="text-gray-500 hover:text-gray-700" wire:click="closeModal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="mt-4">
                                        <!-- Name -->
                                        <div class="mb-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md @error('name') border-red-500 @enderror">
                                            @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" id="email" wire:model="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md @error('email') border-red-500 @enderror">
                                            @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="mb-4">
                                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                            <input type="text" id="phone_number" wire:model="phone_number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md @error('phone_number') border-red-500 @enderror">
                                            @error('phone_number') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="mt-6 flex justify-end">
                                        <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-400" wire:click="closeModal">Cancel</button>
                                        @if ($customerId)
                                            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none" wire:click="saveCustomer" :disabled="$isEditDisabled">Save Changes</button>
                                        @else
                                            <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none" wire:click="saveCustomer">Add Customer</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>



                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this customer?')) {
                @this.call('deleteCustomer', customerId);
            }
        }
    </script>
</x-app-layout>
