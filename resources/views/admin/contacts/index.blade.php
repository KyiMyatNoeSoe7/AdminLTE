@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4>Contact Message</h4>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered shadow-md bg-white">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone_no }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                                class="btn btn-info m-1" title="Detail" data-toggle="tooltip"><i
                                                    class="fa fa-eye"></i></a>
                                            <button type="submit" class="btn btn-danger m-1"
                                                onclick="return confirm('Are you sure want to delete?')"><i
                                                    class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
