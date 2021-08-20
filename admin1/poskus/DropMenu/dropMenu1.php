<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
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