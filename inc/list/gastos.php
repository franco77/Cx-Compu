<?php 
mysql_select_db($database_db_compu, $db_compu);
$query_gastos = "SELECT * FROM tb_gastos, tb_cat_gasto WHERE tb_gastos.id_cat_gasto = tb_cat_gasto.id_cat_gasto";
$gastos = mysql_query($query_gastos, $db_compu) or die(mysql_error());
$row_gastos = mysql_fetch_assoc($gastos);
$totalRows_gastos = mysql_num_rows($gastos);
?>


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Listar Gastos </h4>
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
                                               <td><?php echo $row_gastos['id_gasto']; ?></td>
                                               <td><?php echo $row_gastos['titulo_gasto']; ?></td>
                                               <td><?php echo substr($row_gastos['nota_gasto'],0,120); ?></td>
                                               <td><?php echo number_format($row_gastos['monto_gasto'],2,",","."); ?></td>
                                               <td><?php echo $row_gastos['fecha_reg_gasto']; ?></td>
                                               <td><?php echo $row_gastos['nomb_cat_gasto']; ?></td>
                                               <td><button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ver-gasto-<?php echo $row_gastos['id_gasto']; ?>"><i class="fa fa-search"></i></button>
                                                 <a href="edit-gastos.php?id_gasto=<?php echo $row_gastos['id_gasto']; ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"></i></a> 
                                                 <a  data-href="inc/delete/gasto.php?id_gasto=<?php echo $row_gastos['id_gasto']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                                 </td>
                                             </tr>
                                         <?php } while ($row_gastos = mysql_fetch_assoc($gastos)); ?>
                                          </tbody>
                                         </table>
                                         
                                </div>
                            </div>
                        </div>

