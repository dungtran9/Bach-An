@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard </a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('customer.index')}}">List </a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="col-md-12 pt-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-12">
                        <h2 style="text-align: center; color: blue"><strong>Chỉnh sửa thông tin khách hàng </strong>
                        </h2>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{route('customer.update',$customer->id)}}">
                            @csrf
                            <div class="form-group">
                                <label>Tên khách hàng</label>

                                <input style="width: 50%" type="text" class="form-control" name="name"
                                       value="{{ $customer->name }}" required>
                            </div>
                            <div class="form-group">

                                <label>Email</label>

                                <input style="width: 50%" type="text" class="form-control" name="email"
                                       value="{{ $customer->email }}" required>
                            </div>
                            <div class="form-group">

                                <label>Địa chỉ</label>
                                <textarea style="width: 50%" class="form-control" name="address" required>{{ $customer->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>

                                <input style="width: 50%" type="text" class="form-control" name="phone"
                                       value="{{ $customer->phone }}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                                <a href="{{ route('customer.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

