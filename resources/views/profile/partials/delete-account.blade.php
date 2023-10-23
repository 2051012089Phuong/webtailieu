@extends('layout')

@section('title')
    Xoá tài khoản
@endsection

@section('content')

    <h2 class="text-danger"><b>Xóa tài khoản</b></h2>
    <h4><b>Tài khoản của bạn sẽ bị xóa vĩnh viễn! Vui lòng cân nhắc trước khi xác nhận!</b><h4>
        <br>
   
        <form method="post" action="{{ route('deletingAccount') }}">
            @csrf
            {{-- @method('delete') --}}
            <!-- Name -->
            {{-- <div class="form-group container-fluid">
                <label for="name">Nhập lại mật khẩu của bạn để xác nhận</label>

                <input id="password" name="password" type="password" class="form-control">
            </div>
            @error('email')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Mật khẩu không khớp!. Vui lòng thử lại.
                    </small>
                @enderror --}}

            
                <button style="cursor:pointer" class="btn btn-danger btn-outline-danger btn-lg" type="submit"
                    value="{{ Auth::user()->id }}" onclick="return confirm('Xác nhận xóa tài khoản?')">
                    Xóa tài khoản
                </button>
            
        </form>

    <br>

@stop
