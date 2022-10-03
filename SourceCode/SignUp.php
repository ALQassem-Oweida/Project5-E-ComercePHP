<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="./assets/css/SignUp.css" rel="stylesheet">

<?php 
include "./Dbh.inc.php";
include "./SignUp-code.php";

$Valdiation=new SignUpUser();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$Valdiation->signUpValidation($_POST['email'],$_POST['mobile'],$_POST['Fname'],$_POST['Mname']
,$_POST['FAMname'],$_POST['address'],$_POST['pass'],$_POST['passc']);

}
?>


</head>    
<body>


<div class="BackToHome"><a href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg><a></div>

<div class="grid text-center">
  <div class="g-col-4">
    
  <h3>Sign Up</h3>
  <p>Create an account it's free</p><br>
  <span class="error"> <?php echo $Valdiation->emailErr3;?></span>

  
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"   style="margin-top: 2.5em" >
                      
                 
                            
                            <input style="width:100%;" type="text" id="email" name="email" placeholder="Email" >
                            <span class="error"> <?php echo $Valdiation->emailErr;?></span>
                            <!-- <div id="email_err" style="color: red"></div> -->
                          

                            <input style="width:100%;" type="number" id="mobile" name="mobile" placeholder="mobile" required >

                            <div >
                            <input  type="text" id="Fname" name="Fname" placeholder="First name"  >
                            <input type="text " id="Mname" name="Mname" placeholder="Middle name"  ></div>
                            <div class="fiftey">
                            <input type="text" id="FAMname" name="FAMname" placeholder="Last name" >
                            <input type="text" id="address" name="address" placeholder="Address"  required>    
                            <div>
                            <!-- <div id="name_err" style="color: red"></div> -->
                         <div>
                            <span class="error"> <?php echo $Valdiation->FnameErr."&nbsp&nbsp&nbsp&nbsp&nbsp";?></span>
                            <span class="error"> <?php echo $Valdiation->MnameErr;?></span>
                            <span class="error"> <?php echo $Valdiation->FAMnameErr;?></span>
                         </div>
    

                            <input  type="password" id="password" name="pass" placeholder="Password"  >
                            <input  type="password" id="passwordc" name="passc" placeholder="Confirme Password"  >
                            <span class="error"> <?php echo $Valdiation->passErr;?></span>
                            <span class="error"> <?php echo $Valdiation->passErr2;?></span>
                            <div id="pass_err" style="color: red"></div>

                            <!-- <p id="passwordmessage"> the passowrd must be from 3 to  15 characters  </p> -->
                            <button name="submit" type="submit" class="sign_up">Sign Up</button>
                            <p>Alreday have an account?<a href="./Login_form.php"> Log in</a></p>
                      </form><br><br>

  


  </div>

</div>







</body>
</html>


