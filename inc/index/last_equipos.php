<?php 

$maxRows_last_equipos = 5;
$pageNum_last_equipos = 0;
if (isset($_GET['pageNum_last_equipos'])) {
  $pageNum_last_equipos = $_GET['pageNum_last_equipos'];
}
$startRow_last_equipos = $pageNum_last_equipos * $maxRows_last_equipos;

mysql_select_db($database_db_compu, $db_compu);
$query_last_equipos = "SELECT * FROM tb_equipo WHERE estado_rep_eqp = 'Pendiente' ORDER BY tb_equipo.fecha_entrega_eqp ";
$query_limit_last_equipos = sprintf("%s LIMIT %d, %d", $query_last_equipos, $startRow_last_equipos, $maxRows_last_equipos);
$last_equipos = mysql_query($query_limit_last_equipos, $db_compu) or die(mysql_error());
$row_last_equipos = mysql_fetch_assoc($last_equipos);

if (isset($_GET['totalRows_last_equipos'])) {
  $totalRows_last_equipos = $_GET['totalRows_last_equipos'];
} else {
  $all_last_equipos = mysql_query($query_last_equipos);
  $totalRows_last_equipos = mysql_num_rows($all_last_equipos);
}
$totalPages_last_equipos = ceil($totalRows_last_equipos/$maxRows_last_equipos)-1;
?>

      <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Ultimos Equipos Pendientes</h4>

                                    <div class="table-responsive">
                                        <table class="table table table-hover m-0">
                                            <thead>
                                                <tr>
                                                    <th>DNI</th>
                                                    <th>Cliente</th>
                                                    <th>Titulo</th>
                                                    <th>Marca</th>
                                                    <th>Fecha Registro</th>
                                                    <th>Fecha Entrega</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php if ($totalRows_last_equipos > 0) { // Show if recordset not empty ?>
													  <?php do { ?>
                                                        <tr>
                                                          <td><?php echo $row_last_equipos['dni_eqp']; ?></td> 
                                                          <td><a href="" data-toggle="modal" data-target="#ver-cliente-<?php echo $row_last_equipos['id_cliente']; ?>"><?php echo $row_last_equipos['id_cliente']; ?></a></td>
                                                          <td><?php echo $row_last_equipos['titulo_eqp']; ?></td>
                                                          <td><?php echo $row_last_equipos['marca_eqp']; ?></td>
                                                          <?php $date1=date_create($row_last_equipos['facha_registro_eqp']); ?>
                                                          <td><?php echo date_format($date1, "d-m-Y"); ?></td>
                                                          <?php $date2=date_create($row_last_equipos['fecha_entrega_eqp']); ?>
                                                          <td><?php echo date_format($date2,"d-m-Y"); ?></td>
                                                          <td>
                                      <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-equipo-<?php echo $row_last_equipos['dni_eqp']; ?>"><i class="fa fa-search"></i></button>
                                                          </td>
                                                          
                                                        </tr>
                                                        <?php } while ($row_last_equipos = mysql_fetch_assoc($last_equipos)); ?>
                                                <?php } 
												else
												{
													echo '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <i class="mdi mdi-check-all"></i>
                                                <strong>No Hay!</strong> Nada Para Mostrar.
                                            </div>';
												}
												 ?>
                                            </tbody>
                                                </table>

                                    </div> <!-- table-responsive -->
                                </div> <!-- end card -->
                            </div>
      <?php
mysql_free_result($last_equipos);
?>
