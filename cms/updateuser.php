<?php
session_start();

require_once("funkcije.php");
require_once ("../klase/classBaza.php");
$db=new Baza();
if(mysqli_connect_error())
{
	echo "Baza nije dostupna!!!";
	exit();
}
if(!isset($_SESSION['id']))
{
	echo "<a href='index.php'>Morate biti prijavljeni!</a>";
	exit();	
}
if($_SESSION['status']!="Administrator")
{
	echo "Ovoj stranici može da pristupi samo Administrator";
	exit();	
}

header('Location: updateuser.html');
?>