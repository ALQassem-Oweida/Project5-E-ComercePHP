
<?php include "./inc/hedare.php";
$id=$_GET['id'];

if (isset($_POST["add_item"])) {
 
        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION["cart"], 'product_id');
          
            if (in_array($_POST['add_to_cart_id'], $items)) {
				
                header("refresh:0");
             
            } else {
                $item_array = array(
                    'product_id' => $_POST['add_to_cart_id'],
                    'product_price' => $_POST['product_price'],
                    'product_name' => $_POST['product_name'],
                    'product_image' => $_POST['product_image'],
					'quantity'=>$_POST['itemQuntety'],
                   
                );
                $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
				header("refresh:0");
      
            }
        } else {
            $item_array = array(
                'product_id' => $_POST['add_to_cart_id'],
                'product_price' => $_POST['product_price'],
                'product_name' => $_POST['product_name'],
                'product_image' => $_POST['product_image'],
                'quantity'=>$_POST['qty'],

               
            );
            $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
            header("refresh:0");
	
      
        }
    }


			
                   
         

?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  


<style>
    #page-content-wrapper > div > div > div > div > div:nth-child(1) > div.col-lg-5 > div > div > a > img{
        width:70%;
        border: 2px black solid;
   }
</style>


</head>

<body>

<?php

$query = "SELECT * FROM proudcts where product_id='$id'  ";
$conn->query($query);

if ($result = $conn->query($query) ) {
    $row = $result->fetch_assoc()

        ?>

    <!--== Page Content Wrapper Start ==-->
    <div id="page-content-wrapper" class="p-9">
        <div class="ruby-container">
            <div class="row">
                <!-- Single Product Page Content Start -->
                <div class="col-lg-12">
                    <div class="single-product-page-content">
                        <div class="row">
                            <!-- Product Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="product-thumbnail-wrap">
                                 
                                        <div class="single-thumb-item">
                                            <a  href="single-product.html"><?php echo "<img  src=" . 'admin/upload/' . $row['img'] . ">" ?></a>
                                    


                                    </div>
                                </div>
                            </div>
                            <!-- Product Thumbnail End -->

   
                            <!-- Product Details Start -->
                            <div class="col-lg-7 mt-5 mt-lg-0">
                                <div class="product-details">
                                    <h2><a href="single-product.html"><?php echo $row["product_name"] ?></a></h2>


                                    <label for="qty">Available in Stock : (<?php echo $row["stock"] ?>) </label><br>


                                    <span class="price"><?php echo $row["price"] ?> JOD</span>
                                    <p class="products-desc"><?php echo $row["description"] ?></p>
                                    <p class="products-desc">( <?php echo $row["stock"] ?> ) Pieces available</p>
                                    <form method="POST" action="">
                                    <div class="product-quantity d-flex align-items-center">
                                        
                                        <div class="quantity-field"> 
                                                 
                                            <label for="qty">Qty </label>
                                            <input name="itemQuntety" type="number" id="qty" min="1" max="<?php echo $row["stock"] ?>" value="1" />
                                        </div>
								        	<input type="hidden" name="add_to_cart_id" value="<?php echo $row['product_id']; ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                            <input type="hidden" name="product_image" value="<?php echo $row['img']; ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                                     
									<button  class=" btn-add-to-cart" name="add_item" type="submit">Add to cart </button></form>



        
                                    </div>

                                  
                                </div>
                            </div>
                            <!-- Product Details End -->
                        </div>


<?php }?>






<?php




$query = "SELECT * ,COUNT(productID) FROM reviews  	
join  users on  reviews.customersID=users.user_id  where  productID='$id' AND approval=1";
$conn->query($query);

if ($result = $conn->query($query) ) {
    while ($row = $result->fetch_assoc() ) { 
       $row["COUNT(productID)"];


        ?>



                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Product Full Description Start -->
                                <div class="product-full-info-reviews">
                                    <!-- Single Product tab Menu -->
                                    <nav class="nav" id="nav-tab" active>
                                        <a id="reviews-tab" data-toggle="tab" href="#reviews" active>Reviews</a>
                                    </nav>
                                    <!-- Single Product tab Menu -->

                                    <!-- Single Product tab Content -->
                                    <div class="tab-content" id="nav-tabContent">
                                     
                                        <div class="tab-pane fade" id="reviews">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="product-ratting-wrap">
                                                        <div class="pro-avg-ratting">
                                                          
                                                            <span>Based on ( <?php echo $row["COUNT(productID)"]; ?> ) Comments</span>
                                                        </div>
                                                        <div class="ratting-list">
                                                       
                                                        </div>
                                                        <div class="rattings-wrapper">

                                                            <div class="sin-rattings">
                                                                <div class="ratting-author">
                                                                    <h3><?php echo $row["first_name"] ?></h3>

                                                                </div>
                                                            </div>
                                                            <p><?php echo $row["review"] ?></p>
                                                        </div>

                                                    </div>

                                                    <?php }}?>



                                             <!-- comment adding reviewes  -->

                                             <?php if(!isset($_SESSION['email'])){

echo "<h3 style='color:red'>Plese Sign in to add a comment</h3>";
                                             }
                                                ?>
                                             
<?php if(isset($_SESSION['id'])){
    if(isset($_POST['save'])){
$user_comment=$_POST['review'];
$user_id=$_SESSION['id'];
$id=$_GET['id'];
$query="INSERT INTO reviews(productID,customersID,review)
values ($id,$user_id,$user_comment) ";
$conn->query($query);
    }



?>
                                                    <div class="ratting-form-wrapper fix">
                                                        <h3>Add your Comments</h3>
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            <div class="ratting-form row">
                                                                <div class="col-12 mb-4">
                                                                    <h5>Rating:</h5>

                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="name">Name:</label>
                                                                    <input name="name" id="name" placeholder="Name" type="text" value="<?php echo  $_SESSION['firstname'] ?>">
                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="email">Email:</label>
                                                                    <input name="email" id="email" placeholder="Email" type="text" value="<?php echo  $_SESSION['email'] ?>">
                                                                </div>
                                                                <div class="col-12 mb-4">
                                                                    <label for="your-review">Your Review:</label>
                                                                    <textarea name="review" id="your-review" placeholder="Write a review" ></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <!-- <button type="submit" name="save" class="btn btn-primary">Save </button> -->
                                                                    <input name="save" value="add review" type="submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

<?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product tab Content -->
                            </div>
                            <!-- Product Full Description End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Product Page Content End -->
        </div>
    </div>
    </div>
    <!--== Page Content Wrapper End ==-->


<!--=======================Javascript============================-->
<!--=== Jquery Min Js ===-->
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<!--=== Jquery Migrate Min Js ===-->
<script src="assets/js/vendor/jquery-migrate-1.4.1.min.js"></script>
<!--=== Popper Min Js ===-->
<script src="assets/js/vendor/popper.min.js"></script>
<!--=== Bootstrap Min Js ===-->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!--=== Plugins Min Js ===-->
<script src="assets/js/plugins.js"></script>

<!--=== Active Js ===-->
<script src="assets/js/active.js"></script>


</body>

</html>