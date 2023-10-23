<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

    Tài khoản bị đình chỉ

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
    <h1 class="text-danger"><b>Tài khoản này đang bị đình chỉ hoạt động!</b></h1>
    <div>
        <h2>Bạn không thể sử dụng tài khoản đang bị đình chỉ này!</h2>
    </div>
    <br>
    <div>
        <img src="images/banned.png" height="25%" width="25%">
    </div>
    <br>
    <h2>Vui lòng liên hệ Admin để được giải đáp!</h2>

    {{-- <form method="POST" action="{{ route('logout') }}" style="text-align:center ">
        @csrf

        <div>
        <h2><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
        this.closest('form').submit();"
            class="text-danger">
            Đăng xuất
        </a></h2>
    </div>
    </form> --}}

</body>

</html>
