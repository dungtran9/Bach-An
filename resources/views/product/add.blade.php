@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('product.index')}}">List</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>


    <div class="card-body">
        <div class="table-responsive">
            <div class="col-12">
                <h2 style="color: blue; padding-bottom: 15px"><strong>Thêm mới sản phẩm</strong></h2>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label><strong>Tên sản phẩm</strong></label>
                        <input style="width: 50%" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Giá</strong></label>
                        <input style="width: 50%" type="text" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Mô Tả</strong></label>
                        <textarea style="width: 50%" class="form-control" name="decs" required></textarea>
                    </div>
                    <div class="form-group">
                        <label><strong>Số lượng</strong></label>
                        <input style="width: 50%" type="text" class="form-control" name="qty" required>
                    </div>
                    <div class="form-group">
                        <label><strong>Image</strong></label>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="form-group" id="result">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                    </div>
                </form>

  
            </div>
        </div>
    </div>
@endsection
