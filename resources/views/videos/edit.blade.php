@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{URL::to('/profile/edit/'.$id)}}" method="post" enctype="multipart/form-data">
    @csrf 
    @foreach($videos as $video)
      <div class="form-group">
        <label for="email">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="video_name" value="{{ $video->video_name }}">
      </div>
      <div class="form-group">
        <label for="pwd">Thumbnais Video</label>
        <br>
          Select image to upload:
          <input type="file" name="image_upload" id="fileToUpload">
          <br>
          <br>
          <input type="submit" value="Upload" name="submit" class="btn btn-danger">
      </form>
      </div>
    @endforeach
    </form>
    </div>
 
@endsection