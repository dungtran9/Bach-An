<?php


namespace App\Services;


use App\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepo;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    public function getAll()
    {
       return $this->customerRepo->getAll();
    }

    public function find($id)
    {
        return $this->customerRepo->findById($id);
    }

    public function update($customer, $request)
    {
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $this->customerRepo->save($customer);
    }
}
