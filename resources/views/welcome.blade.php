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


    <section class="tech">
        <img src="static/images/image5.png" alt="BERT Model Diagram">
        <div>
            <h3>Our AI-Powered Plagiarism Detection Tool works using a BERT model!</h3>
            <p>Ensure the originality of your work with our cutting-edge AI technology that detects and highlights plagiarism with remarkable accuracy.</p>
            <a href="#" class="btn-secondary">Try Our Copy/Paste Detection Tool Today!</a>
            <a href="#" class="btn-primary">Get Started Now!</a>
        </div>
    </section>

<footer class="welcome-page-footer">
    <div class="footer-container">
        <div class="footer-column">
            <h4>Key Features</h4>
            <ul>
                <li><a href="#">Real-time Scanning</a></li>
                <li><a href="#">Comprehensive Reports</a></a></li>
                <li><a href="#">User-friendly Interface</a></li>
                <li><a href="#">Multiple Language Support</a></li>
                <li><a href="#">Advanced AI Technology</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Our Products</h4>
            <ul>
                <li><a href="#">Check Text Plagiarism using BERT model</a></li>
                <li><a href="#">Check source code Plagiarism</a></li>
                <li><a href="#">Image plagiarism checker</a></li>
                <li><a href="#">Plagiarism resources</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>About Us</h4>
            <ul>
                <li><a href="#">Our Mission</a></li>
                <li><a href="#">Meet the Team</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">News & Updates</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Follow Us</h4>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Github</a></li>
                <li><a href="#">YouTube</a></li>
            </ul>
        </div>
    </div>
        <div class="footer-bottom">
            <p>&copy; 2025 PlagiarismDetection. All Rights Reserved.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
</footer>
</body>
<!-- End welcome.html -->

</html>
