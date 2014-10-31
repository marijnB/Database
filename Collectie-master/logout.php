<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Uitloggen</title>
</head>
<body>
<h2>Uitloggen</h2>
<p>U bent nu uitgelogd.<br/>
   U kunt hier eventueel opnieuw <a href="login.php">inloggen</a>.</p>
</body>
</html>