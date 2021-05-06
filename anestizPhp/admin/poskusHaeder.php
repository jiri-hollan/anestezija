<?php
$zaklad = 'http://'.$_SERVER['SERVER_NAME'].'/anestiz/';
header('Location: ' . $zaklad);
//header('Location: http://localhost/anestiz/');


//header('Location: //anestiz.com/');
//header('Location: http://anestiz.com/');
//header('Location: '.$_SERVER['SERVER_NAME']);
echo $_SERVER['SERVER_NAME'] . '<br>';
echo 'Location: ' . $_SERVER['SERVER_NAME'] . '<br>';
//header('Location: ""');
echo var_dump($_SERVER['SERVER_NAME']) . '<br>';


//http://anestiz.com/menuFile.php
?>