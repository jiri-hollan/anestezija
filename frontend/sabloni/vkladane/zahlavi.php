<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="icon" type="image/x-icon" href="../favicon.ico?<?php echo time(); ?>">


<link rel="stylesheet" href="sabloni/css/zahlavi.css?<?php echo time(); ?>">
<link rel="stylesheet" href="../css/menuFile.css?<?php echo time(); ?>">
<script src="../frontend/js/uporabnikiVse.js?<?php echo time(); ?>"></script> 
<link rel="stylesheet" href="sabloni/css/uporabnikiNov.css?<?php echo time(); ?>">

</head>
<body>

<div class="topnav">
  <a class="active" href="../frontend/menuFile1.php">Domov</a>
  <!--<a href="../frontend/index.php">Administrace</a>-->
<!--<a href="../frontend/odhlaseni.php?stav=odhlasit">Odjava in prijava</a>-->
    <a href="../frontend/prihlaseni.php?r=logout&stav=odhlasit">Odjava in prijava</a>
  <!--<a href="#about">About</a>-->
  <a href="../frontend/prihlaseni.php?r=profil">Moj profil</a>
</div>


 <?php require_once('sabloni/oznamovaci-oblast.php');  ?> 


