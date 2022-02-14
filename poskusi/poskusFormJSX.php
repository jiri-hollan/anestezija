<!DOCTYPE html>
<html>
<body >
<h>forma kot js </>
<script>
document.write('<form method="post" action="');
document.write('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>');
document.write('" >');
document.write('<br>');
document.write(' Name: <input type=' + '"text' + '" name="name' + '">');
document.write('  <input type="submit" name="submit" value="Submit">');  
document.write('</form>');
</script>

</body>
</html>