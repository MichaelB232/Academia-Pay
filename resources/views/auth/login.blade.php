{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Yayasan Pelita Doktora</title>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background:
                linear-gradient(135deg,
                    rgba(16, 185, 129, 0.95),
                    rgba(132, 204, 22, 0.85),
                    rgba(234, 179, 8, 0.80));
            overflow: hidden;
            position: relative;
        }

        /* Background Blur Circle */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        body::before {
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.15);
            top: -80px;
            left: -80px;
        }

        body::after {
            width: 350px;
            height: 350px;
            background: rgba(255, 255, 255, 0.12);
            bottom: -120px;
            right: -100px;
        }

        .login-container {
            width: 420px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 24px;
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.18);
            position: relative;
            z-index: 1;
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand img {
            width: 70px;
            margin-bottom: 10px;
        }

        .brand h2 {
            font-size: 22px;
            color: #1f2937;
            font-weight: 700;
        }

        .brand p {
            font-size: 13px;
            color: #4b5563;
            margin-top: 5px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #111827;
        }

        .input-group input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            outline: none;
            background: rgba(255, 255, 255, 0.75);
            transition: 0.3s;
            font-size: 14px;
        }

        .input-group input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
            background: white;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #374151;
        }

        .remember input {
            accent-color: #10b981;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(to right, #10b981, #22c55e);
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.25);
        }

        .footer {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #4b5563;
        }

        .alert {
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
        }

        @media(max-width: 500px) {
            .login-container {
                width: 90%;
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="brand">
            {{-- Ganti dengan logo kamu --}}
            <img src="{{ asset('images/logo.png') }}" alt="Logo">

            <h2>Yayasan Pelita Doktora</h2>
            <p>Welcome back! Please login to your account.</p>
        </div>

        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="remember">
                <input type="checkbox" name="remember">
                <span>Remember Me</span>
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>

        <div class="footer">
            © {{ date('Y') }} Yayasan Pelita Doktora
        </div>

    </div>

</body>

</html>
