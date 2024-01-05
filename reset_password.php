<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: login");
    exit;
}
 
// Include config file
require_once "db_conn.php";
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title ><?php echo htmlspecialchars($_SESSION["username"]);?> - Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
    background: #1f2c33;
    font-family: "Source Sans Pro", sans-serif;
    margin: 0;
    overflow-x: hidden;
    color: #dddddd;
}
        .wrapper{ width: 360px; padding: 20px; }
        .bg-dark {
    background-color: #2f3d46 !important;
}
.waves-effect {
    position: relative;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    vertical-align: middle;
    z-index: 1;
    will-change: opacity, transform;
    -webkit-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
}

.badge-success {
    background-color: #4ac18e;
}
.text-light {
    color: #f8f9fa!important;
}
    </style>
</head>
<body >
     
    <div class="container p-2 mt-5 mb-2 pt-5">
        <div class="row">
        <div class="col-md-2" style="color:#1f2c33">00</div>
        <div class="col-md-8 bg-dark text-light p-5 rounded "><h2><b style="text-transform: capitalize;"><?php echo htmlspecialchars($_SESSION["role"]);?></b> - Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="reset_password_action" method="post"> 
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]);?>" disabled>
                
            </div>
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="password" class="form-control" id="Password" >
                
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="newpassword" class="form-control" >
                </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmnewpassword" class="form-control " >
            
            </div>
            <div class="form-group">
                <input type="submit" class="btn badge-success waves-effect waves-light" value="Change Password">
                
            </div>
            

        </form>
    </div>
        <div class="col-md-2 d-none">00</div>
        </div>
    </div>    

         
</body>
</html>


