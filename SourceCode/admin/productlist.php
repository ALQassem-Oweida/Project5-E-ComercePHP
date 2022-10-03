<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../lib/Databaseconfig.php";?>

<div class="grid_10">
    <div class="box round first grid mt-5">
        <h2>Post List</h2>

		<table class="table"><tbody>
        <?php 
    
	
	echo '
	<tr > 
		<th>id</th> 
		<th>Product Name</th> 
		<th>Price</th> 
		<th>Img</th> 
		<th>Description</th> 
		<th>Stock</th> 
		<th>Gender</th> 
		<th></th>
          <th></th>

	</tr>';


$query = "SELECT * FROM proudcts";
$conn->query($query);
if ($result = $conn->query($query)) {
  while($row = $result->fetch_assoc()){   
	  echo "<tr>
	  <td>" . $row['product_id'] . "</td>
	  <td>" . $row['product_name'] . "</td>
	  <td>" . $row['price'] . "</td>
      <td><img width='60px' highet='60px' src=".'upload/'.$row['img']."></td>		
	  <td>" . $row['description'] . "</td>
	  <td>" . $row['stock'] . "</td>
	  <td>" . $row['gender'] . "</td>

	  <td> <form  action='./deleteConfirmation-prod.php' method='post'><button class='btn btn-danger' type='submit' name='del' value='" . $row['product_id'] . "'>Delete</button></form></td>
	  <td> <form  action='./Edite Form.php' method='GET'><button class='btn btn-primary' type='submit' name='update' value='" . $row['product_id'] . "'>Edite</button></form></td>

  



			</tr>";
  }
  echo "</table><br><Br>"; 
} 
			 
	
               ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script> -->

