@extends('layouts.admin')

@section('content')
<div class="container">

    @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif

<form action="{{ route('adminAddVideo') }}" method="post" enctype="multipart/form-data"> 
      @csrf 
      <div class="form-group">
        <label for="email">Tên</label>
        <input type="text" class="form-control @error('video_name') is-invalid @enderror" placeholder="Name" name="video_name">
        @error('video_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="pwd">Hình Ảnh Thu Nhỏ</label>
        <br>
        <label>Select image to upload:</label> 
        <input type="file" id="file" name="image_upload" class="@error('image_upload') is-invalid @enderror"> 
        @error('image_upload')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      
        <label for="pwd">Video</label>
        <br>
        <label>Select video to upload:</label> 
        <input type="file" id="file" name="video_upload" class="@error('video_upload') is-invalid @enderror"> 
          @error('video_upload')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        <br>
        <input type="submit" value="Upload" name="submit" class="btn btn-danger">
        <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
    </form>
</div>
@endsection