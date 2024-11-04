@extends('admin.layouts.master')

@section('content')

    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('bills.index') }}">List</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="card-body">
        <div class="table-responsive">


            <h2 style="color: blue; padding-bottom: 18px"><strong>Thông tin khách hàng</strong></h2>


            <form action="{{ route('bill.update', $bill->id) }}" method="post">
                @csrf
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr class="data-user">
                        <th>Họ và tên</th>
                        <td>{{ $bill->customer->name}}</td>
                    </tr>
                    <tr class="data-user">
                        <th>Địa chỉ</th>
                        <td>{{ $bill->customer->address }}</td>
                    </tr>
                    <tr class="data-user">
                        <th>Số điện thoại</th>
                        <td>{{ $bill->customer->phone }}</td>
                    </tr>
                    <tr class="data-user">
                        <th>Email</th>
                        <td>{{ $bill->customer->email }}</td>
                    </tr>
                </table>


                <h2 style="color: blue; padding-bottom: 20px"><strong>Chi tiết đơn hàng</strong></h2>


                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                <tr class="table-info">
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
                    </thead>
                    @foreach($bill->products as $key => $value)

                    <tr class="data-user">
                        <td>{{ $value['name'] }}</td>
                        <td><img style="width: 100px" src="{{asset('storage/' . $value['image']) }}" alt=""></td>
                        <td>x {{ $detail[$key]['qtyOrder'] }}</td>
                        <td>{{number_format(floatval($value['price'])) }}</td>
                    </tr>
                    @endforeach
                    <tr class="data-user">
                        <td colspan="3"><strong>Tổng tiền</strong></td>
                        <td>{{number_format(floatval($bill->totalPrice)) }} VNĐ</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Trạng thái đơn hàng</strong></td>
                        <td>
                            <select name="status" id="">
                                <option value="Đang xử lý" @if($bill->status == "Đang xử lý")
                                selected
                                    @endif>
                                    Đang xử lý
                                </option>
                                <option value="Đang giao" @if($bill->status == "Đang giao" )
                                selected
                                    @endif>
                                    Đang giao
                                </option>
                                <option value="Hoàn thành" @if($bill->status == "Hoàn thành" )
                                selected
                                    @endif>
                                    Hoàn thành
                                </option>
                                <option value="Hủy bỏ" @if($bill->status == "Hủy bỏ" )
                                selected
                                    @endif>
                                    Hủy bỏ
                                </option>
                            </select>
                        </td>
                        <td>
                                <button class="btn-primary" type="submit">Cập nhật</button>
                          </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
