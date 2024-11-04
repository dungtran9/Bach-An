<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\Product;
use App\Services\BillService;

class BillController extends Controller
{
    protected $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
        
    }

    public function index()
    {
        $bills = $this->billService->getAll();
        return view('admin.list-bill', compact('bills'));
    }

    public function billDetail($billId)
    {
        $bill = $this->billService->findById($billId);
//        $productOdBill = $bill->products;
        $detail = Detail::where('bill_id', $billId)->get();
        return view('admin.bill-detail', compact('bill', 'detail'));
    }

    public function updateStatusBill(Request $request, $id)
    {
        $bill = $this->billService->findById($id);
        $this->billService->update($bill, $request);
        return redirect()->route('bills.index');
    }

}
