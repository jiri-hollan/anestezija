<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<p>vnesi ime tabele and click OK:</p>



<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="besedila">
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
// define variables and set to empty values
$name  = "";

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

case "":

break;

case "":

break;

case "":

break;

case "":

break;

case "":

break;

case "":

break;

case "":

break;
default:
    echo "ni izvelo get case"; 
  }//od switch	$ime
}// od function naredi($ime)
?>
<?php
echo "<h2>Your Input:</h2>";
echo "<br>";
?>

<?php

/*$definice= "id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naslov VARCHAR(30) NOT NULL,
    direktorij VARCHAR(30) NOT NULL,
	fajl VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";*/
//$databaseGloboka=new DatabaseGloboka;
//$databaseGloboka->naredi('besedilaTbl', $definice);

?>

</body>
</html>
