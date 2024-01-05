<?php  

// login action 
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username)) {
        header("Location: login?error=User Name is Required");
    } elseif (empty($password)) {
        header("Location: login?error=Password is Required");
    } else {

        // Hashing function
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_image'] = $row['user_image'];

            // Redirect based on role
            if ($row['role'] == 'administration') {
                header("Location: pages/admin/index");
            }  else {
                // Handle other roles as needed
                header("Location: index");
            }

        } else {
            header("Location: login?error=Incorrect User name or password");
        }

    }

} else {
    header("Location: login");
}
?>