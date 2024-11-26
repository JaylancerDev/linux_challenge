<div class="container mx-auto p-6">

    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md shadow-md">
            {{ session('message') }}
        </div>
    @endif

    <!-- Add Record Button -->
    <button class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500" wire:click="openModal">
        Add Customer
    </button>

    <!-- Customers Table -->
    <table class="w-full mt-6 border-collapse border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-800">
                <th class="px-6 py-4 text-left font-semibold">ID</th>
                <th class="px-6 py-4 text-left font-semibold">Name</th>
                <th class="px-6 py-4 text-left font-semibold">Email</th>
                <th class="px-6 py-4 text-left font-semibold">Phone Number</th>
                <th class="px-6 py-4 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $customer->id }}</td>
                    <td class="px-6 py-4">{{ $customer->name }}</td>
                    <td class="px-6 py-4">{{ $customer->email }}</td>
                    <td class="px-6 py-4">{{ $customer->phone_number }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-400 focus:outline-none" wire:click="openModal({{ $customer->id }})">
                            View/Edit
                        </button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-400 focus:outline-none" wire:click="deleteCustomer({{ $customer->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if ($isModalOpen)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl w-1/3 p-8 space-y-6">
                <h2 class="text-2xl font-bold text-gray-800">{{ $customerId ? 'Edit Customer' : 'Add Customer' }}</h2>

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1" for="name">Name</label>
                    <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1" for="email">Email</label>
                    <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1" for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" wire:model="phone_number" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone_number') border-red-500 @enderror">
                    @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <button class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-300 focus:outline-none" wire:click="closeModal">Cancel</button>
                    <button 
                        class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-400 focus:outline-none disabled:opacity-50" 
                        wire:click="saveCustomer" 
                        :disabled="$isEditDisabled">
                        {{ $customerId ? 'Save Changes' : 'Add Customer' }}
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
