<?php 
   //login template
      session_start();
      if (!isset($_SESSION['username']) && !isset($_SESSION['id']) ) {   
      	
          ?>
<!DOCTYPE html>
<html>
   <html lang="en">
      <head>
         <meta charset="utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
         <title>Login your Account</title>
         <meta content="Admin Dashboard" name="description" />
         <meta content="Themesbrand" name="author" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <!-- App Icons -->
         <link rel="shortcut icon" href="assets/images/favicon.ico">
         <!-- Basic Css files -->
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
         <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
         <link href="assets/css/style.css" rel="stylesheet" type="text/css">
      </head>
      <body class="fixed-left">
         <div class="wrapper-page">
            <div class="card">
               <div class="card-body">
                  <h3 class="text-center m-0">
                     <a href="#" class="logo logo-admin"><img src="https://hbox.digital/images/HBOX%20Logo-01.svg" 
                        height="100" alt="logo"></a>
                  </h3>
                  <div class="p-3">
                     <h4 class="font-18 m-b-5 text-center">Welcome Back !</h4>
                     <form class=""
                        action="check-login" 
                        method="post">
                        <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                           <?=$_GET['error']?>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                           <label for="username" 
                              class="form-label">Username</label>
                           <input type="text" 
                              class="form-control" 
                              name="username" 
                              id="username" autocomplete="username">
                        </div>
                        <div class="form-group">
                           <label for="password" 
                              class="form-label">Password</label>
                           <input type="password" 
                              name="password" 
                              class="form-control" 
                              id="password">
                        </div>
                        <div class="form-group text-center">
                           <div class="col-sm-12">
                              <button class="btn btn-success w-md waves-effect waves-light" type="submit" value="Login">
                              Confirme to Log In</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
           
         </div>
         <?php 
            include('includes/footer.php') ?>
      </body>
   </html>
   <?php }
   else{
      header("Location: check-login");
      } ?>