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
			
			
			echo "<h2>Dodavanje korisnika</h2>";
			if(isset($_POST['ime']) and $_POST['ime']!="")
			{
				$ime=$_POST['ime'];
				$prezime=$_POST['prezime'];
				$email=$_POST['email'];
				$lozinka=$_POST['lozinka'];
				$potvrdalozinke=$_POST['potvrdalozinke'];
				$status=$_POST['status'];
				if($lozinka==$potvrdalozinke)
				{
					$upit="INSERT INTO korisnici (ime, prezime,  lozinka, email, status) VALUES ('{$ime}', '{$prezime}', '{$lozinka}', '{$email}', '{$status}')";
					
					$db->izvrsiUpit($upit);
					
						echo "Dodato korisnika: ".$db->izmenjenoRedova()."<br><br>";
				}else
					echo "Lozinka i potrda lozinke nisu iste<br><br>";
			}
		?>
	<form method="post" action="adduser.php">
	<input type="text" name="ime" placeholder="Unesite ime" /><br><br>
	<input type="text" name="prezime" placeholder="Unesite prezime" /><br><br>
	<input type="text" name="email" placeholder="Unesite email" /><br><br>
	<input type="text" name="lozinka" placeholder="Unesite lozinku" /><br><br>
	<input type="text" name="potvrdalozinke" placeholder="Potvrdite lozinku" /><br><br>
	<select name="status">
	<option value="Administrator" selected>Administrator</option>
	<option value="Urednik" >Urednik</option>
	</select><br><br>
	<input type="submit" value="Dodaj korisnika" />
	</form>
	</div><!-- end #main -->
	
<?php 
include("_footer.html");
?>
</div><!-- end #wrapper -->


</body>
</html>












