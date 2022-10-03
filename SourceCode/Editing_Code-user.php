<?php

include "./lib/Databaseconfig.php";
session_start();




if(isset($_POST['updateUserData']))
{
    $user_id =$_SESSION['id'];

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
    $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

        $query = "UPDATE users SET first_name='$name', middle_name='$name1',
        last_name='$name2',user_email='$email',user_phone='$mobile', user_pass='$pass',address='$address',gender='$gender' WHERE user_id='$user_id' ";
        $query_run = mysqli_query($conn, $query);
        header("Location: ./userpage.php");
      
   
 
}

?>
