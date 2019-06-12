<?php
$id=$_GET['id'];
$niz=array();
$niz[]=array("ime"=>"Boško", "prezime"=>"Bogojević", "email"=>"Muški","status"=>"Administrator", "lozinka"=>"Beograd");
$niz[]=array("ime"=>"Pera", "prezime"=>"Perić", "email"=>"pperic","status"=>"Urednik", "lozinka"=>"pperic");
$niz[]=array("ime"=>"Ivana", "prezime"=>"Petrović", "email"=>"ivanap","status"=>"Urednik", "lozinka"=>"ivanap");
$niz[]=array("ime"=>"Mile", "prezime"=>"Dizna", "email"=>"miled","status"=>"Urednik", "lozinka"=>"Beograd");
$niz[]=array("ime"=>"Boško", "prezime"=>"Bogojević", "email"=>"Muški","status"=>"Administrator", "lozinka"=>"Beograd");
echo JSON_encode($niz,256);
?>