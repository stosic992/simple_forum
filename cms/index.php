<?php
require_once("funkcije.php");
require_once ("../klase/classBaza.php");
$db=new Baza();
if(isset($_GET['logout']))
{
	session_start();
	unset($_SESSION['id']);
	session_destroy();
}
if(mysqli_connect_error())
{
	echo "Baza nije dostupna!!!";
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prijavljivanje</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<link href="../fa/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<link href="../css/style.css" type="text/css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
	
	<div id="header">
	
		<div id="logo">
			<img src="../images/logo.png" alt="Lineweb">
		</div>
		
		<div id="slogan">
		<!-- 	<p>Lorem <a href="#">ipsum dolor</a> sit</p>-->
		</div>
	
	</div><!-- end #header -->
	
	<div id="nav">
	
		<ul>
			<li><a href="../index.php">Početna</a></li>
		</ul>
		
		
	
	</div><!-- end #nav -->
	
	<div id="main">
	<?php
	if(isset($_POST['email']) AND isset($_POST['lozinka']))
	{
		$email=$_POST['email'];
		$lozinka=$_POST['lozinka'];
		if($email!="" and $lozinka!="")
		{
			if(proveraStringa($email) and proveraStringa($lozinka))
			{
				$upit="SELECT * FROM korisnici WHERE email='{$email}' AND lozinka='{$lozinka}'";
				$rez=$db->izvrsiUpit($upit);
				if($db->brojRedova($rez)==1)
				{
					//echo "Uspešno logovanje<br><br>";
					session_start();
					$red=$db->procitajRed($rez);
					$_SESSION['email']=$red->email;
					$_SESSION['status']=$red->status;
					$_SESSION['ime']=$red->ime." ".$red->prezime;
					$_SESSION['id']=$red->id;
					header("location: pocetna.php");
					exit();
					
				}else
					echo "<font color='red'>Korisnik ne postoji</font><br><br>";
			}else
				echo "<font color='red'>Neki od podataka sadrže nedozvoljene karaktere</font><br><br>";
		}else
			echo "<font color='red'>Niste uneli sve podatke</font><br><br>";
			
	}
	?>
	<form action="" method="post">
	<input type="text" name="email" placeholder="Unesite email"/><br><br>
	<input type="password" name="lozinka" placeholder="Unesite lozinku" style="
    width: 90%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
"/><br><br>
	<input type="submit" value="Prijavite se"/><br><br>
	
	
	</form>
	
	</div><!-- end #main -->
	
	
	
	<div id="footer">
		<p>Copyright &copy; 2018</p>
	</div><!-- end #footer -->
	
</div><!-- end #wrapper -->


</body>
</html>