@extends('layouts.admin')

@section('content')

<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif

    <form action="{{ route('addUser') }}" method="post" enctype="multipart/form-data"> 
        @csrf 
        <div class="form-group">
          <label for="name">Tên</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
          @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

             
          <div class="form-group">
          <label for="name">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email">
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
       
        <div class="form-group">
            <label for="name">Mật Khẩu</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <input type="submit" value="Thêm Người Dùng" name="submit" class="btn btn-danger">
        <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
        </div>


    </form>

<div>
<br> <br> <br> <br> <br> <br> <br>
@endsection
