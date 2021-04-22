<?php
function vstavi($email,$geslo,$ime,$priimek) {
	include '../skupne/prijavniWeb.php';

$nameTable = "uporabnikiTbl";
$email = $_POST["email"];
$geslo = $_POST["geslo"];
$ime = $_POST["ime"];
$priimek = $_POST["priimek"];
$status = 1;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO". " " . $nameTable . " " . " (email,geslo,ime,priimek,status)
  VALUES ('$email','$geslo','$ime','$priimek','$status')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
?>