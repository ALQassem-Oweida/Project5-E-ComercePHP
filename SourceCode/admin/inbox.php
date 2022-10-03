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
		<th>Proudect Name</th>
		<th>Single Unit Price</th>  
		<th>Quantity</th> 
		<th>Total Price</th>  
		<th>Date</th> 
		<th>Email</th> 
		<th>First Name</th> 


	</tr>';



$query ="select *  from orders
join  users on orders.customer_id   = users.user_id
join proudcts on orders.productId= proudcts.product_id
";


$conn->query($query);
if ($result = $conn->query($query)) {
  while($row = $result->fetch_assoc()){ 
	
	$totalPrice=($row['price']*$row['quantity'])." JOD";
	
	  echo "<tr>
	  <td>" . $row['order_id'] . "</td>
	  <td>" . $row['product_name'] . "</td>
	  <td>" . $row['price']." JOD" . "</td>
	  <td>" . $row['quantity'] . "</td>
	  <td>" . $totalPrice. "</td>
	  <td>" . $row['date'] . "</td>
	  <td>" . $row['user_email'] . "</td>
	  <td>" . $row['first_name'] . "</td>


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

