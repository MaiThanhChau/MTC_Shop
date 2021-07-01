@extends('layout.admin.index')
@section('title', 'Danh sách sản phẩm')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-toolbar justify-content-between" role="toolbar"
                            aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="First group">
                                <h3 class="card-title">Sản Phẩm</h3>
                            </div>
                            @if(Session::has('success'))
                            <div class="btn-group" role="group" aria-label="First group">
                                <h4><strong style="color: green">{{ Session::get('success') }}</strong></h4>
                            </div>
                            @endif
                            <div class="input-group">
                                <a href="{{ route('products.create') }}">
                                    <button class="btn btn-success" style="margin-right: 2px">Thêm</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <form action="{{ route('products.filter') }}" method="post">
                            @csrf
                            <select onchange="this.form.submit()" name="filter">
                                <option value="0">Tất cả sản phẩm</option>
                                @foreach($catParents as $catParent)
                                <option value="{{ $catParent->id }}">{{ $catParent->name }}</option>
                                @endforeach
                            </select>
                            ({{ count($products) }} <span>Sản phẩm</span>)
                        </form>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Thể loại</th>
                                    <th>Giá</th>
                                    <th>Lượt mua</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{ asset('storage/'.$product->image) }}" alt="Chưa có ảnh"
                                            style="width: 150px; height: 150px"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->categories->name }}</td>
                                    <td>{{ $product->categories->catParents->name }}</td>
                                    <td>{{ number_format($product->price) }}<span
                                            class="woocommerce-Price-currencySymbol">₫</span></td>
                                    <td>{{ $product->sold }}</td>
                                    <td>
                                        <a href="{{ route( 'products.edit', $product->slug ) }}">
                                            @csrf
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route( 'products.destroy', $product->slug ) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                                onclick="return confirm(' Bạn chắc chắn muốn xóa không? ')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection