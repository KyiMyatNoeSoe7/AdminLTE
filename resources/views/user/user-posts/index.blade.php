@extends('user.user-layout.master')

@section('user-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center mt-2">All Posts</h2>
            <div class="col-md-12">
                <form action="{{ route('post-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3 float-left" style="max-width: 400px;">
                        <div>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary float-left" type="submit">Import data</button>
                    <a class="btn btn-success float-left ml-5" href="{{ route('post-export') }}">Export data</a>
                </form>
                <a href="{{ route('create') }}" class="px-3 mb-3 btn btn-primary float-right">Create Post</a>
                <div class="table-responsive mt-4 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="text-center">{{ $post->id }}</td>
                                    <td style="max-width: 135px;" class="text-center">{{ $post->name }}</td>
                                    <td style="max-width: 360px;">{{ $post->description }}</td>
                                    <td class="text-center pt-4">
                                        <form action="{{ route('destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="button" onclick="postdetails({{ $post }})"
                                                class="btn btn-info m-1" data-toggle="modal"><i
                                                    class="fa fa-eye"></i></button>

                                            <a href="{{ route('edit', $post->id) }}" class="btn btn-success mr-2"
                                                title="Edit" data-toggle="tooltip"><i class="fa fa-pen"></i></a>
                                            <button type="submit" class="mt-1 btn btn-danger"
                                                onclick="return confirm('Are you sure want to delete?')"><i
                                                    class="fa fa-trash-alt" style=" color: #fff;"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade" id="postdetails" tabindex="-1" aria-labelledby="postdetailsLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Post Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item py-4">
                                            Name: <span id="show-name" class="text-primary ml-1"></span>
                                        </li>
                                        <li class="list-group-item py-4">
                                            Description: <span id="show-description" class="text-primary ml-1"></span>
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
    function postdetails(post) {
        $("#postdetails").modal('show');
        $("#show-name").text(post.name);
        $("#show-description").text(post.description);
    }
</script>
