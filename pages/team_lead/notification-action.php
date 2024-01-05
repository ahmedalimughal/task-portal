<?php

   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}

require_once "../../db_conn.php";

   $role = $_SESSION['role'];
   $user_name = $_SESSION['name'];
   $user_image = $_SESSION['user_image'];
   $message = $_POST['message'];
   $name = $_FILES['file']['name'];
   $target_dir = "../../assets/message/";
   $target_file = $target_dir . basename($_FILES["file"]["name"]);



   // Select file type
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","webp","pdf","mp4","sql","rar","mp4","mp3");

  $query = "INSERT INTO `notification` (`role`, `user_name`, `message`, `file_upload` , `user_image`) values ('".$role."' , '".$user_name."' ,'".$message."' ,'".$name."' ,'".$user_image."')";
   

   
   if (mysqli_query($conn, $query)) {
   header("location: notification");
   } 
   if (in_array($imageFileType,$extensions_arr) ) {

   
   if (move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
   header("location: notification");
   }
   }

   //mysqli_close($conn);
   ?>
