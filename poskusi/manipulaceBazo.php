<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--konec zahlavi-->
<h2>PHP Form izbira funkcije</h2>

<button onclick="izborFunction('vyber')">vyber</button>
<button onclick="izborFunction('vloz')">vlož</button>
<button onclick="izborFunction('edit')">edit</button>
<button onclick="izborFunction('delete')">delete</button>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <br><br>


<input type="text" id="akceId" name="akce" value=""><br>
<p id="demo"></p>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php
 
/* V tom failu so funkcije za spreminjanje tabele databaze*/
include '../skupne/database.php';
function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
 // $test = strtolower($test);
  return $test;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  $bolnisnica = test_input($_POST["bolnisnica"]);
 // $ime = test_input($_POST["ime"]);
  //$priimek = test_input($_POST["priimek"]);
 // $status = test_input($_POST["status"]);
  echo strtoupper($akce) .'<br>';
  echo strtoupper($bolnisnica) .'<br>';
  //echo var_dump($status) .'<br>';
  //$akce = naredi($akce);




switch ($akce) {
  case "vyber":
   // echo "to je vyber.<br>";
    $podminka = array("bolnisnica"=>$bolnisnica);
    vyberFunction($podminka);
    break;
case "vloz":
    $ime = test_input($_POST["ime"]);
    $priimek = test_input($_POST["priimek"]);
    $status = test_input($_POST["status"]);  
    $data= array("bolnisnica"=>$bolnisnica, "ime"=>$ime, "priimek"=>$priimek, "status"=>$status);
    vlozFunction($data);
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
function vyberFunction($podminka){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$stolpci=["*"];
//$stolpci=["ime","priimek"];
//$podminka = array("ime"=>"Jiří");
//$podminka = array("bolnisnica"=>$bolnisnica);
//$podminka = array("ime"=>"Jiří", "Ben"=>"37", "Joe"=>"43");

$vyber = new database();
//$vyber = new database($tabulka, $stolpci, $podminka );
//$vyber->vyber($tabulka, $stolpci, $podminka);
$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
//echo $vybrano[1];
echo var_dump($vybrano);
echo "<br>";
echo count($vybrano);
$dolzina=count($vybrano);
//echo $vybrano[1];
echo "<br>";


echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>bolnišnica</><th>ime</th><th>priimek</th><th>status</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() { 
		 return "<td  >" . "<input style='width: 150px;border:1px solid black;' value=" . parent::current() . "></input>". "</td>";
    }
    function beginChildren() {
        echo "<tr>";
    }
    function endChildren() {
        echo "</tr>" . "\n";
    }
}

foreach(new TableRows(new RecursiveArrayIterator($vybrano)) as $k=>$v) {
        echo $v;

}//od foreach
}//od vyberFunction  

function vlozFunction($data){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
//$data= array("bolnisnica"=>"izola", "ime"=>"Lela", "priimek"=>"Hollan", "status"=>"1");

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

<script>
function izborFunction(akce) {
  document.getElementById("akceId").value = akce;

switch(akce) {
  case "vyber":
    document.getElementById("demo").innerHTML = '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica">';// omogoči izbiro bolnišnice
    break; 
  case "vloz":
    bolnisnica= '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica">';
    ime= '<input type="text" id="imeId" name="ime" value="" placeholder="ime">';
    priimek= '<input type="text" id="priimekId" name="priimek" value="" placeholder="priimek">';
    status= '<input type="int" id="statusId" name="status" value="" placeholder="status">';
    document.getElementById("demo").innerHTML = bolnisnica + ime + priimek + status;
    // code block
    break;
  case y:
    // code blo
    break;
  case y:
    // code block
    break;	
  default:
    // code block
 }//od switch
} // od izborFunction
</script>

<!--zapati-->
</body>
</html>