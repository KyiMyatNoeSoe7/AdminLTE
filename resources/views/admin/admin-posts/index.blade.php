@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('admin.posts.create') }}" class="px-3 btn btn-primary float-right">Create Post</a>
                <h4>All Posts</h4>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td style="max-width: 135px;">{{ $post->name }}</td>
                                    <td style="max-width: 360px;">{{ $post->description }}</td>
                                    <td>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success"
                                                title="Edit" data-toggle="tooltip"><i class="fa fa-pen"></i></a>
                                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info m-1"
                                                title="Detail" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
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
