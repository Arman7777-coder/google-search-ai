<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Checker</title>
    <link rel="stylesheet" href="{{asset("styles/admin-panel.css")}}">
    <script defer src="{{asset("scripts/admin-panel.js")}}"></script>
    <script src="{{asset("https://kit.fontawesome.com/a076d05399.js")}}" crossorigin="anonymous"></script>
</head>
<body>
<nav>
    <div>
        <img src="{{asset("static/images/logo.png")}}" alt="">
    </div>
    <div>
        <button id="lightMode" class="toggle-btn active">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
        </button>
        <button id="darkMode" class="toggle-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
            </svg>
        </button>
    </div>
    <div class="navbar">
        <!-- Notification Bell -->
        <div class="notification">
            <span class="bell" id="bell">
 <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
</svg>
            </span>
            <span class="badge"></span>
        </div>

        <!-- Profile Section -->
        <div class="profile-container">
            <img src="{{asset("static/images/profile.jpg")}}" alt="User" class="profile-pic" id="profilePic">
            <span class="status-indicator"></span>
            <div class="dropdown" id="dropdown">
                <p class="username">John Doe</p>
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" onclick="document.getElementById('logout-form').submit();" class="logout-btn">
                    Logout
                </a>

            </div>
        </div>

        <!-- Arrow -->
        <span class="arrow" id="arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
        </span>
    </div>
</nav>
<main>
    <div id="left-menu">
        <div class="left-menu-element">Home</div>
        <div class="left-menu-element">Check plagiarism </div>
        <div class="left-menu-element">Check plagiarism
            with search API</div>
        <div class="left-menu-element">Text compare</div>
        <div class="left-menu-element">Chat-bot</div>
    </div>
    <!-- Content -->
    <div class="content" id="content">
        <div id="home" class="content-div">This is Home</div>
        <div id="check-plagiarism" class="content-div" style="display: none;">Check plagiarism page content</div>
        <div id="search-api" class="content-div" style="display: none;">Check plagiarism using Search API</div>
        <div id="text-compare" class="content-div" style="display: none;">Compare texts for similarity</div>
        <div id="chatbot" class="content-div" style="display: none;">Welcome to the Chatbot</div>
    </div>
</main>
</body>
</html>
