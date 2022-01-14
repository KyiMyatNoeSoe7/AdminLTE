@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container py-5">
        <h3 class="text-primary font-bold text-center"><i>Create User</i></h3>
        <div class="row justify-content-center my-3">
            <div class="col-md-8">
                <div class="card p-5 border border-dark">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.store') }}">
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

                            <div class="form-group row mt-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-center">{{ __('Select your role id') }}</label>

                                <div class="col-md-6">
                                    <select name="role_id" id="role_id">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-rounded btn-primary btn-icon text-white px-5 py-2"
                                    data-toggle="tooltip">Create User</button>
                                <a href="{{ route('admin.users.index') }}"
                                    class="px-3 py-2 btn btn-outline-secondary btn-rounded btn-icon float-right"
                                    title="Cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
