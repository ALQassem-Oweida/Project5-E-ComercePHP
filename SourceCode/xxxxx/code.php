<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "employees Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "employees Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{

    $path = null;

    //var_dump($_REQUEST);
    //var_dump($_FILES);
    if ($_FILES['file']['name'] != "") {
        //echo 'trying to uplaod the ile';die;
       $path = uploadFile('file');
       //echo $path;
    } else {
       // die('no file');
    }

    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = null;
    if($path != null){
    $query = "UPDATE students SET name='$name', email='$email', salary='$salary', Address='$address', photo='$path' WHERE id='$student_id' ";
    }
    else{
     $query = "UPDATE students SET name='$name', email='$email', salary='$salary', Address='$address' WHERE id='$student_id' ";
    }

    //die($query);
    
    $query_run = mysqli_query($con, $query);

    //echo $query; die;
    if ($query_run < 1 ) {
        die("DB error, Can't complete your request!");
    }

    if($query_run)
    {
        $_SESSION['message'] = "employees Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        
        $_SESSION['message'] = "employees Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{

   
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $Address = mysqli_real_escape_string($con, $_POST['address']);

 
      /* create new name file */
       //var_dump( $_FILES["file"]); die;
       $destination = null;
       if(($_FILES['file']['name'] != "")) {
        $destination = uploadFile('file');
}


    $query = "INSERT INTO students (name, email, salary, Address, photo ) VALUES ('$name','$email','$salary','$Address', '$destination')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
};


function uploadFile($name)
 {

    if (isset($_FILES[$name])) {
        $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
        $extension  = pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION); // jpg
        $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
        $source       = $_FILES[$name]["tmp_name"];
        $destination  = "img/photos/{$basename}";


        if (!file_exists('img/photos')) {
            mkdir('img/photos', 0777, true);
        }

        /* move the file */
        move_uploaded_file($source, $destination);
        return $destination;
    }


 }






