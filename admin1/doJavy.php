<!doctype html>
<html>
<body>
<?php
$php_var1 ="Hello world";
$php_var2 ="Helloow";
echo '<script>';
echo 'var js_variable1= ' . json_encode($php_var1) . ';';
echo 'var js_variable2= ' . json_encode($php_var2) . ';';
echo '</script>';
?>
<p> naj bi se pokazalo okno alert</p>

<script>
//alert("poskus");
alert("variabla 1:" + js_variable1);

</script>
</body>
</html>