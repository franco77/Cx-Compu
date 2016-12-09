<?php

require_once('../../Connections/db_compu.php'); 
if($_REQUEST)
{
	$cedula = $_REQUEST['cedula'];
	mysql_select_db($database_db_compu, $db_compu);
	$query = "select * from tb_cliente where cedula_cl = '".strtolower($cedula)."'";
	$results = mysql_query($query, $db_compu) or die('ok');
	
	if(mysql_num_rows($results) > 0) // not available
	{
		echo '<p class="text-danger">Este Numero De Cedula Ya Existe ! </p>';
	}
	else
	{
		echo '<p class="text-success">Este Numero Se Encuentra Disponible ! </p>';
	}
	
}?>