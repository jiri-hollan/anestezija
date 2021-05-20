<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<p>vnesi ime tabele and click OK:</p>

<?php
// define variables and set to empty values
$id  =  $uname = $status ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $id = test_input($_POST["id"]);
    $uname = test_input($_POST["uname"]);
  $status = test_input($_POST["status"]);
   prikazi($id,$uname,$status);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      id: <input type="text" name="id">
  <br><br>
   uname: <input type="text" name="uname">
  <br><br>    
   status: <input type="text" name="status">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>



<?php
function prikazi($id, $uname, $status) {
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>email</th><th>username</th><th>geslo</th><th>ime</th><th>priimek</th><th>status</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
include '../../skupne/streznik.php';
try {
	
	//echo $_POST['uname'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT * FROM uporabnikiTbl2 WHERE id='$id' AND uname='$uname'");
	$stmt = $conn->prepare("UPDATE uporabnikiTbl2 SET status='$status' WHERE id='$id' AND uname='$uname'");
    $stmt->execute();

    // set the resulting array to associative
   // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   /* foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }*/
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
	
	//echo $_POST['uname'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM uporabnikiTbl2 WHERE id='$id' AND uname='$uname'");
	//$stmt = $conn->prepare("UPDATE uporabnikiTbl2 SET status='$status' WHERE id='$id' AND uname='$uname'");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
echo "</table>";
}
?>

</body>
</html>
