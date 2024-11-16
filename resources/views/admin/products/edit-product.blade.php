@extends('admin.layouts.default')

@section('title')
    @parent
    Cập Nhật Sản Phẩm
@endsection

@section('content')
<div class="container">
    @if (session('message'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            // Auto-hide toast after 5 seconds
            setTimeout(() => {
                const toastEl = document.querySelector('.toast');
                if (toastEl) {
                    toastEl.classList.remove('show');
                }
            }, 5000);
        </script>
    @endif

    <h1 class="my-4">Cập Nhật Sản Phẩm</h1>
    <form action="{{ route('admin.products.updatePatchProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')  <!-- Phương thức PATCH để cập nhật sản phẩm -->
        <input type="hidden" value="{{ $product->id }}" id="idProduct" name="idProduct">
        <!-- Product Images -->
        <div class="mb-3">
            <label for="images" class="form-label">Hình ảnh sản phẩm</label>
            <input type="file" id="images" name="images[]" class="form-control @error('images.*') is-invalid @enderror" multiple>
            @error('images.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          
            @foreach($product->images as $image)
                <img src="{{ asset($image->image_url) }}" alt="Product Image" style="width: 50px; height: 50px; object-fit: cover;">
            @endforeach
                                            
        </div>
        
        <!-- Product Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="productPrice" class="form-label">Giá Sản Phẩm</label>
            <input type="number" id="productPrice" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Category -->
        <div class="mb-3">
            <label for="productCategory" class="form-label">Danh Mục</label>
            <select id="productCategory" name="category" class="form-select @error('category') is-invalid @enderror" required>
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Description -->
        <div class="mb-3">
            <label for="productDescription" class="form-label">Mô Tả Sản Phẩm</label>
            <textarea id="productDescription" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
            <a href="{{ route('admin.products.listProducts') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
