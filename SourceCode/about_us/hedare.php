<?php include "./lib/Databaseconfig.php"; 
session_start();
if (isset($_SESSION['cart'])) {
$counter=count($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Bejeweled | Home</title>
    <link rel="shortcut icon" href="admin/upload/Logo2.ico" type="image/x-icon" />



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


</head>

<body>

    <!--== Header Area Start ==-->
    <header id="header-area">
        <div class="ruby-container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-3 col-lg-1 col-xl-2 m-auto">
                    <a href="./index.php" class="logo-area">
                        <img src="admin/upload/Logo.png" alt="Logo" style="width:200px;height:50p" class="img-fluid" />
                    </a>
                </div>
                <!-- Logo Area End -->

                <!-- Navigation Area Start -->
                <div class="col-3 col-lg-9 col-xl-8 m-auto">
                    <div class="main-menu-wrap">
                        <nav id="mainmenu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="all.php"> Shop</a></li>
                                <li><a href="./Men.php">Men</a></li>
                                <li><a href="./Women.php">Women </a></li>
                                <li><a href="./conctus.php">Contact Us</a></li>
                           
                                
                                <?php if (!isset($_SESSION['firstname'])) { ?>
                                    <li><a href="http://localhost/01%20Team%203/registration.php"><i class="fa fa-user-o"></i>&nbsp; Sign Up </a></li>
                                    <li><a href="./Login_form.php"><i class="fa fa-user-o"></i>&nbsp; Login </a></li>

                                <?php } else {
                                    $id = $_SESSION['id']; ?>
                                    <li style="color:#D8C35D ;">||&nbsp; Welcome,<?php echo $_SESSION['firstname']?>&nbsp;||</li>
                                    <li><a href="./userpage.php"><i class="fa fa-user-o"></i>&nbsp;&nbsp; My Account</a></li>
                                    <li><a href="./logout.php"><i class="fa fa-user-o"></i>&nbsp;&nbsp; Logout</a></li>
                                <?php } ?>

                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Navigation Area End -->



                <!-- Header cart Start -->
                <div class="col-6 col-lg-2 m-auto">
                    <div class="header-right-meta text-right">
                        <ul><li class="shop-cart"><a href="./cart.php"><i class="fa fa-shopping-bag"></i> <span class="count"><?php echo $counter ?></span></a>
                            </div>
                    </div>
                    </li>
                    </ul>
                </div>
            </div>
            <!-- Header cart End -->
        </div>
        </div>
    </header>
    <!--== Header Area End ==-->