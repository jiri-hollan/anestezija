<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/navodila.css?<?php echo time(); ?>">
</head>
<body>
<?php

require_once('../frontend/home.php');

echo '<a id="buttonDomov" href="' . $home . '" >Domov</a>';
?>
<!--<a id="buttonDomov" href="../menuFile.php" >Domov</a>-->

<?php

require 'besediloBaseIzbira.php';
?>
<!--<p id=demo class=mesecni><img src="slike/vOp.jpg" alt="Standardna oprema" width="460" height="600"></p>-->
</body>
</html>