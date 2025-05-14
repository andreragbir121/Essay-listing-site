<?php 
session_start();
    require_once 'PHP/dbase_connect.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: Index.php");;
}

$message = "";
if (isset($_SESSION['username'])) {
    $message = "<div>
    Welcome back, ".htmlspecialchars($_SESSION['fullName'])." 
        </div>";
}
?>

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
            <div class="profile-icon">
                <img src="<?php echo !empty($_SESSION['pfp']) ? $_SESSION['pfp'] : 'IMGS/Profile-pictures/avatar1.png'; ?>" alt="Profile">
            </div>
            <div class="profile-selection">
                <a class="profile-options">Profile</a>
                <a class="profile-options" href="">Preference</a>
                <?php if (isset($_SESSION['username'])) { 
                    echo '<a class="profile-options" href="?logout=1">Logout</a>';
                } else { 
                    echo '<a class="profile-options" href="#login">Login</a>';
                } ?>
                </div>
            </div>
    </nav>
        <?php

        // Login validations: 
		$username = $password = "";
		$usernameErr = $passwordErr = "";
        $userType = 'student';
		$valid = true;

		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {

        if (isset($_POST['userType'])) {
        if ($_POST['userType'] == 'student') {
            $userType = 'student';
        } else {
            $userType = 'instructor';
        }
    }

		if (empty($_POST["username"])) {
			$usernameErr = "username is required";
			$valid = false;
		}
		else {
			$username = $_POST["username"];
			$username = test_input($username);
		
			if (!preg_match("/^[a-zA-Z0-9_\-!@#$%^&*()+=.,;:]+$/", $username)) {
				$usernameErr = "username may only contain letters, numbers and special characters. No spaces";
				$valid = false;
			}
		}

		
    if (empty($_POST["password"])) {

	    $passwordErr = "password is required";
	    $valid = false;
    }
    else {
	    $password = $_POST["password"];
	    $password = test_input($password);
  
  }

		// $username = $_POST['username'];
		// $password = $_POST['password'];
			
        if ($valid) {
        if ($userType == 'student') {
            $query = "select * from student where username = '$username'";
        } else {
            $query = "select *from instructor where username = '$username'";
        }
    
		$result = null; 

		try{
            if (!empty($query)){
			$result = mysqli_query($conn, $query);
            }

        }catch(Exception $e){
			echo "there was an error with you login. Please try again";
		}
		
		if ($result){
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
                $login_success = password_verify($password, $row['password']);

				if ($login_success){
                    if ($login_success){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['fullName'] = $row['fullName'];
                        
                        if ($userType == 'student') {
                            $_SESSION['pfp'] = $row['pfp'];
                            $_SESSION['birthDate'] = $row['birthDate'];
                            $_SESSION['parentName'] = $row['parentName'];
                            $_SESSION['parentEmail'] = $row['parentEmail'];
                            $_SESSION['schoolName'] = $row['schoolName'];
                            $_SESSION['classLevel'] = $row['classLevel'];
                        
                        } else {
                            $_SESSION['pfp'] = $row['pfp'];
                            $_SESSION['instructorID'] = $row['instructorID'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['schoolName'] = $row['schoolName'];
                        }
					header("Location: Index.php"); //issues logging in so header was solution, user need to click login twice - https://stackoverflow.com/questions/39291500/redirecting-user-after-login-with-headerlocation-is-not-working
		        }
        else echo "Invalid Credentials. Please try again";
    }
    else echo "Invalid Credentials. Please Try again";
}
    }
}
}
    
  function test_input($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }		
        if (empty($message)) {
	?>

<form  class="login-form" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate()">

<!-- Code used to check if radio is seleccted: https://stackoverflow.com/questions/4554758/how-to-read-if-a-checkbox-is-checked-in-php -->
 <div class="userType">
        Student <input type="radio" name="userType" value="student" <?php echo ($userType == 'student') ? 'checked' : ''; ?>>
        Instructor <input type="radio" name="userType" value="instructor" <?php echo ($userType == 'instructor') ? 'checked' : ''; ?>>

    </div>

<div class="credentials">
<input  class="login-info" id="username" name="username" type="text" placeholder="username" value="<?php echo $username; ?>"/><br>
<span id="usernameErr" class="error"><?php echo $usernameErr; ?></span>


<input class="login-info" id="password" name="password" type="password" placeholder="password"value="<?php echo $password; ?>"/><br>
<span id="passwordErr" class="error"><?php echo $passwordErr; ?></span>
</div>

<div class="remember-me">
<input class="rem-checkbox" type="checkbox" id="remember-me">
<label class="rem-text" for="remember-me">Remember me</label>
</div>


<input type="submit" class="login-btn" id = "submit" name="submit" value="Login"/>
<a class="forgot-psw" href="">Forgot your password?</a>

<p class = "register" >Don't have an account yet?<a href="PHP/registration.php" class="register-link"> Register</a></p>

</form>

 <?php
    } else {
        echo $message;
    }
    	mysqli_close($conn);

    ?>

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

<script type="text/javascript" src="JS/validations.js"></script>

</body>
</html>