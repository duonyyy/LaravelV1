@extends('admin.layouts.default')

@section('title')
    @parent 
    Dashboard
@endsection

@push('style')
   

@section('content')
<div class="container-fluid">
    <div class="row my-4">
        <div class="col-lg-3 col-md-6">
            {{-- <div class="card text-white bg-primary mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">1234</p>
                </div>
            </div> --}}
            <h1>Dashboard</h1>
        </div>
        
    </div>
</div>
@endsection

@push('script')
  
@endpush
