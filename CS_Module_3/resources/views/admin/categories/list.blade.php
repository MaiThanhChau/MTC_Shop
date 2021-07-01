@extends('layout.admin.index')
@section('title', 'Danh mục sản phẩm')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="First group">
                                <h3 class="card-title">Danh mục</h3>
                            </div>
                            @if(Session::has('success'))
                            <div class="btn-group" role="group" aria-label="First group">
                                <h4><strong style="color: green">{{ Session::get('success') }}</strong></h4>
                            </div>
                            @endif
                            <div class="input-group">
                                <a href="{{ route('categories.create') }}" method="get">
                                    <button class="btn btn-success" style="margin-right: 2px">Thêm</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Thể loại</th>
                                    <th colspan="2" style="width: 20%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->catParents->name }}</td>
                                    <td>
                                        <a href="{{ route( 'categories.edit', $category->id ) }}" method="get">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route( 'categories.destroy', $category->id ) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm(' Bạn chắc chắn muốn xóa không? ')">Xóa</button>
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