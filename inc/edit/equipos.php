<?php 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "edit_equipos")) {
	
	$user_login=$row_user_login['cedula'];
	
  $updateSQL = sprintf("UPDATE tb_equipo SET titulo_eqp=%s, marca_eqp=%s, modelo_eqp=%s, descripccion_eqp=%s, fecha_entrega_eqp=%s, hora_entrega=%s, precio_rep_eqp=%s, actualizado_el=NOW(), actualizado_por='$user_login', estado_rep_eqp=%s WHERE dni_eqp=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['marca'], "text"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['detalle'], "text"),
                       GetSQLValueString($_POST['fecha_entrega'], "date"),
                       GetSQLValueString($_POST['hora_entrega'], "date"),
                       GetSQLValueString($_POST['precio'], "double"),
					    GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['dni'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($updateSQL, $db_compu) or die(mysql_error());

  $updateGoTo = "listar-equipos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

 
mysql_select_db($database_db_compu, $db_compu);
$query_clientes = "SELECT * FROM tb_cliente";
$clientes = mysql_query($query_clientes, $db_compu) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

$colname_edit_equipo = "-1";
if (isset($_GET['dni_eqp'])) {
  $colname_edit_equipo = $_GET['dni_eqp'];
}
mysql_select_db($database_db_compu, $db_compu);
$query_edit_equipo = sprintf("SELECT * FROM tb_equipo WHERE dni_eqp = %s", GetSQLValueString($colname_edit_equipo, "text"));
$edit_equipo = mysql_query($query_edit_equipo, $db_compu) or die(mysql_error());
$row_edit_equipo = mysql_fetch_assoc($edit_equipo);
$totalRows_edit_equipo = mysql_num_rows($edit_equipo);
?>



                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Editar Equipos </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                                              <form method="POST" action="<?php echo $editFormAction; ?>" name="edit_equipos" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                               
                                              
	                                            
                                                <div class="form-group">
                                                   <label class="col-md-2 control-label">Identificador</label>
	                                                <div class="col-md-10">
                                                    <input name="dni" type="text" class="form-control" value="<?php echo $row_edit_equipo['dni_eqp']; ?>" size="40" readonly>
                                                    
                                                      
                                                      
                                                   </div>
                                                   </div>
	                                            
	                                            
                                                
                                                
                                                
                                               
                                                
                                                
                                                
                                                
                                                
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Titulo</label>
	                                                <div class="col-md-10">
	                                                    <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo" value="<?php echo $row_edit_equipo['titulo_eqp']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Marca</label>
	                                                <div class="col-md-10">
	                                                    <input name="marca" type="text" class="form-control" id="marca" placeholder="Marca" value="<?php echo $row_edit_equipo['marca_eqp']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Modelo</label>
	                                                <div class="col-md-10">
	                                                    <input name="modelo" type="text" class="form-control" id="modelo" placeholder="Modelo" value="<?php echo $row_edit_equipo['modelo_eqp']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                              
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label">Descripcion</label>
	                                                <div class="col-md-10">
														<textarea name="detalle" class="form-control" id="detalle_eqp" placeholder="Detalle"><?php echo $row_edit_equipo['descripccion_eqp']; ?></textarea>
                                                   </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
                                                
                                                
                                                
                                                
                                                
                                                <div class="form-group">
                                                <label class="col-md-2 control-label">Fecha De Entrega</label>
	                                                <div class="col-md-10">
                                                    <input name="fecha_entrega" type="text" class="form-control" id="datepicker" placeholder="mm/dd/yyyy" value="<?php echo $row_edit_equipo['fecha_entrega_eqp']; ?>">
                                                    </div>
                                                </div>
                                                
                                                
	                                           
                                               
                                               
                                               <div class="form-group">
                                                        <label class="col-md-2 control-label">Hora De Entrega</label>
	                                                <div class="col-md-10">
                                                            <input name="hora_entrega" type="text" class="form-control" id="timepicker" value="<?php echo $row_edit_equipo['hora_entrega']; ?>">
                                                            </div>
                                                       </div>
                                               
                                               
                                               
                                               
                                               
                                               
                                                <div class="form-group">
	                                                <label class="col-md-2 control-label">Precio</label>
	                                                <div class="col-md-10">
	                                                    <input name="precio" type="number" class="form-control" placeholder="Precio" value="<?php echo $row_edit_equipo['precio_rep_eqp']; ?>" data-parsley-required />
	                                                </div>
	                                            </div>
                                               
                                               
                                               
                                               
                                                <div class="form-group">
	                                                <label class="col-md-2 control-label">Estado</label>
	                                                <div class="col-md-10">
	                                                    <select name="estado" class="form-control" data-parsley-required />
                                                        <option value="Pendiente">Pendiente</option>
                                                        <option value="En Reparacion">En Reparacion</option>
                                                        <option value="Reparado">Reparado</option>
                                                        <option value="Entregado">Entregado</option>
                                                        
                                                        </select>
	                                                </div>
	                                            </div>
                                               
	                                            
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Guardar</button>
                                                      
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_update" value="edit_equipos">
	                                            
	                                            
	                                          </form>
	                                
</div>

<?php
mysql_free_result($edit_equipo);
?>
