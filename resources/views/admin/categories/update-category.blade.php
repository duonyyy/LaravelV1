@extends('admin.layouts.default')

@section('title')
    @parent
    Sửa Danh Mục
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
    @endif
    
    <h1 class="my-4">Sửa Danh Mục</h1>
    
    <form action="{{ route('admin.categories.updatePatchCategory') }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="categoryName" class="form-label">Tên Danh Mục</label>
            <input type="hidden" value="{{ $category->id }}" id="idCategory" name="idCategory">
            <input type="text" id="categoryName" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
       
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.categories.listCategories') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
