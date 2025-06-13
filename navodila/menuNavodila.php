<?php
require_once 'sabloni/zahlavi.php';
require_once '../skupne/home.php';
require_once 'besediloObjekt.php';
echo '<a id="buttonDomov" href="' . $home . '" >Domov</a>';
?>
<nav id= "navodilaNav">
<ul class= "navodilaId">
      <li><a href="navodilaKovid.php?tematika=Kovid">Kovid</a> </li>
      <li><a href="navodilaCellsaver.php">Cellsaver</a> </li> 
      <li><a href="navodilaPremedikacija.php">Premedikacija</a> </li> 
</ul></nav>
<?php

require_once '../skupne/sabloni/zapati.php';
?>