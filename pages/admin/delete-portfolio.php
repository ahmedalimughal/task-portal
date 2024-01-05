<?php 
   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}

// Include config file
require_once "../../db_conn.php";
error_reporting(0);


$sql = "DELETE FROM `portfolio` WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("location: portfolio");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>