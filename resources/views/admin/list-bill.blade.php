@extends('admin.layouts.master')

@section('content')

    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('bills.index') }}">List</a></li>
    </ol>

    <div class="card-header"><i class="fas fa-table mr-1"></i></div>
    <div class="card-body">
        <div class="table-responsive">
            <h2 style="text-align: center; padding-bottom: 18px; color: blue"><strong>Danh sách hóa đơn</strong></h2>

            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr class="table-info">
                    <th>STT</th>
                    <th>Mã Bill</th>
                    <th class="data-name">Khách hàng</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>

                </tr>
                </thead>
                <tbody id="list-user">
                @foreach($bills as $key => $bill)
                    <tr class="data-user">
                        <td>{{ ++$key }}</td>
                        <td><a href="{{ route('bill.detail', $bill->id) }}">MD-{{ $bill->id }}</a></td>
                        <td>{{ $bill->customer->name }}</td>
                        <td class="@if($bill['status'] == "Hoàn thành")
                            text-success
                        @elseif ($bill['status'] == "Đang xử lý")
                            text-warning
                        @elseif($bill['status'] == "Đang giao")
                            text-primary
                        @else
                            text-danger
                        @endif">{{ $bill['status']}}</td>
                        <td>{{ $bill['created_at'] }}</td>

                        </tr>
                    @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
