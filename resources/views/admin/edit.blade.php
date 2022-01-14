@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger text-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id=""
                                    class="form-control @error('email') is-invalid @enderror" readonly
                                    value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger text-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.admin-dashboard') }}"
                                    class="btn btn-secondary float-right">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
