@extends('admin.layouts.default')

@section('title')
    @parent
   Setting
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

    <h1 class="my-4"> Setting</h1>

    <form action="{{ route('admin.managers.storeOrUpdateSetting') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="site_name" class="form-label">Site Name</label>
            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $settings->site_name }}">
        </div>

        @if ($settings->site_logo)
        <div class="mb-3">
            <label>Current Site Logo</label><br>
            <img src="{{ asset( $settings->site_logo) }}" width="150px" alt="Site Logo">
        </div>
        @endif

        <div class="mb-3">
            <label for="site_logo" class="form-label">Upload New Site Logo</label>
            <input type="file" class="form-control" id="site_logo" name="site_logo">
        </div>

        @if ($settings->site_favicon)
        <div class="mb-3">
            <label>Current Site Favicon</label><br>
            <img src="{{ asset( $settings->site_favicon) }}" width="150px" alt="Site Favicon">
        </div>
        @endif

        <div class="mb-3">
            <label for="site_favicon" class="form-label">Upload New Site Favicon</label>
            <input type="file" class="form-control" id="site_favicon" name="site_favicon">
        </div>

        <div class="mb-3">
            <label for="site_map" class="form-label">Site Map</label>
            <input type="text" class="form-control" id="site_map" name="site_map" value="{{ $settings->site_map }}">
        </div>

        {{-- <div class="mb-3">
            <label for="site_timezone" class="form-label">Site Timezone</label>
            <select class="form-control" id="site_timezone" name="site_timezone">
                <option value="">Select Timezone</option>
                @foreach (setTimezone() as $key => $value)
                <option value="{{ $key }}" {{ $key == $settings->site_timezone ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="site_footer" class="form-label">Site Footer</label>
            <input type="text" class="form-control" id="site_footer" name="site_footer" value="{{ $settings->site_footer }}">
        </div>

        <div class="mb-3">
            <label for="contact_email" class="form-label">Contact Email</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $settings->contact_email }}">
        </div>

        <div class="mb-3">
            <label for="contact_phone" class="form-label">Contact Phone</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ $settings->contact_phone }}">
        </div>

        <div class="mb-3">
            <label for="contact_address" class="form-label">Contact Address</label>
            <input type="text" class="form-control" id="contact_address" name="contact_address" value="{{ $settings->contact_address }}">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.managers.getSetting') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
