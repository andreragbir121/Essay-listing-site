<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Week 12 - Review Class</title>
</head>
<body>
	<?php

	
        require_once 'dbase_connect.php';
		
		//retrieve login form data
		$username = $_POST['username'];
		$password = $_POST['password'];



		$username = $password = "";
		$usernameErr = $passwordErr = "";

		$valid = true;


		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {




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
  
	// Regex for password taken from : https://uibakery.io/regex-library/password 
	if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password)) {
		$passwordErr = "email can only contain letters and special char";
		$valid = false;
	}
  }
		
			
		$query = "select * from student where username = '$username'";
		$result = null; 

		try{
			$result = mysqli_query($conn, $query);

        }catch(Exception $e){
			echo "there was an error with you login. Please try again";
		}
		
		if ($result){
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				$login_success = password_verify($password, $row['password']);
                $login_success = ($pass === $row['password']);

				if ($login_success){

                    $_SESSION['pfp'] = $row['pfp'];
                    $_SESSION ['fullName'] = $row['fullName'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['birthDate'] = $row['birthDate'];
					$_SESSION['parentName'] = $row['parentName'];
					$_SESSION['parentEmail'] = $row['parentEmail'];
					$_SESSION['schoolName'] = $row['schoolName'];
                    $_SESSION['classLevel'] = $row['classLevel'];


					echo "Hello $row[fullName]. you have successfully logged in";

					echo '<br /> <br /><p><a href ="index.php" >Return to home page</a></p>';
				}
				else echo "Login credentials invalid, Please try again.";
			}
			else echo "Login credentials invalid, Please try again.";
		}
		mysqli_close($conn);
		}
	?>
</body>
</html>
