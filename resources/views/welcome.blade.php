<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .welcome-container {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .welcome-container h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 1rem;
        }

        .welcome-container p {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .auth-links {
            margin-top: 1.5rem;
        }

        .auth-links a {
            margin: 0 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .auth-links a.btn-login {
            background-color: #007bff;
            color: white;
        }

        .auth-links a.btn-register {
            background-color: #28a745;
            color: white;
        }

        .auth-links a.btn-home {
            background-color: #6c757d;
            color: white;
        }

        .auth-links a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="antialiased">
    <div class="welcome-container">
        <h1>Welcome to Inventory & Sales Management System</h1>
        <p>Manage your system efficiently with our powerful tools.</p>

        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-home">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>