<?php
session_start();
//print_r($_SESSION);
echo $_SESSION["testJSON"];


?>

<doctype!=html>
<html>
<body>
<script>
stringJson='<?php echo $_SESSION["testJSON"];?>';
//alert('<?php echo $_SESSION["testJSON"];?>');
alert(stringJson);
</script>

</body>
</html>