@extends('frontend.frontend-layout.master')
@section('frontend-content')

    <div class="container py-5">
        <div class="section mb-5">
            <div class="row mt-3">
                <div class="col-md-12">

                    <h3 class="text-center">
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        Top Posts
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                    </h3>

                    @foreach ($posts as $post)
                        <div class="card py-3 my-3" style="background-color: #EAEAF1">
                            <div class="row px-3">

                                <div class="col-md-4">
                                    <a href="" type="submit" onclick="postdetails({{ $post }})"
                                    class="font-weight-bold text-center" data-toggle="modal" style="color: #3490DC; max-width: 135px;"><h5>{{ $post->name }}</h5></a>

                                </div>
                                <div class="col-md-8">
                                    <h5 class="font-weight-bold" style="max-width: 570px;">{{ $post->description }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="modal fade" id="postdetails" tabindex="-1" aria-labelledby="postdetailsLabel" aria-hidden="true">
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
    @endsection

    <script>
        function postdetails(post) {
            $("#postdetails").modal('show');
            $("#show-name").text(post.name);
            $("#show-description").text(post.description);
        }
    </script>
