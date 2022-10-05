<?php
class db{
    
public function connect(){
    try{
        $servername='localhost';
        $username='root';
        $password='';
        $database='project4';
        $dbh = mysqli_connect($servername, $username, $password,$database);


        return $dbh;



    }
    catch(PDOException $e){
        die ("<h5><br>Connection failed to (  $database ) database</h5><br>");


     }

    }
 }






?>