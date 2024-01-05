<?php

   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}

require_once "../../db_conn.php";


if(isset($_POST['but_upload'])){
  
  $website_name = $_POST['website_name'];
  $website_category = $_POST['Website_category'];
  $industry_name = $_POST['industry_name'];
  $website_url = $_POST['website_url'];
  $camp_link = $_POST['camp_link'];
  $name = $_FILES['file']['name'];
  $target_dir = "../../assets/portfolio/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif",'webp');

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
        // Insert record
        $query = "INSERT INTO `portfolio`(`Website_category`, `website_name`, `camp_link`, `website_image`, `industry_name` , `website_url`) values ('".$website_category."' , '".$website_name."' ,'".$camp_link."' ,'".$name."' , '".$industry_name."' , '".$website_url."')";
        mysqli_query($conn,$query);
     }

  }

}


?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Task posted <?php echo htmlspecialchars($_SESSION["username"]);?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="developer.css" rel="stylesheet" type="text/css" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="../../assets/images/favicon.ico">

        <!-- C3 charts css -->
        <link href="../../plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


      



      <div class="container pt-5 mt-5">
         <div class="row d-flex justify-content-xxl-center bg-dark text-light rounded-3">
            <div class="col-md-12">
            <h1 class="h1 text-center d-flex justify-content-center p-2 " id="record">Portfolio Added</h1>
            <div class="d-flex justify-content-center">
               <img src="../../assets/success.gif" class="rounded-circle w-25  ">
            </div>
            <span class="d-flex justify-content-center p-2" id="counter">Wait redirecting on home</span>
            </div>
         </div>
      </div>


<style type="text/css">
    .w-25 {
  width: 42% !important;
  height: 450px;
  object-fit: cover;
  object-position: center;
}
</style>




<script type="text/javascript">   
    function Redirect() 
    {  
        window.location="add-portfolio"; 
    } 
    document.write(""); 
    setTimeout('Redirect()', 3000); 
</script> 

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