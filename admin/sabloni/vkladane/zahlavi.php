<?php
echo'
<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<link rel="shortcut icon" href="../favicon.ico?'.time().'">
<link rel="stylesheet" href="../admin/css/zahlavi.css?'.time().'">
<link rel="stylesheet" href="../admin/css/menuFile.css?'.time().'">
<link rel="stylesheet" href="../admin/css/uporabnikiNov.css?'.time().'">
<link rel="stylesheet" href="../servis/css/pregledovalci.css?'.time().'">
<script src="../admin/js/manipulacePogoj.js?'.time().'"></script> 
</head>
<body>
<div class="topnav">
  <a id="dom" class="active" href="../frontend/menuFile1.php">Domov</a>
  <a id="prij" href="../frontend/prihlaseni.php?r=logout&stav=odhlasit">Prijava</a>
  <a href="../frontend/prihlaseni.php?r=profil">Moj profil</a>
  <span id="uname">odjavljen</span>
</div>';

 function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
  return $test;
} 
 ?> 


