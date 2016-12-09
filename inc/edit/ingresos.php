<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "edit_ingreso")) {
	
	$user_login=$row_user_login['cedula'];
	
  $updateSQL = sprintf("UPDATE tb_ingresos SET titulo_ingreso=%s, nota_ingreso=%s, monto_ingreso=%s, actualizado_por='$user_login', actualizado_el=NOW() WHERE id_ingreso=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['nota'], "text"),
                       GetSQLValueString($_POST['monto'], "double"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($updateSQL, $db_compu) or die(mysql_error());
  
 

  header( 'Location: listar-ingresos.php' ) ;


  
}

 

$colname_edit_ingresos = "-1";
if (isset($_GET['id_ingreso'])) {
  $colname_edit_ingresos = $_GET['id_ingreso'];
}
mysql_select_db($database_db_compu, $db_compu);
$query_edit_ingresos = sprintf("SELECT * FROM tb_ingresos WHERE id_ingreso = %s", GetSQLValueString($colname_edit_ingresos, "int"));
$edit_ingresos = mysql_query($query_edit_ingresos, $db_compu) or die(mysql_error());
$row_edit_ingresos = mysql_fetch_assoc($edit_ingresos);
$totalRows_edit_ingresos = mysql_num_rows($edit_ingresos);
?>





                     <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Editar Ingresos </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                <form method="POST" action="<?php echo $editFormAction; ?>" name="edit_ingreso" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                             
                                              
                                              
                                              
                                              
                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Titulo</label>
	                                                <div class="col-md-10">
	                                                    <input name="titulo" type="text" class="form-control" id="titulo" value="<?php echo $row_edit_ingresos['titulo_ingreso']; ?>" data-parsley-required>
                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
                                              
                                                 <div class="form-group">
	                                                <label class="col-md-2 control-label">Nota</label>
	                                                <div class="col-md-10">
	                                                    <textarea name="nota" class="form-control" id="detalle_ingreso"><?php echo $row_edit_ingresos['nota_ingreso']; ?></textarea>
	                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
	                                            
	                                            
	                                            
	                                            <div class="form-group">
                                                  <label class="col-md-2 control-label">Monto</label>
	                                                <div class="col-md-10">
	                                                    <input name="monto" type="number" class="form-control" id="monto" value="<?php echo $row_edit_ingresos['monto_ingreso']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                           
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Guardar</button>
                                                       <input type="hidden" name="id" value="<?php echo $row_edit_ingresos['id_ingreso']; ?>" />
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_update" value="edit_ingreso">
	                                            
	                                            </form>
	                                
                                            </div>
                                             
<?php
mysql_free_result($edit_ingresos);
?>
