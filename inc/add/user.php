
<?php 


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_user")) {
	
	$vatar=implode(',',$_POST['avatar']);
	
  $insertSQL = sprintf("INSERT INTO tb_login (cedula, nivel, email_user, password_user, nombre_user, apellido_user, avatar_user, fecha_reg) VALUES (%s, %s, %s, %s, %s, %s, '$vatar', NOW())",
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['nivel'], "int"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString(md5($_POST['password']), "text"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());

  $insertGoTo = "listar-usuarios.php";
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
                                    <h4 class="page-title">Registro De Usuarios </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                       
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                <form method="POST" action="<?php echo $editFormAction; ?>" name="add_user" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                               <div class="form-group">
                                                   <label class="col-md-2 control-label">Cedula</label>
	                                                <div class="col-md-10">
	                                                    <input type="number" name="cedula" id="cedula"  class="form-control">
                                                      <div id="Info"></div>  
	                                                </div>
                                                     
                                                    
                                                    
	                                            </div>
                                              
                                              
                                              
                                              
                                                <div class="form-group">
	                                                <label class="col-md-2 control-label">Nivel</label>
	                                                <div class="col-md-10">
	                                                    <select name="nivel" class="form-control" data-parsley-required>
	                                                        <option value="1">Administrador</option>
	                                                        <option value="0">Usuarios</option>
	                                                     </select>
	                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
                                              <div class="form-group">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-10">
	                                                    <input type="email" name="login" class="form-control" data-parsley-type="email">
	                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
                                              
                                                 <div class="form-group">
	                                                <label class="col-md-2 control-label">Password</label>
	                                                <div class="col-md-10">
	                                                    <input type="password" name="password" class="form-control" data-parsley-required>
	                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
	                                            
	                                            
	                                            
	                                            <div class="form-group">
                                                  <label class="col-md-2 control-label">Nombre</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="nombre" class="form-control" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Apellido</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="apellido" class="form-control" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                             
	                                            
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Avatar</label>
	                                                <div class="col-md-10">
                                                      <input type="file" name="avatar" id="avatar" class="form-control" orakuploader="on">
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Submit</button>
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_insert" value="add_user">
	                                            
	                                            
	                                          </form>
	                                
</div>
                                              
