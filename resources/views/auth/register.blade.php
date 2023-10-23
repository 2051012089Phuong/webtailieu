<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

        Đăng ký

    </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- api render tai lieu-->

    <base href="{{ asset('') }}">

    <!-- tu viet them-->
    <link rel="stylesheet" href="{{ asset('style/doc-style.css') }}">

</head>

<body>
    <h2 class="text-info"><b>Đăng ký</b></h2>

    <div class="container" style="width:35%"></div>

    <div class="container-fluid addtextdiv" style="width:30%;">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group container-fluid">
                <label for="name">Tên đăng nhập</label>
                <input id="name" class="form-control" type="text" name="name" autofocus
                    autocomplete="name" />
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Không bắt buộc, sẽ lấy email làm tên đăng nhập nếu bỏ trống.
                </small>
            </div>

            <!-- Email Address -->
            <div class="form-group container-fluid">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" required
                    autocomplete="username" />
                @error('email')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Chưa nhập email.
                    </small>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group container-fluid">
                <label for="email">Mật khẩu</label>

                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password" />

                @error('password')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Tối thiểu 8 ký tự.
                    </small>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group container-fluid">
                <label for="password_confirmation">Xác nhận mật khẩu</label>

                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password" />

                    
                @error('password_confirm')
                <small id="passwordHelpBlock" class="form-text text-danger">
                    Mật khẩu không khớp.
                </small>
            @enderror
            </div>

            <div class="form-group container-fluid">
                <button style="cursor:pointer" class="btn btn-info btn-outline-info" type="submit">
                    Đăng ký
                </button>
            </div>

            <div class="form-group container-fluid">
               
                <a href="{{ route('login') }}">
                    <small id="passwordHelpBlock" class="form-text">
                        Bạn đã có tài khoản?
                    </small>
                </a>
            
        </div>
        </form>
    </div>
</body>

</html>
