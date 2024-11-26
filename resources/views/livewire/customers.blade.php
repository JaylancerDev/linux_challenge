<div class="table-container">
    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Add Record Button -->
    <button class="bg-green" wire:click="openModal">Add Record</button>

    <!-- Customers Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>
                        <button class="bg-yellow" wire:click="openModal({{ $customer->id }})">
                            View/Edit
                        </button>
                        <button class="bg-red" wire:click="deleteCustomer({{ $customer->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if ($isModalOpen)
        <div class="modal-overlay">
            <div class="modal-content">
                <h2>{{ $customerId ? 'Edit Customer' : 'Add Customer' }}</h2>

                <!-- Name -->
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" wire:model="name" placeholder="Enter name">
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" wire:model="email" placeholder="Enter email">
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <!-- Phone Number -->
                <div class="input-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" wire:model="phone_number" placeholder="Enter phone number">
                    @error('phone_number') <div class="error">{{ $message }}</div> @enderror
                </div>

                <!-- Buttons -->
                <div class="modal-actions">
                    <button class="btn" wire:click="closeModal">Cancel</button>
                    @if ($customerId)
                        <button class="btn" wire:click="saveCustomer" :disabled="$isEditDisabled">Save Changes</button>
                    @else
                        <button class="btn" wire:click="saveCustomer">Add Customer</button>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
