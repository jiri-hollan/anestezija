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
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  echo strtoupper($akce) .'<br>';
  //$akce = naredi($akce);




switch ($akce) {
  case "vyber":
   // echo "to je vyber.<br>";
    vyberFunction();
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
function vyberFunction(){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$stolpci=["*"];
//$stolpci=["ime","priimek"];
//$podminka = array("ime"=>"Jiří");
$podminka = array("bolnisnica"=>"Izola");
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
  funkcija: <!--<input type="text" name="akce">-->
  <br><br>
 <input type="radio" id="vyber" name="akce" value="vyber">
  <label for="vyber">vyber</label><br>
  <input type="radio" id="vloz" name="akce" value="vloz">
  <label for="vloz">vlož</label><br>
  <input type="radio" id="edit" name="akce" value="edit">
  <label for="edit">spremeni</label><br> 
  <input type="radio" id="delete" name="akce" value="delete">
  <label for="delete">odstrani</label><br> 
   
 <!-- <input type="radio" id="javascript" name="akce" value="JavaScript">
  <label for="javascript">JavaScript</label>-->
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<!--zapati-->
</body>
</html>