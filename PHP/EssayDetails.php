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
                        <p class='student-detail'>Class: <span>{$row['studentClass']}</span></p>
                        <p class='student-detail'>Date: <span>{$row['date']}</span></p>
                        <p class='student-detail'>Grade: <span>{$row['grade']}</span></p>

                    </div>
                </div>
                
                <div class='essay-content'>
                    <h1 class='essay-title'>{$row['essayTitle']}</h1>
                    <p class='student-detail'>{$row['content']}</p>
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

</body>
</html>