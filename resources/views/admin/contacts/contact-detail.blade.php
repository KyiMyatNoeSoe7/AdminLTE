@extends('admin.admin-layout.master')

@section('admin-content')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Contact Details</h3>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary float-right mr-5"><i
                                class="fa fa-arrow-circle-left mr-1"></i>Back</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Name: </span>{{ $contact->name }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Email: </span>{{ $contact->email }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Phone Number: </span>{{ $contact->phone_no }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Message: </span>{{ $contact->message }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
