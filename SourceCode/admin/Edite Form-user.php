<?php
include "../lib/Databaseconfig.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>user Edit</title>
</head>
<body>
  
    <div class="container mt-5">

     
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User
                            <a href="http://localhost/online-shopping/admin/dashboard.php?dashboard" class="btn btn-info float-end">Go BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['update_users']))
                        {
                            $user_id = mysqli_real_escape_string($conn, $_GET['update_users']);
                            $query ="SELECT * FROM users where user_id='$user_id' " ;
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="./Editing Code-user.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">

                                    <div class="mb-3">
                                        <label>First Name : </label>
                                        <input type="text" name="name" value="<?=$user['first_name'];?>" class="form-control">
                                    </div>
                                  

                                    <div class="mb-3">
                                        <label>Middle Name : </label>
                                        <input type="text" name="name2" value="<?=$user['middle_name'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Family Name : </label>
                                        <input type="text" name="name3" value="<?=$user['last_name'];?>" class="form-control">
                                    </div>

                                  

                                    <div class="mb-3">
                                        <label>User Email : </label>
                                        <input type="email" name="email" value="<?=$user['user_email'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Password : </label>
                                        <input type="text" name="password" value="<?=$user['user_pass'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Mobile Number : </label>
                                        <input type="text" name="mobile" value="<?=$user['user_phone'];?>" class="form-control">
                                    </div>

                                   

                                    <div class="mb-3">
                                        <label>Address : </label>
                                        <input type="text" name="address" value="<?=$user['address'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Gender : </label>
                                        <input type="text" name="gender" value="<?=$user['gender'];?>" class="form-control">
                                    </div>
                                   




                                    <div class="mb-3">
                                        <button type="submit" name="updateUserData" class="btn btn-primary">
                                            Update User
                                        </button>
                                    </div>


                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>