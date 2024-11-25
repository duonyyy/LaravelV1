@extends('admin.layouts.default')

@section('title')
    @parent
    Thêm Sản Phẩm
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

    <h1 class="my-4">Thêm Sản Phẩm</h1>
    <form action="{{ route('admin.products.addPostProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Product Images -->
        <div class="mb-3">
            <label for="images" class="form-label">Hình ảnh sản phẩm</label>
            <input type="file" id="images" name="images[]" class="form-control @error('images.*') is-invalid @enderror" multiple required>
            @error('images.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required aria-describedby="productNameError">
            @error('name')
                <div id="productNameError" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="productPrice" class="form-label">Giá Sản Phẩm</label>
            <input type="number" id="productPrice" name="price" class="form-control @error('price') is-invalid @enderror" required aria-describedby="productPriceError">
            @error('price')
                <div id="productPriceError" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Category -->
        <div class="mb-3">
            <label for="productCategory" class="form-label">Danh Mục</label>
            <select id="productCategory" name="category" class="form-select @error('category') is-invalid @enderror" required aria-describedby="productCategoryError">
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div id="productCategoryError" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       <!-- Product Description -->
<div class="mb-3">
    <label for="productDescription" class="form-label">Mô Tả Sản Phẩm</label>
    <textarea name="description" class="form-control" id="summernote"></textarea>
    
    <!-- Hiển thị lỗi nếu có -->
    @error('description')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
            <a href="{{ route('admin.products.listProducts') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
