<?php 

session_start();

class SigninUser extends Dbconn {
   
    
   public $emailErr2;
   public $passErr;
   public $emailErr;


   public function signInValidation($uname, $pass, $return_url){



    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     $uname =validate($_POST['email']);
     $pass =validate($_POST['password']);
     
 
     if (empty( $uname)) {
       $this->emailErr= "Please enter your email";
 
     }if(empty( $pass)){
        $this->passErr= "Please enter your passwored";
 
     }



        if(!empty($pass) && !empty($uname)){
        
            $sql = "SELECT * FROM users WHERE user_email  ='$uname' AND user_pass='$pass'";
                $result = mysqli_query($this->connect(), $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) === 1) {
                if ($row['user_email'] === $uname && $row['user_pass'] === $pass && $row['user_type']=="user") {
                    echo "Logged in!<br>";
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['first_name'];
                    $_SESSION['lastname'] = $row['last_name'];
                    $_SESSION['userType'] = $row['user_type'];
                    $_SESSION['email'] = $row['user_email'];
                    $_SESSION['userlogin'] = true;
                    if($return_url != null) {
                        header("location:$return_url");
                    }else  {
                        header("location:./index.php");
                    }
                    
                }
    
               else{
                    $_SESSION['adminlogin'] = true;
                    //echo "Logged in!<br>";
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['first_name'];
                    $_SESSION['lastname'] = $row['last_name'];
                    $_SESSION['userType'] = $row['user_type'];
                    $_SESSION['email'] = $row['user_email'];
               
    
                    header("Location:./admin/dashboard.php");
               
                
               }
    
            }else{   $this->emailErr2= "wrong pass or email";}
        }
    
    }




    
    }

    