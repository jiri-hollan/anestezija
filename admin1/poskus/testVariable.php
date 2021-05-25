<?php
class ocistiData {
    public $data;
   	public function __construct() {
		
	//echo $_POST["ime"];	
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

}// od construct




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}// od class ocistiData
?>