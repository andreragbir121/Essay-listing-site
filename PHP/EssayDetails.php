<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essay Details</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

    <nav class="navbar">

    <ul class="Navigation">
           <li><img class="navbar-logo" src="../IMGS/LOGO/Navbar-Logo.png" alt=""></li> 
            <li class="nav-option"><a class="nav-links" href="../Index.php">Home</a></li>
            <li class="nav-option"><a class="nav-links" href="../HTML/About.html">About</a></li>
            <li class="nav-option"><a class="nav-links" href="EssayList.php">Essays</a></li>
            <li class="nav-option"><a class="nav-links" href="../HTML/Contact.html">Contact</a></li>
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
 require_once "dbase_connect.php";
// $essayID = $_GET['essayID'];
    if (isset($_GET['essayID'])) $essayID = $_GET['essayID']; 

// 3. preparing and processing the query
$query = "select * from essaydetails where essayID = '$essayID'";

$result = null; 

try { 
  $result = mysqli_query($conn, $query);
} catch (Exception $e){
  echo '<br><br>Error occurred: ' . mysqli_error($conn) . '<br><br>';
} 
// 4. process the result and give user feedback
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                        
            echo "
            <div class='essay-details-container'>
                <div class='student-info'>
                    <div class='student-details'>
                        <p class='student-detail'>Username: <span>{$row['username']}</span></p>
                        <p class='student-detail'>Student Name: <span>{$row['studentName']}</span></p>
                        <p class='student-detail'>School: <span>{$row['schoolName']}</span></p>
                        <p class='student-detail'>Class: <span>{$row['classLevel']}</span></p>
                        <p class='student-detail'>Date: <span>{$row['essayDate']}</span></p>                        
                    </div>
                </div>
                
                <div class='essay-content'>
                    <h1 class='essay-title'>{$row['essayTitle']}</h1>
                    <p class='student-detail'>{$row['fullEssay']}</p>
                </div>
            </div>";
        }
    } else {
        echo "<div class='no-results'>No essays found for this user.</div>";
    }
} else {
    echo "<div class='error'>Error retrieving essay: ".mysqli_error($conn)."</div>";
}


// data validation for feedback form


    //   if (isset($_POST['instructorID'])) $instructorID = $_POST['instructorID']; 
    //   if (isset($_POST['instructorName'])) $instructorName = $_POST['instructorName'];  
    //   if (isset($_POST['grade'])) $grade = $_POST['grade']; 
    //   if (isset($_POST['comment'])) $comment = $_POST['comment'];  

$instructorID = $instructorName = $grade = $comment = "";
$instructorIDErr = $instructorNameErr = $gradeErr = $commentErr = "";

$valid = true;


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {
    if (isset($_POST['essayID'])) $essayID = $_POST['essayID']; 

  if (empty($_POST["instructorID"])) {

    $instructorIDErr = "Instructor ID is needed";
    $valid = false;
}
else {
      if (isset($_POST['instructorID'])) $instructorID = $_POST['instructorID']; 
    $instructorID = test_input($instructorID);

    if (!preg_match("/^\d+$/", $instructorID)) {
        $instructorIDErr = "Instructor ID must be a valid number";
        $valid = false;
    }
}
 
                   
  if (empty($_POST["instructorName"])) {

    $instructorNameErr = "Instructor ID is needed";
    $valid = false;
}
else {
      if (isset($_POST['instructorID'])) $instructorID = $_POST['instructorID']; 
    $instructorName = test_input($instructorName);

    if (!preg_match("/[a-zA-Z]+[ a-zA-Z]*/", $instructorName)) {
        $instructorNameErr = "instructor name must be only letters and spacing";
        $valid = false;
    }
}

if (empty($_POST["grade"])) {
    $gradeErr = "Grade is required ";
    $valid = false;
} else {
    if (isset($_POST['grade'])) $grade = $_POST['grade']; 
    $grade = test_input($_POST["grade"]);
}

                   
  if (empty($_POST["comment"])) {

    $commentErr = "comment is needed for student feedback";
    $valid = false;
}
else {
      if (isset($_POST['comment'])) $comment = $_POST['comment'];  
    $comment = test_input($comment);

    if (!preg_match("/^.{5,}$/", $comment)) {
        $commentErr = "Comment must be at least 5 characters minimum";
        $valid = false;
    }
}
 
    $query = "update essaydetails set instructorID = '$instructorID', instructorName = '$instructorName', grade = '$grade', comment = '$comment' WHERE essayID = '$essayID'";
    //execute the query  
      $result = null;  
           
          try {  
              $result = mysqli_query($conn, $query); 
          } catch (Exception $e){ 
              echo '<br><br>Error occurred: ' . mysqli_error($conn) . '<br><br>'; 
              echo "Please <a href=\"index.html\">return to form</a> to resubmit"; 
          } 

      if ($result) {
      $rows_updated = mysqli_affected_rows($conn); 
          if ($rows_updated > 0) {
            echo "$rows_updated rows were updated as requested. <br><br>";
          } else {
            echo "Sorry no rows were found for user ID $essayID. <br><br>"; 
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

mysqli_close($conn);
?>
<br><br><br>
<p class="reference">Regerence: View full essay here:<br>  
            Tapas. (2022, October 26). Best 20 Short Essay Writing Examples - English Luv. English Luv. <br>
            <a href="https://englishluv.com/short-essay-writing/">https://englishluv.com/short-essay-writing/</a></p>


            <br><br><br>

 <div class="feedback-form">
        <h2 class="feedback-heading">Sign Up</h2>
        <h4 class="feedback-instruction">It's simple and easy</h4>

        <form class = "feedback-info" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validate()">
    <input type="hidden" name="essayID" value="<?php echo htmlspecialchars($essayID); ?>">

        <input  class="feedback-input" id="instructorID" name="instructorID" type="num" placeholder="instructorID" value="<?php echo $instructorID; ?>"/><br>
          <span id="instructorIDErr" class="error"><?php echo $instructorIDErr; ?></span>

          <input class="feedback-input" id="instructorName" name="instructorName" type="text" placeholder="Full Name" value="<?php echo $instructorName;  ?>"/><br>
          <span id="instructorNameErr" class="error"><?php echo $instructorNameErr; ?></span>

            <select class="feedback-input" id="grade" name="grade">
                        <option value="">Essay Grade</option>
                        <option value="A">A (Excellent)</option>
                        <option value="B">B (Good)</option>
                        <option value="C">C (Satisfactory)</option>
                        <option value="D">D (Needs Improvement)</option>
                        <option value="F">F (Fail)</option>
            </select>
            <span id="gradeErr" class="error"><?php echo $gradeErr; ?></span>

            
          <textarea class="feedback-input" id = "comment" name="comment" rows="3" cols="255" placeholder="instructor comment to the student" value="<?php echo $comment; ?>"/></textarea><br>
          <span id="commentErr" class="error"><?php echo $commentErr; ?></span>


          <input type="submit" name="submit" class="submit-btn">
        </form>

      </div>

</div>
</body>
</html>


<!-- instructorID	instructorName	Grade	comment	 -->

