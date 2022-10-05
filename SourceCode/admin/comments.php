
<?php include "../lib/Databaseconfig.php";



?>
<div class="grid_10">
    <div class="box round first grid mt-5">
        <h2>Post List</h2>

		<table class="table"><tbody>
        <?php 
    
	
	echo '
	<tr >
	    <th>Product id</th> 
		<th>Product Name</th> 
		<th>customer Name</th> 
		<th>Comments</th> 
		<th>approval</th> 
		<th></th>
        <th></th>

	</tr>';

	
	


	$query ="select users.first_name , reviews.id, reviews.productID,reviews.customersID,reviews.id,reviews.review,reviews.approval,proudcts.product_id , proudcts.product_name from users
	join reviews on reviews.customersID  = users.user_id
	join proudcts on reviews.productID= proudcts.product_id WHERE approval=0
	";

$conn->query($query);

if ($result = $conn->query($query)) {
  while($row = $result->fetch_assoc()){   
	  echo "<tr>
	  <td>" . $row['product_id'] . "</td>
	  <td>" . $row['product_name'] . "</td>
	  <td>" . $row['first_name'] . "</td>
	  <td>" . $row['review'] . "</td>
	  <td>" . $row['approval'] . "</td>
	  <td> <form  action='./deleteConfirmation-comments.php' method='post'><button class='btn btn-danger' type='submit' name='del2' value='" . $row['id'] . "'>Delete</button></form></td>
	  <td> <form action='./comments.php' method='GET'><button class='btn btn-primary' type='submit' name='approve_comment' value='" . $row['id'] . "'>Approve</button></form></td>

  



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


<?php


if (isset($_GET['approve_comment'])){
        $approval= mysqli_real_escape_string($conn,$_GET['approve_comment'] );
        $query = "UPDATE reviews SET approval=1 WHERE id='$approval' ";
        $query_run = mysqli_query($conn, $query);
		if( $query_run = mysqli_query($conn, $query)){
			echo "<script>
			alert('Comment approved successfully');
			window.location.href='http://localhost/01%20Team%203/admin/dashboard.php?comments';
			</script>";}
      

}


?>





