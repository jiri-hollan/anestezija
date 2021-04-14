<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
 include '../skupne/prijavniWeb.php';
//Connect to MySQL using the PDO object.
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//Our SQL statement, which will select a list of tables from the current MySQL database.
$sql = "SHOW TABLES";
 
//Prepare our SQL statement,
 $statement = $conn->prepare($sql);
//Execute the statement.
$statement->execute();
 
//Fetch the rows from our statement.
//$tables = $statement->fetchAll(PDO::FETCH_NUM);
  $tables = $statement->fetchAll(PDO::FETCH_BOTH);
//Loop through our table names.
foreach($tables as $table){
    //Print the table name out onto the page.
    //echo $table[0], '<br>';
	print_r($table);
	echo '<br>';
print("\n");
	
}
?>
</body>
</html>