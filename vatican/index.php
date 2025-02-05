<?php
// Start the session
/*session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: signin.php");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="29.jpg>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
    <script src="script.js"></script>
    <!-- <script src="darkmode.js"></script> -->
</head>
<body>
    <h1>Vatican Cake Point</h1>
    <div class="dark-mode-switch">
        <input type="checkbox" id="dark-mode-toggle" aria-label="Dark Mode Toggle">
        <label for="dark-mode-toggle" class="switch-label"></label>
    </div>

    <!-- <script>
       
        const toggle = document.getElementById('dark-mode-toggle');
        const body = document.body;

        
        if (localStorage.getItem('dark-mode') === 'true') {
            body.classList.add('dark-mode');
            toggle.checked = true;
        }

        
        toggle.addEventListener('change', () => {
            body.classList.toggle('dark-mode');
            localStorage.setItem('dark-mode', toggle.checked);
        });
    </script> -->

    <div id="chat-container">
        <div id="chat-box">
           
        </div>
        <div id="chat-input">
            <input type="text" id="chat-message" placeholder="Type your message..." />
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    
   
    <script src="chat.js"></script>
    <script src="darkmode.js"></script>


    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="service.html">Service</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="gallarey.html">Gallery</a></li>
        </ul>
    </nav>

    
    <div class="slider">
        <div class="slides">
            <div class="slide"><img src="1.jpg" alt="Image 1"></div>
            <div class="slide"><img src="2.jpg" alt="Image 2"></div>
            <div class="slide"><img src="3.jpg" alt="Image 3"></div>
            <div class="slide"><img src="4.jpg" alt="Image 4"></div>
            <div class="slide"><img src="5.jpg" alt="Image 5"></div>
            <div class="slide"><img src="6.jpg" alt="Image 6"></div>
            <div class="slide"><img src="7.jpg" alt="Image 7"></div>
            <div class="slide"><img src="8.jpg" alt="Image 8"></div>
            <div class="slide"><img src="9.jpg" alt="Image 9"></div>
            <div class="slide"><img src="10.jpg" alt="Image 10"></div>
        </div>
    </div>


    
    <footer>
        <ul>
            <li><a href="https://wa.me/0701224919"> <img src="whats.png" height="50px" width="50px"></a></li>
            <li><a href="mailto:mwangimwangifrancis94@gmail.com"> <img src="gmail.png" height="50px" width="50px"></a></li>
            <li><a href="https://instagram.com/cecil_mwangi3"> <img src="ig.png" height="50px" width="50px"></a></li>
            <li><a href="https://twitter.com/f9_cecil"> <img src="x.png" height="50px" width="50px"></a></li>
            <li><a href="https://facebook.com/isaac mwangi"> <img src="fb.png" height="50px" width="50px"></a></li>
        </ul>
    </footer>
</body>
</html>
