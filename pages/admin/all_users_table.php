
<?php
error_reporting(0);
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `role`, `username`, `password`, `name`, `created_at`) LIKE '%".$valueToSearch."%'";

    $search_result = filterTable($query);
    $count = $count;  

}
 else {
    $query = "SELECT * FROM `users`";
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

            <div class="row">
               <div class="col-12">
                  <div class="card m-b-20">
                     <div class="card-body">
                        <h4 class="mt-0 header-title">All Users Accounts</h4>
                        <form ></form>
                     
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           
                           <thead>
                              <tr>
                                 <th>S.no</th>
                                 <th>Role</th>
                                 <th>User Name</th>
                                 <th>Name</th>
                                 <th>Created At</th>
                                 <th>Profile Image</th>
                                 
                              </tr>
                           </thead>
                                <tbody>
                                 <?php while($row = mysqli_fetch_array($search_result)):
                                    $count+=1;                                    
                                    ?>
                              <tr>
                                 <td><?php echo $count;?></td>
                                 <td><p class="text-muted"><?php echo $row['role']; ?></p></td>
                                 <td ><?php echo $row['username'];?></td>
                                 <td><b><?php echo $row['name']; ?></b></td>
                                 <td><b><?php echo $row['created_at']; ?></b></td>
                                 <td class="pfp_user"><img src="<?php echo '../../assets/images/users/'.$row['user_image'] ?>" alt="user" class="rounded-circle w-50 user-image mx-3"></td>
                                 
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
      

<style type="text/css">
   .width  {
  width: 1%;
}
td.pfp_user {
    width: 20%;
}
img.rounded-circle.w-50.user-image.mx-3 {
    width: 100%;
    object-fit: cover;
    height: 90px;
}
</style>
   
