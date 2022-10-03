<?php 



class SignUpUser extends Dbconn {
   
    public $emailErr;
    public $passErr;
    public $passErr2;
    public $emailErr3;
    public $FnameErr;
    public $MnameErr;
    public $FAMnameErr;
    public $Fname;
    public $FAMname;
    public $Mname;
    public $email;
    public $pass;
    public $errorNum=0;
 


   public function signUpValidation($emailInput,$FnameInput,$MnameInput,$FAMnameInput,$passInput,$passcInput){

      
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($emailInput)) {
        $this->emailErr = "Email is required";
        $this->errorNum++;
      } else {
        $email =$emailInput;
        $Regexemail ='/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';        
        if (!preg_match($Regexemail,$email)) {
            $this->emailErr = "Invalid email format";
            $this->errorNum++;
        }
      }
    






      if (empty($FnameInput)) {
        $this->FnameErr = "First Name is required";
        $this->errorNum++;
      } else if (!preg_match("%^[ -~]+$%",$FnameInput)) {
        $this->FnameErr = "Only letters and space are allowed in First Name filed"; 
        $this->errorNum++;
        }else{
        $Fname =$FnameInput;
   
      }




    
      if (empty($MnameInput)) {
        $this->MnameErr = "Middle Name is required";
        $this->errorNum++;
      } else {
        $Mname =$MnameInput;
        if (!preg_match("%^[ -~]+$%",$Mname)) {
            $this->MnameErr = "Only letters and space are allowed in Middle Name filed";
            $this->errorNum++;
        }


      }
    



    

      if (empty($FAMnameInput)) {
        $this->FAMnameErr = "Family Name is required";
        $this->errorNum++;
      } else {
        $FAMname =$FAMnameInput;
        if (!preg_match("%^[ -~]+$%",$FAMname)) {
            $this->FAMnameErr = "Only letters and space are allowed in Family Name filed";
            $this->errorNum++;
        }
       
      }
    
    




      if (empty($passInput)) {
            $this->passErr = "Password is required";
            $this->errorNum++;
          } else {
      $pass =$passInput;
      if( !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/",$pass)  || strlen($pass) < 10 || strlen($pass) > 15 ) {
        $this->passErr = 'Password should be (10-15) characters in length and should include at least one upper case letter, one number, and one special character.';
        $this->errorNum++;
    }
    }
    


    if (empty($passcInput)) {
      $this->passErr = "Password confirmation error is required";
      $this->errorNum++;
    } else{
      $passc =$passcInput;
      if( !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/",$passc)  || strlen($passc) < 10 || strlen($passc) > 15 ) {
        $this->passErr = 'Password should be (10-15) characters in length and should include at least one upper case letter, one number, and one special character.';
        $this->errorNum++;
    }

    }   if($pass!=$passcInput){
      $this->passErr2 =  "Passwords dosent match";
      $this->errorNum++;
    }




   
    if ($this->errorNum == 0 ) {
    
      
        try {
            $mysqldate = date('Y-m-d H:i:s');
            $mobile=$_POST["mobile"];
            $address=$_POST["address"];
            $addData="INSERT INTO users (email,mobile,first_name,middle_name,last_name,address,user_pass,user_type,reg_date) 
            VALUES('$email','$mobile','$Fname','$Mname','$FAMname','$address','$pass','user','$mysqldate')";
            $this->connect()->query($addData);
            header("Location:./Login_form.php");
        
        } catch (\Throwable $th) {
        
            $this->emailErr3= "Please try another First name or Email";
        }
    }else{
      echo $this->errorNum;
    }
    
    
    
    
    }
    
    
        
      
    
    
    
    

    


}}