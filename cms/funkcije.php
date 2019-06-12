<?php
function proveraStringa($str)
{
	if(strpos($str, " ")!==false) return false;//dali sadrzi space
	if(strpos($str, "=")!==false) return false;
	if(strpos($str, "'")!==false) return false;
	if(strpos($str, '"')!==false) return false;
	return true;
}



?>