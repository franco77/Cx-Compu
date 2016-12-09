<?php 
$maxRows_last_cliente = 5;
$pageNum_last_cliente = 0;
if (isset($_GET['pageNum_last_cliente'])) {
  $pageNum_last_cliente = $_GET['pageNum_last_cliente'];
}
$startRow_last_cliente = $pageNum_last_cliente * $maxRows_last_cliente;

mysql_select_db($database_db_compu, $db_compu);
$query_last_cliente = "SELECT * FROM tb_cliente ORDER BY fecha_reg_cl DESC";
$query_limit_last_cliente = sprintf("%s LIMIT %d, %d", $query_last_cliente, $startRow_last_cliente, $maxRows_last_cliente);
$last_cliente = mysql_query($query_limit_last_cliente, $db_compu) or die(mysql_error());
$row_last_cliente = mysql_fetch_assoc($last_cliente);

if (isset($_GET['totalRows_last_cliente'])) {
  $totalRows_last_cliente = $_GET['totalRows_last_cliente'];
} else {
  $all_last_cliente = mysql_query($query_last_cliente);
  $totalRows_last_cliente = mysql_num_rows($all_last_cliente);
}
$totalPages_last_cliente = ceil($totalRows_last_cliente/$maxRows_last_cliente)-1;
?>
        <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Ultimos CLientes Registrados</h4>

                                    <div class="table-responsive">
                                        
                                        <table class="table table table-hover m-0">
                                            <thead>
                                              <tr>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                                <th>Ver</th>
                                              </tr>
                                          </thead>
                                            <tbody>
                                              <?php if ($totalRows_last_cliente > 0) {  ?>
												  <?php do { ?>
                                                    <tr>
                                                      <th><?php echo $row_last_cliente['cedula_cl']; ?> </th>
                                                      <td><?php echo $row_last_cliente['nombre_cl']; ?></td>
                                                      <td><?php echo $row_last_cliente['email_cl']; ?></td>
                                                      <td><?php echo $row_last_cliente['telefono_cl']; ?></td>
                                                      <td><button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-cliente-<?php echo $row_last_cliente['cedula_cl']; ?>"><i class="fa fa-search"></i></button></td>
                                                    </tr>
                                                    <?php } while ($row_last_cliente = mysql_fetch_assoc($last_cliente)); ?>
                                                <?php }
												else
												{
													echo'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
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
      