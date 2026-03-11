<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Trung tâm pháp y tâm thần khu vực miền núi phía Bắc')</title>
    @vite(['resources/sass/admin.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h6 class="text-danger">{{ $message ?? '' }}</h6>
            <form action="{{ route('post.login') }}" method="POST" enctype="multipart/form-data" class="login-form">
                @csrf
                <input type="text" @class(['show-err' => !$errors->has('username')]) name="username" value="{{ old('username') }}"
                    placeholder="Tên đăng nhập..." />
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="password" @class(['show-err' => !$errors->has('password')]) name="password" placeholder="Mật khẩu..." />
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>

</html>
