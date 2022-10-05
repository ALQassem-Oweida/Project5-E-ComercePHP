
<?php 

 include "./Dbh.inc.php";
 include './Login.php';
 
?>

<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="./assets/css/login.css" rel="stylesheet">

</head>    
<body>

<?php

if (isset($_POST['email']) && isset($_POST['password'])) {
$return_url = $_GET['return_url'];
$SigninValdiation=new SigninUser();
$SigninValdiation->signInValidation($_POST['email'],$_POST['password'], $return_url);

}

?>



<div class="BackToHome"><a href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg><a></div>

<div class="grid text-center">
  <div class="g-col-4"><br><br><br><br>
    
  <h3>Log in</h3>
  <p>Welcome Back! Log in with your credentials </p>
  <form action="" method="POST" onsubmit="return validation()"  style="margin-top: 2.5em" >
                      
                              <span class="error">  <?php if (isset($SigninValdiation->emailErr2)) {echo "* " . $SigninValdiation->emailErr2;}?></span>
                            <input type="email" id="email" name="email" placeholder="Email"  >
                            <span class="error">     <?php if (isset($SigninValdiation->emailErr)) {echo "* " . $SigninValdiation->emailErr;}?></span>
                            <input type="password" id="password" name="password" placeholder="Password"  >
                            <span class="error"> <?php if (isset($SigninValdiation->passErr)) {echo "* " . $SigninValdiation->passErr;}?></span>
                            <button   type="submet" class="log_in">Log in</button><br><br>
                            <p>Dont have an account?<a href="./registration.php"> Sign up</a></p>
                      </form><br><br>

  </div>

</div>



</body>
</html>

