<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: login");
    exit;
}

// Include config file
require_once "../../db_conn.php";

$result = mysqli_query($conn, "SELECT  `role`, `username`, `password`, `name`, `user_image`, `created_at` FROM `users` WHERE id ='" . $_SESSION["id"] . "'");
   
   while($res = mysqli_fetch_array($result))
   {
      //$id = $res['id'];
      $role = $res['role'];
      $username = $res['username'];
      $password = $res['password'];
      $name = $res['name'];
      $created_at = $res['created_at'];
      $new_date = $res['created_at'];
      $update_date = date("Y-m-d", strtotime($new_date));
      $user_image = $res['user_image'];
      $image = $res['user_image'];
      $image_src = "../../assets/images/users/".$image; 

}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Update your Profile | <?php echo htmlspecialchars($_SESSION["name"]);?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="../../assets/images/favicon.ico">

        <!-- C3 charts css -->
        <link href="../../plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
        <link href="../../plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />

        <!-- App css -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    </head>


    <body>
<?php include ('../../includes/header.php'); ?>
<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Unit -</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="card m-b-20 d-flex justify-content-xxl-center ">
                            <div class="card-header">
                                Your Profile
                            </div>
                            <div class="card-body ">
                                <blockquote class="card-blockquote mb-0"> 
                                    <div class="bg-dark p-4">
                                    <!-- <img src="assets/success.gif" class="border rounded-circle w-50"> -->
                                    
                                    
                                      <img src="<?php echo $image_src ?>" class="border rounded-circle w-50" >
                                   

                                    
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Username</td>
                                                <td class="text-muted"><strong><?php echo $username;?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Full Name</td>
                                                <td class="text-muted"><strong><?php echo $name;?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td class="text-muted"><strong style="text-transform: capitalize;"><?php echo $role;?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Account Creation Date</td>
                                                <td class="text-muted"><strong><em><?php echo $update_date; ?></em></strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                    
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card m-b-20">
                            <div class="card-header">
                                    Edit Your Profile
                                </div>
                            <div class="card-body">
                               <form name="form1" method="post" action="profile-update-action" enctype='multipart/form-data'>
                                <div class="form-floating">
                                    <!-- <span><p>Your User id is: <?php echo $id;?> </p></span> -->
                                    <label for="floatingTextarea2">Username Cannot Be Update</label>
                                       <p class="form-control mb-3"><?php echo $username;?></p>
                                       

                                        <label for="floatingTextarea2">Designation Cannot Be Update</label>
                                       
                                       <p class="form-control mb-3"><?php echo $role;?></p>

                                       
                                       <label for="floatingTextarea2">Update Name</label>
                                       <input class="form-control mb-3" name="fname" type="text" value="<?php echo $name;?>" required="Please Update your user" id="example-number-input" required>
                                       
                                       <label for="floatingTextarea2">Update Your Profile Picture</label>

                                        <input type='file' name='file' class="form-control mb-3"  id="fileUpload" />
                                        <div class="mb-2">Photo (max 520 x 520 and 100 kb):</div>
                                       
                                    </div>
                                    
                                    <button class="btn badge-light waves-effect waves-light text-light"style="background: #1f2c33;" type="submit" name="but_upload" onclick="return Upload()">
                                     <i class="mdi mdi-account text-muted"></i> Update User</button>
                                    
                                    
                                    <button style="background: #1f2c33;" type="button" class="btn badge-light waves-effect waves-light text-light" data-toggle="modal" data-target="#exampleModalCenter">
                                      <span class="badge badge-success pull-right m-t-5"></span><i class="mdi mdi-key text-muted"></i> Re-set Password
                                    </button>

                                </div>  
                               </form>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                </div> <!-- end container -->
        </div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reset your Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../reset_password_action" method="post"> 
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]);?>" disabled>
                
            </div>
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="password" class="form-control" required >
                
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="newpassword" class="form-control"  required>
                
                </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmnewpassword" class="form-control "  required>

            </div>
            <button type="submit" class="btn btn-success">Confirmed To Change</button>
</form>
            
            
            

        
      </div>
      <div class="modal-footer">
        
        <button class="btn btn-secondary" id="pass"><i style="font-size:15px" class="fa">&#xf06e;</i> Show Password </button>
        
      </div>
    </div>
  </div>
</div>
 

 <script>
$(document).ready(function(){
  $("#pass").click(function(){
    $("input").removeAttr("type", "password");
  });
   
});


</script>            
<style type="text/css">
    .w-50 {
  width: 50% !important;
}
</style>



        <!-- end wrapper -->
  <?php include ('../../includes/footer.php'); ?>
         <!-- jQuery  -->
            <script src="../../assets/js/jquery.min.js"></script>
            <script src="../../assets/js/bootstrap.bundle.min.js"></script>
            <script src="../../assets/js/modernizr.min.js"></script>
            <script src="../../assets/js/waves.js"></script>
            <script src="../../assets/js/jquery.slimscroll.js"></script>
            <script src="../../assets/js/jquery.nicescroll.js"></script>
            <script src="../../assets/js/jquery.scrollTo.min.js"></script>
            <!-- Peity chart JS -->
            <script src="../../plugins/peity-chart/jquery.peity.min.js"></script>
            <!--C3 Chart-->
            <script src="../../plugins/d3/d3.min.js"></script>
            <script src="../../plugins/c3/c3.min.js"></script>
            <!-- KNOB JS -->
            <script src="../../plugins/jquery-knob/excanvas.js"></script>
            <script src="../../plugins/jquery-knob/jquery.knob.js"></script>
            <!-- Page specific js -->
            <script src="../../assets/pages/dashboard.js"></script>
            <script src='../../plugins/fullcalendar/js/fullcalendar.min.js'></script>
            <!-- App js -->
            <script src="../../assets/js/app.js"></script>
            <script src="../../plugins/alertify/js/alertify.js"></script>
            <script src="../../assets/pages/alertify-init.js"></script>
             <!-- Jquery-Ui -->
        <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../../plugins/moment/moment.js"></script>
        <script src='../../plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="../../assets/pages/calendar-init.js"></script>
            


        
</body>
</html>
        
        
           