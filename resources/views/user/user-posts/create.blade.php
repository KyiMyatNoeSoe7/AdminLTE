@extends('user.user-layout.master')

@section('user-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="background-color: #4BA3EB;">
                        <h4 class="text-center text-white mt-2">Create Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">Post Name</label>
                                <input type="text" name="name" id="" class="form-control " placeholder="Enter post name">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control "></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-rounded btn-primary btn-icon text-white px-5 py-2"
                                    data-toggle="tooltip">Update Post</button>
                                <a href="{{ route('index') }}"
                                    class="px-3 py-2 btn btn-outline-secondary btn-rounded btn-icon float-right"
                                    title="Cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
