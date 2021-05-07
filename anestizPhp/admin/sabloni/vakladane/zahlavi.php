<!DOCTYPE html>
<html lang="sl">
<head>
   <meta carset=UTF-8/>
   <meta name="viewport" content="With=device-with, initial-scale=1.0"/>
   <link href="/anestiz/skupne/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
   <link href="/anestiz/skupne/css/anestiz.css" rel="stylesheet" media="screen"/>
</head>
<body>
<section class="container"><br/>

<?php if (empty($navigace)): ?>
  <nav clas="navbar navbar-default" role="navigation">
    <div class="container-fluid">
	  <ul class="nav navba-nav">
	    <li<?php if ($navigace =='prispevki'): ?> > class="active" <?php endif; ?>
		  <a href="<?php echo $this->zaklad->url . 'prispevki.php' ; ?>">
		   <span class="glyphicon glyphicon-list"></span>Příspěky</a></li>
		<li<?php if (navigace == 'komentare'): ?> class="active" <?php endif;  ?>>
		   <a href="<?php echo $this->zaklad->url . 'komentare.php';  ?>">
              <span class="glyphicon glyphicon-comment"></span>		   
		   Komentaře</a></li>
		<li>
		   <a href="<?php echo $this->zaklad->url . 'prihlaseni.php?stav=odhlasit';  ?>">  
		   <span class="glyphicon glyphicon-logout"></span>Odhlasit</a></li>
	  </ul>
	</div>
   </nav>
  <?php enfif;  ?>
  
  <?php require_once('../../skupne/sabloni/oznamovaci-oblast.php');  ?>
		   


</body>
   