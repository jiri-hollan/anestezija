<!DOCTYPE html>
<html>
<body>

<?php

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "navodila";*/

require '../skupne/prijavniWeb.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, naslov, direktorij, fajl FROM besedilaTbl");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
     //   echo $v;
	 
	 $moznosti=$stmt->fetchAll();
	//var_dump($moznosti); 
	
//----------------------------------------------------------------------------------------------------------	




?>
<!--<a id="buttonDomov" href="../menuFile.php" >Domov</a>-->
<!--<ul id= "navodilaId">-->
<?php

/*
echo '<li><a href= "' . $moznosti[0]["direktorij"] . $moznosti[0]["fajl"] . '" >' . $moznosti{0}["naslov"] . '</a></li>';
echo '<li><a href= "' . $moznosti[1]["direktorij"] . $moznosti[1]["fajl"] . '" >' . $moznosti{1}["naslov"] . '</a></li>';
echo '<li><a href= "' . $moznosti[2]["direktorij"] . $moznosti[2]["fajl"] . '" >' . $moznosti{2}["naslov"] . '</a></li>';
echo '<li><a href= "' . $moznosti[3]["direktorij"] . $moznosti[3]["fajl"] . '" >' . $moznosti{3}["naslov"] . '</a></li>';
*/
echo '<ul id= "navodilaId">';
 foreach ($moznosti as $value) {

  //var_dump($value);

  echo '<li><a href= "' . $value["direktorij"] . $value["fajl"] . '" >' . $value["naslov"] . '</a></li>';

}
 
echo '</ul>';	
?>	
<!--</ul>	-->
<?php	
//-------------------------------------------------------------------------------------------------------------	
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

</body>
</html>