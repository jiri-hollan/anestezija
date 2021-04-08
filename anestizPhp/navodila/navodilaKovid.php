<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/navodila.css">
</head>
<body>
<?php
/*)
$najdi = array(
array("id"=>"1", "naslov"=>"SARS hitri test", "direktorij"=>"../besedila/","fajl"=>"hitriTest.pdf"),
array("id"=>"1", "naslov"=>"Diagram hitri testi", "direktorij"=>"../besedila/","fajl"=>"diagramTest.pdf"),
array("id"=>"1", "naslov"=>"Hitri testi UCI", "direktorij"=>"../besedila/","fajl"=>"diagramHitriTestiUci.pdf"),
array("id"=>"1", "naslov"=>"Algoritem kirurgija elektiva", "direktorij"=>"../besedila/","fajl"=>"algoritemKirurgijaElektiva.pdf")
);
*/
?>
<a id="buttonDomov" href="../menuFile.php" >Domov</a>
<!--<ul id= "navodilaId">-->
<?php
/*
echo '<li><a href= "' . $najdi[0]["direktorij"] . $najdi[0]["fajl"] . '" >' . $najdi{0}["naslov"] . '</a></li>';
echo '<li><a href= "' . $najdi[1]["direktorij"] . $najdi[1]["fajl"] . '" >' . $najdi{1}["naslov"] . '</a></li>';
echo '<li><a href= "' . $najdi[2]["direktorij"] . $najdi[2]["fajl"] . '" >' . $najdi{2}["naslov"] . '</a></li>';
echo '<li><a href= "' . $najdi[3]["direktorij"] . $najdi[3]["fajl"] . '" >' . $najdi{3}["naslov"] . '</a></li>';
*/
require 'besediloBaseIzbira.php';
?>

<!--<li><a href= "../besedila/hitriTest.pdf" >SARS hitri test</a></li>
<li><a href="../besedila/diagramTest.pdf" >Diagram hitri testi</a></li>
<li><a href="../besedila/diagramHitriTestiUci.pdf" >Hitri testi UCI</a></li>
<li><a href="../besedila/algoritemKirurgijaElektiva.pdf" >Algoritem kirurgija elektiva</a></li>


</ul>-->

<!--<p id=demo class=mesecni><img src="slike/vOp.jpg" alt="Standardna oprema" width="460" height="600"></p>-->

</body>
</html>