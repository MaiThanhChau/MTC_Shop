@extends('layout.admin.index')
@section('title', 'Sửa danh mục')
@section('content')
<?php
    // dd($category->toarray()); 
?>
<div class="card card-primary">
    <!-- form start -->
    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Thể loại</label>
                <select class="form-control" name="catParent_id" required>
                    <option value="">--Chọn thể loại--</option>
                    @foreach($catParents as $catParent)
                    
                    <option value="{{ $catParent->id }}" 
                    @if($category->catParent_id == $catParent->id)
                        {{'selected'}}
                    @endif>{{ $catParent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Danh mục sản phẩm</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập danh mục" name="name" value="{{ $category->name }}"  required>
                <span style="color:red">@error('name')  {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $category->id }}">
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