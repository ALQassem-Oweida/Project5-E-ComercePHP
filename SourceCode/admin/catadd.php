
<?php include "lib/Databaseconfig.php"; ?>
<div class="d-flex justify-content-center">
 
<div class="card" style="width: 18rem;">
  <div class="card-body">
  
  <div class="box round first grid mt-5">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
            if (isset($_POST['submit'])) {
                $catName = $_POST["catName"];
                $query = "INSERT INTO category(category_name) VALUES('$catName')";
        
                if( $query_run = mysqli_query($conn, $query)){
                    echo "<script>
                    alert('New category add successfully');
                    window.location.href='http://localhost/01%20Team%203/admin/dashboard.php?catadd';
                    </script>";}
              
            }
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." name="catName" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>




  
  </div>
</div>
</div>

