@extends('layouts.basicLayout')

@section('content')
<div class="container" style="height: 100vh">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8">
            <div class="w-100">
                <div class="d-flex justify-cotent-between">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('image/food-logo-2.png') }}" alt="logo" width="60px" height="60px">
                        <span class="ms-3">Food Ordering System</span>
                    </a>
                </div>
            </div>

            <div class="card my-4" style="box-shadow: 0px 1px 4px 0px #333;">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_vendor" id="is-vendor" >

                                    <label class="form-check-label" for="is-vendor">
                                        {{ __('Apply for vendor') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="role_id" value="3" />

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 offset-md-4">
                                <div class="mb-2">OR,</div>
                                <div>
                                    <a href="{{ route('redirectToGoogle') }}" class="btn btn-block text-white" style="background-color: #333;">
                                        <i class="fab fa-google text-white me-2"></i> Login with Google
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <hr>
            <div class="mt-3">
                Already have an account? <a href="/login" style="text-decoration: underline!important;">Click here</a>
            </div>
        </div>
    </div>
</div>
@endsection
