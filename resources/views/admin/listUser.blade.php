@extends('layouts.admin')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Danh Sách Người Dùng</h6>
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
              <th>Email</th>
              <th>Ngày Tạo</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>    {{ $user->name }}      </td>
                    <td>    
                             {{ $user->email }}  
                    </td>
                    <td>    {{ $user->created_at}}      </td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa video này ko?')" href="{{ route('deleteUser', ['id'=> $user->id]) }}" class="active styling-edit" ui-toggle-class="">
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