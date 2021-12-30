@extends('frontend.frontend-layout.master')

@section('frontend-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('create') }}" class="px-5 py-2 btn btn-primary float-right">Create Post</a>
                <h4>All Posts</h4>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>
                                        <form action="{{ route('destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('show', $post->id) }}" class="btn btn-info" title="Detail"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i>Show</a>

                                            <a href="{{ route('edit', $post->id) }}" class="btn btn-success" title="Edit"
                                                data-toggle="tooltip"><i class="fa fa-pen"></i>Edit</a>
                                            <button type="submit" class="mt-1 btn btn-danger"
                                                onclick="return confirm('Are you sure want to delete?')"><i
                                                    class="fa fa-trash-alt" style=" color: #fff;"></i>Delete</button>

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
