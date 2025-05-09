<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essay Listing Page</title>    
    <script src="https://kit.fontawesome.com/59b21b487b.js" crossorigin="anonymous"></script>
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
            <div class="profile-icon"><img src="../IMGS/Profile-pictures/avatar1.png" alt="profile photo"></div>
            <div class="profile-selection">
                <a class="profile-options">Profile</a>
                <a class="profile-options" href="">Preference</a>
                <a class="profile-options" href="">Logout</a>
            </div>
        </div>
    </nav>
    
    <h1 class="Essay-heading">Essay Listing of Students</h1>
    <h2 class="essay-list">Public Essays</h2>   

    <div class="top-essays">


    
    <?php
    // Database connection
    require_once "dbase_connect.php";

    $query = "select * from essaylist order  by essayRating asc";
    
    $result = null; 
    try { 
    $result = mysqli_query($conn, $query);  
    } catch (Exception $e){ 
    echo '<br><br>Error occurred: ' . mysqli_error($conn) . '<br><br>'; 
    echo "Please <a href=\"..\index.html\">return to form</a> to resubmit";  
    }
    

    //process the results and provide feedback 

    
    if ($result) {  
        if (mysqli_num_rows($result) > 0) { 
            while ($row = mysqli_fetch_assoc($result)) {                 
                echo "
                <div class='essay'>
                    <p class='essay-info'>Username: <span>{$row['username']}</span></p>
                    <p class='essay-info'>Student name: <span>{$row['studentName']}</span></p>
                    <p class='essay-info'>Essay Title: <span>{$row['essayTitle']}</span></p>
                    <p class='essay-info'>Essay Rating: <span>{$row['essayRating']}</span></p>
                    <p class='essay-info'>First Paragraph: <span>{$row['essayFirstParagraph']}</span></p>
                    <a href=\"essayDetails.php?username={$row['username']}\" class='view-essay'>View</a>
                </div>  ";



            }
        } else {
            echo "<br>Query executed. No records found ."; 
        }
    } 
    echo "<div class='essay'>
     <a class = 'essay-add' href='EssayUpload.php'>
     <i class='essay-add fa-sharp fa-solid fa-plus'></i>
     <span>Add Essay</span>
     </a>
     </div>";
    
    mysqli_close($conn);
    ?>
</body>
</html>