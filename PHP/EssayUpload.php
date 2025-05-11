<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essay Uploading</title>    
    <script src="https://kit.fontawesome.com/59b21b487b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css">

</head>
<body>
    
<nav class="navbar">

    <ul class="Navigation">
       <li><img class ="navbar-logo" src ="../IMGS/LOGO/Navbar-Logo.png" alt=""></li> 
        <li class="nav-option" ><a class ="nav-links" href="../Index.php">Home</a></li>
        <li class="nav-option"><a class ="nav-links" href="About.html">About</a></li>
        <li class="nav-option"><a class ="nav-links" href="../PHP/EssayList.php">Essays</a></li>
        <li class="nav-option"><a class ="nav-links" href="Contact.html">Contact</a></li>
    </ul>

    <div class="profile-dropdown">
        <div class="profile-icon"><img src="../IMGS/Profile-pictures/avatar1.png" alt="profile photo of users choice"></div>
        <div class="profile-selection">
            <a class="profile-options">Profile</a>
            <a class="profile-options" href="">Preference</a>
            <a class="profile-options" href="">Logout</a>
        </div>
    </div>
    </nav>

    
<?php

//connecting to dbase
require_once "dbase_connect.php";

// ===================================================================================================================================
  // Data Validation Part: 

$essayID = $username = $studentName = $essayTitle = $essayRating = $essayFirstParagraph = $schoolName = $classLevel = $essayDate = $fullEssay = "";
$essayIDErr = $usernameErr = $studentNameErr = $essayTitleErr = $essayRatingErr = $essayFirstParagraphErr = $schoolNameErr = $classLevelErr = $essayDateErr = $fullEssayErr = "";

