@extends('admin.admin-layout.master')

@section('admin-content')
    <div class="container mb-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <h4>Total users in a month</h4>
                <canvas id="user" width="100%"></canvas>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Total posts in a month</h4>
                <canvas id="post" width="100%"></canvas>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        var users = @json(array_values($userCount));
        var posts = @json(array_values($postCount));
    </script>

    <!-- chart js -->
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/chart.js') }}"></script>

@endsection
