<?php
session_start();
$cxn = new mysqli('localhost','beheerder','beheerder','collectie');
if(mysqli_connect_errno())
{
	trigger_error('Fout bij de verbinding: ' . $cxn->error);
}
?>