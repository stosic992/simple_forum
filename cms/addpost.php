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
/*if($_SESSION['status']!="Administrator")
{
	echo "Ovoj stranici može da pristupi samo Administrator";
	exit();	
}
*/
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
			
			
			echo "<h2>Dodavanje posta</h2>";
			if(isset($_POST['naslov']) and $_POST['naslov']!="")
			{
				$naslov=$_POST['naslov'];
				$sadrzaj=$_POST['sadrzaj'];
				$kategorija=$_POST['kategorija'];
				
				
				$upit="INSERT INTO tabelavesti (naslov, sadrzaj,  kategorija, autor) VALUES ('{$naslov}', '{$sadrzaj}', '{$kategorija}', '".$_SESSION['id']."')";
					$db->izvrsiUpit($upit);
					if($db->greska())
						echo "Greska!!!<br>".$db->greska();
					else
						echo "Dodat post: ".$db->izmenjenoRedova()."<br><br>";
				
			} else echo "Niste uneli Naslov!";
		?>
	<form method="post" action="addpost.php">
	<input type="text" name="naslov" placeholder="Unesite naslov" /><br><br>
	<textarea name="sadrzaj" placeholder="Unesite sadržaj"  rows="15"></textarea><br><br>
	<select name="kategorija">
	<option value="0" selected>Izaberite kategoriju</option>
<?php
	$upit="SELECT * FROM kategorija";
	$rez=$db->izvrsiUpit($upit);
	while($red=$db->procitajRed($rez))
		echo "<option value='$red->id'>$red->naziv</option>";
	
	
	
	?>
	
	</select><br><br>
	<input type="submit" value="Dodaj post" />
	</form>
	
	</div><!-- end #main -->
	
<?php 
include("_footer.html");
?>
</div><!-- end #wrapper -->


</body>
</html>












