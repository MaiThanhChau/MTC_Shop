@extends('layout.admin.index')
@section('title', 'Sửa sản phẩm')
@section('content')

<div class="card card-primary">
    <?php
    // dd($questions->toarray());
?>
    <!-- form start -->
    <form action="{{ route('products.update', $product->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                <span style="color:red">@error('name')  {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                <span style="color:red">@error('price')  {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <label>Chọn danh mục</label>
                <select name="category_id" required>
                    @foreach($catParents as $catParent)
                    <optgroup label="{{ $catParent->name }}">
                        @foreach($totalCategories as $category)
                            @if($category->catParent_id == $catParent->id)
                                <option value="{{ $category->id }}" 
                                    @if($product->category_id == $category->id)
                                    {{ 'selected' }}
                                    @endif
                                >{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" cols="30" rows="10" required>{{ $product->description }}"</textarea>
                <span style="color:red">@error('description')  {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <label for="sort_description">Mô tả ngắn</label>
                <textarea name="sort_description" id="sort_description" cols="5" rows="10" required>{{ $product->sort_description }}</textarea>
                <span style="color:red">@error('sort_description')  {{ $message }}  @enderror</span>
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
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $product->id }}">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </div>
    </form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('sort_description');
CKEDITOR.replace('description');
</script>
@endsection