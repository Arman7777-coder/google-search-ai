<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="styles/sign-in-page.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap">
</head>
<body>

<main>
    <nav>
        <div id="header-img">
            <img src="static/images/logo.png" alt="">
        </div>
        <div class="nav-container">
            <a href="{{route('login')}}" class="sign-in">Sign in</a>
            <a href="{{route('register')}}" class="sign-up">Sign up</a>
        </div>
    </nav>

    <div class="form-container">
        <h1>Welcome!</h1>
        <p class="subtitle">Please enter your credentials to access your account.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="email">Name</label>
                <input
                    type="text"
                    id="email"
                    placeholder="Enter your name here"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                />
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    placeholder="Enter your email here"
                    name="email" value="{{ old('email') }}" required autocomplete="email"
                />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Enter your password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Enter your password"
                    name="password_confirmation" required autocomplete="new-password"
                />
            </div>
            <button type="submit" class="btn-submit">Sign In Now</button>
        </form>

        <p class="sign-in-redirect">
            Have an account? <a href="{{route('login')}}">Sign In here!</a>
        </p>
    </div>
</main>
</body>
</html>
