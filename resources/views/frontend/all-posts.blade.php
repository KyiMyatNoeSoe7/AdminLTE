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
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td style="max-width: 135px;" class="text-center">{{ $post->name }}</td>
                                    <td style="max-width: 360px;">{{ $post->description }}</td>
                                    <td class="text-center">
                                        <button type="button" onclick="postdetails({{ $post }})"
                                            class="btn btn-info m-1" data-toggle="modal"><i
                                                class="fa fa-eye"></i>Show</button>
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                        onclick="$('#postdetails').modal('hide');">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        onclick="$('#postdetails').modal('hide');">Close</button>
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
