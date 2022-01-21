@extends('admin.admin-layout.master')

@section('admin-content')
    {{-- <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Post Details</h3>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary float-right mr-5"><i
                                class="fa fa-arrow-circle-left mr-1"></i>Back</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Name: </span>{{ $post->name }}
                                </li>
                                <li class="list-group-item py-4">
                                    <span class="text-primary">Description: </span>{{ $post->description }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button> --}}
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <span class="text-primary">Name: </span>{{ $post->name }}
                    </li>
                    <li class="list-group-item py-4">
                        <span class="text-primary">Description: </span>{{ $post->description }}
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection
