<?php
session_start();
require_once("../klase/classBaza.php");
require_once("funkcije.php");
$db=new Baza();
if(!isset($_SESSION['id']))
{
	echo "Morate biti prijavljeni!!!!<br><a href='index.php'>Prijavite se</a>";
	exit();
}
if($_SESSION['status']!="Administrator")
{
	echo "Morate biti administrator!!!!<br>";
	exit();
}
?>
<!doctype html>
<html>
<?php
	include("_head.php");
?>

<body>

<div id="wrapper">
	
	<?php
		include("_header.html");
		include("_menu.html");
	?>
	
	<div id="main">
	
	
		
	<?php
		if(isset($_POST['idvesti']) and $_POST['idvesti']!="0")
		{
			$upit="UPDATE tabelavesti SET obrisan=1 WHERE id=".$_POST['idvesti'];
			$db->izvrsiUpit($upit);
			echo "Obrisano postova: ".$db->izmenjenoRedova()."<br><br>";
		}
	?>
	<form method="post" action="deletepost.php">
	
	<select name="idvesti">
	<option value="0" selected>--Izaberite post--</option>
	<?php
	$upit="SELECT * FROM tabelavesti where obrisan=0";
	$rez=$db->izvrsiUpit($upit);
	while($red=$db->procitajRed($rez))
		echo "<option value='$red->id'>$red->naslov</option>";
	?>
	</select><br><br>
	<input type="submit" value="Obriši post" />
	</form>
	
	</div><!-- end #main -->
	
	
	
	<?php
	include("_footer.html");
?>
	
</div><!-- end #wrapper -->


</body>
</html>












