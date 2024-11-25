@extends('admin.layouts.default')

@section('title')
    @parent
    Thêm Slider Mới
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
    <h1 class="my-4">Thêm Slider Mới</h1>
    <form action="{{ route('admin.sliders.addPostSlider') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="sliderTitle" class="form-label">Tiêu đề Slider</label>
            <input type="text" id="sliderTitle" name="title" class="form-control" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
       
          <!-- Product Images -->
          <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh Slider</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" multiple required>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Thêm Mới</button>
            <a href="{{ route('admin.sliders.listSliders') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
