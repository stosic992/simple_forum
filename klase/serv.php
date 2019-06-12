<?php

require_once ("../klase/classBaza.php");
$db=new Baza();
if(mysqli_connect_error())
{
	echo "Baza nije dostupna!!!";
	exit();
}




$metoda=$_SERVER['REQUEST_METHOD'];
switch($metoda)
{
	case 'GET':
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$upit="DELETE FROM korisnici WHERE id=$id";
			$db->izvrsiUpit($upit);
			echo "Obrisan podatak";
			break;
		}
		$upit="SELECT * FROM korisnici ORDER BY id ASC";
		$rez=$db->izvrsiUpit($upit);
		if(mysqli_error($db)) 
			echo "Greška: ".mysqli_error($db);
		else 
		{
			$odgovor=mysqli_fetch_all($rez, MYSQLI_ASSOC);
			echo JSON_encode($odgovor, 256);
		}
	break;
	case 'POST':
		$data=JSON_decode(file_get_contents("php://input"));
		if(isset($data->id))
			$upit="UPDATE korisnici SET ime='{$data->ime}', prezime='{$data->prezime}', email='{$data->email}',status='{$data->status}', lozinka='{$data->lozinka}' WHERE id={$data->id}";
		else
			$upit="INSERT INTO korisnici (ime, prezime, email, status, lozinka) VALUES ('{$data->ime}','{$data->prezime}','{$data->email}','{$data->status}','{$data->lozinka}')";
		$db->izvrsiUpit($upit);
		if(mysqli_error($db)) 
			echo "Greška: ".mysqli_error($db);
		else
			echo "Podaci uspešno snimljeni";
	break;
}

?>