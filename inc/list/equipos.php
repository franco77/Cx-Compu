<?php 
 
mysql_select_db($database_db_compu, $db_compu);
$query_equipos = "SELECT * FROM tb_equipo";
$equipos = mysql_query($query_equipos, $db_compu) or die(mysql_error());
$row_equipos = mysql_fetch_assoc($equipos);
$totalRows_equipos = mysql_num_rows($equipos);
?>

                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Listar Equipos </h4>
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
                                            <th>DNI</th>
                                            <th>CI-Cliente</th>
                                            <th>Titulo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th width="400">Descripcion</th>
                                            <th>Fecha Registro</th>
                                            <th>Fecha Entrega</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                          <?php do { ?>
                                              <tr>
                                                <td><?php echo $row_equipos['dni_eqp']; ?></td>
                                                <td><?php echo $row_equipos['id_cliente']; ?></td>
                                                <td><?php echo $row_equipos['titulo_eqp']; ?></td>
                                                <td><?php echo $row_equipos['marca_eqp']; ?></td>
                                                <td><?php echo $row_equipos['modelo_eqp']; ?></td>
                                                <td><?php echo substr($row_equipos['descripccion_eqp'],0,100); ?></td>
                                                <td><?php echo $row_equipos['facha_registro_eqp']; ?></td>
                                                <td><?php echo $row_equipos['fecha_entrega_eqp']; ?></td>
                                                 <td>
                                         <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-equipo-<?php echo $row_equipos['dni_eqp']; ?>"><i class="fa fa-search"></i></button>
                                               <a href="edit-equipo.php?dni_eqp=<?php echo $row_equipos['dni_eqp']; ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a>
                                                <a  data-href="inc/delete/equipo.php?dni_eqp=<?php echo $row_equipos['dni_eqp']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                               </td>
                                              </tr>
                                         <?php } while ($row_equipos = mysql_fetch_assoc($equipos)); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                               