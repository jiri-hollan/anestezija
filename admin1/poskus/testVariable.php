<?php

class OcistiData {
    public $data;
   	public function __construct() {
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//var_dump ($_POST["status"]);	

if (!empty($_POST["id"])) {
			//echo $_POST["id"];
	$data['id'] = $this->test_input($_POST["id"]);
  }	
  
//if (!empty($_POST["status"])) 
 if (!is_null($_POST["status"])) {
	 if ($_POST["status"]===""){}
	 else{
	$data['status'] = $this->test_input($_POST["status"]);
	 }
  }	
  
if (!empty($_POST["ime"])) {
	$data['ime'] = $this->test_input($_POST["ime"]);
	
  }	

if (!empty($_POST["priimek"])) {
    $data['priimek'] = $this->test_input($_POST["priimek"]);  
  }
  
if (!empty($_POST["email"])) {
    $data['email'] = $this->test_input($_POST["email"]);
  }
  
  if (!empty($_POST["uname"])) {
    $data['uname'] = $this->test_input($_POST["uname"]);
  }

}
	//var_dump ($data);
	
$this->data=$data;
}// od construct




function test_input($data) {

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

}// od class ocistiData

?>