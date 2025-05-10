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

// 1. retrieve link data 
$username = $_GET['username'];

// 3. preparing and processing the query
$query = "select * from essaydetails where username = '$username';";

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
                        <p class='student-detail'>Grade: <span>{$row['essayGrade']}</span></p>

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

        <!-- instructorID, username, fullName, school, which is the same drop down from the student reg form. and finally their, grade and the comment from them
 -->

          <input  class="feedback-input" id="username" name="username" type="text" placeholder="username" value="<?php /*echo $username;*/ ?>"/><br>
          <!-- <span id="usernameErr" class="error"><?php echo $usernameErr; ?></span> -->


          <input class="feedback-input" id="fullName" name="fullName" type="text" placeholder="Full Name" value="<?php /*echo $fullName; */ ?>"/><br>
          <!-- <span id="fullNameErr" class="error"><?php echo $fullNameErr; ?></span> -->


          
          <input class="feedback-input" id="email" name="email" type="email" placeholder="email" value="<?php /*echo $email;*/ ?>"/><br>
          <!-- <span id="emailErr" class="error"><?php echo $emailErr; ?></span> -->

          <input class="account-input" id="feedbackDate" name = "feedbackDate" type="text" placeholder ="Feedback date" onfocus="(this.type = 'date')"value="<?php /*echo $feedbackDate; */?>"/>
          <!-- <span id="feedbackDaterr" class="error"><?php echo $feedbackDateErr; ?></span> -->


          <select class="feedback-input feedback-selection" name="schoolName" id="schoolName" title="schoolName" value="<?php /*echo $schoolName; */?>"/><br>
            <option value="" disabled selected>School</option>
              <option value="Penal_Secondary_School">Penal Secondary School</option>
              <option value="Shiva_Boys_Hindu_College">Shiva Boys Hindu College</option>
              <option value="Iere_High_School">Iere High School</option>
              <option value="Debe_High_School">Debe High School</option>
          </select>
          <!-- <span id="schoolNameErr" class="error"><?php echo $schoolNameErr; ?></span> -->

            <select class="feedback-input" id="grade" name="grade">
                        <option value="">Essay Grade</option>
                        <option value="A">A (Excellent)</option>
                        <option value="B">B (Good)</option>
                        <option value="C">C (Satisfactory)</option>
                        <option value="D">D (Needs Improvement)</option>
                        <option value="F">F (Fail)</option>
            </select>
          

            
          <textarea class="feedback-input" id = "comment" name="fullEssay" rows="20" cols="255" placeholder="Please enter the complete essay here" value="<?php/* echo $fullEssay; */?>"/></textarea><br>
          <!-- <span id="fullEssayErr" class="error"><?php echo $fullEssayErr; ?></span> -->


          <input type="submit" name="submit" class="submit-btn">
        </form>

      </div>

</div>
</body>
</html>