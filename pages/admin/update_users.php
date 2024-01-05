<?php 
   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}


   // including the database connection file
   include "../../db_conn.php";
   
   //getting id from url
   $id = $_GET['id'];
   
   //selecting data associated with this particular id
   $result = mysqli_query($conn, "SELECT * FROM `users` WHERE id=$id");
   
   while($res = mysqli_fetch_array($result))
   {
      $id = $res['id'];
      $role = $res['role'];
      $username = $res['username'];
      $password = $res['password'];
      $name = $res['name'];    
      $password= $res['password'];
      $data = $res['password'];
}
   ?>



<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Update Users | <?php echo htmlspecialchars($_SESSION["name"]);?></title>
      <meta content="Admin Dashboard" name="description" />
      <meta content="Themesbrand" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App Icons -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico">
      <!-- C3 charts css -->
      <link href="../../plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">
      <link href="plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
      <!-- App css -->
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include ('../../includes/sidebar.php'); ?>
      <div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="page-title-box">
                     <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                           <li class="breadcrumb-item"><a href="#">Unit -</a></li>
                           <li class="breadcrumb-item active">Update Your users </li>
                        </ol>
                     </div>
                     <h4 class="page-title">Update Your users  <?php echo htmlspecialchars($_SESSION["name"]);?> as<b> <?php echo htmlspecialchars($_SESSION["role"]);?></b> </h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="card m-b-20 card-body">
                     <h3 class="card-title font-20 mt-0">Update Your user Details </h3>

                     <form name="form1" method="post" action="update_user_action.php">
                     
                        <div class="form-floating">
                           <label for="floatingTextarea2">Update User Role</label>
                           <select class="form-select mb-3 form-control"
                              name="role" 
                              
                              required >
                              <option selected disabled> - Select Your Role - </option>
                              <option value="administration">Admin</option>
                              <option value="developer">Developer</option>
                              <option value="designer">Desinger</option>
                              <option value="sales" >Sales</option>
                           </select>
                           <label for="floatingTextarea2">Username Cannot Be Update</label>
                           <input class="form-control mb-3" name="username" type="text" value="<?php echo $username;?>" required="Please Update your user" id="example-number-input" required="space not allow" >

                           <label for="floatingTextarea2">Update Password</label>
                           <input class="form-control mb-3" name="password" type="text" value="" required="Please Update your user" id="example-number-input" required>
                           
                           <label for="floatingTextarea2">Update Name</label>
                           <input class="form-control mb-3" name="name" type="text" value="<?php echo $name;?>" required="Please Update your user" id="example-number-input" required>
                           <input class="form-control mb-3 disable" type="hidden" name="id" value="<?php echo $_GET['id'];?> ">
                        </div>
                        <button class="btn badge-success waves-effect waves-light text-light" type="submit" name="update" value="Update">Update User</button>
                     </form>
                  </div>
               </div>
   
               <div class="col-md-8 text-center">
                  <div class="card m-b-20 card-body image-res">
                     <?php include ('all_users_table.php'); ?>
                  </div>
               </div>
            </div>
            <!-- end row -->
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
            <!-- App js -->
            <script src="../../assets/js/app.js"></script>
            <script src="../../plugins/alertify/js/alertify.js"></script>
            <script src="../../assets/pages/alertify-init.js"></script>
         </div>
      </div>
   </body>
</html>