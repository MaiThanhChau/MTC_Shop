@extends('layout.admin.index')
@section('title', 'Danh mục đơn hàng')
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
                                <h3 class="card-title">Danh mục</h3>
                            </div>
                            @if(Session::has('success'))
                            <div class="btn-group" role="group" aria-label="First group">
                                <h4><strong style="color: green">{{ Session::get('success') }}</strong></h4>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th colspan="3" style="width: 20%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $order->user_name }}</td>
                                        <td>{{ $order->user_address }}</td>
                                        <td>{{ $order->user_email }}</td>
                                        <td>{{ $order->user_phone }}</td>
                                        <td>{{ number_format($order->amount) }}<span
                                                class="woocommerce-Price-currencySymbol"> ₫</span></td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('orders.order_detail', $order->id) }}">
                                                <button class="btn btn-primary">Xem</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.edit', $order->id) }}">
                                                <button class="btn btn-warning">Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="post">
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