<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--konec zahlavi-->

<?php
/* V tom failu so funkcije za spreminjanje tabele databaze*/
include '../skupne/database.php';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  $bolnisnica = test_input($_POST["bolnisnica"]);
  echo strtoupper($akce) .'<br>';
  echo strtoupper($bolnisnica) .'<br>';
  echo var_dump($bolnisnica) .'<br>';
  //$akce = naredi($akce);




switch ($akce) {
  case "vyber":
   // echo "to je vyber.<br>";
    vyberFunction($bolnisnica);
    break;
case "vloz":
    vlozFunction();
    break;
  case "edit":
     editFunction();
    break;
 case "delete":
     deleteFunction();
    break;	
	
    /*  ...*/
  default:
    echo "ni izvelo case";
	
}//od switch
}//od if
function vyberFunction($bolnisnica){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$stolpci=["*"];
//$stolpci=["ime","priimek"];
//$podminka = array("ime"=>"Jiří");
$podminka = array("bolnisnica"=>$bolnisnica);
//$podminka = array("ime"=>"Jiří", "Ben"=>"37", "Joe"=>"43");


$vyber = new database($tabulka, $stolpci, $podminka );
$vyber->vyber($tabulka, $stolpci, $podminka);
$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
//echo $vybrano[1];
echo var_dump($vybrano);
echo "<br>";
echo count($vybrano);
$dolzina=count($vybrano);
//echo $vybrano[1];
echo "<br>";
for ($i = 0; $i < $dolzina; $i++) {
foreach ($vybrano[$i] as $key => $value) {
   // echo "$key: $value\n";
	echo "$value\n";
}//od foreach
}//od for
}//od vyberFunction

function vlozFunction(){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$data= array("bolnisnica"=>"izola", "ime"=>"Lela", "priimek"=>"Hollan", "status"=>"1");

$vloz = new database($tabulka,$data);
//$vloz->vloz($tabulka,$data);
$vlozeno=$vloz->vloz($tabulka,$data );
//echo $vlozeno[1];
echo "<br>";
echo var_dump($vlozeno);
echo "<br>";
echo count($vlozeno);
echo "<br>";
}//od vlozFunction

function editFunction(){
	echo 'editFunction še ni napisana';
}//od editFunction

function deleteFunction(){
	echo 'deleteFunction še ni napisana';
}//od editFunction

?>
<h2>PHP Form izbira funkcije</h2>

<button onclick="izborFunction('vyber')">vyber</button>
<button onclick="izborFunction('vloz')">vlož</button>
<button onclick="izborFunction('edit')">edit</button>
<button onclick="izborFunction('delete')">delete</button>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  

  <br><br>
 <!-- <label for="vyber"> vyber</label>  
  <input type="radio" id="vyber" name="akce" value="vyber">
  <label for="vloz"> vlož</label>
  <input type="radio" id="vloz" name="akce" value="vloz">
  <label for="edit"> spremeni</label>
  <input type="radio" id="edit" name="akce" value="edit">
  <label for="delete"> odstrani</label> 
  <input type="radio" id="delete" name="akce" value="delete">-->

  <!--<p id="formaId"></p> -->

<input type="text" id="akceId" name="akce" value=""><br>

<!--<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica">-->
<p id="demo"></p>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<script>
function izborFunction(akce) {
  document.getElementById("akceId").value = akce;
 if(akce=="vyber"){ 
 document.getElementById("demo").innerHTML = '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica">';
}
}
</script>

<!--zapati-->
</body>
</html>