<?php require("include1_.php"); ?>
<?php
if ((isset($_GET['id_cat_ingreso'])) && ($_GET['id_cat_ingreso'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_cat_ingreso WHERE id_cat_ingreso=%s",
                       GetSQLValueString($_GET['id_cat_ingreso'], "int"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($deleteSQL, $db_compu) or die(mysql_error());

  $deleteGoTo = "../../add-categorias.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
