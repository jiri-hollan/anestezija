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
include 'database1.php';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  echo $akce;
  //$akce = naredi($akce);




switch ($akce) {
  case "vyber":
    echo "to je vyber";
    vyberFunction();
    break;
 /* case label2:
    code to be executed if n=label2;
    break;
  case label3:
    code to be executed if n=label3;
    break;
    ...*/
  default:
    echo "ni izvelo case";
}//od switch
}//od if
function vyberFunction(){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$stolpci=["*"];
//$stolpci=["ime","priimek"];
$podminka = array("ime"=>"Jiří");
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
?>
<h2>PHP Form izbira funkcije</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
  funkcija: <input type="text" name="akce">
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<!--zapati-->
</body>
</html>