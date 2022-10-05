<?php 
session_start();
if(!isset( $_SESSION['email'])){

  header("Location:http://localhost/01%20%20Team%203/Login_form.php");
  
  }else{


    $name=$_SESSION['firstname'];
    $family= $_SESSION['lastname'];

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="border: 2px white; background-image: url(images/logo2.jpg);"></a>
	        <ul class="list-unstyled components mb-5">

	      

          <li class="active">
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Oreders</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?inbox">Inbox</a>
                </li>
              </ul>
	          </li>






	         
	          <li >
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category Option</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?catadd">Add Category</a>
                </li>
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?catlist">Category List</a>
                </li>
           
              </ul>
              
	          </li>


            <li>
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product Option</a>
              <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?insert_product">Add Product</a>
                </li>
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?productlist">Product List</a>
                </li>
              
              </ul>
              
	          </li>
	         


            <li>
              <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Comments</a>
              <ul class="collapse list-unstyled" id="pageSubmenu3">
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?comments">Comments list</a>
                </li>
                <li>
                    <!-- <a href="http://localhost/01%20Team%203/admin/index.php?">Product List</a> -->
                </li>
              
              </ul>
              
	          </li>






            <li >
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users Option</a>
              
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="http://localhost/01%20Team%203/admin/dashboard.php?Admin_user_view">Edite users</a>
                </li>
      
	            </ul>
	          </li>






	        </ul>

	      </div>
    	</nav>




      
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <h5> &nbsp;&nbsp;&nbsp;&nbsp; Welcome Mr.  <?php echo $name." ".$family ?></h5>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../logout.php"><h5>Log Out</h5></a>
                </li>
              
                    
              
             
              </ul>
            </div>
          </div>
        </nav>


        <?php



if(isset($_GET['Admin_user_view'])){
    include "Admin_user_view.php";
}

if(isset($_GET['catadd'])){
  include "catadd.php";
}

if(isset($_GET['catlist'])){
  include "catlist.php";
}


if(isset($_GET['insert_product'])){
  include "insert_product.php";
}

if(isset($_GET['productlist'])){
  include "productlist.php";
}

if(isset($_GET['comments'])){
  include "comments.php";
}

if(isset($_GET['inbox'])){
  include "inbox.php";
}

?>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

<?php 
}
?>