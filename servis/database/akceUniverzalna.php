<?php

  //______________________________________________________________________
 //$tabulka="pregledovalciTbl";
 function akceFunction($akce, $tabulka){
   // $tabulka="pregledovalciTbl";
   // $tabulka=$_GET["imeTable"];
switch ($akce) {
case "vyber":
    $bolnisnica=test_input($_POST["bolnisnica"]);
 //$tabulka="pregledovalciTbl";
  // $tabulka=$_GET["imeTable"];
    $stolpci=["*"];
	$vyber = new Vyber($bolnisnica, $tabulka, $stolpci, $poradi='priimek');
	$vyber->vyberFunction();
    break;
case "vloz":
    //$tabulka="pregledovalciTbl";
 /*   $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
    $priimek = test_input($_POST["priimek"]);
    $status = test_input($_POST["status"]); 
*/

	$data = array("ime"=>test_input($_POST["ime"]), "priimek"=>test_input($_POST["priimek"]), "status"=>test_input($_POST["status"]));
	
	
	
	
	//$vloz = new Vloz($bolnisnica, $tabulka, $ime, $priimek, $status);
	$vloz = new Vloz($bolnisnica, $data);
	
	$vloz->vlozFunction();	
    break;
case "uredi":
    //$tabulka="pregledovalciTbl";
/*	
    $id=test_input($_POST["id"]);
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
	$priimek = test_input($_POST["priimek"]);
	$status = test_input($_POST["status"]); 
*/	
   	$data = array("id"=>test_input($_POST["id"]), "ime"=>test_input($_POST["ime"]), "priimek"=>test_input($_POST["priimek"]), "status"=>test_input($_POST["status"]));

	$uredi = new Uredi($bolnisnica, $tabulka, $data);
	$uredi->aktualizujFunction();
    break;


case "edit":
    //$tabulka="pregledovalciTbl";
    $id = test_input($_GET["id"]);
	//echo "id uporabnika= " .  $id;
	echo "<br>";
	// var_dump($id);
	// echo "<br>"; 
	$edit = new Edit($tabulka, $id); 	 
    break;
case "odstrani":
     //$tabulka="pregledovalciTbl";
     $id = test_input($_GET["id"]);
	// echo "id uporabnika= " .  $id;
	 echo "<br>";
	$odstrani = new Odstrani($tabulka, $id); 
	//odstraniFunction($podminka);
    // odstraniFunction();
    break;	
default:
    echo "ni izvelo get case"; 
  }//od switch	  

  }//od akceFunction

?>
