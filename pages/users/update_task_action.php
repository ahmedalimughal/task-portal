<?php
include "../../db_conn.php";

if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($conn, $_POST['id']);
$task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
$camp_link = mysqli_real_escape_string($conn, $_POST['camp_link']);
$task_count = mysqli_real_escape_string($conn, $_POST['task_count']);
$task_date = $_POST['update_date'];		
if(empty($task_name) || empty($task_count) || empty($camp_link)) {	

if(empty($task_name)) {
echo '<font color="red">Task Name field is empty.</font><br>';
}
if(empty($task_count)) {
echo '<font color="red">Task Count field is empty.</font><br>';
}
if(empty($task_date)) {
echo '<font color="red">Task Date field is empty.</font><br>';
}
if(empty($camp_link)) {
echo '<font color="red">Camp Links field is empty.</font><br>';
}
} else {	
$result = mysqli_query($conn, "UPDATE `users-tasks` SET task_name='$task_name',camp_link ='$camp_link',task_count='$task_count' ,task_date='$task_date' WHERE id=$id");
header("Location: task-details");
}
}
?>