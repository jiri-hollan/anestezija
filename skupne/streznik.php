<?php
/*$servername = $_SERVER['SERVER_NAME'];
$username = "anestiz";
$password = "laringoskop";
$dbname = "anestiz_navodila";


if ( $_SERVER['SERVER_NAME']=="localhost") {
//$servername = "localhost";
$username = "root";
$password = "";
$dbname = "navodila";

}*/

 $this->servername = $_SERVER['SERVER_NAME'];	  
      $this->username = "anestiz";
      $this->password = "laringoskop";
      $this->dbname = "anestiz_navodila";

          if ( $_SERVER['SERVER_NAME']=="localhost") {
              $this->username = "root";
              $this->password = "";
              $this->dbname = "navodila";
            }

 
?>