<?php 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_equipos")) {
	
	$user_login=$row_user_login['cedula'];
	
  $insertSQL = sprintf("INSERT INTO tb_equipo (dni_eqp, id_cliente, titulo_eqp, marca_eqp, modelo_eqp, descripccion_eqp, facha_registro_eqp, fecha_entrega_eqp, hora_entrega, precio_rep_eqp, autor_reg_eqp) VALUES (%s, %s, %s, %s, %s, %s, NOW(), %s, %s, %s, '$user_login')",
                       GetSQLValueString($_POST['dni'], "text"),
                       GetSQLValueString($_POST['clientes'], "int"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['marca'], "text"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['detalle'], "text"),
                       GetSQLValueString($_POST['fecha_entrega'], "date"),
                       GetSQLValueString($_POST['hora_entrega'], "date"),
                       GetSQLValueString($_POST['precio'], "double"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());

  $insertGoTo = "listar-equipos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 
mysql_select_db($database_db_compu, $db_compu);
$query_clientes = "SELECT * FROM tb_cliente";
$clientes = mysql_query($query_clientes, $db_compu) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);
?>


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Registro De Equipos </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                                              <form method="POST" action="<?php echo $editFormAction; ?>" name="add_equipos" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              <input type="hidden" name="length" value="10">
                                               
                                              
	                                            
                                                 <div class="form-group">
                                                   <label class="col-md-2 control-label">Identificador</label>
	                                                <div class="col-md-10">
                                                    <input type="text" name="dni" class="form-control" size="40">
                                                    
                                                      <input type="button" class="btn btn-primary" value="Generate" onClick="generate();" tabindex="2" style="margin-top:8px;">
                                                      
	                                                </div>
                                                   </div>
	                                            
	                                            
                                                
                                                
                                                
                                                 <div class="form-group">
	                                                <label class="col-md-2 control-label">CLiente</label>
	                                                <div class="col-md-10">
	                                                   
                                                        <select name="clientes"  class="form-control select2" id="clientes">
	                                                        <option>Select</option>
	                                                        <optgroup label="Clientes">
	                                                           <?php do { ?>
                                                              <option value="<?php echo $row_clientes['cedula_cl']; ?>"><?php echo $row_clientes['nombre_cl']; ?></option>
	                                                          <?php } while ($row_clientes = mysql_fetch_assoc($clientes)); ?>
                                                            </optgroup>
                                                          </select>
	                                                      
	                                                </div>
	                                            </div>
                                                
                                                
                                                
                                                
                                                
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Titulo</label>
	                                                <div class="col-md-10">
	                                                    <input name="titulo" type="text" class="form-control" placeholder="Titulo" data-parsley-required id="titulo">
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Marca</label>
	                                                <div class="col-md-10">
	                                                    <input name="marca" type="text" class="form-control" placeholder="Marca" data-parsley-required id="marca">
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Modelo</label>
	                                                <div class="col-md-10">
	                                                    <input name="modelo" type="text" class="form-control" placeholder="Modelo" data-parsley-required id="modelo">
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                              
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label">Descripcion</label>
	                                                <div class="col-md-10">
														<textarea name="detalle" class="form-control" id="detalle_eqp" placeholder="Detalle"></textarea>
                                                   </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
                                                
                                                
                                                
                                                
                                                
                                                <div class="form-group">
                                                <label class="col-md-2 control-label">Fecha De Entrega</label>
	                                                <div class="col-md-10">
                                                    <input name="fecha_entrega" type="text" class="form-control" id="datepicker" placeholder="mm/dd/yyyy">
                                                    </div>
                                                </div>
                                                
                                                
	                                           
                                               
                                               
                                               <div class="form-group">
                                                        <label class="col-md-2 control-label">Hora De Entrega</label>
	                                                <div class="col-md-10">
                                                            <input name="hora_entrega" type="text" class="form-control" id="timepicker">
                                                            </div>
                                                       </div>
                                               
                                               
                                               
                                               
                                               
                                               
                                                <div class="form-group">
	                                                <label class="col-md-2 control-label">Precio</label>
	                                                <div class="col-md-10">
	                                                    <input name="precio" type="number" class="form-control" placeholder="Precio" data-parsley-required >
	                                                </div>
	                                            </div>
                                               
                                               
                                               
                                               
                                               
                                               
	                                            
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Guardar</button>
                                                      
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_insert" value="add_equipos">
	                                            
	                                            
	                                          </form>
	                                
</div>

