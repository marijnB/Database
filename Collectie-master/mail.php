<?php

$to = 'jos.nys@gmail.com';

$subject = 'Website Change Request';

$message = "Hello world";

$mail = mail($to,$subject,$message);
if($mail)
{
	echo "oké";
}
else
{
	echo "not oké";
}

?>