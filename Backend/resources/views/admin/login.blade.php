<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <style>
        body {
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #242d6b 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="logo-container">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" alt="Logo Kreasimu">
        </div>

        <div class="login-container">
            <h1>Admin Panel</h1>
            <p>Masuk ke halaman administrasi</p>

        @if ($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit" class="btn-login">Masuk</button>
</form>

    </div>
</body>
</html>
