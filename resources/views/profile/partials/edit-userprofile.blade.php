@extends('layout')

@section('title')
Thông tin tài khoản
@endsection

@section('content')

<h2 class="text-success"><b>Chỉnh sửa thông tin tài khoản</b></h2>

    <div class="container" style="width:35%"></div>

    <div class="container-fluid addtextdiv" style="width:30%;">
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
           <!-- Name -->
           <div class="form-group container-fluid">
            <label for="name">Tên đăng nhập</label>
            <input id="name" class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
        </div>

        <!-- Email Address -->
        <div class="form-group container-fluid">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
        </div>

        <div class="form-group container-fluid">
            
            <button style="cursor:pointer" class="btn btn-danger btn-outline-danger"
            type="submit" value="{{Auth::user()->id}}" onclick="return confirm('Xác nhận thay đổi thông tin?')">
                Thay đổi thông tin
            </button>
            
        </div>
        </form>
    </div>
    <br>
    
@stop