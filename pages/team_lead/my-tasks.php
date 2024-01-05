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
 ?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Your Tasks | <?php echo htmlspecialchars($_SESSION["name"]);?></title>
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
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

   </head>
   <body>
<?php include ('../../includes/header.php'); ?>      
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users-tasks` WHERE CONCAT(`id`, `name`, `task_name`, `task_count`, `task_date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    $count = $count;
    
}
 else {
    $query = "SELECT * FROM `users-tasks`  WHERE name ='" . $_SESSION["name"] . "'";
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
                     <h4 class="page-title">All Task Data</h4>
                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
               <div class="col-12">
                  <div class="card m-b-20">
                     <div class="card-body">
                        <h4 class="mt-0 header-title">All Tasks</h4>
                        <form ></form>
                        <!-- <input type="text" name="valueToSearch" placeholder="Value To Search">
                        <input type="submit" name="search" value="Filter"><br><br> -->
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           
                           <thead>
                              <tr>
                                 <th>S.no</th>
                                 <th>Developer Name</th>
                                 <th>Task Name</th>
                                 <th>Camp Link</th>
                                 <th>Posted date</th>
                                 <th>Number of Tasks</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                                <tbody>
                                 <?php while($row = mysqli_fetch_array($search_result)):
                                    $count+=1;
                                    $change_date = $row['task_date'];
                                    $newDate = date("d-M-Y", strtotime($change_date));  ?>
                              <tr>
                                 <td><?php echo $count; ?></td>
                                 <td><p class="text-muted"><?php echo $row['name']; ?></p></td>
                                 <td  id="target" style='white-space:pre'><?php echo $row['task_name']; $string=nl2br($string);?></td>
                                 <td  id="target" style='white-space:pre'><?php echo $row['camp_link']; $string=nl2br($string);?></td>
                                 <td><em><?php echo $newDate; ?></em></td>
                                 <td class="sum"><?php echo $row['task_count']; ?></td>
                                 <td id="actions">
                                    <a href="update_task?id=<?php echo $row["id"]; ?>"><button class="btn btn-secondary shadow border waves">Edit task</button></a>
                                 </td>
                              </tr>

                              <?php endwhile;?>
                              
                           </tbody>
                           
                           
                        </table>
                            <?php
                            $query = "SELECT SUM(`task_count`) FROM `users-tasks` WHERE name ='" . $_SESSION["name"] . "'";

                            $search_result = filterTable($query);
                            while($row = mysqli_fetch_array($search_result)){
                              ?>
                              <p>Total Task Count = <?php echo $row[0];?></p>
                              <?php
                            }
                        ?>
          
                           
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


      <script>
        $(document).ready(function() {
            $('table thead th').each(function(i) {
                calculateColumn(i);
            });
        });

        function calculateColumn(index) {
            var total = 0;
            $('table tr').each(function() {
                var value = parseInt($('.sum', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('.totoal').eq(index).text('Total: ' + total);
        }
    </script>

    <script>
function myFunction() {
  alert("Confirmed to Delete Task");
}
</script>
<style type="text/css">
td#actions {
    width: 9%;
}
   
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 410%;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

</style>


 <?php include ('../../includes/footer.php'); ?>
      <!-- End Footer -->
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