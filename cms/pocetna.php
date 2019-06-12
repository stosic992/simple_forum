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
	
		<?php echo "Dobro došli, ".$_SESSION['ime'].". Prijavljeni ste kao ".$_SESSION['status']."<br>";?>
	
	</div><!-- end #main -->
	
	

<?php 
include("_footer.html");
?>
</div><!-- end #wrapper -->


</body>
</html>












