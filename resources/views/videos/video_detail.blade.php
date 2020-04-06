@extends('layouts.app')

@section('content')
    <div class="container">
            <video width="800" height="500" controls autoplay>
                    <source src="{{asset('storage/'.$videos->video)}}" type="video/mp4">
                    <source src="{{asset('storage/'.$videos->video)}}" type="video/ogg">
            </video>
            <h3 class="title">
                {{ $videos->video_name }}
            </h3>
    </div>
 
@endsection