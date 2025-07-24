<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Toko Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://plus.unsplash.com/premium_photo-1719813777006-328e62f6e6d8?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h3 {
            font-weight: bold;
            color: #EC7FA9;
        }

        .form-control:focus {
            border-color: #EC7FA9;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #EC7FA9;
            border: none;
        }

        .btn-primary:hover {
            background-color: #BE5985;
        }

        a {
            color: #EC7FA9;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="login-box col-md-4">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100" type="submit">Login</button>
            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">Belum punya akun? Daftar</a>
            </div>
        </form>
    </div>
</body>
</html>
