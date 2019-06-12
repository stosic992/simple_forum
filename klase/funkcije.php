<?php
function proveraStringa($a)
{
	if(strpos($a, "")!== false) return false;
	if(strpos($a, "=")!== false) return false;
	if(strpos($a, " ")!== false) return false;
	if(strpos($a, "(")!== false) return false;
	if(strpos($a, ")")!== false) return false;
	if(strpos($a, "@")!== false) return false;
	return true;
}
?>