@extends('layout.admin.index')
@section('title', 'Thêm sản phẩm')
@section('content')

<div class="card card-primary">
    <?php
    // dd($questions->toarray());
?>
    <!-- form start -->
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                <span style="color:red">@error('name')  {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" required value="{{ old('price') }}">
                <span style="color:red">@error('price')  {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <label>Chọn danh mục</label>
                <select name="category_id" required>
                    @foreach($catParents as $catParent)
                    <optgroup label="{{ $catParent->name }}">
                        @foreach($totalCategories as $totalCategory)
                            @if($totalCategory->catParent_id == $catParent->id)
                            <option value="{{ $totalCategory->id }}">{{ $totalCategory->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" cols="30" rows="10" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="sort_description">Mô tả ngắn</label>
                <textarea name="sort_description" id="sort_description" cols="100" rows="2" required>{{ old('sort_description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh chính</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="exampleInputFile" name="image">
                        <span style="color:red">@error('image')  {{ $message }}  @enderror</span>
                    </div>
                </div>

                <label for="exampleInputFile">Ảnh phụ</label>
                <div class="input-group">
                    <input type="file" class="form-control-file" id="exampleInputFile" name="images[]">
                    <input type="file" class="form-control-file" id="exampleInputFile" name="images[]">
                    <input type="file" class="form-control-file" id="exampleInputFile" name="images[]">
                    <input type="file" class="form-control-file" id="exampleInputFile" name="images[]">
                    <span style="color:red">@error('images')  {{ $message }}  @enderror</span>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

        </div>
    </form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('description');
CKEDITOR.replace('sort_description');
</script>
@endsection