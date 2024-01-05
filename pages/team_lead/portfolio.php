<?php 
// Initialize the session
session_start();
 error_reporting(0);
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}

// Include config file
require_once "../../db_conn.php";

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `portfolio` CONCAT(`id`, `industry_name`, `Website_category`, `website_name`, `website_url`, `website_image`, `created_at` ) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    $count = $count;

    
    
    
}
 else {
    $query = "SELECT * FROM `portfolio`";
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
      <title>List of Portfolios</title>
      <meta content="Admin Dashboard" name="description" />
      <meta content="Themesbrand" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App Icons -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico">
      <!-- DataTables -->
      <link href="../../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="../../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="../../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                           <li class="breadcrumb-item"><a href="../../index">Unit - 1</a></li>
                           <li class="breadcrumb-item active">Login as : <span class="text-muted text-capitalize"><?php echo htmlspecialchars($_SESSION["role"]);?></span></li>
                       </ol>
                     </div>
                     <h4 class="page-title">All Portfolio Data</h4>
                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
               <div class="col-12">
                  <div class="card m-b-20">
                     <div class="card-body">
                        <h4 class="mt-0 header-title">All Porfolio</h4>
                        <form ></form>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           
                           <thead>
                              <tr>
                                 <th>S.no</th>
                                 <th>Indutry Name</th>
                                 <th>Category</th>
                                 <th>Website Name</th>
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
                                 <td><p class="text-muted"><?php echo $row['industry_name']; ?></p></td>
                                 <td class="w-35" id="target" style='white-space:pre'><?php echo $row['Website_category']; ?></td>
                                 <td><b><?php echo $row['website_name']; ?></b></td>
                                 <td><em><?php echo $newDate; ?></em></td>
                                 
                                 <td id="actions">       
                                    <a href="view-single-portfolio?id=<?php echo $row["id"]; ?>" target="_blank" class="btn btn-success shadow border waves"><i class="mdi mdi-eye"></i> View Portfolio</a>
                                    <a href="delete-portfolio?id=<?php echo $row["id"]; ?>" class="btn btn-danger shadow border waves"><i class="mdi mdi-delete"></i> Delete Portfolio</a>
                                    
                                 </td>
                              </tr>
                              <?php endwhile;?>
                           </tbody>
                           
                        </table>
                           
                           
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
     <!-- end wrapper -->



<style type="text/css">
td#actions {
    width: 9%;
}
.dt-buttons.btn-group {
  display: none;
}
</style>

 <?php include ('../../includes/footer.php'); ?>
      <!-- End Footer -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- jQuery  -->
      <script src="../../assets/js/jquery.min.js"></script>
      <script src="../../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../../assets/js/modernizr.min.js"></script>
      <script src="../../assets/js/waves.js"></script>
      <script src="../../assets/js/jquery.slimscroll.js"></script>
      <script src="../../assets/js/jquery.nicescroll.js"></script>
      <script src="../../assets/js/jquery.scrollTo.min.js"></script>
      <!-- Required datatable js -->
      <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Buttons examples -->
      <script src="../../plugins/datatables/dataTables.buttons.min.js"></script>
      <script src="../../plugins/datatables/buttons.bootstrap4.min.js"></script>
      <script src="../../plugins/datatables/jszip.min.js"></script>
      <script src="../../plugins/datatables/pdfmake.min.js"></script>
      <script src="../../plugins/datatables/vfs_fonts.js"></script>
      <script src="../../plugins/datatables/buttons.html5.min.js"></script>
      <script src="../../plugins/datatables/buttons.print.min.js"></script>
      <script src="../../plugins/datatables/buttons.colVis.min.js"></script>
      <!-- Responsive examples -->
      <script src="../../plugins/datatables/dataTables.responsive.min.js"></script>
      <script src="../../plugins/datatables/responsive.bootstrap4.min.js"></script>
      <!-- Datatable init js -->
      <script src="../../assets/pages/datatables.init.js"></script>
      <!-- App js -->
      <script src="../../assets/js/app.js"></script>
   </body>
</html>