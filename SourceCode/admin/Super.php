<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../lib/Databaseconfig.php";?>

   

<div class="grid_10 ">
            <div class="box round first grid mt-5">
                <h2>Category List</h2>
                <div class="block">
					<table class="table">

<?php
//  session_start();



// $x=$_SESSION['userType'];


    // echo '<br><h4>Hi, ' . $_SESSION["firstname"] . ' ' . $_SESSION["lastname"].'</h4><br>';



    $query ="SELECT * FROM users " ;



echo '
      <tr class="null"> 
     

          <th>First Name</th> 
          <th>Middle Name</th> 
          <th>Family Name</th> 
          <th>Email</th>  
          <th>Pass</th> 
          <th>Phone</th> 
          <th>address</th> 
          <th>Gender</th> 
          <th></th>
          <th></th>
     



      </tr>';

if ($result = $conn->query($query)) {
    while($row = $result->fetch_assoc()){   
        echo "<tr>

        
        <td>" . $row['first_name'] . "</td>
        <td>" . $row['middle_name'] . "</td>
        <td>" . $row['last_name'] . "</td>
        <td>" . $row['user_email'] . "</td>
        <td>" . $row['user_pass'] . "</td>
        <td>" . $row['user_phone'] . "</td>
        <td>" . $row['address'] . "</td>
        <td>" . $row['gender'] . "</td>

        <td> <form  action='./deleteConfirmation-user.php' method='post'><button class='btn btn-danger' type='submit' name='del' value='" . $row['user_id'] . "'>Delete</button></form></td>
        <td> <form  action='./Edite Form-user.php' method='GET'><button class='btn btn-primary' type='submit' name='update_users' value='" . $row['user_id'] . "'>Edit</button></form></td>

    



              </tr>";
    }
    echo "</table><br><Br>"; 
} 







?>

</html>









