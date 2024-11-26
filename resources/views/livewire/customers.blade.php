<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Flash Messages -->
                @if (session()->has('message'))
                    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Add Record Button -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="openModal">
                    Add Record
                </button>

                <!-- Customers Table -->
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $customer->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $customer->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $customer->email }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $customer->phone_number }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded" wire:click="openModal({{ $customer->id }})">
                                        View/Edit
                                    </button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded" wire:click="deleteCustomer({{ $customer->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                @if ($isModalOpen)
                    <div wire:ignore class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white rounded shadow-lg p-6 w-1/3">
                            <h2 class="text-xl font-bold mb-4">{{ $customerId ? 'Edit Customer' : 'Add Customer' }}</h2>

                            <!-- Name -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1" for="name">Name</label>
                                <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded @error('name') border-red-500 @enderror">
                                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1" for="email">Email</label>
                                <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded @error('email') border-red-500 @enderror">
                                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1" for="phone_number">Phone Number</label>
                                <input type="text" id="phone_number" wire:model="phone_number" class="w-full px-4 py-2 border rounded @error('phone_number') border-red-500 @enderror">
                                @error('phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Modal Buttons -->
                            <div class="flex justify-end">
                                <button class="bg-gray-500 text-white px-4 py-2 rounded mr-2" wire:click="closeModal">Cancel</button>

                                <!-- Save/Edit or Add Button -->
                                @if ($customerId)
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="saveCustomer" :disabled="$isEditDisabled">
                                        Save Changes
                                    </button>
                                @else
                                    <button class="bg-green-500 text-white px-4 py-2 rounded" wire:click="saveCustomer">
                                        Add Customer
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
