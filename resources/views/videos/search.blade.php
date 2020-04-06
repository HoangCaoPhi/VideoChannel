@extends('layouts.app')

@section('content')
    
<div class="container">
    @if (Session::has('messeage'))
        <div class="alert alert-info">{{ Session::get('messeage') }}</div>
    @endif

    <div class="row">
        @foreach ($videos as $video)
            <div class="col-sm-3">
                    <a href ="{{URL::to('/watch/'.$video->id)}}" class="video_nho">
                        <img src="{{asset('storage/'.$video->video_image_avt)}}" class="img-responsive" style="width:200px, height:150px" alt="Image">
                        <p> {{ $video->video_name }}</p>
                    </a>
            </div>
        @endforeach
    <div>
<div>

@endsection