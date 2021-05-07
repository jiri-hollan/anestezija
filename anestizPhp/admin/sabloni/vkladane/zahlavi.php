<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="sabloni/css/zahlavi.css?<?php echo time(); ?>">
</head>
<body>

<div class="topnav">
  <a class="active" href="../menuFile.php">Domov</a>
  <a href="#news">Prijava</a>
  <a href="<?php echo $this->zaklad->url . 'odhlaseni.php?stav=odhlasi';  ?>">Odjava</a>
  <!--<a href="#about">About</a>-->
</div>


 <?php require_once('../skupne/sabloni/oznamovaci-oblast.php');  ?> 
</body>
</html>
