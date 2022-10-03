<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../lib/Databaseconfig.php";?>




<div class="grid_10 ">
            <div class="box round first grid mt-5">
                <h2>Category List</h2>
                <div class="block">
					<table class="table">






<div class="col-lg-12 "><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Products</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->






<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3  control-label" > Product Name </label>

<div class="col-md-6" >

<input type="text" name="product_title" class="form-control" required >

</div>

</div><!-- form-group Ends -->











<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Category </label>

<div class="col-md-6" >


<select name="cat" class="form-control" >

<option> Select a Category </option>

<?php

$get_cat = "select * from category ";

$run_cat = mysqli_query($conn,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['category_id'];

$cat_title = $row_cat['category_name'];

echo "<option value='$cat_id'>$cat_title</option>";

}

?>

</select>


</div>

</div><!-- form-group Ends -->









<div class="form-group m-5" ><!-- form-group Starts -->
<label class="col-md-3 control-label" > Gender </label>
<div class="col-md-6" >
<select name="gender" class="form-control" >
<option value='select'>Select gender</option>
<option value='Male'>Male</option>
<option value='Female'>Female</option>
</select>
</div>
</div><!-- form-group Ends -->










<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Price </label>

<div class="col-md-6" >

<input type="number" name="product_price" class="form-control" required >

</div>

</div><!-- form-group Ends -->








<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3 conntrol-label" > Product Image </label>

<div class="col-md-6" >

<input type="file" name="product_img1" class="form-control" required >

</div>

</div><!-- form-group Ends -->






<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  Description </label>

<div class="col-md-6" >

<textarea name="product_desc" class="form-control" rows="5" id="product_desc"></textarea>

</div>

</div><!-- form-group Ends -->






<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Stock </label>

<div class="col-md-6" >

<input type="number" name="product_stock" class="form-control" required >

</div>

</div><!-- form-group Ends -->















<div class="form-group m-5" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$product_title = $_POST['product_title'];

$cat = $_POST['cat'];


$product_price = $_POST['product_price'];


$product_desc = $_POST['product_desc'];

$product_gender = $_POST['gender'];

$product_Stock = $_POST['product_stock'];

$product_img1 = $_FILES['product_img1']['name'];
$temp_name1 = $_FILES['product_img1']['tmp_name'];
move_uploaded_file($temp_name1,"upload/$product_img1");


$insert_product = "insert into proudcts (product_name,catID,img,price,description,gender,stock) values ('$product_title','$cat','$product_img1','$product_price','$product_desc','$product_gender','$product_Stock')";

$run_product = mysqli_query($conn,$insert_product);

if($run_product){
echo "<script>alert('Product has been inserted successfully')</script>";

}

}

?>


