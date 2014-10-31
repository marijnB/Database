<?php
include_once('inc_connect.php');
if(!empty($_POST))
{
	// record zoeken van de gebruiker
	$email = $_POST['email'];
	$sql = "SELECT * FROM gebruikers WHERE email='$email'";
	$resultaat = $cxn->query($sql);
	$aantal = $resultaat->num_rows;
	if($aantal > 0)
	{
		//e-mailadres bestaat dus wachtwoord verzenden
		while($row = $resultaat->fetch_assoc())
		{
			$to = $row['email'];
			$wachtwoord=$row['wachtwoord'];
		}	
		$onderwerp = "Uw wachtwoord";
		$bericht = "Hallo, u heeft gevraagd naar uw wachtwoord.\n
					Uw wachtwoord is $wachtwoord.\n
					Met vriendelijke groeten, de webmaster.\n
					X-MAILER: PHP/versie " .phpversion();

		// bericht verzenden en eventueel boodschap tonen
		if(!mail($to,$onderwerp,$bericht))
		{
			$tekst="Er is een fout opgetreden bij het verzenden.";
			echo $tekst;
		}
		else
		{
			$tekst="Uw wachtwoord is verzonden.<br/>
					Terug naar het <a href='login.php'>inloggen</a>.";
			echo $tekst;
		}
	}
	else
	{
		// email-adres staat niet in de tabel
		$tekst="Dit e-mailadres <strong>$email</strong> staat niet in de database.<br/>
				<a href='$_SERVER[PHP_SELF]'>Ander e-mailadres</a>";
		echo $tekst;
	}
}
else
{
	// pagina heeft zichzelf niet aangeroepen: formulier tonen
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Wachtwoord verzendnen</title>
</head>
<body>
<h2>Wachtwoord vergeten</h2>
<form name="formulier" method="post" action="<?=$_SERVER['PHP_SELF']?>">
	Uw e-mailadres: <input name="email" type="text" size="30"/><br/>
	<button type="submit">E-mail mijn wachtwoord</button>
</form>
</body>
</html>
<?php
}
?>