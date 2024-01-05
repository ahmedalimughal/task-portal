
 <!-- Navigation Bar-->
       <header id="topnav" class="<?php echo htmlspecialchars($_SESSION["name"]);?>">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                   <a href="#" class="logo logo-admin"><img src="../../assets/logo-12.png" height="30" alt="logo"></a>
                    <!-- Image Logo -->
                    

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">

                    <!-- Search input -->
                    

                    <ul class="list-inline float-right mb-0">
                        
                        <!-- Fullscreen -->
                        <li class="list-inline-item dropdown notification-list hide-phone">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-fullscreen noti-icon"></i>
                            </a>
                        </li>
                       
                        
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                 <img src="<?php echo '../../assets/images/users/'.$_SESSION['user_image']; ?>" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                               
                                <a class="dropdown-item" href="user-profile-edit"><i class="mdi mdi-pen text-muted"></i> Edit Your Profile</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../logout"><i class="dripicons-exit text-muted"></i> Logout</a>

                               
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="index"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                            
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-buffer"></i>Tasks</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="post-your-task">Post a Task</a></li>
                                        <li><a href="task-details">See all task</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        </li>

                        <li class="has-submenu developer">
                            <a href="#"><i class="mdi mdi-account"></i>Users</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="all_users">All Users</a></li>
                                        <li><a href="add_new_users"></i>Add New User</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        </li>

                        

                        

                       <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-file-document-box"></i>Portfolio</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="add-portfolio">Add New Portfolio</a></li>
                                        
                                        <li><a href="add-industry">Add New Industry</a></li>
                                        <li><a href="portfolio">See all Portfolios</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-file-cloud"></i>Plugins & Themes</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        
                                        <li><a href="add-plugin">Add plugin | Theme</a></li>
                                        <li><a href="all-plugin-themes-file">See all File</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        </li>


                        <li class="has-submenu">
                            <a href="notification"><i class="mdi mdi-whatsapp"></i>Messages</a>
                            
                        </li>

                        
                        
                        
                        <li class="text-muted">
                            <a  target="_blank"><i class="mdi mdi-clock"></i>Time is : <?php
                            date_default_timezone_set("Asia/karachi");
                            echo date('h:i A');
                            ?></p></a>
                                                    </li>
                                                    


                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
 