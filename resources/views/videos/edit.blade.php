@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{URL::to('/profile/edit/'.$id)}}" method="post" enctype="multipart/form-data">
    @csrf 
    @foreach($videos as $video)
      <div class="form-group">
        <label for="email">Name</label>
        <input type="text" class="form-control @error('video_name') is-invalid @enderror" placeholder="Name" name="video_name" value="{{ $video->video_name }}">
        @error('video_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="pwd">Thumbnais Video</label>
        <br>
          Select image to upload:
          <input type="file" name="image_upload" id="fileToUpload" class="@error('image_upload') is-invalid @enderror">
          @error('image_upload')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
          <br>
          <br>
          <input type="submit" value="Upload" name="submit" class="btn btn-danger">
      </form>
      </div>
    @endforeach
    </form>
    </div>
 
@endsection