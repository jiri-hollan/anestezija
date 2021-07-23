<?php
session_start();
//print_r($_SESSION);
echo $_SESSION["testJSON"];

echo'
<script>
alert(<?php "aaaa"?>);

</script>
';//od echa




?>