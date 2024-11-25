@extends('admin.layouts.default')

@section('title')
    @parent
    Sửa Slider
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
    
    <h1 class="my-4">  Sửa Slider</h1>
    
    <form action="{{ route('admin.sliders.updatePatchSlider') }}" method="POST"  enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input type="hidden" value="{{ $slider->id }}" id="idSlider" name="idSlider">
         <!--  Images -->
         <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
            <input type="file" id="image" name="image" class="form-control is-invalid " >
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
                <img  src="{{ asset($slider->image) }}"  alt="Product Image" style="width: 80px; height: 80px; object-fit: cover;">                                 
        </div>

        <div class="mb-3">
            <label for="sliderTitle" class="form-label">Tên Danh Mục</label>
           
            <input type="text" id="sliderTitle" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.sliders.listSliders') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
