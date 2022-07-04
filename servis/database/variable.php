<?php
if (isset($_REQUEST["bolnisnica"])) {
$dataPreg= '["bolnisnica", "ime", "priimek", "status"]';
//$dataPreg= '["bolnisnica"]';
$dataSklep= '["bolnisnica", "sklep", "status"]';
$poradiPreg= "priimek";
$poradiSklep= "sklep";


$data=array();
function array_push_assoc($data, $value, $a){
   $data[$value] = $a;
   return $data;
}


foreach (json_decode($dataPreg) as $value) {
 //echo "$value <br>";
    $a= new Test_input($_REQUEST[$value]); 
	$a= $a->get_test();	
 // $a='$'.$value.'= new test_input($_POST["'.$value.'"]);';
 // $b='$this->'.$value. '= $'.$value .'->get_test();';
  //echo '$'.$value.'= new test_input($_POST["'.$value.'"]);<br>';
  //echo '$this->'.$value. '= $'.$value .'->get_test();<br>';
//$a;
//var_dump ($a);
$data =array_push_assoc($data, $value, $a);
//echo "<br>";
}
var_dump ($data);
}
 	class Test_input {
	public $test;	
  function __construct($test) {
	//parent::__construct($test);
   $test = trim($test);
  $test = stripslashes($test);
  $this->test = htmlspecialchars($test);
  }//od construct
  function get_test() {
    return $this->test;
  }  
}//od class Test_input

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" id="bolnisnica" name="bolnisnica" value="">
<input type="text" id="ime" name="ime" value="">
<input type="text" id="priimek" name="priimek" value="">
<input type="text" id="status" name="status" value="">
<input type="submit" name="submit" value="Submit"> 
</form>