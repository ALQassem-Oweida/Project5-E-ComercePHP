
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
		<th>Ordered by</th> 
		<th>Email</th> 

	</tr>';



$query ="select *  from orders
join  users on orders.customer_id   = users.user_id
join proudcts on orders.productId= proudcts.product_id
";


$conn->query($query);
$Total_incum=0;
// intval($Total_incum);
// intval($totalPrice);
// intval($totalPrice);


if ($result = $conn->query($query)) {

    // $Total_incum=0;
	// intval($Total_incum);
  while($row = $result->fetch_assoc()){ 
	
	$totalPrice=($row['price']*$row['quantity']);
	$Total_incum+=$totalPrice;
	intval($totalPrice);
	intval($Total_incum);
	  echo "<tr>
	  <td>" . $row['order_id'] . "</td>
	  <td>" . $row['product_name'] . "</td>
	  <td>" . $row['price']." JOD" . "</td>
	  <td>" . $row['quantity'] . "</td>
	  <td>" . $totalPrice. " JOD</td>
	  <td>" . $row['date'] . "</td>
	  <td>" . $row['ordered_by'] . "</td>
	  <td>" . $row['user_email'] . "</td>

			</tr>";
  }
  echo "</table><br><br>"; 
} 
			 
	
               ?>
	<tr>
	<td ><h5><?php echo 'Total income :'?></h5></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td style="border:2px solid black ;"><h6 style="color:green">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?php echo $Total_incum;?> ) JOD</h6></td>
	
	</tr>	
		   
			</tbody>
		</table>

       </div>
    </div>
</div>


