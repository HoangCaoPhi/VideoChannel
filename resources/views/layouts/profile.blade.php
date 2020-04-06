@extends('layouts.app')

@section('content')
    <div class="container">
      @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
      @endif
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Video</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
              <tr>
                <td>
                 <img src="{{asset('storage/'.$video->video_image_avt)}}" alt="Avatar" class="avatar" style="width:50px; height:50px">
                </td>
                <td> {{ $video->video_name }}</td>
                <td>
                    <a href="{{ URL::to('profile/edit/'.$video->id) }}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có chắc là muốn xóa video này ko?')" href="{{ URL::to('profile/delete/'.$video->id) }}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
 
@endsection