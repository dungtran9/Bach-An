<?php


namespace App\Services;

use App\Bill;
use App\Repositories\BillRepository;

class BillService
{
    protected $billRepo;

    public function __construct(BillRepository $billRepository)
    {
        $this->billRepo = $billRepository;
    }

    public function getAll()
    {
            return $this->billRepo->getAllBill();
    }

    public function findById($id)
    {
        return $this->billRepo->find($id);
    }

    public function update($bill, $request)
    {
        $bill->status = $request->status;
        $this->billRepo->save($bill);
    }
}
