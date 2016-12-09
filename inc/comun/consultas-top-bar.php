<?php 

$maxRows_noti_event = 4;
$pageNum_noti_event = 0;
if (isset($_GET['pageNum_noti_event'])) {
  $pageNum_noti_event = $_GET['pageNum_noti_event'];
}
$startRow_noti_event = $pageNum_noti_event * $maxRows_noti_event;

mysql_select_db($database_db_compu, $db_compu);
$query_noti_event = "SELECT * FROM tb_eventos WHERE desde_evento = CURDATE() ORDER BY tb_eventos.id_evento DESC";
$query_limit_noti_event = sprintf("%s LIMIT %d, %d", $query_noti_event, $startRow_noti_event, $maxRows_noti_event);
$noti_event = mysql_query($query_limit_noti_event, $db_compu) or die(mysql_error());
$row_noti_event = mysql_fetch_assoc($noti_event);

if (isset($_GET['totalRows_noti_event'])) {
  $totalRows_noti_event = $_GET['totalRows_noti_event'];
} else {
  $all_noti_event = mysql_query($query_noti_event);
  $totalRows_noti_event = mysql_num_rows($all_noti_event);
}
$totalPages_noti_event = ceil($totalRows_noti_event/$maxRows_noti_event)-1;

$maxRows_event_equipos = 4;
$pageNum_event_equipos = 0;
if (isset($_GET['pageNum_event_equipos'])) {
  $pageNum_event_equipos = $_GET['pageNum_event_equipos'];
}
$startRow_event_equipos = $pageNum_event_equipos * $maxRows_event_equipos;

mysql_select_db($database_db_compu, $db_compu);
$query_event_equipos = "SELECT * FROM tb_equipo WHERE fecha_entrega_eqp = CURDATE()";
$query_limit_event_equipos = sprintf("%s LIMIT %d, %d", $query_event_equipos, $startRow_event_equipos, $maxRows_event_equipos);
$event_equipos = mysql_query($query_limit_event_equipos, $db_compu) or die(mysql_error());
$row_event_equipos = mysql_fetch_assoc($event_equipos);

if (isset($_GET['totalRows_event_equipos'])) {
  $totalRows_event_equipos = $_GET['totalRows_event_equipos'];
} else {
  $all_event_equipos = mysql_query($query_event_equipos);
  $totalRows_event_equipos = mysql_num_rows($all_event_equipos);
}
$totalPages_event_equipos = ceil($totalRows_event_equipos/$maxRows_event_equipos)-1;


?>
