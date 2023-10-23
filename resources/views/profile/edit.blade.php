@extends('layout')

@section('title')
    Thông tin tài khoản
@endsection

@section('content')

    <h2 class="text-success"><b>Thông tin tài khoản</b></h2>

    <div class="container" style="width:35%"></div>

    <div class="container-fluid addtextdiv" style="width:30%;">

        <!-- Name -->
        <div class="form-group container-fluid">
            <label for="name">Tên đăng nhập</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" disabled>
        </div>

        <!-- Email Address -->
        <div class="form-group container-fluid">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ Auth::user()->email }}"
                disabled>
        </div>

        <div class="form-group container-fluid">

            <a href="{{ route('edit-userprofile') }}">
                <button style="cursor:pointer" class="btn btn-primary btn-outline-primary" type="submit"
                    value="{{ Auth::user()->id }}">
                    Thay đổi thông tin
                </button>
            </a>
            <a href="{{ route('edit-password') }}">
                <button style="cursor:pointer" class="btn btn-primary btn-outline-primary" type="submit">
                    Thay đổi mật khẩu
                </button>
            </a>

        </div>
    </div>
    <br>
    <a href="{{ route('delete-account') }}">
        <button style="cursor:pointer" class="btn btn-danger btn-outline-danger" type="submit">
            Xóa tài khoản
        </button>
    </a>


@stop
