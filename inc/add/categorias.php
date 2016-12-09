<?php
 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_categoria_gasto")) {
  $insertSQL = sprintf("INSERT INTO tb_cat_gasto (nomb_cat_gasto, descripcion_cat_gasto) VALUES (%s, %s)",
                       GetSQLValueString($_POST['titulo_cat_gasto'], "text"),
                       GetSQLValueString($_POST['descrip_cat_gasto'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());

  $insertGoTo = "add-categorias.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_categoria_ingre")) {
  $insertSQL = sprintf("INSERT INTO tb_cat_ingreso (nombre_cat_ingreso, descripcion_cat_ingreso) VALUES (%s, %s)",
                       GetSQLValueString($_POST['titulo_cat_ingreso'], "text"),
                       GetSQLValueString($_POST['descrip_cat_ingreso'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());

  $insertGoTo = "add-categorias.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 
 

mysql_select_db($database_db_compu, $db_compu);
$query_cat_gasto = "SELECT * FROM tb_cat_gasto";
$cat_gasto = mysql_query($query_cat_gasto, $db_compu) or die(mysql_error());
$row_cat_gasto = mysql_fetch_assoc($cat_gasto);
$totalRows_cat_gasto = mysql_num_rows($cat_gasto);

mysql_select_db($database_db_compu, $db_compu);
$query_cat_ingreso = "SELECT * FROM tb_cat_ingreso";
$cat_ingreso = mysql_query($query_cat_ingreso, $db_compu) or die(mysql_error());
$row_cat_ingreso = mysql_fetch_assoc($cat_ingreso);
$totalRows_cat_ingreso = mysql_num_rows($cat_ingreso);
?>







                      <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Registro De Categorias </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       
                                            
                                              
                                             <div class="row"> 
                                             <div class="col-md-5">
                                            
                                              <form method="POST" action="<?php echo $editFormAction; ?>" name="add_categoria_ingre" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                            
                                            <div class="form-group">
	                                                 <label class="col-md-4 control-label">Nombre Categoria Ingresos</label>
	                                                <div class="col-md-8">
	                                                    <input name="titulo_cat_ingreso" type="text" class="form-control" placeholder="Titulo Categoria" data-parsley-required>
                                                </div>
	                                            </div>
                                                
                                                
                                                <div class="form-group">
	                                                <label class="col-md-4 control-label">Descripcion Categoria Ingresos</label>
	                                                <div class="col-md-8">
	                                                    <textarea name="descrip_cat_ingreso" class="form-control" placeholder="Desacripcion" data-parsley-required > </textarea>
                                                </div>
	                                            </div>
                                                
                                                
                                                 <div class="form-group">
	                                                <label class="col-md-4 control-label"></label>
	                                                <div class="col-md-8">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Guardar Categoria Ingreso</button>
	                                                </div>
	                                            </div>
                                                 <input type="hidden" name="MM_insert" value="add_categoria_ingre">
                                                
                                                
                                              </form>    
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             <div class="col-md-5">
                                            
                                              <form method="POST" action="<?php echo $editFormAction; ?>" name="add_categoria_gasto" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                            
                                            <div class="form-group">
	                                                 <label class="col-md-4 control-label">Nombre Categoria Gasto</label>
	                                                <div class="col-md-8">
	                                                    <input name="titulo_cat_gasto" type="text" class="form-control" placeholder="Titulo Categoria" data-parsley-required>
                                                </div>
	                                            </div>
                                                
                                                
                                                <div class="form-group">
	                                                <label class="col-md-4 control-label">Descripcion Categoria Gastos</label>
	                                                <div class="col-md-8">
	                                                    <textarea name="descrip_cat_gasto" class="form-control" placeholder="Desacripcion" data-parsley-required > </textarea>
                                                </div>
	                                            </div>
                                                
                                                
                                               <div class="form-group">
	                                                <label class="col-md-4 control-label"></label>
	                                                <div class="col-md-8">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Guardar Categoria Gastos</button>
	                                                </div>
	                                            </div>
                                               <input type="hidden" name="MM_insert" value="add_categoria_gasto">
 
                                                
                                                
                                              </form>    
                                            </div>
                                            
                                            
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                              <div class="row">
                                              
                                              
                                              
                                              
                                              
                                               
                                             <div class="col-md-6">
                                             
                                             <table id="datatable2" class="table table-bordered">
                                                   <thead>
                                                      <tr>
                                                      <th scope="col">ID</th>
                                                      <th scope="col">Nombre</th>
                                                      <th scope="col">Descripcion</th>
                                                      <th>Eliminar</th>
                                                    </tr>
                                                    </thead>
                                                    <?php do { ?>
                                                  <tbody>
                                                  <tr>
                                                    <td><?php echo $row_cat_ingreso['id_cat_ingreso']; ?></td>
                                                    <td><?php echo $row_cat_ingreso['nombre_cat_ingreso']; ?></td>
                                                    <td><?php echo $row_cat_ingreso['descripcion_cat_ingreso']; ?></td>
                                                    <td>
                  <a  data-href="inc/delete/categoria_ingre.php?id_cat_ingreso=<?php echo $row_cat_ingreso['id_cat_ingreso']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                  </tr>
                                                  <?php } while ($row_cat_ingreso = mysql_fetch_assoc($cat_ingreso)); ?>
                                                  </tbody>
                                                </table>

                                             
                                             
                                             </div>
                                            
                                             <div class="col-md-6">
                                             
                                             
                                               <table id="datatable1" class="table table-bordered">
                                                   
                                                   <thead>
                                                     <tr>
                                                       <th scope="col">ID</th>
                                                       <th scope="col">Nombre</th>
                                                       <th scope="col">Descripcion</th>
                                                       <th>Eliminar</th>
                                                     </tr>
                                                     </thead>
                                                       <?php do { ?>
                                                     <tbody>
                                                     <tr>
                                                       <td><?php echo $row_cat_gasto['id_cat_gasto']; ?></td>
                                                       <td><?php echo $row_cat_gasto['nomb_cat_gasto']; ?></td>
                                                       <td><?php echo $row_cat_gasto['descripcion_cat_gasto']; ?></td>
                                                       <td><a  data-href="inc/delete/categoria_gast.php?id_cat_gasto=<?php echo $row_cat_gasto['id_cat_gasto']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a></td>
                                                     </tr>
                                                     <?php } while ($row_cat_gasto = mysql_fetch_assoc($cat_gasto)); ?>
                                                   </tbody>
                                                </table>
                                                 
                                             
                                             </div>
                                             </div>
                                             </div>
                                             </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             
