<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
     <!--Coat of arms taken from trinidadexpress and adjusted for better quality through Adobe photoshop
    https://trinidadexpress.com/news/local/proud-moment-as-new-look-coat-of-arms-unveiled/article_cb95ade6-d6d3-11ef-a414-8b6d4118897d.html -->


   <!-- Horizontal bar sample taken from W3Schools, and adjusted according to insert the logo and profile icon:
   CSS Horizontal Navigation Bar: https://www.w3schools.com/css/css_navbar_horizontal.asp#gsc.tab=0&gsc.q=increase%20size%20of%20input%20box%20css -->
    <nav class="navbar">

        <ul class="Navigation">
           <li><img class ="navbar-logo" src ="IMGS/LOGO/Navbar-Logo.png" alt=""></li> 
            <li class="nav-option" ><a class ="nav-links" href="Index.php">Home</a></li>
            <li class="nav-option"><a class ="nav-links" href="HTML/About.html">About</a></li>
            <li class="nav-option"><a class ="nav-links" href="PHP/EssayList.php">Essays</a></li>
            <li class="nav-option"><a class ="nav-links" href="HTML/Contact.html">Contact</a></li>
        </ul>
    
        <div class="profile-dropdown">
            <div class="profile-icon"><img src="IMGS/Profile-pictures/avatar1.png" alt="profile photo of users choice"></div>
            <div class="profile-selection">
                <a class="profile-options">Profile</a>
                <a class="profile-options" href="">Preference</a>
                <a class="profile-options" href="">Logout</a>
            </div>
        </div>
        </nav>

        <form class="login-form">

            <div class = "user-type">
            <button class="user" type="button">Student</button>
            <button class="user" type="button">Instructor</button>
        </div>
        
        <div class="credentials">
            <input class="login-info" type="text" id="username" name="username" size = "30" placeholder="username">
            <input class="login-info" type="password" id="password" name="password" size = "30" placeholder="password">
        </div>
        
        <div class="remember-me">
            <input class="rem-checkbox" type="checkbox" id="remember-me">
            <label class="rem-text" for="remember-me">Remember me</label>
        </div>
        
            

        <a href="HTML/Login.html" class="login-btn">Login</a>
        <a class="forgot-psw" href="">Forgot your password?</a>

        <p class = "register" >Don't have an account yet?<a href="HTML/Register.html" class="register-link"> Register</a></p>
        
        </form>
        
        

        <img class = "logo" src="IMGS/LOGO/Logo.png" alt="Ministry Of education Logo">
        
        
        <p class="short-intro">BrightMinds<br><span>The bright minds of our next generation</span></p>
        <!-- Essays taken from essay page and uses same CSS as the essay page -->
        <h2 class="featured-list">Featured Essays</h2>   

        <div class="top-essays">

            <div class="essay">
                <p class="essay-info">Student name: <span>Bruce Charles</span></p>
                <p class="essay-info">Essay name: <span>Balanced Diet</span></p>
                <p class="essay-info">Date: <span>3rd January 2024</span></p>
                <p class="essay-info">Essay Rating: <span>10/10</span></p>
        
                <button class="view-essay" title="view-essay" onclick="location.href='HTML/Essays/Balanced-Diet.html'">View</button>	
        </div>
        
            <div class="essay">
                <p class="essay-info">Student name: <span>Jenny Ally</span></p>
                <p class="essay-info">Essay name: <span>Christmas</span></p>
                <p class="essay-info">Date: <span>5th October 2024</span></p>
                <p class="essay-info">Essay Rating: <span>10/10</span></p>
        
                <button class="view-essay" title="view-essay" onclick="location.href='HTML/Essays/Christmas.html'">View</button>	
            </div>
        
            <div class="essay">
                <p class="essay-info">Student name: <span>Christian teal</span></p>
                <p class="essay-info">Essay name: <span>Co-Education</span></p>
                <p class="essay-info">Date: <span>25th February 2024</span></p>
                <p class="essay-info">Essay Rating: <span>9/10</span></p>
        
                <button class="view-essay" title="view-essay" onclick="location.href='HTML/Essays/Co-Education.html'">View</button>	
                </div>
        </div>
</body>
</html>