@extends('user.layouts.default')

@section('title')
Login
@section('content')

<div class="account-login section py-5">
    <div class="container">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Display errors -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Login form -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Login Now</h3>
                            <p class="text-muted">Login with your social media or email address.</p>
                        </div>

                        <!-- Social Media Login -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between gap-2">
                                <a class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center" href="#">
                                    <i class="lni lni-facebook-filled me-2"></i> Facebook
                                </a>
                                <a class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center" href="#">
                                    <i class="lni lni-twitter-original me-2"></i> Twitter
                                </a>
                                <a class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center" href="#">
                                    <i class="lni lni-google me-2"></i> Google
                                </a>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="text-center my-3">
                            <span class="text-muted">Or login with your email</span>
                        </div>

                        <!-- Login Form -->
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}" 
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    id="password" 
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input" 
                                        id="remember" 
                                        name="remember"
                                    >
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a class="text-decoration-none small" href="#">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                        </form>

                        <!-- Register Link -->
                        <p class="text-center mt-4 mb-0 text-muted">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none">Register here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
