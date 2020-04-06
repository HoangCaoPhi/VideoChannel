@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ URL::to('/upload/'.$user_id) }}" method="post" enctype="multipart/form-data"> 
    @csrf 
      <div class="form-group">
        <label for="email">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="video_name">
      </div>
      <div class="form-group">
        <label for="pwd">Thumbnais Video</label>
        <br>
        <label>Select image to upload:</label> 
        <input type="file" id="file" name="image_upload"> 
      </div>
      
        <label for="pwd">Video</label>
        <br>
        <label>Select video to upload:</label> 
        <input type="file" id="file" name="video_upload"> 
        <br>
        <input type="submit" value="Upload" name="submit">
        <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
    </form>
</div>
@endsection