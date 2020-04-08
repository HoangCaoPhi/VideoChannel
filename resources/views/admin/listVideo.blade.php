@extends('layouts.admin')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Danh Sách Video</h6>
    </div>

    @if (Session::has('success'))
     <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tên</th>
              <th>Hình Ảnh Thu Nhỏ</th>
              <th>Thời Gian Tạo</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->video_name }}</td>
                    <td>    
                        <img src="{{asset('storage/'.$video->video_image_avt)}}"  class="img-responsive" style="width:50px">
                    </td>
                    <td>{{ $video->created_at}}</td>
                    <td>
                        <a href="{{ URL::to('admin/video/edit/'.$video->id) }}" class="active styling-edit" ui-toggle-class="">
                            <i class="fas fa-edit text-success text-active"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa video này ko?')" href="{{ URL::to('admin/video/delete/'.$video->id) }}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection