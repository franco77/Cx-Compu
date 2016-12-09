<?php 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "edit_cliente")) {
	
	$user_login = $row_user_login['cedula'];
	
  $updateSQL = sprintf("UPDATE tb_cliente SET nombre_cl=%s, apellido_cl=%s, email_cl=%s, telefono_cl=%s, detalle_cl=%s,  direccion_cl=%s, actualizado_el=NOW(), actualizado_por='$user_login' WHERE cedula_cl=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['detalle'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['cedula'], "int"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($updateSQL, $db_compu) or die(mysql_error());

  $updateGoTo = "listar-clientes.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
 

$colname_edit_cliente = "-1";
if (isset($_GET['cedula_cl'])) {
  $colname_edit_cliente = $_GET['cedula_cl'];
}
mysql_select_db($database_db_compu, $db_compu);
$query_edit_cliente = sprintf("SELECT * FROM tb_cliente WHERE cedula_cl = %s", GetSQLValueString($colname_edit_cliente, "int"));
$edit_cliente = mysql_query($query_edit_cliente, $db_compu) or die(mysql_error());
$row_edit_cliente = mysql_fetch_assoc($edit_cliente);
$totalRows_edit_cliente = mysql_num_rows($edit_cliente);


?>

                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Editar Clientes </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                                              <form method="POST" action="<?php echo $editFormAction; ?>" name="edit_cliente" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                               
                                              
	                                            
                                                 <div class="form-group">
                                                   <label class="col-md-2 control-label">Cedula</label>
	                                                <div class="col-md-10">
	                                                    <input name="cedula" type="number" required="required"  class="form-control" id="cedula" value="<?php echo $row_edit_cliente['cedula_cl']; ?>" readonly>
                                                       </div>
                                                   </div>
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Nombre</label>
	                                                <div class="col-md-10">
	                                                    <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="<?php echo $row_edit_cliente['nombre_cl']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Apellido</label>
	                                                <div class="col-md-10">
	                                                    <input name="apellido" type="text" class="form-control" placeholder="Apellido" value="<?php echo $row_edit_cliente['apellido_cl']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-10">
	                                                    <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $row_edit_cliente['email_cl']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Telefono</label>
	                                                <div class="col-md-10">
	                                                    <input name="telefono" type="tel" class="form-control" placeholder="Telefono" value="<?php echo $row_edit_cliente['telefono_cl']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
                                                
                                                
                                                
                                                  <div class="form-group">
	                                                <label class="col-md-2 control-label">Direccion</label>
	                                                <div class="col-md-10">
														<textarea name="direccion" class="form-control" placeholder="Direccion"><?php echo $row_edit_cliente['direccion_cl']; ?></textarea>
                                                   </div>
	                                            </div>
                                                
                                                
                                                
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label">Detalle</label>
	                                                <div class="col-md-10">
														<textarea name="detalle" id="detalle_eqp" class="form-control" placeholder="Detalle"><?php echo $row_edit_cliente['detalle_cl']; ?></textarea>
                                                   </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                           
	                                            
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Submit</button>
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_update" value="edit_cliente">
	                                            
	                                            
	                                            
	                                          </form>
	                                
</div>
                                              <?php
mysql_free_result($edit_cliente);
?>
