<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../lib/Databaseconfig.php";?>


        <div class="grid_10">
            <div class="box round first grid mt-5">
                <h2>Category List</h2>
                <div class="block">
					<table class="table">
                <?php 
         
		 echo '
		 <tr class="null"> 
			 <th>id</th> 
			 <th>Category Name</th> 
			 <th></th>
             <th></th>
		 </tr>';


	 $query = "SELECT * FROM category";
	 $conn->query($query);
   if ($result = $conn->query($query)) {
	   while($row = $result->fetch_assoc()){   
		   echo "<tr>
		   <td>" . $row['category_id'] . "</td>
		   <td>" . $row['category_name'] . "</td>
		   <td> <form  action='./deleteConfirmation-cat.php' method='post'><button class='btn btn-danger' type='submit' name='del' value='" . $row['category_id'] . "'>Delete</button></form></td>
		   <td> <form  action='./Edite Form-cat.php' method='GET'><button class='btn btn-primary' type='submit' name='update_cat' value='" . $row['category_id'] . "'>Edite</button></form></td>
   
	   
   
   
   
				 </tr>";
	   }
	   echo "</table><br><Br>"; 
   } 
                  

                         ?>
			
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>


