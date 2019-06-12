<?php
$data=JSON_decode(file_get_contents("php://input"));
if(isset($data->ime))
	echo $data->ime." ".$data->prezime;
else
	echo "Niste uneli podatke";
?>