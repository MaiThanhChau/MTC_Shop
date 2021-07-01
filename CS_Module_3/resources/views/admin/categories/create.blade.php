@extends('layout.admin.index')
@section('title', 'Thêm Danh Mục')
@section('content')

<div class="card card-primary">
<?php
    // dd($questions->toarray());
?>
    <!-- form start -->
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Thể loại</label>
                <select class="form-control" name="catParent_id" required>
                <option value="">--Chọn thể loại--</option>
                @foreach($catParents as $catParent)
                <option value="{{ $catParent->id }}">{{ $catParent->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Danh mục sản phẩm</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập danh mục" name="name" required value="{{ old('name') }}">
                <span style="color:red">@error('name')  {{ $message }}  @enderror</span>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </div>
    </form>
</div>
@endsection