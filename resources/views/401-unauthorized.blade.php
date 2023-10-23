<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

    401 Unauthorized

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
    <h1 class="text-danger"><b>Quyền truy cập bị từ chối.</b></h1>
    <div>
        <h2>Bạn không có đủ quyền để truy cập trang này!</h2>
    </div>
    <br>
    <div>
        <img src="images/banned.png" height="25%" width="25%">
    </div>
</body>

</html>
