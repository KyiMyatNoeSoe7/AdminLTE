@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('admin.users.create') }}" class="px-3 btn btn-primary float-right">Create User</a>
                <h4>All Users</h4>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered bg-white text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Profile</th>
                                <th>Phone number</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="pt-5">{{ $user->id }}</td>
                                    <td class="pt-5">{{ $user->name }}</td>
                                    <td class="pt-5">{{ $user->email }}</td>
                                    <td class="pt-5">
                                        <span class="badge badge-primary">{{ $user->role }}</span>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/user-photos/' . $user->photo) }}" alt="User Photo"
                                            class="img-fluid" style="width: 100px;  height: 100px">
                                    </td>
                                    <td class="pt-5">{{ $user->phone_no }}</td>
                                    <td class="pt-5">{{ $user->address }}</td>
                                    <td class="text-center pt-5">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-success m-1" title="Edit" data-toggle="tooltip"><i
                                                    class="fa fa-pen"></i></a>
                                            <button type="button" onclick="userdetails({{ $user }})"
                                                class="btn btn-info m-1" data-toggle="modal"><i
                                                    class="fa fa-eye"></i></button>

                                            <button type="submit" class="btn btn-danger m-1"
                                                onclick="return confirm('Are you sure want to delete?')"><i
                                                    class="fa fa-trash-alt" style=" color: #fff;"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade" id="userdetails" tabindex="-1" aria-labelledby="userdetailsLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item py-4">
                                            Name:<span id="show-name" class="text-primary ml-1"></span>
                                        </li>
                                        <li class="list-group-item py-4">
                                            Email:<span id="show-email" class="text-primary ml-1"></span>
                                        </li>
                                        <li class="list-group-item py-4">
                                            Role:<span id="show-role" class="text-primary ml-1"></span>
                                        </li>
                                        <li class="list-group-item py-4">
                                            Phone_no:<span id="show-phone_no" class="text-primary ml-1"></span>
                                        </li>
                                        <li class="list-group-item py-4">
                                            Address:<span id="show-address" class="text-primary ml-1"> </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function userdetails(user) {
        $("#userdetails").modal('show');
        $("#show-name").text(user.name);
        $("#show-email").text(user.email);
        $("#show-role").text(user.role);
        $("#show-phone_no").text(user.phone_no);
        $("#show-address").text(user.address);
    }
</script>
