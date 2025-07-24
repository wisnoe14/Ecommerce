<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Toko Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://plus.unsplash.com/premium_photo-1678449464118-75786d816fac?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-box {
            background-color: rgba(255, 255, 255, 0.92);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h3 {
            font-weight: bold;
            color: #e84393; /* Pink soft */
        }

        .form-control:focus {
            border-color: #e84393;
            box-shadow: none;
        }

        .btn-success {
            background-color: #e84393;
            border: none;
        }

        .btn-success:hover {
            background-color: #d63384;
        }

        a {
            color: #e84393;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="register-box col-md-4">
        <h3 class="text-center mb-4">Register</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button class="btn btn-success w-100" type="submit">Register</button>
            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">Sudah punya akun? Login</a>
            </div>
        </form>
    </div>
</body>
</html>
