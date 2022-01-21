@extends('frontend.frontend-layout.master')

@section('frontend-content')
    <div class="container py-5">
        <h3 class="text-primary font-bold text-center"><i>Register</i></h3>
        <div class="row justify-content-center my-3">
            <div class="col-md-8">
                <div class="card p-5 border border-dark">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-center">{{ __('Enter your name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter your name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="photo" class="col-md-4 col-form-label text-md-center">Profile</label>
    
                                <div class="col-md-6">
                                    <input type="file" name="photo" id="profile" class="form-control-file @error('photo') is-invalid @enderror">
                                    @error('photo')
                                    <span class="text-danger text-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-center">{{ __('Enter your email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter your email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-center">{{ __('Enter your password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Enter your password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-center">{{ __('Enter your confirm password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Enter confirm password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_no" class="col-md-4 col-form-label text-md-center">Phone Number</label>
    
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus placeholder="Enter your phone number">
    
                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <label for="address" class="col-md-4 col-form-label text-md-center">Address</label>
    
                                <div class="col-md-6">
                                    <textarea name="address" id="" cols="3" rows="2"  autofocus placeholder="Enter your address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
    
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-9 offset-md-4">
                                    Already have an account,
                                    <a class="" href="{{ route('login') }}">
                                        Login Here!
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
