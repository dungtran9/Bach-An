@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('product.index')}}">List</a></li>
    </ol>

    <div class="card-header"><i class="fas fa-table mr-1"></i></div>
    <div class="card-body">
        <div class="table-responsive">
            <h2 style="text-align: center; color: blue; padding-bottom: 20px"><strong>Danh sách sản phẩm</strong></h2>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="">
                <tr class="table-info">
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col" style="width: 100px">Số lượng</th>
                    <th scope="col">Hình ảnh</th>
                    <th colspan="2">Hành động</th>

                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr class="data-user">
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format(floatval($product->price)) }} VNĐ</td>
                        <td>{{ $product->decs }}</td>
                        <td>{{ $product->qty }}</td>
                        <td><img style="width: 100px" src={{asset("storage/".$product->image)}}></td>
                        <td><a href="{{route('product.edit',$product->id)}}">Sửa</a></td>
                        <td><a href="{{ route('product.delete', $product->id) }}" class="text-danger"
                               onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$products->links('pagination::bootstrap-5')}}


        </div>
    </div>
@endsection
