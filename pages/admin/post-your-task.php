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
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Post your task | <?php echo htmlspecialchars($_SESSION["name"]);?></title>
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
                           <li class="breadcrumb-item active">Post Your Tasks </li>
                        </ol>
                     </div>
                     <h4 class="page-title">Post Your Tasks  <?php echo htmlspecialchars($_SESSION["name"]);?> as<b> <?php echo htmlspecialchars($_SESSION["role"]);?></b> </h4>
                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row d-flex justify-content-xxl-center">
               <div class="col-md-6">
                  <div class="card m-b-20 card-body">
                     <p class="font-16 text-danger" > NOTE : If you are posting previous Date task need to update task date after post  edit it. </p>
                     <h3 class="card-title font-20 mt-0">Enter Your Task Details </h3>
                     <form action="post-task-action" method="post" >
                        <div class="col-sm-6"></div>
                        <div class="form-floating">
                           <label for="floatingTextarea2">Enter Your Task 1 per line</label>
                           
                           <textarea class="form-control pb-2" name="task_name" onKeyUp="countLines(this)" placeholder="Enter task name" 
                              style="height:250px; " id="floatingTextarea2" style="height: 100px" required="Please Enter your Task" rows="10" cols="70"></textarea>
                              
                              <label for="floatingTextarea2 ">Enter Camp Link 1 per line</label>
                              <textarea class="form-control" name="camp_link" placeholder="Enter Camp Link" 
                               id="floatingTextarea2" style="height: 100px; " required="Please Enter Camp Link" rows="10" cols="70"></textarea>
                           
                           <label for="floatingTextarea2">Enter Your Task Count</label>
                           
                           <input class="form-control mb-3 count" name="task_count" type="text" required="Please Enter your Task" id="example-number-input" placeholder="Enter Task Count ">

                           

                        </div>
                        <button class="btn badge-success waves-effect waves-light text-light" type="submit">Confirm Added</button>
                     </form>
                  </div>
               </div>
               <div class="col-md-6 text-center">
                  <div class="card m-b-20 card-body image-res w-75 img-fluid p-5">
                     <img src="../../assets/submit.gif" class="img-fluid text-center rounded ">
                  </div>
               </div>
            </div>
             <script>
                function countLines(theArea){
                var theLines = theArea.value.replace((new RegExp(".{"+theArea.cols+"}","g")),).split("\n");
                if(theLines[theLines.length-1]=="") theLines.length--;
                theArea.form.task_count.value = theLines.length;
                }
            </script>
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