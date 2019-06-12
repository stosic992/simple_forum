<?php
class Baza{
	private $db;
	public function __construct()
	{
		$this->db=@mysqli_connect("localhost", "root", "", "simple_forum");
		if(mysqli_connect_error())
		{
			return false;
		}
		mysqli_query($this->db, "SET NAMES UTF8");
		return $this->db;
	}
	
	public function __destruct()
	{
		mysqli_close($this->db);
	}
	
	public function izvrsiUpit($upit)
	{
		return mysqli_query($this->db, $upit);
	}
	
	public function brojRedova($rez)
	{
		return mysqli_num_rows($rez);
	}
	
	public function procitajRed($rez)
	{
		return mysqli_fetch_object($rez);
	}
	
	public function izmenjenoRedova()
	{
		return mysqli_affected_rows($this->db);
	}
	public function greska()
	{
		return mysqli_error($this->db);
	}
	
}
?>









