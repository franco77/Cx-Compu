<?php
mysql_select_db($database_db_compu, $db_compu);
$query_clientes = "SELECT * FROM tb_cliente";
$clientes = mysql_query($query_clientes, $db_compu) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);
?>


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Listar Clientes </h4>
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
                                               <th>Cedula</th>
                                               <th>Nombre</th>
                                               <th>Apellido</th>
                                               <th>Email</th>
                                               <th>Telefono</th>
                                               <th>Fecha Registro</th>
                                               <th width="500">Direccion</th>
                                               <th>Registrado Por</th>
                                               <th>Accion</th>
                                             </tr>
                                             </thead>
                                           
                                           
                                           <tbody>
                                     <?php do { ?>
                                             <tr>
                                               <td><?php echo $row_clientes['cedula_cl']; ?></td>
                                               <td><?php echo $row_clientes['nombre_cl']; ?></td>
                                               <td><?php echo $row_clientes['apellido_cl']; ?></td>
                                               <td><?php echo $row_clientes['email_cl']; ?></td>
                                               <td><?php echo $row_clientes['telefono_cl']; ?></td>
                                               <td><?php echo $row_clientes['fecha_reg_cl']; ?></td>
                                               <td><?php echo substr($row_clientes['direccion_cl'], 0, 100); ?></td>
                                               <td><?php echo $row_clientes['autor_reg_cl']; ?></td>
                                               <td>
                                         <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-cliente-<?php echo $row_clientes['cedula_cl']; ?>"><i class="fa fa-search"></i></button>
                                               <a href="edit-cliente.php?cedula_cl=<?php echo $row_clientes['cedula_cl']; ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a>
                                               <a  data-href="inc/delete/cliente.php?cedula_cl=<?php echo $row_clientes['cedula_cl']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                               </td>
                                             </tr>
                                             <?php } while ($row_clientes = mysql_fetch_assoc($clientes)); ?>
                                             </tbody>
                                         </table>
                                 
                                </div>
                            </div>
                        </div>
