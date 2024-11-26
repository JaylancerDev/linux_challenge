<?php
namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Customers extends Component
{
    public $customers, $name, $email, $phone_number, $customerId;
    public $isModalOpen = false;
    public $isEditDisabled = true;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:customers,email',
        'phone_number' => 'required|regex:/^07\d{9}$/|unique:customers,phone_number',
    ];

    public function render()
    {
        // $this->customers = Customer::all();
        // return view('livewire.customers');
        // Paginate the customers (10 per page)
        // $customers = Customer::paginate(10);

        // return view('livewire.customers', ['customers' => $customers]);

        $customers = Customer::paginate(10);
        return view('livewire.customers', ['customers' => $customers]);
    }

    public function openModal($id = null)
    {
        $this->resetFields();

        if ($id) {
            // Editing an existing customer
            $customer = Customer::findOrFail($id);
            $this->customerId = $customer->id;
            $this->name = $customer->name;
            $this->email = $customer->email;
            $this->phone_number = $customer->phone_number;
            $this->isEditDisabled = true; // Disable "Edit" button until changes are made
        }

        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetFields();
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->customerId = null;
        $this->isEditDisabled = true;
    }

    public function updated($propertyName)
    {
        // Enable the "Edit" button when any field changes
        $this->isEditDisabled = false;
        $this->validateOnly($propertyName);
    }

    public function saveCustomer()
    {
        // Dynamic validation rules for uniqueness during editing
        $rules = [
            'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($this->customerId),
            ],
            'phone_number' => [
                'required',
                'regex:/^07\d{9}$/',
                Rule::unique('customers', 'phone_number')->ignore($this->customerId),
            ],
        ];

        $this->validate($rules);

        // Save or update the customer
        Customer::updateOrCreate(
            ['id' => $this->customerId],
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
            ]
        );

        session()->flash('message', $this->customerId ? 'Customer updated successfully.' : 'Customer added successfully.');
        $this->closeModal();
    }

    public function deleteCustomer($id)
    {
        Customer::findOrFail($id)->delete();
        session()->flash('message', 'Customer deleted successfully.');
    }
}
