<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Detector</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body class="welcome-page">
    <header>
        <nav>
            <div class="logo"><img src="static/images/logo.png" alt="Plagiarism logo"></div>
            <ul>
                <li><a href="{{route('login')}}">Sign in</a></li>
                <li><a href="{{route('register')}}" class="btn">Sign up</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="title-wrapper">
            <h1>Your Free<br>Plagiarism<br>Detector</h1>
            <p>This is an AI powered free app which is developed for detecting plagiarism.</p>
            <a href="#" class="btn-primary">Start exploring ➔</a>
            <div class="underline"> <img src="static/images/pointdoodle.png" alt="" > </div>
        </div>
        <div class="hero-image">
            <img src="static/images/image1.png" alt="Original vs Plagiarism Text Comparison">
        </div>
    </section>

   <section class="features">
    <div class="background-wrapper">
        <div class="feature_img">
            <div class="feature">
                <img src="static/images/image2.png" alt="Icon 1">
            </div>
            <div class="feature">
                <img src="static/images/image3.png" alt="Icon 2">
            </div>
            <div class="feature">
                <img src="static/images/image4.png" alt="Icon 3">
            </div>
        </div>

                <div class="description">
                    <h3>How does our AI plagiarism checker work?</h3>
                    <p>Our AI-powered plagiarism checker is the most advanced tool with a large database to detect plagiarism in your text.</p>
                </div>
            </div>
    </section>


@include('layouts.footer')
</body>
<!-- End welcome.html -->

</html>
