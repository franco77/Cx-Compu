<?php 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_ingresos")) {
	
	$user_login=$row_user_login['cedula'];
	$mes_ingreso=date('m');
	
  $insertSQL = sprintf("INSERT INTO tb_ingresos (id_cat_ingreso, titulo_ingreso, nota_ingreso, monto_ingreso, fecha_reg_ingreso, mes_reg_ingreso, autor_ingreso) VALUES (%s, %s, %s, %s, NOW(), '$mes_ingreso', '$user_login')",
                       GetSQLValueString($_POST['categoria'], "int"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['nota'], "text"),
                       GetSQLValueString($_POST['monto'], "double"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());

  $insertGoTo = "listar-ingresos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 
mysql_select_db($database_db_compu, $db_compu);
$query_cat_ingreso = "SELECT * FROM tb_cat_ingreso";
$cat_ingreso = mysql_query($query_cat_ingreso, $db_compu) or die(mysql_error());
$row_cat_ingreso = mysql_fetch_assoc($cat_ingreso);
$totalRows_cat_ingreso = mysql_num_rows($cat_ingreso);
?>



                      <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Registro De Ingresos </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       
                                            
                                              
                                           
        <div class="col-md-10">
           <form method="POST" action="<?php echo $editFormAction; ?>" name="add_ingresos" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                              <div class="form-group">
	                                                <label class="col-md-2 control-label">Categoria</label>
	                                                <div class="col-md-10">
	                                                   
                                                        <select name="categoria" class="form-control select2" data-parsley-required id="categoria">
	                                                         <?php do { ?>
	                                                        <option value="<?php echo $row_cat_ingreso['id_cat_ingreso']; ?>"><?php echo $row_cat_ingreso['nombre_cat_ingreso']; ?></option>
	                                                        <?php } while ($row_cat_ingreso = mysql_fetch_assoc($cat_ingreso)); ?>
                                                           </select>
	                                                      
                                                  </div>
	                                            </div>
                                              
                                              
                                              
                                              
                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Titulo</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="titulo" class="form-control" data-parsley-required id="titulo">
                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
                                              
                                                 <div class="form-group">
	                                                <label class="col-md-2 control-label">Nota</label>
	                                                <div class="col-md-10">
	                                                    <textarea name="nota" class="form-control" id="detalle_ingreso"></textarea>
	                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
	                                            
	                                            
	                                            
	                                            <div class="form-group">
                                                  <label class="col-md-2 control-label">Monto</label>
	                                                <div class="col-md-10">
	                                                    <input type="number" name="monto" class="form-control" data-parsley-required id="monto">
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                           
	                                            
	                                            
	                                             
	                                            
	                                            
	                                            
	                                            
	                                             
	                                            
	                                            
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Guardar</button>
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_insert" value="add_ingresos">
	                                            
	                                            </form>
	                                
                                            </div>
                                            
                                            
                                           
                                            
                                            
                                            
                                            
                                            
                                             
