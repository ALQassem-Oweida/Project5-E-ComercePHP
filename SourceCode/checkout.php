<?php include "./inc/hedare.php"; ?>
<?php include "./lib/Databaseconfig.php" ?>
<?php ob_start(); include "./lib/Session.php";?>

<?php $counter = count($_SESSION['cart']); ?>

<head>
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" />
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

</head>

<body>

   

 <!--== Page Content Wrapper Start ==-->
    <div id="page-content-wrapper" class="p-9">
        <div class="container">
            <!--== Checkout Page Content Area ==-->

            <form action="?" method="POST">

                <div class="row">

                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Billing Details</h2>
                            <div class="billing-form-wrap">


                                <!-- <form action="
                        <?php

                        // echo htmlspecialchars($_SERVER["PHP_SELF"]);
                        ?>
                        " method="GET"> -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="f_name" class="required">First Name</label>
                                            <input name="Fname" type="text" id="f_name" placeholder="First Name" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="l_name" class="required">Last Name</label>
                                            <input name="Lname" type="text" id="l_name" placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email Address</label>
                                    <input name="email" type="email" id="email" placeholder="Email Address" required />
                                </div>



                                <div class="single-input-item">
                                    <label for="street-address" class="required">Address</label>
                                    <input name="Staddress" type="text" id="street-address" placeholder="Street address Line 1" required />
                                </div>









                                <div class="single-input-item">
                                    <label for="phone">Phone</label>
                                    <input name="phone" type="text" id="phone" placeholder="Phone" required />
                                </div>








                            </div>

                        </div>

                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="order-summary-details">
                            <h2>Your Order Summary</h2>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Items in cart</th>
                                                <th><?php echo $counter ?></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong><?php echo  $_SESSION['sum_order'] ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>


                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox">
                                            
                                        </div>

                                        <button class="btn-add-to-cart" name="order_place" type="submit"> Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--== Checkout Page Content End ==-->
        </div>
    </div>
    <!--== Page Content Wrapper End ==-->


    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['confirm'])) {
        $Fname = '';
        $Lname = '';
        $fullName =  '';
        $email =  '';
        $Staddress =  '';
        $phone =  '';

        if(isset($_POST['Fname'])) {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $fullName = $Fname . ' ' . $Lname;
        $email = $_POST['email'];
        $Staddress = $_POST['Staddress'];
        $phone = $_POST['phone'];
        } else if (isset($_SESSION['Fname'])) {   
        $Fname = $_SESSION['Fname'];
        $Lname = $_SESSION['Lname'];
        $fullName = $Fname . ' ' . $Lname;
        $email = $_SESSION['email'];
        $Staddress = $_SESSION['Staddress'];
        $phone = $_SESSION['phone'];
        }



        if(Session::isUserLoggedIn()) {
            //var_dump($_SESSION);
            $u_id = $_SESSION['id'];
            $u_name = $_SESSION['firstname'];

            //Billing Address
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
            $uniqueOrderId = $today . $rand;

            $counter = 0;
            if (isset($_SESSION["cart"])) {
                
                //die($_SESSION);
                $result = false;
               
                foreach ($_SESSION['cart'] as $key => $value) {
                    $counter++;
                    $qun = $value['quantity'];
                    $id = $value['product_id'];

                    $addData = "INSERT INTO orders(order_number, productId,customer_id,quantity,ordered_by,order_address) 
                VALUES('$uniqueOrderId','$id','$u_id','$qun','$fullName','$Staddress')";

                    $result = $conn->query($addData);
                }

               
                if ($result) {
                    unset($_SESSION["cart"]);
                   
                    header("Location: ./all.php?action=order_confirm&order_number=$uniqueOrderId");
                }
            }
            
        } else {
            
           
        $_SESSION['Fname'] =   $Fname ; 
        $_SESSION['Lname'] = $Lname ;
        $_SESSION['email'] = $email ;
        $_SESSION['Staddress'] = $Staddress ;
        $_SESSION['phone'] = $phone ;



            header("Location: ./Login_form.php?return_url=checkout.php?confirm=true");
        }

        } 
    
    ?>









    <?php
    include "./inc/footer.php"
    ?>














</body>

</html>