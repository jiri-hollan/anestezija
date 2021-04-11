<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



<h1> Nalaganje besedila <br>
<form action="uploadBesedilo.php" method="post" enctype="multipart/form-data">
  <!--<label for="direktorij">Ciljni direktorij: </label>-->
	<?php
	//"$_GETrazpored" določi, kam se pdf naloži	
	echo '<input type="hidden" name="direktorij" id="direktorij" value="' . $_GET["direktorij"] . '" readonly><br>';
	?>

  <label for="besediloNaslov">Naslov besedila: </label>
  <input type="text" name="naslov" id="besediloNaslov" value="" placeholder="smiselni naslov"  required><br>

 <br>Izberi pdf ali slikovno datoteko za naložiti:<br>

  <input type="hidden" name="nameTable" id="nameTable" value="besedilaTbl">
  <input type="file" name="fileToUpload" id="fileToUpload" required><br>
  <input type="radio" id="zamenjaj" name="obstojeca" value=1>
  <label for="zamenjaj">Zamenjaj</label><br>
  <input type="radio" id="pusti" name="obstojeca" value=0>
  <label for="pusti">Pusti obstoječo</label><br>
  <input type="submit" value="Naloži besedilo" name="submit">
</form>
</h1>

</body>
</html>