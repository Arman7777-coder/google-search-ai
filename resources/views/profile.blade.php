<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Checker</title>
    <link rel="stylesheet" href="{{asset("styles/admin-panel.css")}}">\
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
{{--    <link rel="stylesheet" href="{{asset("styles/style.css")}}">--}}
    <script defer src="{{asset("scripts/admin-panel.js")}}"></script>
    <script src="{{asset("https://kit.fontawesome.com/a076d05399.js")}}" crossorigin="anonymous"></script>
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
</head>
<body>

<nav id="nav">
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
{{--                <p class="username">{{$user->name}}</p>--}}
                <p class="username">AAA</p>

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
        <div class="left-menu-element"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
            </svg> Home</div>
        <div class="left-menu-element"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z"/>
            </svg>Check plagiarism </div>
        <div class="left-menu-element"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-file-earmark-code-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M6.646 7.646a.5.5 0 1 1 .708.708L5.707 10l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708zm2.708 0 2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 10 8.646 8.354a.5.5 0 1 1 .708-.708"/>
            </svg>Check plagiarism
            in code</div>
        <div class="left-menu-element"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-textarea-t" viewBox="0 0 16 16">
                <path d="M1.5 2.5A1.5 1.5 0 0 1 3 1h10a1.5 1.5 0 0 1 1.5 1.5v3.563a2 2 0 0 1 0 3.874V13.5A1.5 1.5 0 0 1 13 15H3a1.5 1.5 0 0 1-1.5-1.5V9.937a2 2 0 0 1 0-3.874zm1 3.563a2 2 0 0 1 0 3.874V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V9.937a2 2 0 0 1 0-3.874V2.5A.5.5 0 0 0 13 2H3a.5.5 0 0 0-.5.5zM2 7a1 1 0 1 0 0 2 1 1 0 0 0 0-2m12 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                <path d="M11.434 4H4.566L4.5 5.994h.386c.21-1.252.612-1.446 2.173-1.495l.343-.011v6.343c0 .537-.116.665-1.049.748V12h3.294v-.421c-.938-.083-1.054-.21-1.054-.748V4.488l.348.01c1.56.05 1.963.244 2.173 1.496h.386z"/>
            </svg>Text compare</div>
{{--        <div class="left-menu-element">Chat-bot</div>--}}
    </div>
    <!-- Content -->
    <div class="content" id="content">
        <div id="home" class="content-div">
            <div class="checker-container">
                <div class="checker-intro">
                    <h1>
                        <span class="highlight">Ensure every word</span> is your <span class="highlight">OWN</span><br>
                        with our <span class="highlight-alt">AI-powered plagiarism checker</span>,<br>
                        which uses <span class="highlight">advanced AI models</span> to detect plagiarism in your text.
                    </h1>
                    <p><strong>Step 1:</strong> Add your text or upload a file.</p>
                    <p><strong>Step 2:</strong> Click to scan for plagiarism.</p>
                    <p><strong>Step 3:</strong> Review the results for instances of potential plagiarism.</p>
                    <button class="get-started-btn">Get started</button>
                </div>

                <div class="checker-image">
                    <img src="{{asset('static/images/reportimg.png')}}" alt="Plagiarism report preview" />
                </div>
            </div>

            <div class="features-section">
                <h2><span class="highlight">Powerful</span> Features</h2>
                <p>Here is a list of few competitive features that give it an edge over alternative solutions.</p>
                <div class="features-home">
                    <div class="card-container">
                        <div class="card">
                            <div class="icon-container">
                                <i class="material-icons">description</i>
                            </div>
                            <h2 class="title">Multiple File Formats</h2>
                            <p class="description">
                                Our product is designed to examine most popular file formats, including Microsoft Word Documents, TXT, PDF etc.
                            </p>
                        </div>
                    </div>
                    <div class="card-container">
                        <div class="card">
                            <div class="icon-container">
                                <i class="material-icons">translate</i>
                            </div>
                            <h2 class="title">Supported 103+ Languages</h2>
                            <p class="description">
                                No more language barriers for international users as the app is available in English, Armenian, French, German, Italian and understands 103+ languages.
                            </p>
                        </div>
                    </div>
                    <div class="card-container">
                        <div class="card">
                            <div class="icon-container">
                                <i class="material-icons">model_training</i>
                            </div>
                            <h2 class="title">Integrated different AI models and APIs</h2>
                            <p class="description">
                                Our platform integrates a variety of advanced AI and ML models, along with powerful APIs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="use-cases-section">
                <h2>Endless Possibilities, Limitless Use Cases.</h2>
                <div class="use-cases">
                    <button class="active">Students</button>
                    <button>Teachers</button>
                    <button>Writers & Journalists</button>
                    <button>Researchers</button>
                    <button>Content creators</button>
                </div>
            </div>

            <h2 class="how-it-works">How it works?</h2>

            @include('layouts.footer')
        </div>

        <div id="check-plagiarism" class="content-div" style="display: none;">
            <div class="loading-overlay" id="loadingOverlay">
                <div class="loader"></div>
            </div>
            <div class="header">
                <h1>FREE Plagiarism detection tool</h1>
            </div>
            <div class="container">
                <div class="upload-section">
                    <button class="upload-btn" id="uploadBtn">Upload/Paste Text</button>
                    <span class="arrow">→</span>
                    <button class="report-btn" id="reportBtn">Get Plagiarism report</button>
                </div>

                <div class="input-container" id="inputContainer">
                    <div class="placeholder-text" id="placeholderText">
                        <p class="big-text">Enter text here...</p>
                        <p>OR</p>
                        <p class="upload-text" id="uploadFile">upload file</p>
                        <p class="small-text">to check plagiarism</p>
                    </div>
                    <textarea class="text-input" id="textInput" placeholder="Enter text here to check plagiarism..."></textarea>
                    <input type="file" id="fileInput" accept=".pdf,.doc,.docx,.txt" style="display: none;">
                    <div class="bottom-actions">
                        <div>
                            <button class="icon-btn" id="clipboardBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                    <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z"/>
                                </svg></button>
                            <button class="icon-btn" id="uploadIconBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                                </svg></button>
                        </div>
                        <button class="scan-btn" id="scanBtn">Scan</button>
                    </div>
                </div>

                <div class="results-container" id="resultsContainer">
                    <div class="results-layout">
                        <div class="content-section">
                            <h2 class="title" id="contentTitle">The Human Code: Stories of Ethical AI and Its Importance</h2>
                            <div class="document-text">
                                <p class="intro-text">AI is shaping our world in ways we never imagined, but with great power comes great responsibility. This book presents a collection of short stories that highlight the ethical challenges and importance of human-centered AI. Each tale delves into real-world dilemmas—bias, privacy, autonomy, and the delicate balance between innovation and ethics.</p>

                                <p class="story-paragraph">Lena, a talented software engineer, develops an AI hiring system for a major tech company. Excited about her innovation, she soon discovers that the AI is disproportionately rejecting women and minorities due to biased training data. Faced with a moral dilemma, she must decide whether to speak up and risk her job or ignore the flaw to meet corporate deadlines.</p>

                                <p class="story-paragraph">Lena, a talented software engineer, develops an AI hiring system for a major tech company. Excited about her innovation, she soon discovers that the AI is <span class="highlighted">disproportionately rejecting women and minorities due to biased training data. Faced with a moral dilemma, she must decide whether to speak up and risk her job or ignore the flaw to meet corporate deadlines.</span></p>

                                <p class="story-paragraph">Lena, a talented software engineer, develops an AI hiring system for a major tech company. Excited about her innovation, she soon discovers that the AI is disproportionately rejecting women and minorities due to biased training data. Faced with a moral dilemma, she must decide whether to speak up and risk her job or ignore the flaw to meet corporate deadlines.</p>
                            </div>
                            <div class="bottom-actions">
                                <button class="scan-btn">Scan</button>
                            </div>
                        </div>

                        <div class="report-section">
                            <div class="report-tabs">
                                <button class="tab-btn" id="googleSearchBtn">Search on Google</button>
                                <button class="tab-btn" id="plagiarismReportBtn">Plagiarism Report</button>
                            </div>

                            <div class="report-content" id="plagiarismReportContent">
                                <h3 class="result-label">Most Similar Results</h3>
                                <div class="percentage-circle">
                                    <div class="circle">
                                        <div class="inner-circle">
                                            <span class="percentage">97%</span>
                                            <span class="percentage-label">Plagiarized</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="similarity-item">
                                    <p>Title: Long-acting reversible contraception</p>
                                    <p>Similarity: <span class="similarity-percentage">96.79%</span></p>
                                    <p>Plagiarized: No</p>
                                    <p>Source: <a href="#" class="source-link">Wikipedia</a></p>
                                </div>

                                <h3 class="result-label">Top 5 Similar Results</h3>
                                <div class="result-list">
                                    <div class="result-item">
                                        <p class="result-title">DOCUMENT 1 TITLE: BIOLOGICS FOR IMMUNOSUPPRESSION</p>
                                        <p class="result-similarity">SIMILARITY: 87.59%</p>
                                        <p class="result-source">SOURCE: WIKIPEDIA</p>
                                    </div>

                                    <div class="result-item">
                                        <p class="result-title">DOCUMENT 2 TITLE: ANTI-AGING SUPPLEMENTS</p>
                                        <p class="result-similarity">SIMILARITY: 52.45%</p>
                                        <p class="result-source">SOURCE: WIKIPEDIA</p>
                                    </div>

                                    <div class="result-item">
                                        <p class="result-title">DOCUMENT 3 TITLE: ANTIHYPERTENSIVE DRUG</p>
                                        <p class="result-similarity">SIMILARITY: 25.25%</p>
                                        <p class="result-source">SOURCE: WIKIPEDIA</p>
                                    </div>
                                </div>
                            </div>

                            <div class="report-content google-report" id="googleReportContent">
                                <h3 class="result-label">Google Search API Report</h3>

                                <div class="input-analysis">
                                    <h4 class="analysis-title">Input Analysis</h4>
                                    <p class="analysis-text"><span class="red-dot"></span> The text is likely to be copied. Here are some sources where it was found:</p>
                                </div>

                                <div class="search-results">
                                    <h4 class="search-title">Search Results</h4>
                                    <ul>
                                        <li>
                                            <p><strong>TITLE: DEEPSEEK - WIKIPEDIA</strong></p>
                                            <p>LINK: <a href="#" class="source-link">WIKIPEDIA</a></p>
                                        </li>
                                        <li>
                                            <p><strong>TITLE: MEET DEEPSEEK: THE CHINESE START-UP THAT IS CHANGING HOW AI...</strong></p>
                                            <p>LINK: <a href="#" class="source-link">SCMP</a></p>
                                        </li>
                                        <li>
                                            <p><strong>TITLE: MEET DEEPSEEK: THE CHINESE START-UP THAT IDCHANGING HOW AI...</strong></p>
                                            <p>LINK: <a href="#" class="source-link">YAHOO</a></p>
                                        </li>
                                        <li>
                                            <p><strong>TITLE: LINKEDIN NEWS ON LINKEDIN: AI HAS BEEN A COMMON THREAD...</strong></p>
                                            <p>LINK: <a href="#" class="source-link">LINKEDIN</a></p>
                                        </li>
                                        <li>
                                            <p><strong>TITLE: HERE'S WHAT THE SELLSIDE IS SAYING ABOUT DEEPSEEK</strong></p>
                                            <p>LINK: <a href="#" class="source-link">CB INSIGHTS</a></p>
                                        </li>
                                        <li>
                                            <p><strong>TITLE: HOW TO RUN DEEPSEEK MODELS LOCALLY</strong></p>
                                            <p>LINK: <a href="#" class="source-link">CODINGMALL</a></p>
                                        </li>
                                        <li>
                                            <p><strong>TITLE: IS DEEPSEEK A GAME CHANGER IN THE AI FIELD?</strong></p>
                                            <p>LINK: <a href="#" class="source-link">QUORA</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="search-api" class="content-div" style="display: none;">
            <div class="container">
                <div class="header">
                    <h1>Code Similarity and Plagiarism Checker</h1>
                </div>


                <div class="main-content">
                    <div class="code-input">
                        <label class="input-label">Paste the source code you want to check for plagiarism:</label>
                        <div id="codeEditorContainer" class="code-editor-container">
                            <div class="editor-toolbar">
                                <span class="editor-title">Code</span>
                                <button id="themeToggle" class="theme-toggle" aria-label="Toggle dark/light mode">
                                    ☀️
                                </button>
                            </div>
                            <div class="line-numbers" id="lineNumbers"></div>
                            <div id="codeEditor" class="editor-area" contenteditable="true" spellcheck="false"></div>
                        </div>

                        <button id="checkButton" class="check-button">Check similarity</button>
                    </div>

                    <div class="report-section">
                        <div id="reportCard" class="report-card hidden">
                            <h2 class="report-title">Report</h2>

                            <div class="report-item">
                                <div class="report-label">Problem ID:</div>
                                <div class="report-value" id="problemId">p02577</div>
                            </div>

                            <div class="report-item">
                                <div class="report-label">Token Similarity:</div>
                                <div class="report-value" id="tokenSimilarity">0.56</div>
                            </div>

                            <div class="report-item">
                                <div class="report-label">Syntactic Similarity:</div>
                                <div class="report-value" id="syntacticSimilarity">0.97</div>
                            </div>

                            <div class="report-item">
                                <div class="report-label">Semantic Similarity:</div>
                                <div class="report-value" id="semanticSimilarity">0.99</div>
                            </div>

                            <div class="report-item">
                                <div class="report-label">Final Similarity Score:</div>
                                <div class="report-value" id="finalScore">0.56</div>
                            </div>

                            <div class="report-item">
                                <div class="report-label">Plagiarism Status:</div>
                                <div class="plagiarism-status not-plagiarized" id="plagiarismStatus">Not Plagiarized</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="text-compare" class="content-div" style="display: none;">
            <div class="main-container">
                <div class="header">
                    <h1>Compare texts together and find<br>similarity between them</h1>
                </div>

                <div class="content-wrapper">
                    <div class="input-section">
                        <div class="language-selector">
                            <select id="language-select">
                                <option value="">Choose a text language</option>
                                <option value="en">English</option>
                                <option value="hy">Armenian</option>
                                <option value="ru">Russian</option>
                                <option value="es">Spanish</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="it">Italian</option>
                                <option value="pt">Portuguese</option>
                                <option value="zh">Chinese</option>
                                <option value="ja">Japanese</option>
                                <option value="ar">Arabic</option>
                            </select>
                        </div>

                        <div class="text-container" id="text-container">
                            <div class="text-field">
                                <textarea placeholder="Enter text 1 here..."></textarea>
                            </div>
                            <div class="text-field">
                                <textarea placeholder="Enter text 2 here..."></textarea>
                            </div>
                        </div>

                        <div class="error-message" id="error-message">
                            You need at least two text documents to make a comparison.
                        </div>

                        <div class="controls">
                            <button class="add-button" id="add-button">+</button>
                            <button class="compare-button" id="compare-button">Compare</button>
                        </div>
                    </div>

                    <div class="report-section" id="report-section">
                        <div class="report-container">
                            <h1>Document Similarity Analysis Report</h1>
                            <div class="section">
                                <h2>TF-IDF Analysis Results</h2>
                                <table>
                                    <tr>
                                        <th>Document Pair</th>
                                        <th>Similarity (%)</th>
                                    </tr>
                                    <tr>
                                        <td>Document 1 vs Document 2</td>
                                        <td>49.99%</td>
                                    </tr>
                                    <tr id="tf-idf-1-3">
                                        <td>Document 1 vs Document 3</td>
                                        <td>25.90%</td>
                                    </tr>
                                    <tr id="tf-idf-2-3">
                                        <td>Document 2 vs Document 3</td>
                                        <td>29.12%</td>
                                    </tr>
                                </table>
                                <p class="highlight">Most similar pair: Document 1 and Document 2 (49.99%)</p>
                                <p class="highlight" id="least-similar-tf-idf">Least similar pair: Document 1 and Document 3 (25.90%)</p>

                                <h3>TF-IDF Document Uniqueness Scores</h3>
                                <ul>
                                    <li>Document 1: 62.06%</li>
                                    <li>Document 2: 60.44%</li>
                                    <li id="doc3-tf-idf">Document 3: 72.49%</li>
                                </ul>
                            </div>

                            <div class="section">
                                <h2>Semantic Analysis Results</h2>
                                <table>
                                    <tr>
                                        <th>Document Pair</th>
                                        <th>Similarity (%)</th>
                                    </tr>
                                    <tr>
                                        <td>Document 1 vs Document 2</td>
                                        <td>82.93%</td>
                                    </tr>
                                    <tr id="semantic-1-3">
                                        <td>Document 1 vs Document 3</td>
                                        <td>63.09%</td>
                                    </tr>
                                    <tr id="semantic-2-3">
                                        <td>Document 2 vs Document 3</td>
                                        <td>60.64%</td>
                                    </tr>
                                </table>
                                <p class="alert">*** POTENTIAL PLAGIARISM DETECTED between Document 1 and Document 2 (82.93%) ***</p>
                                <p class="highlight">Most similar pair: Document 1 and Document 2 (82.93%)</p>
                                <p class="highlight" id="least-similar-semantic">Least similar pair: Document 2 and Document 3 (60.64%)</p>

                                <h3>Semantic Document Uniqueness Scores</h3>
                                <ul>
                                    <li>Document 1: 26.99%</li>
                                    <li>Document 2: 28.22%</li>
                                    <li id="doc3-semantic">Document 3: 38.13%</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-icon">
            <img src="{{asset('static/images/chatbotlogo.png')}}" alt="Detto Icon">
        </div>

        <div class="chatbot-container">
            <div class="chatbot-header">
                <div class="chatbot-header-left">
                    <div class="chatbot-logo">
                        <img src="{{asset('static/images/chatbotlogo.png')}}" alt="Detto Logo">
                    </div>
                    <div>
                        <div class="chatbot-title">Assistant</div>
                        <div class="chatbot-online">Online</div>
                    </div>
                </div>
                <div class="chatbot-close">✕</div>
            </div>

            <div class="chatbot-content">
                <div class="message-bubble bot-message">
                    Hi there! I am Robert. I will be assisting you today.
                    <br>Do you need help?
                    <div class="bot-avatar">
                        <img src="{{asset('static/images/chatbotlogo.png')}}" alt="Robert Avatar">
                    </div>
                </div>
                <div class="option-buttons">
                    <button class="option-button">Yes</button>
                    <button class="option-button">No</button>
                </div>
            </div>

            <div class="chatbot-footer">
                <div class="chatbot-tools">
                    <div class="tool-button">
                        📋 <span>FAQs</span>
                    </div>
                </div>
                <div class="chatbot-input-container">
                    <input type="text" class="chatbot-input" placeholder="Type your message here...">
                    <div class="send-button">➤</div>
                </div>
            </div>
        </div>
    </div>

