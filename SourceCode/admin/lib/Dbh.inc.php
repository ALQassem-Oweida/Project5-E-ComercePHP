<?php

class Dbconn {

          private  $servername;
          private  $username;
          private  $password;
          private  $database;

          protected function connect(){

          $this->servername = "localhost";
          $this->username = "root";
          $this->password = "";
          $this->database = "db_shop";

          $conn= new mysqli($this->servername,$this->username,$this->password,$this->database);
       return $conn;


          }
        }