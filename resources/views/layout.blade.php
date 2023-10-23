<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')

        @section('title')
            Trang chủ
        @endsection

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

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <li class="{{ Route::currentRouteNamed('index') ? 'active' : '' }} text-center">

                        <a href="{{ route('index') }}">
                            <img src="images/house.png" height="15px" width="25px">
                            Home <span class="sr-only">(current)</span></a>
                    </li>

                    @if (!Auth::user())
                    @else
                        <li class="{{ Route::currentRouteNamed('index') ? 'active' : '' }} text-center">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Tính năng <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('add-document') }}">Tải lên tài liệu</a></li>
                                {{-- <li><a href="#">Something else here</a></li> --}}
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('user-documentlist') }}">Quản lý tài liệu của bạn</a></li>
                                {{-- <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li> --}}
                            </ul>
                        </li>
                    @endif

                    @auth
                        @if (Auth::user()->usertype == 'admin')
                            <li class="{{ Route::currentRouteNamed('index') ? 'active' : '' }} text-center">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Quản lý <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('documentlist') }}">Quản lý tài liệu</a></li>
                                    {{-- <li><a href="#">Something else here</a></li> --}}
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('userlist') }}">Quản lý người dùng</a></li>
                                    {{-- <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li> --}}
                                </ul>
                            </li>
                        @endif
                    @endauth
                </ul>

                <form class="navbar-form navbar-left" action="{{ route('searchdocs') }}" method="GET" role="search">
                    <!--search tab-->
                    <div class="form-group">
                        <input type="search" class="form-control"
                            placeholder="Tìm kiếm tài liệu (tên tài liệu hoặc loại tài liệu)"
                            style="width:400px !important" name="search" value="{{ Request::get('search') }}"
                            autocomplete="on">
                    </div>

                    <button type="submit" class="btn btn-success btn-outline-success">Tìm...</button>
                </form>

                @if (!Auth::user())
                    <ul class="nav navbar-nav navbar-right"> <!--dropdown tab-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Bạn chưa đăng nhập! <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('register') }}">Đăng ký</a></li>
                            </ul>
                        </li>
                    </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        @else
        <ul class="nav navbar-nav navbar-right"> <!--dropdown tab-->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Chào bạn {{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('profile.edit') }}">Thông tin tài khoản</a>
                    </li>
                    <li role="separator" class="divider"></li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="text-align:center ">
                            @csrf

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            this.closest('form').submit();"
                                class="text-danger">
                                Đăng xuất
                            </a>

                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @endif
    </nav>

    <div class="container-fluid">
        <hr>
        <!--vi tri noi dung cac trang su dung layout nay dat tai day-->
        @yield('content')
        <hr>
        <p class="footer">Copyright©
            <?php echo date('Y'); ?>
        </p>
    </div>

</body>

</html>
