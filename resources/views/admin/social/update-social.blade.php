@extends('admin.layouts.default')

@section('title')
    @parent
    Sửa Social
@endsection

@section('content')
<div class="container">

    {{-- Toast hiển thị thông báo khi có session 'message' --}}
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

    <h1 class="my-4">Sửa Social</h1>
    
    {{-- Form sửa social --}}
    <form action="{{ route('admin.socials.updatePatchSocial', $social->id) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- Nhập Title --}}
        <div class="mb-3">
            <label for="socialTitle" class="form-label">Title</label>
            <input type="text" id="socialTitle" name="title" class="form-control" value="{{ old('title', $social->title) }}" required placeholder="Nhập tiêu đề social (VD: Facebook)">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nhập Icon --}}
        <div class="mb-3">
            <label for="socialIcon" class="form-label">Icon</label>
            <input type="text" id="socialIcon" name="icon" class="form-control" value="{{ old('icon', $social->icon) }}" required placeholder="Nhập icon (VD: fa-facebook)">
            @error('icon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nhập URL --}}
        <div class="mb-3">
            <label for="socialUrl" class="form-label">URL</label>
            <input type="url" id="socialUrl" name="url" class="form-control" value="{{ old('url', $social->url) }}" required placeholder="Nhập đường dẫn URL (VD: https://facebook.com)">
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        {{-- Nút thêm mới và quay lại --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.socials.listSocial') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>

{{-- Script tự động ẩn toast sau 3 giây --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl, { autohide: true, delay: 3000 });
            toast.show();
        }
    });
</script>
@endsection
