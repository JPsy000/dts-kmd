<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Document Tracking System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #333;
        }

        /* Header */
        header {
            background: #004a99;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.5rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Banner Section */
        .banner {
            background: linear-gradient(to right, rgba(0, 115, 230, 0.7), rgba(0, 198, 255, 0.7)),
                url('https://via.placeholder.com/1600x500/0073e6/ffffff?text=Welcome+to+Document+Tracking+System');
            background-size: cover;
            background-position: center;
            height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0 20px;
        }

        .banner h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
        }

        .banner p {
            font-size: 1.2rem;
            max-width: 700px;
        }

        /* Welcome Section */
        .welcome {
            text-align: center;
            padding: 50px 20px;
        }

        .welcome h3 {
            font-size: 2rem;
            color: #0073e6;
            margin-bottom: 20px;
        }

        .welcome p {
            max-width: 700px;
            margin: auto;
            line-height: 1.6;
        }

        footer {
            background: #004a99;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>Document Tracking System</h1>
        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- Banner -->
    <div class="banner">
        <h2>Welcome to the Document Tracking System</h2>
        <p>Track, manage, and secure your documents seamlessly with our powerful system.</p>
    </div>

    <!-- Welcome Section -->
    <section class="welcome">
        @if (Route::has('login'))
            @auth
                <h3>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h3>
            @else
                <a href="{{ route('register') }}"><h3>Get Started</h3><a href="{{ route('register') }}"></a>
                <p>
                    Use the navigation above to login if you already have an account,
                    or register to create a new one. Our system ensures document accountability,
                    security, and efficiency at every step.
                </p>
            @endauth
        @endif
    </section>

    <!-- Footer -->
    <footer>
        &copy; 2025 Document Tracking System | All Rights Reserved
    </footer>

</body>

</html>
