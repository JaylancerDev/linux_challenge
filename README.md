# Customer Management System - Livewire

## Overview
A customer management application built with Laravel, Livewire, and Bootstrap. It allows admins to manage customers by adding, editing, deleting, and viewing their details.

## Technologies Used
- **Laravel**: Backend framework.
- **Livewire**: Reactive components for UI.
- **Bootstrap**: Frontend styling.
- **AlpineJS**: Client-side interactivity (e.g., dropdowns).

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/jaylancerdev/linux_challenge.git
cd linux_challenge
```

### 2. Install Dependencies
```bash
composer install
npm install
```
### 3. Set Up Environment
```bash
php artisan key:generate
php artisan migrate
```

### 4. Run the Application
```bash
php artisan serve
```
## Usage

### Authentication
- **Login**: Users can log in using the default authentication system provided by Laravel Breeze.

### Customer Management
- **View Customers**: Customers are displayed in a table with their ID, name, email, and phone number.
- **Add/Edit Customer**: 
  - A modal is used to add new customers or edit existing ones.
  - Fields include Name, Email, and Phone Number.
- **Delete Customer**: 
  - Customers can be deleted by clicking the delete button, followed by confirmation.
  - Deletion is done via Livewire, and the table updates without a page refresh.

### Responsive Navigation
- The navigation menu is responsive and includes:
  - A **logo** linking to the customer list.
  - A **Dashboard** link for navigation.
  - A **Profile Dropdown** with options for viewing the profile and logging out.

### Livewire Components

#### CustomerComponent.php
Handles all customer-related actions:
- `openModal()`: Opens the modal for adding or editing customers.
- `saveCustomer()`: Saves the newly added or updated customer.
- `deleteCustomer()`: Deletes the customer from the database.

#### Blade Template for Customers

Displays the customers in a table format and enables CRUD actions.

```blade
<table class="table">
    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone_number }}</td>
            <td>
                <button wire:click="openModal({{ $customer->id }})">Edit</button>
                <button wire:click="deleteCustomer({{ $customer->id }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
