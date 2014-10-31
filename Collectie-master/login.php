<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Inloggen</title>
</head>
<body>
<h2>Inloggen</h2>
<p>Nieuwe gebruiker? <a href="register.php">Hier kunt u registeren</a></p>
<hr>
<form name="formulier" method="post" action="login_afhandelen.php">
	E-mailadres:<input name="email" type="text" size="30"/><br/>
	Wachtwoord: <input name="wachtwoord" type="password" size="10" /><br/>
	<button type="submit">Inloggen</button>
	<button type="reset">Wissen</button>
</form>
<hr/>
<p><a href="email_wachtwoord.php">Wachtwoord vergeten?</a></p>
</body>
</html>