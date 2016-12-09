<?php mysql_select_db($database_db_compu, $db_compu);
$query_user = "SELECT * FROM tb_login ORDER BY fecha_reg DESC";
$user = mysql_query($query_user, $db_compu) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
$totalRows_user = mysql_num_rows($user);
?>

                             <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Listar Usuarios </h4>
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
                                            <th>Nivel</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Avatar</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                          <?php do { ?>
                                                  <tr>
                                                    <td><?php echo $row_user['cedula']; ?></td>
                                                    <?php if ($row_user['nivel'] == 1) { ?>
                                                    <td>Administrador</td>
                                                    <?php }
													else
													{ ?>
                                                     <td>Usuario</td>
                                                     <?php } ?>
                                                     
                                                    <td><?php echo $row_user['email_user']; ?></td>
                                                    <td><?php echo $row_user['password_user']; ?></td>
                                                    <td><?php echo $row_user['nombre_user']; ?></td>
                                                    <td><?php echo $row_user['apellido_user']; ?></td>
                                                    <td><img src="files/avatar/<?php echo $row_user['avatar_user']; ?>" width="60" height="40"></td>
                                                    <td><?php echo $row_user['fecha_reg']; ?></td>
                                                   
                                                     <td>
                                         <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-usuario-<?php echo $row_user['cedula']; ?>"><i class="fa fa-search"></i></button>
                                               <a href="edit-usuario.php?cedula=<?php echo $row_user['cedula']; ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a>
                                  <a  data-href="inc/delete/usuario.php?cedula=<?php echo $row_user['cedula']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                               </td>
                                                    
                                                  </tr>
                                           <?php } while ($row_user = mysql_fetch_assoc($user)); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                             
