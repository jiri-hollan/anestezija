<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/drop.css?<?php echo time(); ?>">

</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
 <!-- <a href="#news">News</a>-->
  <div class="dropdown">
    <button class="dropbtn">Menu servis 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../konekt.php">Pripoji se na server</a>
      <a href="../../odklop.php">Odpoji se od serverja</a>
      <a href="../../kreateBase.php">naredi bazo</a>
      <a href="../../kreateTable.php" >Naredi poskusno Tabelo</a>
      <a href="../../kreateTableSkript.php" >Naredi Tabelo iz Skripta.php</a>
      <a href="../../insertVrstica.php">vstavi vrstico</a>
      <a href="../../selektPrikazi.php">prikazi izbrano tabelo</a>
      <a href="../../doSql.php">vnesi in poženi SQL</a>
      <a href="../../pokaziTable.php">pokaži Table</a>
      <a href="../../pokaziStolpce.php">pokaži Stolpce</a>
      <a href="../../selektVnosna.php">pokaži vnešenega bolnika</a>
      <a href="../../serverInformace.php">Informace o serveru</a>
      <a href="../../../skupne/database.php">Zgon poskusnega objekta database</a>		  
    </div>
  </div> 
  
   <div class="dropdown">
    <button class="dropbtn">Menu navodila
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../navodila/kreateBaseNavodila.php">naredi bazo: navodila</a>
      <a href="../../navodila/kreateTableBesedila.php" >Naredi Tabelo:besedilaTbl</a>
      <a href="../../navodila/novoBesedilo.php">vstavi novo besedilo</a>
      <a href="../../navodila/besediloBase.php">prikaži besedila</a>
      <a href="../../navodila/besediloBaseIzbira.php">prikaži besedila kot izbiro</a>
     <!-- <a href="../../">Link 3</a>-->   	  
    </div>
  </div> 
  
     <div class="dropdown">
    <button class="dropbtn">>Menu uporabniki 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../navodila/kreateTableUporabniki2.php">naredi tabelo: uporabnikiTbl2</a>
      <a href="../../prikaziDatoteko.php">pokaži Uporabnike</a>
      <!--<a href="../../">Link 3</a>-->     	  
    </div>
  </div> 
  
    <!--       <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="../../">Link 3</a>
     <a href="../../">Link 3</a>	  
    </div>
  </div>   -->	
  
</div>

</body>
</html>