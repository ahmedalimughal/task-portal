<?php 

// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: login");
    exit;
}

   // including the database connection file
   require "db_conn.php";

        $username = ($_POST['username']);
        $password = ($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $confirmnewpassword = md5($_POST['confirmnewpassword']);
        $result = mysqli_query($conn, "SELECT password FROM `users` WHERE username ='" . $_SESSION["username"] . "'");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        if($newpassword=$confirmnewpassword)
        $sql=mysqli_query($conn,"UPDATE `users` SET password='$newpassword' where username ='" . $_SESSION["username"] . "'");
        if($sql)
        {
        header("location: logout");
        }
       else
        {
       echo "Passwords do not match";
       }
      ?>