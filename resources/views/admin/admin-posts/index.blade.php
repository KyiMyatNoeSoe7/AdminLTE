@extends('admin.admin-layout.master')

@section('admin-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="form-inline float-right">
                <div class="input-group">
                    <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <h4>All Posts</h4>
            <div class="table-responsive mt-4">
                {{-- @if($message = Session::get('success'))
                <div class="alert alert-info">
                    {{$message}}
                </div>
                @endif --}}
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->description}}</td>
                            <td>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <a href="{{ route('admin.posts.show', $post->id) }}"  class="btn btn-info m-1" title="Detail" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                    <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash-alt"></i></button>
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