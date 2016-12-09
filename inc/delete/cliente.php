<?php require("include1_.php"); ?>
<?php 

if ((isset($_GET['cedula_cl'])) && ($_GET['cedula_cl'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_cliente WHERE cedula_cl=%s",
                       GetSQLValueString($_GET['cedula_cl'], "int"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($deleteSQL, $db_compu) or die(mysql_error());

  $deleteGoTo = "../../listar-clientes.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
