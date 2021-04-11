<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
/*
// define variables and set to empty values
$nameTable = $naslov = $direktorij  =  $fajl = "";
//$nameTable = $imeZdr = $priimekZdr  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nameTable = test_input($_POST["nameTable"]);
 // $nameTable = vstavi($_POST["nameTable"]);
  
    
$nalozi['naslov'] = test_input($_POST["naslov"]);
$nalozi['direktorij'] = test_input($_POST["direktorij"]);
$nalozi['file'] = basename($_FILES["fileToUpload"]["name"]); 

 
  
vstavi($nameTable,$naslov,$direktorij,$fajl);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
*/
?>

<?php
//----naloži datoteko besedila pod originalnim imenom----
$nameTable = $_POST["nameTable"];
$nalozi['naslov'] = $_POST["naslov"];
$nalozi['direktorij'] = $_POST["direktorij"];
$nalozi['file'] = basename($_FILES["fileToUpload"]["name"]);
//$nalozi[''] = '';
//$nalozi[''] = '';

echo "<h2>Naslov prispevka: " . $_POST["naslov"]. "</h2><br>";

//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $nalozi['direktorij'] . $nalozi['file'];

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {

echo "<h2>" . $target_file . " že obstaja.</h2><br> ";
   if (!empty($_POST["obstojeca"] )){
	   $uploadOk = $_POST["obstojeca"] ;
	
   }else{
  $uploadOk = 0;
   }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<h2>Sorry, your file is too large.</h2>";
  $uploadOk = 0;
}

 //Check for pdf format
            if (!empty($_FILES['fileToUpload']['tmp_name'])) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $_FILES['fileToUpload']['tmp_name']);
                if (($mime != 'application/pdf') && ($mime != 'image/jpg') && ($mime != 'image/jpeg') && ($mime != 'image/gif') && ($mime != 'image/png')) {

                    $uploadOk = 0;
                    echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>This file is not a valid file.</strong></div>";

                    //exit();

                }} //this bracket was missing I think
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<h1>Sorry, your file was not uploaded.</h1>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
vstavi($nameTable,$nalozi['naslov'] ,$nalozi['direktorij'],$nalozi['file']);
    echo "<h1>The file ". $nalozi['file']. " je bila naložena kot: " . $target_file . "</h1>";
  } else {
    echo "<h1>Sorry, there was an error uploading your file.</h1>";
  }
}
?>

<?php


function vstavi($nameTable,$naslov,$direktorij,$fajl) {
	include '../skupne/prijavniWeb.php';

$nameTable;
$naslov;
$direktorij;
$fajl;



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO". " " . $nameTable . " " . " (naslov, direktorij, fajl)
    VALUES ('$naslov', '$direktorij', '$fajl')";
	echo "<br>";
	echo $sql . "<br>" ;
	
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    { 
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>

</body>
</html>