<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include "../lib/Databaseconfig.php"; ?>
<div class="grid_10">
    <div class="box round first grid mt-5">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $catName = $_POST["catName"];
                $query = "INSERT INTO category(category_name) VALUES('$catName')";
                $conn->query($query);
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
