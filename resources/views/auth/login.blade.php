<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - SMK Al-Falah</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f1df;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #550B18;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: #F2E5C5;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #F2E5C5;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #F2E5C5;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
            border: none;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        .login-button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: #F2E5C5;
            color: #550B18;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-button:hover {
            background: white;
        }

        .error {
            background: #ffdede;
            color: #a00000;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #F2E5C5;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="login-header">
            <h1>ADMIN</h1>
            <p>SMK AL-FALAH TANJUNGJAYA</p>
        </div>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    required
                >
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                Login
            </button>

        </form>

        <a href="{{ route('beranda') }}" class="back-link">
            ← Kembali ke Website
        </a>

    </div>

</div>

</body>
</html>