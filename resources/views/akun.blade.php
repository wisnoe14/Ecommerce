<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Akun Saya | Toko Parfum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            font-weight: bold;
            color: #6c5ce7;
        }
        .logout-btn {
            background-color: #ff7675;
            border: none;
        }
        .logout-btn:hover {
            background-color: #d63031;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">TokoParfum</a>
    </div>
</nav>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="profile-card col-md-6">
        <h3 class="profile-header mb-4">Profil Akun</h3>
        
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn logout-btn mt-3">Logout</button>
        </form>
    </div>
</div>

</body>
</html>
