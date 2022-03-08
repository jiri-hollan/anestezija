
<?php
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 require_once('manipulaceClass.php');
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
  echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
  //echo var_dump($status) .'<br>';
  //$akce = naredi($akce);
switch ($akce) {
case "vyber":
    $bolnisnica=test_input($_POST["bolnisnica"]);		
    $tabulka="pregledovalciTbl";
    $stolpci=["*"];
	$vyber = new vyber($bolnisnica, $tabulka,$stolpci);
	$vyber->vyberFunction();
    break;
case "vloz":
    $ime = test_input($_POST["ime"]);
    $priimek = test_input($_POST["priimek"]);
    $status = test_input($_POST["status"]);  
    $data= array("bolnisnica"=>$bolnisnica, "ime"=>$ime, "priimek"=>$priimek, "status"=>$status);
    vlozFunction($data);
    break;
case "uredi":
    $tabulka="pregledovalciTbl";
    $id=test_input($_POST["id"]);
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
	$priimek = test_input($_POST["priimek"]);
	$status = test_input($_POST["status"]); 
	
	$uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $status);
	$uredi->aktualizujFunction();
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
default:
    echo "ni izvelo get case"; 
  }//od switch	  
}//od if


//__________________________________________________________________________________

 
//_______________________________________________________________________________
function vlozFunction($data){
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
//primer polja: $data= array("bolnisnica"=>"izola", "ime"=>"Lela", "priimek"=>"Hollan", "status"=>"1");
$vloz = new database();
$vlozeno=$vloz->vloz($tabulka,$data );
//echo $vlozeno[1];
echo "<br>";
echo var_dump($vlozeno);
echo "<br>";
echo count($vlozeno);
echo "<br>";
}//od vlozFunction
//__________________________________________________________________________________
function editFunction($podminka){
//	echo 'editFunction opšalje podatke v urediFunction';
$tabulka="pregledovalciTbl";
$stolpci=["*"];
$vyber = new database();
//$vyber->vyber($tabulka, $stolpci, $podminka);
$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
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
echo "<input type='hidden' name='akce' value='uredi'></input><br><br><button class='submit' type='submit'>potrdi</button><button type='reset'>reset</button> ";
echo "</form>";
}//od for		
}//od editFunction
//_______________________________________________________________________________________
function odstraniFunction($podminka){
	//echo 'odstraniFunction še ni napisana';
	$tabulka="pregledovalciTbl";
	$odstrani = new database();
	$odstranjeno=$odstrani->odstrani($tabulka, $podminka );
	echo 'Odstranjen je bil '.$odstranjeno.' uporabnik';
}//od odstraniFunction

?>

<script src="js/manipulaceBazo.js?<?php echo time(); ?>">
</script>



<!--zapati-->
</body>
</html>