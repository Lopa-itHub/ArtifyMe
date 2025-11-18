<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{name}} - Portfolio</title>

    <link rel="stylesheet" href="template1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>
<body>

<div id="portfolio-container">

    <div class="header">
        <img src="./images/profile.jpg" alt="profile" class="profile-img">
        <h1>{{name}}</h1>
        <h3>{{title}}</h3>
    </div>

    <div class="section">
        <h2>About Me</h2>
        <p>{{about}}</p>
    </div>

    <div class="section">
        <h2>Skills</h2>
        <ul>
            {{skills_list}}
            <!-- Example replaced output:
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            -->
        </ul>
    </div>

    <div class="section">
        <h2>Projects</h2>
        <div class="project-box">
            <h3>{{project1_title}}</h3>
            <p>{{project1_desc}}</p>
        </div>
    </div>

</div>

<!-- Download Button (your app can show this) -->
<button id="download-btn">Download as PDF</button>

<script src="template1.js"></script>
</body>
</html>
