<?php
include "../../db_conn.php";

if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($conn, $_POST['id']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5($_POST['password']);	
$name = mysqli_real_escape_string($conn, $_POST['name']);	
if(empty($role) || empty($password)) {	


if(empty($password)) {
header("Location: update_users?error=password is Required");
}

if(empty($role)) {
header("Location: update_users?error=Select User Role");}

} else {	
$result = mysqli_query($conn, "UPDATE `users` SET  role ='$role', username ='$username', password ='$password', name ='$name' WHERE  id=$id");
header("Location: all_users");
}
}
?>