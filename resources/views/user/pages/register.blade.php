@extends('user.layout')

@section('title')
    Register
@endsection

@section('content')
    <!-- Start Account Register Area -->
    <div class="account-login section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h3 class="mb-2">No Account? Register</h3>
                                <p class="text-muted">It takes less than a minute and gives you full control over your orders.</p>
                            </div>
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="reg-fn" class="form-label"> Name</label>
                                        <input 
                                            class="form-control @error('first_name') is-invalid @enderror" 
                                            type="text" 
                                            id="reg-fn" 
                                            name="name" 
                                            value="{{ old('first_name') }}" 
                                            required
                                        >
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="reg-email" class="form-label">E-mail Address</label>
                                        <input 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            type="email" 
                                            id="reg-email" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            required
                                        >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="reg-pass" class="form-label">Password</label>
                                        <input 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            type="password" 
                                            id="reg-pass" 
                                            name="password" 
                                            required
                                        >
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reg-pass-confirm" class="form-label">Confirm Password</label>
                                        <input 
                                            class="form-control" 
                                            type="password" 
                                            id="reg-pass-confirm" 
                                            name="password_confirmation" 
                                            required
                                        >
                                    </div>
                                    
                                <div class="mt-4">
                                    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                                </div>
                                <p class="text-center mt-3 mb-0">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-primary text-decoration-none">Login Now</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
@endsection
