@extends('layouts.app')

@section('content')
    <div class="container">
          
       
                <div class="row">
                  <div class="col-sm-9">
                    <video width="800" height="500" controls autoplay>
                        <source src="{{asset('storage/'.$videos->video)}}" type="video/mp4">
                        <source src="{{asset('storage/'.$videos->video)}}" type="video/ogg">
                    </video>
                    <h3 class="title btn btn-danger btn-block">
                        {{ $videos->video_name }}
                    </h3>
                  </div>
                
                    <div class="col-sm-3">
                        <p class="btn btn-primary btn-block">Video Relations</p>
                        @foreach ($videoRelation as $video)
                            <a href ="{{URL::to('/watch/'.$video->id)}}" class="video_nho btn">
                                <img src="{{asset('storage/'.$video->video_image_avt)}}" class="img-responsive" style="width:200px, height:150px" alt="Image">
                                <span> {{ $video->video_name }}</span>
                            </a>
                        @endforeach
                    </div>
            
                </div>
           
    </div>
 
@endsection