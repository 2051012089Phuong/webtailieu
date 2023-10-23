@extends('layout')

@section('title')
    Thay đổi mật khẩu
@endsection

{{-- @elseif ($s=='Cập nhật thất bại!')
    <div class="alert alert-danger" role="alert">
        {{ $s}}
    </div --}}

@section('content')
    <h2 class="text-success"><b>Thay đổi mật khẩu</b></h2>
    {{-- @if (Session::get('message') == 'Cập nhật thất bại! Vui lòng kiểm tra thông tin!')
    <div class="alert alert-danger" role="alert" style="width:30%; align:center">
        {{ Session::get('message') }}
    </div>

@elseif(Session::get('message')=='Cập nhật thành công!')

    <div class="alert alert-success" role="alert" style="width:30%; text-align:center">
        {{ Session::get('message') }}
    </div>

@endif --}}

    <div class="container" style="width:35%"></div>
    <div class="container-fluid addtextdiv" style="width:30%;">
        <form method="post" action="{{ route('update-password') }}">
            @csrf
            @method('put')
            <div class="form-group container-fluid">

                <br>
                @if (Session::get('message') == 'Cập nhật thất bại! Vui lòng kiểm tra thông tin!')
                    <div class="alert alert-danger" role="alert" style="align-items:center">
                        {{ Session::get('message') }}
                    </div>
                @elseif(Session::get('message') == 'Cập nhật thành công!')
                    <div class="alert alert-success" role="alert" style="align-items:center">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <label for="current_password">Mật khẩu hiện tại</label>
                <input id="current_password" name="current_password" type="password" class="form-control"
                    autocomplete="current-password" required>
                @error('current_password')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Mật khẩu không khớp với mật khẩu cũ.
                    </small>
                @enderror
            </div>

            <div class="form-group container-fluid">
                <label for="password">Mật khẩu mới</label>
                <input id="password" name="password" type="password" class="form-control" required
                    autocomplete="new-password">
                @error('password')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Tối thiểu 8 ký tự.
                    </small>
                @enderror
            </div>

            <div class="form-group container-fluid">
                <label for="password_confirmation">Xác nhận mật khẩu mới</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="form-control"
                    autocomplete="new-password">
                @error('password_confirmation')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Mật khẩu không khớp.
                    </small>
                @enderror
            </div>

            <div class="form-group container-fluid">
                <button style="cursor:pointer" class="btn btn-danger btn-outline-danger" type="submit"
                    value="{{ Auth::user()->id }}" onclick="return confirm('Xác nhận thay đổi thông tin?')">
                    Thay đổi
                </button>
            </div>
        </form>
    </div>

@stop
