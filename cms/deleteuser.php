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
?>
	
	
			
<?php 
include("_menu.html");
?>
	
	<div id="main">
	
			<?php
		if(isset($_POST['idkorisnika']) and $_POST['idkorisnika']!="0")
		{
			$upit="DELETE FROM korisnici WHERE id=".$_POST['idkorisnika'];
			$db->izvrsiUpit($upit);
			echo "Obrisano korisnika: ".$db->izmenjenoRedova()."<br><br>";
		}
	?>
	<form method="post" action="deleteuser.php">
	
	<select name="idkorisnika">
	<option value="0" selected>--Izaberite korisnika--</option>
	<?php
	$upit="SELECT * FROM korisnici";
	$rez=$db->izvrsiUpit($upit);
	while($red=$db->procitajRed($rez))
		echo "<option value='$red->id'>$red->ime $red->prezime</option>";
	?>
	</select><br><br>
	<input type="submit" value="Obriši korisnika" />
	</form>
	
	</div><!-- end #main -->
	
	
	

<?php 
include("_footer.html");
?>
</div><!-- end #wrapper -->


</body>
</html>












