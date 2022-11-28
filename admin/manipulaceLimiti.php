
<?php
require_once '../skupne/sabloni/zahlavi.php';
?>
<!--konec zahlavi-->
<h2>PHP Form izbira funkcije</h2>

<button onclick="izborFunction('vyber')">vyber</button>
<button onclick="izborFunction('vloz')">vlož</button>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="hidden" id="akceId" name="akce" value="">
<p id="demo"></p>
<p id="posli"></p>
<!--<input type="submit" name="submit" value="Submit"> -->
</form>
 <br>
<!-- <p id="demo1">demo1</p>
<p id="demo2">demo2</p>-->
<p id="demo3"></p>
<?php
 
/* V tom failu so funkcije za spreminjanje tabele databaze*/
include '../skupne/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  $skupina = test_input($_POST["skupina"]);

 // $ime = test_input($_POST["ime"]);
  //$min = test_input($_POST["min"]);
 // $max = test_input($_POST["max"]);
  echo strtoupper($akce) .': ';
//  echo strtoupper($skupina) .'<br>';
  //echo var_dump($max) .'<br>';
  //$akce = naredi($akce);
switch ($akce) {
  case "vyber":
   // echo "to je vyber.<br>";
  // if ($skupina == "") {
	$podminka = NULL;
/*} else {
    $podminka = array("skupina"=>$skupina);
}*/
    vyberFunction($podminka);
    break;
case "vloz":
    $ime = test_input($_POST["ime"]);
    $min = test_input($_POST["min"]);
    $max = test_input($_POST["max"]);  
    $data= array("skupina"=>$skupina, "ime"=>$ime, "min"=>$min, "max"=>$max);
    vlozFunction($data);
    break;
case "uredi":
    $tabulka="limitiTbl";
    $id=test_input($_POST["id"]);
    $skupina=test_input($_POST["skupina"]);
    $ime = test_input($_POST["ime"]);
	$min = test_input($_POST["min"]);
	$max = test_input($_POST["max"]); 
	$podminka = array("id"=>$id);
    $data= array("skupina"=>$skupina, "ime"=>$ime, "min"=>$min, "max"=>$max);
	$aktualizuj = new database($tabulka,$data,$podminka);
	$aktualizovano=$aktualizuj->aktualizuj($tabulka,$data,$podminka);

    break;
  default:
    echo "ni izvelo case";
	
}//od switch
}//od if

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["akce"])) {
  $akce = test_input($_GET["akce"]);
  switch ($akce) {
	   case "uredi":
     $id = test_input($_GET["id"]);
	 echo "id uporabnika= " .  $id;
	echo "<br>";
	// var_dump($id);
	// echo "<br>"; 
	 $podminka = array("id"=>$id);
     editFunction($podminka);
    break;
 case "odstrani":
      $id = test_input($_GET["id"]);
	 echo "id uporabnika= " .  $id;
	echo "<br>";
    $podminka = array("id"=>$id);
	odstraniFunction($podminka);
    // odstraniFunction();
    break;	
	
    /*  ...*/
  default:
    echo "ni izvelo get case"; 
  }//od switch	  
}//od if



function vyberFunction($podminka){
//$tabulka="uporabnikiTbl2";
$tabulka="limitiTbl";
$stolpci=["*"];
//$stolpci=["ime","min"];
//$podminka = array("ime"=>"Jiří");
//$podminka = array("skupina"=>$skupina);
//$podminka = array("ime"=>"Jiří", "Ben"=>"37", "Joe"=>"43");

$vyber = new database();
//$vyber = new database($tabulka, $stolpci, $podminka );
//$vyber->vyber($tabulka, $stolpci, $podminka);
$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
//echo $vybrano[1];
//echo var_dump($vybrano);
echo "<br>";
echo count($vybrano);
//$dolzina=count($vybrano);
//echo $vybrano[1];
echo "<br>";
if(count($vybrano)>0){

echo "<table id='osebe' style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>skupina</><th>ime</th><th>min</th><th>max</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() { 
		 return "<td  >"  . parent::current() . "</td>";
    }
    function beginChildren() {
        echo "<tr>";
    }
    function endChildren() {
		$a = 'onclick="' . "izborFunction('uredi')" . '"';
		$b = 'onclick="' . "izborFunction('odstrani')" . '"';
        echo "<td onclick=" . '"izborFunction('. "'uredi'".')"'.'"' . ">uredi</td>
		<td onclick=" . '"izborFunction('. "'odstrani'".')"'.'"' . ">odstrani</td>
		
		</tr>" . "\n";
    }
}

foreach(new TableRows(new RecursiveArrayIterator($vybrano)) as $k=>$v) {
        echo $v;

}//od foreach
}//od if(cout)
else{
echo "Za izbrano bolnisnico ni zapisa v bazi";	
}//od else
}//od vyberFunction  

function vlozFunction($data){
//$tabulka="uporabnikiTbl2";
$tabulka="limitiTbl";
//$data= array("skupina"=>"izola", "ime"=>"Lela", "min"=>"Hollan", "max"=>"1");

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

function editFunction($podminka){
//	echo 'editFunction opšalje podatke v urediFunction';
$tabulka="limitiTbl";
$stolpci=["*"];
$vyber = new database($tabulka, $stolpci, $podminka );
$vyber->vyber($tabulka, $stolpci, $podminka);
$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
//echo $vybrano[1];
//echo var_dump($vybrano);
echo "<br>";
echo "število vybranych zapisov= " . count($vybrano);
$dolzina=count($vybrano);
//echo $vybrano[1];
echo "<br>";
echo "<form  method='post'>";
for ($i = 0; $i < $dolzina; $i++) {
foreach ($vybrano[$i] as $key => $value) {
   // echo "$key: $value\n";
	echo " $key: <input name=$key value=$value\n></input>";
	//echo "$value\n";
}//od foreach
echo "<input type='hidden' name='akce' value='uredi'></input><br><br><button type='submit'>submit</button><button type='reset'>reset</button> ";
echo "</form>";
}//od for	
	
	
	
}//od editFunction

function odstraniFunction($podminka){
	//echo 'odstraniFunction še ni napisana';
	$tabulka="limitiTbl";
	$odstrani = new database();
	$odstranjeno=$odstrani->odstrani($tabulka, $podminka );
	echo 'Odstranjen je bil '.$odstranjeno.' uporabnik';
}//od odstraniFunction

?>

<script src="js/manipulaceLimiti.js?<?php echo time(); ?>">
</script>

<!--zapati-->
</body>
</html>