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
$name  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);

   prikazi($name);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>

<script>
document.write('<form method="get" action="');
document.write('../skupne/ogledTabele.php');
document.write('" >');
document.write('<br>');
document.write(' Name: <input type=' + '"text' + '" name="imeTable' + '">');
document.write('  <input type="submit" name="submit" value="Submit">');  
document.write('</form>');
</script>


<?php
echo "<h2>Your Input:</h2>";
echo "ime table=   " . $name;

?>

</body>
</html>