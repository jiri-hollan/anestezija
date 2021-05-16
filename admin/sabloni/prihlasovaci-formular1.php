<?php //require_once('vkladane/zahlavi.php');?>
<h3> Prijava do administrace</h3>
<form action="<?php echo $_SERVER['PHP_SELF']?>"
   method="post" class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-md-4">
	  <label for="jmeno">Uživatelske jmeno</label>
	  <input type="text" class="form-control" name="jmeno"  id="jmeno" 
	       placeholder="uživatelske jmeno" />
		   </div>
		</div>
		
<button type="submit"  class="btn btn-default">Přihlasit</button>
</form>
<?php// require_once('vkadane/zapati'); ?>