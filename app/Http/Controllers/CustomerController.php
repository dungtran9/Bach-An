<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(){
        $customers = $this->customerService->getAll();
        return view('customer.list',compact('customers'));
    }
    public function edit($id)
    {
        $customer = $this->customerService->find($id);
        return view('customer.edit', compact('customer'));
    }
    public function update(Request $request, $id)
    {
        $customer = $this->customerService->find($id);
        $this->customerService->update($customer, $request);
        toastr()->success('Chỉnh sửa thông tin khách hàng thành công');
        return redirect()->route('customer.index');
    }




}
