<?php

   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}

require_once "../../db_conn.php";



$portfolio_industry_name = ($_POST['portfolio_industry_name']);
$Website_category = ($_POST['Website_category']);



$sql = "INSERT INTO `portfolio_industry`(`portfolio_industry_name`, `Website_category`)  VALUES ('$portfolio_industry_name' , '$Website_category')";

if (mysqli_query($conn, $sql)) {
  header("location: add-industry");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>