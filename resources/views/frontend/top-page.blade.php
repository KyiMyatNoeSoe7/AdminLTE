@extends('frontend.frontend-layout.master')
@section('frontend-content')

    
    {{-- <img src="{{asset('images/banner.jpg')}}" alt="" style="width:100%;" > --}}
    
    <div class="container py-5">
        <div class="section mb-5">
            <div class="row mt-3">
                <div class="col-md-8">
                    
                    <h3 class="text-center">
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        Top Posts
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                    </h3>
                
                @foreach($posts as $post)
                    <div class="card py-3 my-3" style="background-color: #EAEAF1">
                        <div class="row px-3">
                                {{-- @if($job->company->logo)
                                    <img src="{{asset('storage/company-logos/'.$job->company->logo)}}" alt="" class="col-md-2" style="width:100px; height:70px;">
                                @else
                                    <img src="{{asset('images/default-company-logo.png')}}" alt="" class="col-md-2" style="width:100px; height:70px;">
                                @endif --}}
                           
                            <div class="col-md-4">
                                <a href="{{url('posts/'.$post->id)}}"><h5 class="font-weight-bold" style="color: #3490DC">{{$post->name}}</h5></a>
                                
                            </div>
                            <div class="col-md-4">
                                <h5 class="font-weight-bold">{{$post->description}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
        
        
    </div>
@endsection