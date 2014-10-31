<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Beveiligde pagina</title>
</head>
<body>
<?php
	if(!isset($_SESSION['gebruiker']))
	{
		$tekst="<h2>U bent nog niet aangemeld.</h2>
				U kunt <a href='login.php'>hier inloggen</a> of <br/>
				u kunt zich <a href='register.php'>hier registeren</a>.";
				echo $tekst;
	}
	else
	{
?>
	<h2>Welkom op deze beveiligde pagina</h2>
	<p>U bent aangemeld als: <?=$_SESSION['gebruiker']?>.<br/>
	   Uw wachtwoord is: <?=$_SESSION['wachtwoord']?>.<br/>
	   <hr/>
	   <a href="logout.php">Uitloggen</a>
	</p>
<?php
	}
?>
</body>
</html>