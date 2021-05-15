<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="sabloni/js/uporabnikiVse.js?<?php echo time(); ?>"></script> 
<link rel="stylesheet" href="sabloni/css/uporabnikiNov.css?<?php echo time(); ?>">
<!--<link rel="stylesheet" href="uporabnikiLogin.css?<?php echo time(); ?>">-->
</head>
<body>
<?php require_once('vkladane/zahlavi.php');?>


<button onclick="schovej('id01')"style="width:auto;">Sign Up</button>
<!--<button onclick="document.getElementById('id01').style.display='block'"style="width:auto;">Sign Up</button>-->
<button onclick="schovej('id02')" style="width:auto;">Login</button>

<div id="id01" class="modal">
  <!--<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>-->
  
<!-- ---------------------------------Registracija-------------------- 
--------------------------------------------------------------------- -->  
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF'] . '?r=singin'?>" method="post">
    <div class="container">
      <h1>Registracija</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="ime"><b>Ime in priimek</b></label><br>
	  <span>
      <input type="text" class="imePriimek" placeholder=" Ime" name="ime" required>	  
      <input type="text" class="imePriimek" placeholder="Priimek" name="priimek" required><br>	  
	  </span>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder=" Email" name="email" required>

      <label for="geslo"><b>Geslo</b></label>
      <input type="password" placeholder="geslo" name="geslo" required>

      <label for="psw-repeat"><b>Ponovi geslo</b></label>
      <input type="password" placeholder="Ponovi geslo" name="psw-repeat" required>
      <button type="submit" class="signupbtn">Sign Up</button>    
  <!--    <label>
    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>-->

     <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->
    </div>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>

  </form>
</div>



<!-- ___________________________   Prijava       ___________________________________________-->
<div id="id02" class="modal">
  
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF'] . '?r=login'?>" method="post">
    

    <div class="container">
      <label for="email"><b>Uporabniško ime</b></label>
      <input type="text" placeholder="Enter Username" name="email" required>

      <label for="geslo"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="geslo" required>
        
      <button type="submit" class="signupbtn" >Login</button>
 <!--     <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
    </div>

      <div class="clearfix">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
   <!--   <span class="psw">Forgot <a href="#">password?</a></span>-->
    </div>   

  </form>
</div>



</body>
</html>