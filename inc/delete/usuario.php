<?php require("include1_.php"); ?>
<?php
if ((isset($_GET['cedula'])) && ($_GET['cedula'] != "")) {
	
	$colname_list_user = "-1";
if (isset($_GET['cedula'])) {
  $colname_list_user = $_GET['cedula'];
}
mysql_select_db($database_db_compu, $db_compu);
$query_list_user = sprintf("SELECT * FROM tb_login WHERE cedula = %s", GetSQLValueString($colname_list_user, "int"));
$list_user = mysql_query($query_list_user, $db_compu) or die(mysql_error());
$row_list_user = mysql_fetch_assoc($list_user);
$totalRows_list_user = mysql_num_rows($list_user);
	
	
	
$foto="../../files/avatar/".$row_list_user['avatar_user'];	
$thum="../../files/tn/avatar/".$row_list_user['avatar_user'];
	
if(file_exists($foto)) unlink($foto );	
if(file_exists($thum)) unlink($thum );
	
	
	
  $deleteSQL = sprintf("DELETE FROM tb_login WHERE cedula=%s",
                       GetSQLValueString($_GET['cedula'], "int"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($deleteSQL, $db_compu) or die(mysql_error());

  $deleteGoTo = "../../listar-usuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}







?>

