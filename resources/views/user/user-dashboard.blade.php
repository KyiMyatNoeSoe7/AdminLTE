@extends('user.user-layout.master')
@section('user-content')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mt-3">Profile</h3>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-primary float-right mr-5"><i
                                class="fa fa-pen mr-1"></i>Edit Profile</a>
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
                                    <span class="text-primary">Password: </span>{{ $user->password }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
