<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db_compu = "localhost";
$database_db_compu = "db_compu";
$username_db_compu = "root";
$password_db_compu = "15925621";
$db_compu = mysql_pconnect($hostname_db_compu, $username_db_compu, $password_db_compu) or trigger_error(mysql_error(),E_USER_ERROR); 
?>