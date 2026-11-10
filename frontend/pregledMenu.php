<?php
require_once('../skupne/administrace.php');
require_once('sabloni/vkladane/zahlavi.php');

class MenuPregled  {
   public function __construct() {
   require_once('../skupne/aktivace.php');
   require_once('../skupne/menu-items.php');
echo '
<nav id= "glavnaNav">
<ul>';
   // Pregled bolnika je dostopen vsem (kot prej gumb Pregled na začetni strani)
   echo $aPregledBolnika;
   // Statistika — enaki pogoji kot prej na začetni strani: status 2-4 in gdpr==1
   if (isset($_SESSION["upstatus"]))  {
      $status = (int)$_SESSION["upstatus"];
      if ($status >= 2 && $status <= 4 && $gdpr == 1) {
         echo $aStatistika;
      }
	 echo
	'<script>
    document.getElementById("prij").innerHTML = "Odjava";
	document.getElementById("uname").innerHTML = "prijavljen";	
     </script>';
   }
      echo '</ul></nav>';
   }//od construct
}//od class MenuPregled
  new MenuPregled();
$uname = !empty($_SESSION["uname"]) ? $_SESSION["uname"] : "";
require_once('sabloni/vkladane/zapati.php');
?>
<script>
if("<?= $uname ?>"==""){
	document.getElementById("uname").innerHTML = "niste prijavljeni ";
}else{
	document.getElementById("uname").innerHTML = "prijavljen je: " + " " + "<?= $uname ?>";
	}
	document.getElementById("dom").innerHTML = "domov";
</script>
