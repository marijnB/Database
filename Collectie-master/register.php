<?php
include_once('inc_connect.php');
if(!empty($_POST))
{
	// eerst controleren of inlognaam (= e-mailadres) al bestaat in de tabel
	$email = $_POST['email'];
	$wachtwoord = $_POST['wachtwoord'];
	$sql = "SELECT * FROM gebruikers WHERE email='$email'";
	$resultaat = $cxn->query($sql);
	$aantal = $resultaat->num_rows;
	if($aantal > 0)
	{
		//e-mailadres bestaat al, foutmelding tonen
		$tekst = "Dit e-mailadres (<strong>$email</strong>) bestaat al.<br/>
				  <a href='$_SERVER[PHP_SELF]'>Opnieuw registeren</a>";
		die($tekst);
	}
	else
	{
		//e-mailadres bestaat niet, gegevens toevoegen aan de tabel gebruikers
		$sql = "INSERT INTO gebruikers (email, wachtwoord) 
				VALUES('$email','$wachtwoord')";
		$resultaat = $cxn->query($sql);
		$tekst = "Bedankt voor de registratie. <br/>
		          U kunt nu <a href='login.php'>inloggen</a>.";
		die($tekst);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registeren</title>
</head>
<body>
<h2>Registeren</h2>
<p>Welkom, u kunt zich hier registeren.<br/>
	Als loginnaam wordt uw e-mailadres gebruikt.</p>
<hr/>
<form name="formulier" method="post" action="<?=$_SERVER['PHP_SELF']?>">
	E-mailadres: <input name="email" type="text" size="30" maxlength="40"/>(maximaal 40 tekens)<br/>
	Wachtwoord: <input name="wachtwoord" type="password" size="20" maxlength="20"/>(maximaal 20 tekens)<br/>
	<button type="submit">Registeren</button>
	<button type="reset">Wissen</button>
</form>
</body>
</html>