$valid = true;


    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {

             
  if (empty($_POST["essayID"])) {

    $essayIDErr = "An essay ID is required for identifying your essay";
    $valid = false;
}
else {
    $essayID = $_POST["essayID"];
    $essayID = test_input($essayID);

    if (!preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/", $essayID)) {
        $essayIDErr = "Essay ID must contain a minimum of 1 letter and 1 number (NO SPECIAL CHARACTERS)";
        $valid = false;
    }
}
        
  if (empty($_POST["username"])) {

    $usernameErr = "A username is required";
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


      if (empty($_POST["studentName"])) {

        $studentNameErr = "Student full name is required";
        $valid = false;
    }
    else {
        $studentName = $_POST["studentName"];
        $studentName = test_input($studentName); 

        if (!preg_match("/[a-zA-Z]+[ a-zA-Z]*/", $studentName)) {     
            $studentNameErr = "Name may only contain letters or ' ! and -";
            $valid = false;
        }
    }

    if (empty($_POST["essayTitle"])) {

      $essayTitleErr = "Essay title is required";
      $valid = false;
  }
  else {
      $essayTitle = $_POST["essayTitle"];
      $essayTitle = test_input($essayTitle); 

      if (!preg_match("/^[a-zA-Z0-9\W]{3,}$/", $essayTitle)) {     
          $essayTitleErr = "Essay title must be a minimum of 3 characters in length";
          $valid = false;
      }
  }

    if (empty($_POST["essayRating"])) {

      $essayRatingErr = "Essay Rating is required";
      $valid = false;
  }
  else {
      $essayRating = $_POST["essayRating"];
      $essayRating = test_input($essayRating); 

      if (!preg_match("/^[0-9]$/", $essayRating)) {     
          $essayRatingErr = "Essay rating can only be a single digit between 0 - 9";
          $valid = false;
      }
  }

  
    if (empty($_POST["essayFirstParagraph"])) {

      $essayFirstParagraphErr = "Essay Rating is required";
      $valid = false;
  }
  else {
      $essayFirstParagraph = $_POST["essayFirstParagraph"];
      $essayFirstParagraph = test_input($essayFirstParagraph); 

      if (!preg_match("/^[a-zA-Z0-9\W]{50,}$/", $essayFirstParagraph)) {     
          $essayFirstParagraphErr = "The first paragraph must be at least 50 characters in length";
          $valid = false;
      }
  }


if (empty($_POST["schoolName"])) {
    $schoolNameErr = "School selection is required";
    $valid = false;
} else {
    $schoolName = test_input($_POST["schoolName"]);
}


if (empty($_POST["classLevel"])) {
    $classLevelErr = "Class level is required";
    $valid = false;
} else {
    $classLevel = test_input($_POST["classLevel"]);
}


if (empty($_POST["essayGrade"])) {

  $essayGradeErr = "Essay Grade is required";
  $valid = false;
}
else {
  $essayGrade = $_POST["essayGrade"];
  $essayGrade = test_input($essayGrade); 

  if (!preg_match("/^[a-zA-Z]$/", $essayGrade)) {     
      $essayGradeErr = "Essay Grade is only 1 character in length";
      $valid = false;
  }
}

  

if (empty($_POST["fullEssay"])) {

  $fullEssayErr = "Full Essay is required";
  $valid = false;
}
else {
  $fullEssay = $_POST["fullEssay"];
  $fullEssay = test_input($fullEssay); 

  if (!preg_match("/^[a-zA-Z0-9\W]{200,}$/", $fullEssay)) {     
      $fullEssayErr = "Essay must be at least 200 characters or more in length";
      $valid = false;
  }
}
    

// // Image Uploading: 
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["pfp"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["pfp"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// // Check file size
// if ($_FILES["pfp"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["pfp"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }

// ======================================================================================================================================

    
    //Retrieve form data and store in php variables
    // $pfp = $_POST && $_FILES["pfp"];
    // $userType = $_POST["userType"];
    // $instructorID = $_POST["instructorID"];
    // $fullName = $_POST["fullName"];
    // $email = $_POST["email"];
    // $username = $_POST["username"];
    $essayDate = $_POST["essayDate"];
    // $parentName = $_POST["parentName"];
    // $parentEmail = $_POST ["parentEmail"];
    // $password = $_POST ["password"];
    // $schoolName = $_POST["schoolName"];
    // $classLevel = $_POST["classLevel"];
// =============================================================================================================================



// ============================================================================================================================

    $essayListQry = "INSERT INTO essaylist (essayID, username, studentName, essayTitle, essayFirstParagraph, essayRating) VALUES ('$essayID', '$username', '$studentName', '$essayTitle', '$essayFirstParagraph', '$essayRating')";

    $essayDetailsQry = "INSERT INTO essaydetails (essayID, username, essayTitle, fullEssay, essayDate, studentName, schoolName, classLevel) VALUES ('$essayID','$username', '$essayTitle', '$fullEssay', '$essayDate','$studentName', '$schoolName', '$classLevel')";

    // $feedbackqry = "INSERT INTO feedback (essayID
    $result1 = null;
    $result2 = null;

    
    try {
      $result1 = mysqli_query($conn, $essayListQry);
      
      if ($result1) {
          $result2 = mysqli_query($conn, $essayDetailsQry);
      }
      
      if($result1 && $result2) {
          echo '<br><br>Records successfully inserted into both tables.<br><br>';
      } elseif ($result1) {
          echo '<br><br>Record inserted into essaylist but failed to insert into essaydetails.<br><br>';
      } else {
          echo '<br><br>Failed to insert into essaylist.<br><br>';
      }
      
  } catch(Exception $e) {
      echo '<br><br>Error occurred: ' . mysqli_error($conn) . '<br><br>';
      echo "Please <a href=\"index.html\">return to form</a> to resubmit";
  }
}

  function test_input($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  // ===================================================================================================================================

?>

    <div class="essayUpload-form">
        <h2 class="form-heading">Essay Upload</h2>
        <h4 class="Upload-instruction">It's simple and easy</h4>
        <img class="reg-logo" src="../IMGS/LOGO/Logo.png" alt="">

        <form class = "account-info essay-info" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validate()">

          <!-- inserting on image file https://stackoverflow.com/questions/3828554/how-to-allow-input-type-file-to-accept-only-image-files -->
          <input class="pfp" type="file" id = "pfp" name = "pfp">

          <input  class="essay-input" id="essayID" name="essayID" type="text" placeholder="Essay ID" value="<?php echo $essayID;?>"/><br>
           <span id="essayIDErr" class="error"><?php echo $essayIDErr; ?></span> 

           
          <input  class="essay-input" id="username" name="username" type="text" placeholder="username" value="<?php echo $username;?>"/><br>
          <span id="usernameErr" class="error"><?php echo $usernameErr; ?></span>

          <input class="essay-input" id="studentName" name="studentName" type="text" placeholder="Student Full Name" value="<?php echo $studentName;?>"/><br>
          <span id="studentNameErr" class="error"><?php echo $studentNameErr; ?></span> 

          <input  class="essay-input" id="essayTitle" name="essayTitle" type="text" placeholder="Essay Title" value="<?php echo $essayTitle;?>"/><br>
          <span id="essayTitleErr" class="error"><?php echo $essayTitleErr; ?></span> 

          <input  class="essay-input" id="essayRating" name="essayRating" maxlength="2" type="text" placeholder="Essay Rating" value="<?php echo $essayRating;?>"/><br>
           <span id="essayRatingErr" class="error"><?php echo $essayRatingErr; ?></span> 


          <select class="essay-input account-selection" name="schoolName" id="schoolName" title="schoolName" value="<?php echo $schoolName;  ?>"/><br>
            <option value="" disabled selected>School</option>
              <option value="Penal_Secondary_School">Penal Secondary School</option>
              <option value="Shiva_Boys_Hindu_College">Shiva Boys Hindu College</option>
              <option value="Iere_High_School">Iere High School</option>
              <option value="Debe_High_School">Debe High School</option>
          </select>
          <span id="schoolNameErr" class="error"><?php echo $schoolNameErr; ?></span>

          <select  class="essay-input account-selection" title="classLevel" name="classLevel" id="classLevel" value="<?php echo $classLevel; ?>"/><br>
            <option value="" disabled selected>Class Level</option>
              <option value="form1">Form 1</option>
              <option value="form2">Form 2</option>
              <option value="form3">Form 3</option>
              <option value="form4">Form 4</option>
              <option value="form5">Form 5</option>
          </select>
          <span id="classLevelErr" class="error"><?php echo $classLevelErr; ?></span>

          <input class="essay-input" id="essayDate" name = "essayDate" type="text" placeholder ="Essay Date" onfocus="(this.type = 'date')"value="<?php echo $essayDate; ?>"/>
          <span id="essayDateErr" class="error"><?php echo $essayDateErr; ?></span>


           
          <textarea class="essay-input" id = "essayFirstParagraph" name="essayFirstParagraph" rows="6" cols="70" placeholder="Please enter, ONLY the first paragraph of your essay here" value="<?php echo $essayFirstParagraph; ?>"/></textarea><br>
          <span id="essayFirstParagraphErr" class="error"><?php echo $essayFirstParagraphErr; ?></span>


          <textarea class="essay-input" id = "fullEssay" name="fullEssay" rows="20" cols="255" placeholder="Please enter the complete essay here" value="<?php echo $fullEssay; ?>"/></textarea><br>
          <span id="fullEssayErr" class="error"><?php echo $fullEssayErr; ?></span>

          <input type="submit" name="submit" class="submit-btn">
        </form>



      </div>
      <script type="text/javascript" src="../JS/essayUploadValidation.js"></script>

</body>
</html>