@extends('admin.admin-layout.master')
@section('admin-content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mt-3">Profile</h3>
                        @if ($user->photo)
                        <img src="{{ asset('storage/user-photos/' . $user->photo) }}" alt="" width="200" height="150">
                    @else
                        <img src="{{ asset('images/userdefault.png') }}" alt="" width="200" height="150">
                    @endif
                      
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Name: </span>{{ $user->name }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Email: </span>{{ $user->email }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Role: </span>{{ $user->role }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Phone Number: </span>{{ $user->phone_no }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Address: </span>{{ $user->address }}
                                </li>
                                <li class="list-group-item py-4">
                                    <a href="{{ route('admin.edit', Auth::user()->first()->id) }}"
                                        class="btn btn-outline-primary float-left"><i class="fa fa-pen mr-1"></i>Edit Profile</a>
                                        <a href="{{ route('admin.users.index') }}"
                                        class="px-3 py-2 btn btn-outline-secondary btn-rounded btn-icon float-right">Cancel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
