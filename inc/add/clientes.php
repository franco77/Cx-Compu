<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_cliente")) {
	
	$user_login = $row_user_login['cedula'];
	
  $insertSQL = sprintf("INSERT INTO tb_cliente (cedula_cl, nombre_cl, apellido_cl, email_cl, telefono_cl, detalle_cl, fecha_reg_cl, direccion_cl, autor_reg_cl) VALUES (%s, %s, %s, %s, %s, %s, NOW(), %s, '$user_login')",
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['detalle'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());

  $insertGoTo = "listar-clientes.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
                                    


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Registro De Clientes </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                                              <form method="POST" action="<?php echo $editFormAction; ?>" name="add_cliente" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                               
                                              
	                                            
                                                 <div class="form-group">
                                                   <label class="col-md-2 control-label">Cedula</label>
	                                                <div class="col-md-10">
	                                                    <input name="cedula" type="number" required="required"  class="form-control" id="cedula">
                                                      <div id="Info"></div>  
	                                                </div>
                                                   </div>
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Nombre</label>
	                                                <div class="col-md-10">
	                                                    <input name="nombre" type="text" class="form-control" placeholder="Nombre" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Apellido</label>
	                                                <div class="col-md-10">
	                                                    <input name="apellido" type="text" class="form-control" placeholder="Apellido" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-10">
	                                                    <input name="email" type="email" class="form-control" placeholder="Email" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Telefono</label>
	                                                <div class="col-md-10">
	                                                    <input name="telefono" type="tel" class="form-control" placeholder="Telefono" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
                                                
                                                
                                                
                                                  <div class="form-group">
	                                                <label class="col-md-2 control-label">Direccion</label>
	                                                <div class="col-md-10">
														<textarea name="direccion" class="form-control" placeholder="Direccion"></textarea>
                                                   </div>
	                                            </div>
                                                
                                                
                                                
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label">Detalle</label>
	                                                <div class="col-md-10">
														<textarea name="detalle" id="detalle_eqp" class="form-control" placeholder="Detalle"></textarea>
                                                   </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                           
	                                            
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Submit</button>
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_insert" value="add_cliente">
	                                            
	                                            
	                                          </form>
	                                
</div>