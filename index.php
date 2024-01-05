<?php
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
         //team leads
      	if ($_SESSION['role'] == 'team_lead'){
			header("Location: pages/team_lead/index");
      	 }
		 //pc
		 else if ($_SESSION['role'] == 'project_cordinator'){ 
			header("Location: pages/admin/index");
      	} 
		//developer
		  else if ($_SESSION['role'] == 'developer'){ 
			header("Location: pages/users/index");	
		}
		//admin
		else if ($_SESSION['role'] == 'administration'){ 
			header("Location: pages/admin/index");
		}
		else if ($_SESSION['role'] == 'designer'){ 
			header("Location: pages/users/index");
		}
		else if ($_SESSION['role'] == 'test-link'){ 
			header("Location: pages/users/index");
		}
		else if ($_SESSION['role'] == 'data_entry'){ 
			header("Location: pages/users/index");
		}
		else if ($_SESSION['role'] == 'Q-A'){ 
			header("Location: pages/users/index");
		}
 }
else{
	header("Location:login");
} ?>



