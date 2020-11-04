<!DOCTYPE html>
<html>
<body>

<h1>uporaba gesla</h1>

<?php

if(isset($_GET['psw'])){
   $geslo = $_POST["psw"];       
}

 if ($geslo == "bridion123") {
//sem pride peklop na razpored
}else{
echo "napačno geslo";
}

?>

</body>
</html>