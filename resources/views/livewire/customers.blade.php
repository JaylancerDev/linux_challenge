<div class="container mt-5">
    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Title and Add Record Button -->
    <div class="d-flex justify-between mb-4">
        <h2>Customer Dashboard</h2>
        <button class="btn btn-primary" wire:click="openModal">
            Add Record
        </button>
    </div>

    <!-- Customers Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
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
                        <button class="btn btn-warning" wire:click="openModal({{ $customer->id }})">
                            View/Edit
                        </button>
                        <!-- <button class="btn btn-danger" wire:click="deleteCustomer({{ $customer->id }})">
                            Delete
                        </button> -->
                        <button class="btn btn-danger" onclick="confirmDelete({{ $customer->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if ($isModalOpen)
        <div class="modal fade show" tabindex="-1" style="display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $customerId ? 'Edit Customer' : 'Add Customer' }}</h5>
                        <button type="button" class="close" wire:click="closeModal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" id="phone_number" wire:model="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                            @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                        @if ($customerId)
                            <button type="button" class="btn btn-primary" wire:click="saveCustomer" :disabled="$isEditDisabled">Save Changes</button>
                        @else
                            <button type="button" class="btn btn-success" wire:click="saveCustomer">Add Customer</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function confirmDelete(customerId) {
        if (confirm('Are you sure you want to delete this customer?')) {
            @this.call('deleteCustomer', customerId);
        }
    }
</script>