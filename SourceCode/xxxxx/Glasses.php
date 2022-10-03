<?php include "./inc/hedare.php"?>


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
	li{
		padding-left:20px;
	}
	li:hover{
background-color: #17A2B8;
	}
</style>


  <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">


  <?php include "./lib/Databaseconfig.php"; ?>
<br><br><br><br>

  
<div class="container">
	<div class="row">
	<aside class="col-md-3">
		
<div class="card mt-3">
	<article class="filter-group">
		<header class="card-header">
	
		
				<h6 class="title" style="font-size:x-large">Product type</h6>
			
		</header>
		<div class="filter-content collapse show" id="collapse_1" >
			<div class="card-body">




				<form class="pb-3">
				<div class="input-group">

                    <form action="./Search.php" method="POST">
				  <input type="text" name="serach_word" style="padding:20px;font-size:large" class="form-control" placeholder="Search Products">
				  <div class="input-group-append">
				    <button class="btn btn-info" type="submit" ><i class="fa fa-search"></i></button>
				  </div>

				</div>
				</form>
				


				<ul style="font-size:large;font-weight:bold;" class="list-menu">
				<li ><a style="color:black" href="./all.php">All  </a></li><br>
				<li><a style="color:black" href="./Watches.php">Watches </a></li><br>
				<li><a style="color:black" href="./Perfumes.php">Perfumes  </a></li><br>
				<li><a style="color:black" href="./Glasses.php">Glasses  </a></li><br>
	
				</ul>

			</div> <!-- card-body.// -->
		</div>
	</article> <!-- filter-group  .// -->
	
	<article class="filter-group">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
				<h6 class="title"  style="font-size:x-large">Price range </h6>
			</a>
		</header>


		<div class="filter-content collapse show" id="collapse_3" >
			<div class="card-body">
				<form action="" method="GET">
				<!-- <input type="range" class="custom-range" min="0" max="100" name=""> -->
				<div class="form-row">
				<div class="form-group col-md-6">
				  <label>Min</label>
				  <input class="form-control" value="0" placeholder="$0" type="number" name="min">
				</div>
				<div class="form-group text-right col-md-6">
				  <label>Max</label>
				  <input class="form-control" value="100000" Placeholder="$1,0000" type="number" name="max">
				</div>
				</div> <!-- form-row.// -->
				<button class="btn btn-block btn-lg btn-info">Apply</button>	</form >
			</div><!-- card-body.// -->
		</div>






</div> <!-- card.// -->

	</aside>

	<main class="col-md-9">
	<hr>
<header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
	            	<?php
                       $query ="SELECT COUNT(product_id)FROM proudcts where catID=3";
                       $conn->query($query);
					   if ($result = $conn->query($query) ) {
						$row = $result->fetch_assoc();}
				
                      ?>
			
			<span class="mr-md-auto" style="font-weight:900;font-size:large;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?php echo  $row["COUNT(product_id)"] ?>  )
			 &nbsp;Items found on Glasses Category  </span>
		
		
		</div>
</header><!-- sect-heading -->




<div class="row">


<?php
$min=0;
$max=5000;
if(isset($_GET['min']) && isset($_GET['max'])){
	$min=$_GET['min'];
	$max=$_GET['max'];
}


$query = "SELECT * FROM proudcts where  catID=3 AND price BETWEEN $min AND $max ";
$conn->query($query);


if ($result = $conn->query($query) ) {
	while ($row = $result->fetch_assoc() ) { 

		?>


	<div class="col-md-4 mb-5">
		<figure class="card card-product-grid">
			<div class="img-wrap mb-5"> 
			
				<center><?php echo "<img width='200px' highet='200px' src=" . 'admin/upload/' . $row['img'] . ">" ?>	</center>

			</div> <!-- img-wrap.// -->
			<figcaption class="info-wrap">
				<div class="fix-height">
				<center>	<a  href="#" class="title"><?php echo $row["product_name"] ?></a></center>
					<div class="price-wrap mt-2">
					<center>	<span class="price"><?php echo $row["price"] . ' JOD' ?></span></center>
					
					</div> <!-- price-wrap.// -->
				</div>
				<a href="#"  class="btn btn-block btn-dark btn-lg mt-4">Add to cart </a>
			</figcaption>
		</figure>
	</div> <!-- col.// -->

	<?php

}
}

?>




</div> <!-- row end.// -->




	</main>
	</div>
</div>
<br><br><br>
<?php 
    include "./inc/footer.php"
     ?>



<?php 

// $key="";
// if(isset( $_GET['serach_word'])){
//   $key_word=  $_GET['serach_word'];
// }
// $query = "SELECT * FROM proudcts where product_name LIKE '%$key_word%'";
// $conn->query($query);

?>