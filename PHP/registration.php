<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register.php </title>
</head>
<body>
    

<?php 
    //connecting to dbase
    require_once "dbase_connect.php";

// ===================================================================================================================================

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["pfp"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["pfp"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["pfp"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["pfp"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// ======================================================================================================================================


    //Retrieve form data and store in php variables
    $pfp = $_POST && $_FILES["pfp"];
    // $userType = $_POST["userType"];
    // $instructorID = $_POST["instructorID"];
    $fullName = $_POST["fullName"];
    // $email = $_POST["email"];
    $username = $_POST["username"];
    $birthDate = $_POST["birthDate"];
    $parentName = $_POST["parentName"];
    $parentEmail = $_POST ["parentEmail"];
    $password = $_POST ["password"];
    $schoolName = $_POST["schoolName"];
    $classLevel = $_POST["classLevel"];
    

// =============================================================================================================================



// ============================================================================================================================
    
    $qry = "INSERT INTO user (pfp, fullName, username, birthDate, parentName, parentEmail, password, schoolName, classLevel) VALUES ('$pfp', '$fullName', '$username', '$birthDate', '$parentName', '$parentEmail', '$password', '$schoolName', '$classLevel');";

    $result = null;

    try{
        $result = mysqli_query($conn, $qry);

    } catch(Exception $e) {
        echo '<br><br>Error occurred: ' . mysqli_error($conn) . '<br><br>';
        echo "Please <a href=\"index.html\">return to form</a> to resubmit";
    }

    if($result) echo '<br><br>record successfully inserted.<br><br>';

?>
</body>
</html>