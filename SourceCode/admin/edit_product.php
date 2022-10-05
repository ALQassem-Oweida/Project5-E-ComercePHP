

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../lib/Databaseconfig.php";?>

<div class="grid_10 ">
            <div class="box round first grid mt-5">
                <h2 style="background:grey;color:black;">Items</h2>
                <div class="block">
	


<?php

if(isset($_GET['edit_product'])){

$edit_id = $_GET['edit_product'];

$get_p = "select * from items where id='$edit_id'";

$run_edit = mysqli_query($conn,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['id'];

$p_title = $row_edit['name_item'];


$cat = $row_edit['category_id'];



$p_image1 = $row_edit['item_image'];



$new_p_image1 = $row_edit['item_image'];



$p_price = $row_edit['price'];

$p_desc = $row_edit['item_desc'];

$p_keywords = $row_edit['Stock'];





}


$get_cat = "SELECT * from categories WHERE category_id='$cat'";

$run_cat = mysqli_query($conn,$get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_title = $row_cat['category_name'];

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit items

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit item

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > item name </label>

<div class="col-md-6" >

<input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Category </label>

<div class="col-md-6" >


<select name="cat" class="form-control" >

<option value="<?php echo $cat; ?>" > <?php echo $cat_title; ?> </option>

<?php

$get_cat = "select * from categories ";

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

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 1 </label>

<div class="col-md-6" >

<input type="file" name="product_img1" class="form-control" >
<br><img src="upload/<?php echo $p_image1; ?>" width="70" height="70" >

</div>

</div><!-- form-group Ends -->



</div><!-- form-group Ends -->



</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >  Price </label>

<div class="col-md-6" >

<input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>" >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Stock </label>

<div class="col-md-6" >

<input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>" >

</div>

</div><!-- form-group Ends -->

<label class="col-md-3 control-label" > desc </label>
<div class="col-md-6" >
<div class="form-group " ><!-- form-group Starts -->
<textarea name="product_desc"  class=" form-control "  row="5" required ><?php echo $p_desc; ?></textarea>
</div>



</div>
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update " class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 





<?php

if(isset($_POST['update'])){

$product_title = $_POST['product_title'];

$cat = $_POST['cat'];

$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];





$status = "product";

$product_img1 = $_FILES['product_img1']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];

if(empty($product_img1)){

$product_img1 = $new_p_image1;

}





move_uploaded_file($temp_name1,"upload/$product_img1");


$update_product = "update items set 	category_id='$cat',name_item='$product_title',item_image='$product_img1',price='$product_price',item_desc='$product_desc',Stock='$product_keywords' where id='$p_id'";

$run_product = mysqli_query($conn,$update_product);

if($run_product){

echo "<script> alert('Product has been updated successfully') </script>";

echo "<script>window.open('productlist.php','_self')</script>";

}



?>

<?php } ?>
