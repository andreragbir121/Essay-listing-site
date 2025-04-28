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
		$pass = $_POST['password'];


		$query = "select * from user where username = '$username'";
		$result = null; 

		try{
			$result = mysqli_query($conn, $query);

        }catch(Exception $e){
			echo "there was an error with you login. Please try again";
		}
		
		if ($result){
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				// $login_success = password_verify($password, $row['password']);
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
	?>
</body>
</html>
