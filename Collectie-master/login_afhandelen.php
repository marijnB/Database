<?php
include_once('inc_connect.php');
if(!empty($_POST))
{
	// eerst controleren of logingegevens correct zijn
	$email = $_POST['email'];
	$wachtwoord = $_POST['wachtwoord'];
	$sql = "SELECT * FROM gebruikers WHERE email='$email' AND wachtwoord='$wachtwoord' ";
	$resultaat = $cxn->query($sql);
	$aantal = $resultaat->num_rows;
	if($aantal > 0)
	{
		// logingegevens zijn juist
		// sessievariabelen maken
		$_SESSION['gebruiker'] = $email;
		$_SESSION['wachtwoord'] = $wachtwoord;
		// doorsturen naar de beveiligde pagina
		header('Location: beveiligd.php');
		exit();
	}
	else
	{
		// logingegevens zijn niet juist
		$tekst = "U heeft geen geldige combinatie van e-mail en wachtwoord opgegevens.<br/>
				  Maak een keuze:<br/>
				  <a href='login.php'>Opnieuw inloggen</a><br/>
				  <a href='register.php'>Hier registeren</a>";
		die($tekst);
	}
}
else
{
	// de pagina was niet juist aangeroepen, direct doorsturen naar login.php
	header('Location:login.php');
}
?>