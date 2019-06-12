<?php
require_once ("klase/classBaza.php");
$db=new Baza();
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
<title>Simple forum</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<link href="fa/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<link href="css/style.css" type="text/css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
	
	<div id="header">
	
		<div id="logo">
			<img src="images/logo.png" alt="Lineweb">
		</div>
		
		<div id="slogan">
			<p><a href="cms/index.php">Prijavite se</a> </p>
		</div>
	
	</div><!-- end #header -->
	
	<div id="nav">
	
		<ul>
			<li><a href="index.php">Početna</a></li>
<?php
$upit="SELECT * FROM kategorija";
$rez=$db->izvrsiUpit($upit);
while($red=$db->procitajRed($rez))
{
	echo "<li><a href='index.php?idKategorije=$red->id'>$red->naziv</a></li> ";
}	
?>
			<!--<li><a href="#">info</a>
				<ul>
					<li><a href="#">podstavka 1</a></li>
					<li><a href="#">podstavka 2</a>
						<ul>
							<li><a href="#">treci nivo 1</a></li>
							<li><a href="#">treci nivo 2</a></li>
						</ul>
					</li>
					<li><a href="#">podstavka 3</a></li>
				</ul>
			</li>
			<li><a href="#">work</a>
				<ul>
					<li><a href="#">podstavka 1</a></li>
					<li><a href="#">podstavka 2</a></li>
					<li><a href="#">podstavka 3</a></li>
				</ul>
			</li>
			<li><a href="#">about us &amp; contact</a></li>-->
		</ul>
		
		<div id="social">
			<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
		</div>
	
	</div><!-- end #nav -->
	
	<div id="main">
	<?php 
	$upit="SELECT * FROM viewvesti WHERE obrisan=0";
	if(isset($_GET['idKategorije'])) $upit="SELECT * FROM viewvesti WHERE obrisan=0 AND kategorija=".$_GET['idKategorije'];
	//if(isset($_GET['idVesti'])) $upit="SELECT * FROM viewvesti WHERE obrisan=0 AND kategorija=".$_GET['idVesti'];
	
	if(isset($_GET['idVesti'])) $upit="SELECT * FROM viewvesti WHERE obrisan=0 and id=".$_GET['idVesti'];
	$rez=$db->izvrsiUpit($upit);
	while($red=$db->procitajRed($rez))
	{
		echo "<h2><a href='index.php?idVesti=$red->id'>".$red->naslov."</a></h2>";
		if(isset($_GET['idVesti']))
			echo $red->sadrzaj."<br><br>";
		else echo "Nije dobro";
		echo "<p>".$red->sadrzaj."</p>";
		echo "<b>".$red->ime." ".$red->prezime."</b> <i>".$red->vreme."</i>";
		echo "<hr>";
		
	}
	?>
		
	
	</div><!-- end #main -->
	
	
	
	<div id="footer">
		<p>Copyright &copy; 2018</p>
	</div><!-- end #footer -->
	
</div><!-- end #wrapper -->


</body>
</html>












