<?php
// session_start();
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
                            <a href="Super.php" class="btn btn-info float-end">Go BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['update_cat']))
                        {
                            $user_id = mysqli_real_escape_string($conn, $_GET['update_cat']);
                            $query ="SELECT * FROM category where  category_id='$user_id'" ;
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <input type="hidden" name="cat_id" value="<?= $user['category_id']; ?>">

                                    <div class="mb-3">
                                        <label>New Category Name : </label>
                                        <input type="text" name="name" value="<?=$user['category_name'];?>" class="form-control">
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

    <?php
// session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);



        $query = "UPDATE category SET category_name='$name' WHERE category_id='$cat_id' ";
        $query_run = mysqli_query($conn, $query);
        header("Location: catlist.php");
      

}

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>