
<?php include "./inc/hedare.php";
$id=$_GET['id'];

if (isset($_POST["add_item"])) {
    $ok = 1;
    if ($ok == 1) {
        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION["cart"], 'product_id');
          
            if (in_array($_POST['add_to_cart_id'], $items)) {
				
                // header("location:store.php?id={$_GET['id']}");
             
            } else {
                $item_array = array(
                    'product_id' => $_POST['add_to_cart_id'],
                    'product_price' => $_POST['product_price'],
                    'product_name' => $_POST['product_name'],
                    'product_image' => $_POST['product_image'],
					'quantity'=>1,
                   
                );
                $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
                // header("location:store.php");
      
            }
        } else {
            $item_array = array(
                'product_id' => $_POST['add_to_cart_id'],
                'product_price' => $_POST['product_price'],
                'product_name' => $_POST['product_name'],
                'product_image' => $_POST['product_image'],
				$quantity=$_POST['qty'],
				'quantity'=>1,
               
            );
            $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
            // header("location:store.php}");
      
        }
    }
}else{
 
}


?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Single Product Page</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" />

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!--=== Font-Awesome CSS ===-->
    <link href="assets/css/vendor/font-awesome.css" rel="stylesheet">
    <!--=== Plugins CSS ===-->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>


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


                                    <span class="price"><?php echo $row["price"] ?> JOD</span>
                                    <p class="products-desc"><?php echo $row["description"] ?></p>
                                    <p class="products-desc">( <?php echo $row["stock"] ?> ) Pieces available</p>
                                    <form method="POST" action="">
                                    <div class="product-quantity d-flex align-items-center">
                                        <div class="quantity-field">
                                            <label for="qty">Qty</label>
                                            <input name="qty" type="number" id="qty" min="1" max="<?php echo $row["stock"] ?>" value="   " />
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



                                                    <div class="ratting-form-wrapper fix">
                                                        <h3>Add your Comments</h3>
                                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                                            <div class="ratting-form row">
                                                                <div class="col-12 mb-4">
                                                                    <h5>Rating:</h5>

                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="name">Name:</label>
                                                                    <input name="name" id="name" placeholder="Name" type="text">
                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="email">Email:</label>
                                                                    <input name="email" id="email" placeholder="Email" type="text">
                                                                </div>
                                                                <div class="col-12 mb-4">
                                                                    <label for="your-review">Your Review:</label>
                                                                    <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <!-- <button type="submit" name="save" class="btn btn-primary">Save </button> -->
                                                                    <input name="save" value="add review" type="submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
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