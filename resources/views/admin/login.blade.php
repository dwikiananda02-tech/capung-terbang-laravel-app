<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | CapungTerbang.id</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/capung-terbang.ico') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --dark-bg: #0b0f19;
            --dark-card: #151c2c;
            --cyan: #00f2fe;
            --blue: #4facfe;
            --text: #f3f4f6;
            --muted: #9ca3af;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(
                    circle at top left,
                    rgba(0, 242, 254, 0.10),
                    transparent 35%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(79, 172, 254, 0.10),
                    transparent 35%
                ),
                var(--dark-bg);

            color: var(--text);
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
            overflow: hidden;
        }

        /* Background Glow */
        body::before {
            content: "";
            position: fixed;
            width: 350px;
            height: 350px;

            background: rgba(0, 242, 254, 0.08);
            border-radius: 50%;

            filter: blur(100px);

            top: -100px;
            left: -100px;

            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 350px;
            height: 350px;

            background: rgba(79, 172, 254, 0.08);
            border-radius: 50%;

            filter: blur(100px);

            bottom: -100px;
            right: -100px;

            pointer-events: none;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            padding: 20px;

            position: relative;
            z-index: 2;
        }

        .login-card {
            background: rgba(21, 28, 44, 0.78);

            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 24px;

            padding: 40px 35px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.45),
                inset 0 1px 0 rgba(255, 255, 255, 0.04);

            transition: 0.3s ease;
        }

        .login-card:hover {
            border-color: rgba(0, 242, 254, 0.25);

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.5),
                0 0 35px rgba(0, 242, 254, 0.08);
        }

        /* Logo */
        .logo-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 70px;
            height: 70px;

            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
            color: white;

            background: linear-gradient(
                135deg,
                #00f2fe 0%,
                #4facfe 100%
            );

            box-shadow:
                0 0 25px rgba(0, 242, 254, 0.35);

            transform: rotate(-3deg);
        }

        .brand {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .brand span {
            background: linear-gradient(
                135deg,
                #00f2fe 0%,
                #4facfe 100%
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-title {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            margin-top: 25px;
            margin-bottom: 8px;
        }

        .login-description {
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* Alert */
        .alert {
            background: rgba(220, 38, 38, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.25);

            color: #fca5a5;

            padding: 13px 15px;
            border-radius: 12px;

            margin-bottom: 20px;

            font-size: 13px;

            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;
            font-weight: 600;

            color: #d1d5db;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: #6b7280;

            font-size: 15px;

            pointer-events: none;

            transition: 0.3s ease;
        }

        .form-group input {
            width: 100%;

            padding: 14px 15px 14px 45px;

            background: rgba(11, 15, 25, 0.75);

            color: white;

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 12px;

            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;

            outline: none;

            transition: 0.3s ease;
        }

        .form-group input::placeholder {
            color: #6b7280;
        }

        .form-group input:focus {
            border-color: var(--cyan);

            box-shadow:
                0 0 0 3px rgba(0, 242, 254, 0.08),
                0 0 20px rgba(0, 242, 254, 0.08);
        }

        .form-group input:focus + .input-icon {
            color: var(--cyan);
        }

        .error {
            color: #f87171;
            font-size: 12px;
            margin-top: 7px;
        }

        /* Button */
        .btn-login {
            width: 100%;

            padding: 14px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(
                135deg,
                #00f2fe 0%,
                #4facfe 100%
            );

            color: white;

            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            box-shadow:
                0 0 20px rgba(0, 242, 254, 0.20);

            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);

            box-shadow:
                0 0 30px rgba(0, 242, 254, 0.40);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .footer-text {
            text-align: center;

            margin-top: 25px;

            color: #6b7280;

            font-size: 11px;
        }

        .footer-text i {
            color: var(--cyan);
            margin-right: 5px;
        }

        /* Responsive */
        @media (max-width: 480px) {

            .login-container {
                padding: 15px;
            }

            .login-card {
                padding: 30px 22px;
                border-radius: 20px;
            }

            .brand {
                font-size: 21px;
            }

            .login-title {
                font-size: 18px;
            }

        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <!-- Logo -->
        <div class="logo-wrapper">
            <div class="logo">
                <i class="fas fa-helicopter"></i>
            </div>
        </div>

        <!-- Brand -->
        <div class="brand">
            CapungTerbang<span>.id</span>
        </div>

        <h2 class="login-title">
            Login Admin
        </h2>

        <p class="login-description">
            Masuk ke panel administrasi CapungTerbang.id
        </p>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert">
                <i class="fas fa-circle-exclamation"></i>

                <span>
                    {{ $errors->first() }}
                </span>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <!-- Username -->
            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <div class="input-wrapper">

                    <input
                        type="text"
                        id="username"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan username"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    <i class="fas fa-user input-icon"></i>

                </div>

                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Password -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >

                    <i class="fas fa-lock input-icon"></i>

                </div>

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Login Button -->
            <button type="submit" class="btn-login">

                <i class="fas fa-right-to-bracket"></i>

                Masuk ke Dashboard

            </button>

        </form>

        <div class="footer-text">

            <i class="fas fa-shield-halved"></i>

            Admin Area • CapungTerbang.id

        </div>

    </div>

</div>

</body>
</html>