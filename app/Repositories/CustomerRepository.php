<?php


namespace App\Repositories;

use App\Customer;

class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getAll()
    {
        return $this->customer->all();
    }

    public function findById($id)
    {
        return $this->customer->findOrFail($id);
    }

    public function save($customer)
    {
        $customer->save();
    }
}
