<?php
   // Database connection
   $server = 'localhost'; 
   $user = 'root'; 
   $password = '';
   $database = 'brightminds';

   $conn = mysqli_connect($server, $user, $password, $database); 

   if (!$conn) { 
       die('Database Connection failed: ' . mysqli_connect_error()); 
   }
?>