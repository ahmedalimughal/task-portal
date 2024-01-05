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
        <title>Dashboard - <?php echo htmlspecialchars($_SESSION["name"]);?></title>
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
        <link rel="stylesheet" type="text/css" href="style.css">
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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-header">
                                Unit - 1
                            </div>
                            <div class="card-body">
                                <blockquote class="card-blockquote mb-0">
                                    <p class="font-16" ><?php echo htmlspecialchars($_SESSION["name"]);?> as a <b> <?php echo htmlspecialchars($_SESSION["role"]);?></b>  </p>
                                    <footer class="blockquote-footer text-muted">
                                        Welcome Back to <cite title="Source Title">Daily Task For Unit - 1</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div id='calendar'></div>

                                <div style='clear:both'></div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>

             



            </div> <!-- end container -->
        </div>
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
        
        
           
