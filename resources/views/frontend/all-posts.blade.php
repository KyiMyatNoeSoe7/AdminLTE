@extends('frontend.frontend-layout.master')

@section('frontend-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="text-center mt-3">All Posts</h4>
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
                                    <td style="max-width: 135px;">{{ $post->name }}</td>
                                    <td style="max-width: 360px;">{{ $post->description }}</td>
                                    <td>
                                        <a href="{{ route('frontend.show', $post->id) }}" class="btn btn-info ml-5"
                                            title="Detail" data-toggle="tooltip"><i class="fa fa-eye"></i>Show</a>

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
