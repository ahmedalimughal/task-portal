<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}
error_reporting(0);
// Include config file
require_once "../../db_conn.php";

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `portfolio_industry`  CONCAT(`id`, `portfolio_industry_name`, `created_at`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    $count = $count;
    
}
 else {
    $query = "SELECT * FROM `portfolio_industry`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include "../../db_conn.php";
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Add New Industry</title>
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
      <link rel="stylesheet" type="text/css" href="style.css">
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
                           <li class="breadcrumb-item active">Add New Industry </li>
                        </ol>
                     </div>
                     <h4 class="page-title pt-2">Add New Industry</b> </h4>
                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row d-flex justify-content-center">
               <div class="col-md-6">
                  <div class="card m-b-20 card-body ">
                    
                     <h3 class="card-title font-20 mt-0">Enter New Industry </h3>
                     <form action="add-industry-action" method="post" enctype='multipart/form-data'>
                        <div class="form-floating">
                           <label for="floatingTextarea2">Enter Your Industry Name *</label>
                            <input class="form-control mb-3" name="portfolio_industry_name" type="text" value="" required="Please Enter Industry Name" id="example-number-input" placeholder="Enters Industry Name"> 
                            <label for="floatingTextarea2">Category*</label>
                            <input class="form-control mb-3" name="Website_category" type="text" value="" required="Please Enter Industry Name" id="example-number-input" placeholder="Enters Industry Name"> 
                        

                        </div>

                        <button class="btn badge-success waves-effect waves-light text-light" type="submit" name="but_upload">Confirm Added</button>
                     </form>
                  </div>
               </div>
               <div class="col-md-6 text-center">
                  <div class="card m-b-20 card-body image-res p-0" >
                     <h4 class="mt-0 header-title pt-3 pb-3">All Indutries</h4>
                     <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           
                           <thead>
                              <tr>
                                 <th>S.no</th>
                                 <th>Industry Name</th> 
                                 <th>Categories</th>                               
                                 <th>Created Date</th>                                 
                                 <th>Actions</th>
                              </tr>
                           </thead>
                                <tbody>
                                 <?php while($row = mysqli_fetch_array($search_result)):
                                    $count+=1;
                                    $change_date = $row['created_at'];
                                    $newDate = date("d-M-Y", strtotime($change_date));  
                                    ?>
                              <tr>
                                 <td><?php echo $count; ?></td>
                                 <td><p class="text-muted"><?php echo $row['portfolio_industry_name']; ?></p></td>
                                  <td><p class="text-muted"><?php echo $row['Website_category']; ?></p></td>
                                 <td><em><?php echo $newDate; ?></em></td>                           
                                 <td class="w-25" id="actions">            
                                    <a href="delete-industry?id=<?php echo $row["id"]; ?>" class="btn btn-danger shadow border waves"><i class="mdi mdi-delete"></i>Delete</a>
                                    
                                 </td>
                              </tr>
                              <?php endwhile;?>
                           </tbody>
                           
                        </table>
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