</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textInput = document.getElementById('textInput');
        const fileInput = document.getElementById('fileInput');
        const uploadBtn = document.getElementById('uploadBtn');
        const uploadFile = document.getElementById('uploadFile');
        const uploadIconBtn = document.getElementById('uploadIconBtn');
        const clipboardBtn = document.getElementById('clipboardBtn');
        const scanBtn = document.getElementById('scanBtn');
        const placeholderText = document.getElementById('placeholderText');
        const inputContainer = document.getElementById('inputContainer');
        const resultsContainer = document.getElementById('resultsContainer');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const googleSearchBtn = document.getElementById('googleSearchBtn');
        const plagiarismReportBtn = document.getElementById('plagiarismReportBtn');
        const plagiarismReportContent = document.getElementById('plagiarismReportContent');
        const googleSearchContent = document.getElementById('googleSearchContent');
        const googleReportContent = document.getElementById('googleReportContent');
        const contentTitle = document.getElementById('contentTitle');

        // Sample text for demonstration
        const sampleText = `The Human Code: Stories of Ethical AI and Its Importance

    AI is shaping our world in ways we never imagined, but with great power comes great responsibility. This book presents a collection of short stories that highlight the ethical challenges and importance of human-centered AI. Each tale delves into real-world dilemmas—bias, privacy, autonomy, and the delicate balance between innovation and ethics.

    Lena, a talented software engineer, develops an AI hiring system for a major tech company. Excited about her innovation, she soon discovers that the AI is disproportionately rejecting women and minorities due to biased training data. Faced with a moral dilemma, she must decide whether to speak up and risk her job or ignore the flaw to meet corporate deadlines.`;

        // Event handlers
        textInput.addEventListener('focus', () => {
            placeholderText.style.display = 'none';
        });

        textInput.addEventListener('blur', () => {
            if (textInput.value.trim() === '') {
                placeholderText.style.display = 'block';
            }
        });

        textInput.addEventListener('input', () => {
            if (textInput.value.trim() !== '') {
                placeholderText.style.display = 'none';
            } else {
                placeholderText.style.display = 'block';
            }
        });

        uploadFile.addEventListener('click', () => {
            fileInput.click();
        });

        uploadIconBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                placeholderText.style.display = 'none';
                textInput.value = sampleText;
            }
        });

        clipboardBtn.addEventListener('click', () => {
            fileInput.click();
        });

        scanBtn.addEventListener('click', () => {
            if (textInput.value.trim() === '') {
                alert('Please enter text or upload a file to check for plagiarism.');
                return;
            }

            loadingOverlay.style.display = 'flex';

            setTimeout(() => {
                loadingOverlay.style.display = 'none';
                inputContainer.style.display = 'none';
                resultsContainer.style.display = 'block';

                plagiarismReportBtn.classList.add('active');
                googleSearchBtn.classList.remove('active');
                plagiarismReportContent.style.display = 'block';
                googleReportContent.style.display = 'none';

                const lines = textInput.value.trim().split('\n');
                if (lines.length > 0 && lines[0].trim() !== '') {
                    contentTitle.textContent = lines[0].trim();
                }
            }, 2000);
        });

        googleSearchBtn.classList.add('active');
        if (googleSearchContent) googleSearchContent.style.display = 'block';
        plagiarismReportContent.style.display = 'none';

        plagiarismReportBtn.classList.add('active');
        googleSearchBtn.classList.remove('active');
        plagiarismReportContent.style.display = 'block';
        googleReportContent.style.display = 'none';

        googleSearchBtn.addEventListener('click', function() {
            googleSearchBtn.classList.add('active');
            plagiarismReportBtn.classList.remove('active');
            googleReportContent.style.display = 'block';
            plagiarismReportContent.style.display = 'none';
        });

        plagiarismReportBtn.addEventListener('click', function() {
            plagiarismReportBtn.classList.add('active');
            googleSearchBtn.classList.remove('active');
            plagiarismReportContent.style.display = 'block';
            googleReportContent.style.display = 'none';
        });

        googleSearchBtn.addEventListener('click', () => {
            // Show loading overlay
            loadingOverlay.style.display = 'flex';

            // Simulate processing time
            setTimeout(() => {
                loadingOverlay.style.display = 'none';
                plagiarismReportContent.style.display = 'none';
                googleReportContent.style.display = 'block';
            }, 1500);
        });

        plagiarismReportBtn.addEventListener('click', () => {
            plagiarismReportContent.style.display = 'block';
            googleReportContent.style.display = 'none';
        });

        // Initialize the interface
        window.addEventListener('load', () => {
            // Check if textInput already has content
            if (textInput.value.trim() !== '') {
                placeholderText.style.display = 'none';
            }
        });
        const container = document.getElementById('text-container');
        const addButton = document.getElementById('add-button');
        const compareButton = document.getElementById('compare-button');
        const errorMessage = document.getElementById('error-message');
        const reportSection = document.getElementById('report-section');

        // Elements that depend on document 3
        const tfIdf13 = document.getElementById('tf-idf-1-3');
        const tfIdf23 = document.getElementById('tf-idf-2-3');
        const semantic13 = document.getElementById('semantic-1-3');
        const semantic23 = document.getElementById('semantic-2-3');
        const doc3TfIdf = document.getElementById('doc3-tf-idf');
        const doc3Semantic = document.getElementById('doc3-semantic');
        const leastSimilarTfIdf = document.getElementById('least-similar-tf-idf');
        const leastSimilarSemantic = document.getElementById('least-similar-semantic');

        let textFieldCount = 2;

        // Add a new text field
        addButton.addEventListener('click', function() {
            textFieldCount++;
            const newTextField = document.createElement('div');
            newTextField.className = 'text-field';
            newTextField.innerHTML = `<textarea placeholder="Enter text ${textFieldCount} here..."></textarea>`;
            container.appendChild(newTextField);
        });

        // Compare button click handler
        compareButton.addEventListener('click', function() {
            const textFields = document.querySelectorAll('.text-field textarea');
            let filledFields = 0;

            // Count filled text fields
            textFields.forEach(field => {
                if (field.value.trim() !== '') {
                    filledFields++;
                }
            });

            // Show error if less than 2 fields are filled
            if (filledFields < 2) {
                errorMessage.style.display = 'block';
                reportSection.style.display = 'none';
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000); // Hide after 5 seconds
            } else {
                errorMessage.style.display = 'none';

                // Show or hide document 3 related elements based on the number of documents
                const showDoc3 = filledFields >= 3;

                tfIdf13.style.display = showDoc3 ? 'table-row' : 'none';
                tfIdf23.style.display = showDoc3 ? 'table-row' : 'none';
                semantic13.style.display = showDoc3 ? 'table-row' : 'none';
                semantic23.style.display = showDoc3 ? 'table-row' : 'none';
                doc3TfIdf.style.display = showDoc3 ? 'list-item' : 'none';
                doc3Semantic.style.display = showDoc3 ? 'list-item' : 'none';

                // Adjust "least similar" messages if doc3 is not present
                if (!showDoc3) {
                    leastSimilarTfIdf.textContent = "Least similar pair: Document 1 and Document 2 (49.99%)";
                    leastSimilarSemantic.textContent = "Least similar pair: Document 1 and Document 2 (82.93%)";
                } else {
                    leastSimilarTfIdf.textContent = "Least similar pair: Document 1 and Document 3 (25.90%)";
                    leastSimilarSemantic.textContent = "Least similar pair: Document 2 and Document 3 (60.64%)";
                }

                // Show the report section
                reportSection.style.display = 'block';

                // In a real application, this is where you would process the texts
                // and generate actual similarity scores
            }
        });
    });
</script>
</body>
</html>
