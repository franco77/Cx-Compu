<?php 
$colname_user_login = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_user_login = $_SESSION['MM_Username'];
}
mysql_select_db($database_db_compu, $db_compu);
$query_user_login = sprintf("SELECT * FROM tb_login WHERE email_user = %s", GetSQLValueString($colname_user_login, "text"));
$user_login = mysql_query($query_user_login, $db_compu) or die(mysql_error());
$row_user_login = mysql_fetch_assoc($user_login);
$totalRows_user_login = mysql_num_rows($user_login);


?>
<?php //echo $row_user_login['cedula']; ?>
<?php //echo $row_user_login['nivel']; ?>
<?php //echo $row_user_login['email_user']; ?>
<?php //echo $row_user_login['password_user']; ?>
<?php //echo $row_user_login['nombre_user']; ?>
<?php //echo $row_user_login['apellido_user']; ?>
<?php //echo $row_user_login['avatar_user']; ?>
<?php //echo $row_user_login['fecha_reg']; ?>
<?php //echo $row_user_login['estado_user']; ?>