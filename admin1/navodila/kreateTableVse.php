<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<h2>Naredi tabelo</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <label for="besedila">besedila</label>
  <input type="radio" id="besedila" name="name" value="besedila">

  <label for="uporabniki">uporabniki</label>
  <input type="radio" id="uporabniki" name="name" value="uporabniki">
  
   <label for="limiti">limiti</label>
   <input type="radio" id="limiti" name="name" value="limiti">
   
   <label for="pregledovalci">pregledovalci</label>
   <input type="radio" id="pregledovalci" name="name" value="pregledovalci">
   
   <label for="bolnisnice">bolnisnice</label>
   <input type="radio" id="bolnisnice" name="name" value="bolnisnice">  
    
   <label for="sklepi">sklepi</label>
   <input type="radio" id="sklepi" name="name" value="sklepi"> 
      
   <label for="bolnik">bolnik</label>
   <input type="radio" id="bolnik" name="name" value="bolnik"> 
    
 <!--  <label for="lala">lala</label>
   <input type="radio" id="lala" name="name" value="lala"> 
   
   <label for="lala">lala</label>
   <input type="radio" id="lala" name="name" value="lala"> 
   -->
   
  <br><br>
  <input type="submit" name="submit" value="Submit">  
  <br>
</form>

<?php
// define variables and set to empty values
$name  = "";
$ime  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $name = naredi($name);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function naredi($ime) {
include '../../skupne/narediTablo.php';	
$databaseGloboka=new DatabaseGloboka;	
switch ($ime) {	
case "besedila":
$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naslov VARCHAR(30) NOT NULL,
    direktorij VARCHAR(30) NOT NULL,
	fajl VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
$databaseGloboka->naredi('besedilaTbl', $definice);
break;

case "uporabniki":
$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
	`uname` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
	`geslo` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
	`ime` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
	`priimek` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
    `status` int(3) NOT NULL,
    `pristop` int(3) NOT NULL,	
	UNIQUE (email, uname)";
$databaseGloboka->naredi('uporabnikiTbl2', $definice);
break;

case "limiti":
$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`skupina` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,	
	`ime` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
    `min` float(4) NOT NULL,
	`max` float(4) NOT NULL";
$databaseGloboka->naredi('limitiTbl', $definice);
break;

case "pregledovalci":
$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`bolnisnica` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,	
	`ime` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
	`priimek` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
    `status` int(3) NOT NULL";
$databaseGloboka->naredi('pregledovalciTbl', $definice);
break;

case "bolnisnice":
$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	mesto varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
	nazivB varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
    status int(3) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
$databaseGloboka->naredi('bolnisniceTbl', $definice);
break;

case "sklepi":
$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`bolnisnica` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,	
	`sklep` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
    `status` int(3) NOT NULL";
$databaseGloboka->naredi('sklepiTbl', $definice);
break;

case "bolnik":
$definice= "pregledId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
datPregleda DATE,
imeZdravnika VARCHAR(100),
stevMaticna INTEGER,
ustanova VARCHAR(30),
EMSO NUMERIC(20), 
dan INTEGER,
mesec INTEGER,
leto INTEGER,
datRojstva VARCHAR(100),
starost NUMERIC(3),
ime VARCHAR(100),
priimek VARCHAR(100),
oddelek VARCHAR(100),
dgOperativna VARCHAR(100),
opNacrtovana VARCHAR(100),
teza DECIMAL(5),
visina DECIMAL(4,2),
bmi INTEGER,
krvniTlak VARCHAR(100),
pulz NUMERIC(3),
hb DECIMAL(3),
ks DECIMAL(3,1),
inr DECIMAL(3,1),
aptc DECIMAL(3),
trombociti DECIMAL(4),
kreatinin DECIMAL(3),
laktat NUMERIC(2,1),
pbnp NUMERIC(3),
pct NUMERIC(3,1),
crp NUMERIC(3),
na NUMERIC(3),
k NUMERIC(2,1),
drugiIzvidi VARCHAR(100),
ekg VARCHAR(255),
rtg VARCHAR(255),
dgPridruzene VARCHAR(255),
terPredhodna VARCHAR(255),
asa INTEGER,
mallampati INTEGER,
alergija VARCHAR(100),
izvidiInOpombe BLOB(2147483647),
premedVecer VARCHAR(100),
premedPredOp VARCHAR(100),
navodila VARCHAR(255),
sklep VARCHAR(255),
status CHARACTER(15)";
$databaseGloboka->naredi('bolnikTbl', $definice);
break;
/*
case "":
$definice= "";
$databaseGloboka->naredi('', $definice);
break;
*/
default:
    echo "ni izvelo get case"; 
  }//od switch	$ime
 echo "<h2>Your Input: ".$ime."</h2>";
echo "<br>"; 
}// od function naredi($ime)


?>


</body>
</html>
