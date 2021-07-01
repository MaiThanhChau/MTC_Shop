@extends('layout.admin.index')
@section('title', 'Sửa đơn hàng')
@section('content')
<?php
    // dd($category->toarray()); 
?>
<div class="card card-primary">
    <!-- form start -->
    <form action="{{ route('orders.update', $order->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
        <div class="form-group">
                <label for="user_name">Tên khách hàng</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $order->user_name }}"  required>
            </div>
            <div class="form-group">
                <label for="user_address">Địa chỉ</label>
                <input type="text" class="form-control" id="user_address" name="user_address" value="{{ $order->user_address }}"  required>
            </div>
            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="{{ $order->user_email }}"  required>
            </div>
            <div class="form-group">
                <label for="user_phone">Số điện thoại</label>
                <input type="text" class="form-control" id="user_phone" name="user_phone" value="{{ $order->user_phone }}"  required>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <input type="number" class="form-control" id="status" name="status" value="{{ $order->status }}"  required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </div>
    </form>
</div>
@endsection