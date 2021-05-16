<!DOCTYPE html>
<html>
<body>

<?php
//----------prijavni podatki za podatkovno bazo odvisno od uporabljenega strežnika------

try {
	require '../skupne/prijavniWeb.php';

    $stmt = $conn->prepare("SELECT id, naslov, direktorij, fajl FROM besedilaTbl");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//---- dvorazmerni array iz basedilaTbl-----------------------------------------------------------------------
	 
	 $moznosti=$stmt->fetchAll();
	//var_dump($moznosti); 
	
//---------------------prikaže izbiro vnešenega besedila iz podatkov v bazi "navodila" tabela "besedilaTbl"------------------	

echo '<ul id= "navodilaId">';
 foreach ($moznosti as $value) {
  //var_dump($value);
  echo '<li><a href= "' . $value["direktorij"] . $value["fajl"] . '" >' . $value["naslov"] . '</a></li>';
}
echo '</ul>';	
	
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