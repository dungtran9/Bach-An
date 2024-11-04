@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List</li>
    </ol>

    <div class="card-header"><i class="fas fa-table mr-1"></i></div>
    <div class="card-body">
        <div class="table-responsive">
            <h2 style="text-align: center; color: blue; padding-bottom: 15px"><strong>Danh sách khách hàng</strong></h2>
            <table class="table table-bordered">
                <thead>
                <tr class="table-info">
                    <th scope="col">STT</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $key => $customer)
                    <tr class="data-user">
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone}}</td>
                        <td><a href="{{route('customer.edit',$customer->id)}}">Sửa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
