<?php

   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}

require_once "../../db_conn.php";


  $id = $_SESSION['id'];
  $fname = $_POST['fname'];
  $name = $_FILES['file']['name'];
  $target_dir = "../../assets/images/users/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  



   // Select file type
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","webp","pdf","mp4","sql","rar","mp4","mp3");

  $query = "UPDATE `users` SET name ='$fname' , user_image ='$name' WHERE id = $id";
   

   
   if (mysqli_query($conn, $query)) {
   header("location: user-profile-edit");
      
   } 
   if (in_array($imageFileType,$extensions_arr) ) {

   
   if (move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
    header("location: user-profile-edit");
      
   }
   }

   mysqli_close($conn);
   ?>

  