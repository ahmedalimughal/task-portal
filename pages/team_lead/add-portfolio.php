<?php 
// Initialize the session
session_start();
 require_once "../../db_conn.php";
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])  ){
    header("location: ../../login");
    exit;
}

        
$projects = array();

$result = mysqli_query($conn,"SELECT * FROM `portfolio_industry`");



// Include config file

?>
<?php 
$projects = array();

$results = mysqli_query($conn,"SELECT * FROM `portfolio_industry`");

// mysqli_close($conn); ?>



<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Add New Portfolio</title>
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
      <link href="developer.css" rel="stylesheet" type="text/css" />
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
                           <li class="breadcrumb-item active">Add New Industry Portfolio</li>
                        </ol>
                     </div>
                     <h4 class="page-title pt-2">Add New Industry Portfolio</b> </h4>
                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row d-flex justify-content-center content-middle">
               <div class="col-md-7">
                  <div class="card m-b-20 card-body ">
                    
                     <h3 class="card-title font-20 mt-0">Enter Your Portfolio Details </h3>
                     <form action="add-portfolio-action" method="post" enctype='multipart/form-data'>
                        <div class="form-floating">
                           <label for="floatingTextarea2">Enter Your Industry Name *</label>
                            <!-- <input class="form-control mb-3" name="industry_name" type="text" value="" required="Please Enter your Industry Name" id="example-number-input" placeholder="Your Industry Name"> --> 
                            <select class="form-select mb-3 form-control"name="industry_name" aria-label="Default select example" required="">
                              <?php
                              $i=0;
                              while($row = mysqli_fetch_array($result)) {                        
                               ?>
                              <option name="industry_name"><?php echo $row['portfolio_industry_name']; ?></option>
                              <?php
                              $i++;
                           }
                              ?>
                           </select>
                           <label for="floatingTextarea2">Enter Your Website Category*</label>
                           <select class="form-select mb-3 form-control"name="Website_category" aria-label="Default select example" required="">
                              <?php
                              $i=0;
                              while($row = mysqli_fetch_array($results)) {                        
                               ?>
                              <option name="Website_category"><?php echo $row['Website_category']; ?></option>
                              <?php
                              $i++;
                           }
                              ?>
                           </select>



                            <label for="floatingTextarea2">Website Name</label>
                            <input class="form-control mb-3" name="website_name" type="text" value="" required="Please Enter Website Name" id="example-number-input" placeholder="Please Enter Website Name ">  
                            <label for="floatingTextarea2">Enter Website Url (optional)</label>
                            <input class="form-control mb-3" name="website_url" type="url" value="" id="example-number-input" placeholder="Enter Website Url">
                            <label for="floatingTextarea2">Enter Camp Url (optional)</label>
                            <input class="form-control mb-3" name="camp_link" type="url" value="" id="example-number-input" placeholder="Enter Website Url">
                            <label for="floatingTextarea2">Upload Website Image *</label>
                            <input type='file' name='file' class="form-control mb-3" required="Please Enter Website Images"/>

                        </div>

                        <button class="btn badge-success waves-effect waves-light text-light" type="submit" name="but_upload">Confirm Added</button>
                     </form>
                  </div>
               </div>
               <div class="col-md-5 text-center">
                  <div class="card m-b-20 card-body image-res w-100 p-0" >
                     <img src="../../assets/Portfolio_.gif" class="img-fluid text-center rounded ">
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