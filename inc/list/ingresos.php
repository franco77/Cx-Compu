<?php 
 
mysql_select_db($database_db_compu, $db_compu);
$query_ingresos = "SELECT * FROM tb_ingresos, tb_cat_ingreso WHERE tb_ingresos.id_cat_ingreso = tb_cat_ingreso.id_cat_ingreso ORDER BY tb_ingresos.fecha_reg_ingreso DESC";
$ingresos = mysql_query($query_ingresos, $db_compu) or die(mysql_error());
$row_ingresos = mysql_fetch_assoc($ingresos);
$totalRows_ingresos = mysql_num_rows($ingresos);
?>




                              <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Listar Ingresos </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                           
                            
                             
                               <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                   

                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titulo</th>
                                            <th width="550">Nota</th>
                                            <th>Monto</th>
                                            <th>Fecha</th>
                                            <th>Categoria</th>
                                            
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                          <?php do { ?>
                                                      <tr>
                                                        <td><?php echo $row_ingresos['id_ingreso']; ?></td>
                                                        <td><?php echo $row_ingresos['titulo_ingreso']; ?></td>
                                                        <td><?php echo substr($row_ingresos['nota_ingreso'],0,120); ?></td>
                                                        <td><?php echo number_format($row_ingresos['monto_ingreso'],2,",","."); ?></td>
                                                        <td><?php echo $row_ingresos['fecha_reg_ingreso']; ?></td>
                                                        <td><?php echo $row_ingresos['nombre_cat_ingreso']; ?></td>
                                     <td><button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-ingreso-<?php echo $row_ingresos['id_ingreso']; ?>"><i class="fa fa-search"></i></button>
                                                          <a href="edit-ingreso.php?id_ingreso=<?php echo $row_ingresos['id_ingreso']; ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a> 
                                                          <a  data-href="inc/delete/ingreso.php?id_ingreso=<?php echo $row_ingresos['id_ingreso']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                      </tr>
                                        <?php } while ($row_ingresos = mysql_fetch_assoc($ingresos)); ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                             
<?php
mysql_free_result($ingresos);
?>
