<?php
include "./lib/Databaseconfig.php";
session_start();
 $id=$_SESSION['id'];




?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link href="./style.css" rel="stylesheet">

   <title>Document</title>
</head>
<body>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    
    <nav class="nav nav-borders">
        <h4>Profile</h4> 
    </nav>


    <hr class="mt-0 mb-4">
    <div class="row">
    
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header bg-dark text-light">Account Details </div>
                <div class="card-body">
<?php 
$query="SELECT * FROM users where user_id='$id'";
$conn->query($query);
if ($result = $conn->query($query) ) {
    while ($row = $result->fetch_assoc() ) {



?>

                    <form action="./Editing_Code-user.php" method="POST">
                        
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1 " for="inputFirstName">First name : </label>
                                <input name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $row['first_name'] ?>" >
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputMiddle name">Middle name : </label>
                                <input  name="name1"class="form-control" id="inputMiddle name" type="text" placeholder="Enter your Middle name"   value="<?php echo $row['middle_name'] ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name : </label>
                                <input  name="name2" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name"  value="<?php echo $row['last_name'] ?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                           
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">User email : </label> 
                                <input name="email"  class="form-control"  id="inputEmailAddress" type="email"  placeholder="Enter your email address"  value="<?php echo $row['user_email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Gender : </label> 
                                <input name="gender"  class="form-control"  id="inputtext" type="text"  placeholder="Enter your gender"  value="<?php echo $row['gender'] ?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Address : </label>
                            <input    name="address" class="form-control" id="inputLocation"type="text" placeholder="Enter your location" value="<?php echo $row['address'] ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">User phone : </label>
                                <input name="mobile" class="form-control" id="inputPhone" type="tel" placeholder="+9627777777" value="<?php echo $row['user_phone'] ?>" >
                            </div>
                           <!-- Form Group (new password)-->
                           <div class="col-md-6">
                                <label class="small mb-1" for="newPassword">User password : </label>
                                <input name="password" class="form-control" id="newPassword" type="text" placeholder="Enter new password" value="<?php echo $row['user_pass'] ?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-secondary" type="submit" name="updateUserData">Save changes</button>
                        </form>
                        <?php
}
}
?>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header bg-dark text-light">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" style="width:25% ; height:25%" src="./admin/upload/user.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">User image</div>
             
                    <a href="./logout.php" class="btn btn-success mr-5  ">Log Out</a>
                    <a href="./index.php" class="btn btn-info ">Home</a>

   
                    








                </div>
            </div>
        </div>

    
    </div>
</div>
</body>
</html>