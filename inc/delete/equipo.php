<?php require("include1_.php"); ?>
<?php 

if ((isset($_GET['dni_eqp'])) && ($_GET['dni_eqp'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_equipo WHERE dni_eqp=%s",
                       GetSQLValueString($_GET['dni_eqp'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($deleteSQL, $db_compu) or die(mysql_error());

  $deleteGoTo = "../../listar-equipos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
