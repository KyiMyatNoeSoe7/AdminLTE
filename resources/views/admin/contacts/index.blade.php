@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 style="display: inline;">Contact Message</h4>
                <form class="form-group float-right">
                    <div class="input-group">
                        <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered shadow-md bg-white">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone No</th>
                                <th class="text-center">Message</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="text-center">{{ $contact->id }}</td>
                                    <td class="text-center">{{ $contact->name }}</td>
                                    <td class="text-center">{{ $contact->email }}</td>
                                    <td class="text-center">{{ $contact->phone_no }}</td>
                                    <td style="max-width: 360px;">{{ $contact->message }}</td>
                                    <td class="text-center">
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
