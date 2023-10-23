<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

        Đăng nhập

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
    <h2 class="text-info"><b>Đăng nhập</b></h2>
    <div class="container" style="width:40%"></div>
    <div class="container-fluid addtextdiv" style="width:20%;">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group container-fluid">
                {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}

                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" required
                    autofocus autocomplete="username">

            </div>

            <!-- Password -->
            <div class="form-group container-fluid">
                {{-- <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}

                <label for="password">Mật khẩu</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">

                @error('email')
                    <small id="passwordHelpBlock" class="form-text text-danger">
                        Sai email hoặc mật khẩu. Vui lòng thử lại.
                    </small>
                @enderror
            </div>

            {{-- <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="form-group container-fluid">
                <button style="cursor:pointer" class="btn btn-success btn-outline-success" type="submit">
                    Đăng nhập
                </button>
            </div>

            {{-- <div class="form-group container-fluid">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        <small id="passwordHelpBlock" class="form-text">
                            Bạn quên mật khẩu? 
                        </small>
                    </a>
                @endif
            </div> --}}

            <div class="form-group container-fluid">
               
                    <a href="{{ route('register') }}">
                        <small id="passwordHelpBlock" class="form-text">
                            Bạn chưa có tài khoản?
                        </small>
                    </a>
                
            </div>

        </form>
    </div>
    <div class="container" style="width:40%"></div>
</body>

</html>
