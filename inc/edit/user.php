<?php 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "edit_user")) {
	
	$avatar=implode(',',$_POST['e_avatar']);
	
  $updateSQL = sprintf("UPDATE tb_login SET nivel=%s, email_user=%s, password_user=%s, nombre_user=%s, apellido_user=%s, avatar_user='$avatar', estado_user=%s WHERE cedula=%s",
                       GetSQLValueString($_POST['nivel'], "int"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString(md5($_POST['password']), "text"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['cedula'], "int"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($updateSQL, $db_compu) or die(mysql_error());

  $updateGoTo = "listar-usuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_edi_user = "-1";
if (isset($_GET['cedula'])) {
  $colname_edi_user = $_GET['cedula'];
}
mysql_select_db($database_db_compu, $db_compu);
$query_edi_user = sprintf("SELECT * FROM tb_login WHERE cedula = %s", GetSQLValueString($colname_edi_user, "int"));
$edi_user = mysql_query($query_edi_user, $db_compu) or die(mysql_error());
$row_edi_user = mysql_fetch_assoc($edi_user);
$totalRows_edi_user = mysql_num_rows($edi_user);
?>






                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Editar Usuarios </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <a href="index.php"><i class="fa fa-home fa-2x"></i></a>   
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       
                                            
                                              
                                              
                                              <div class="col-md-10">
                                              
                                              
                <form method="POST" action="<?php echo $editFormAction; ?>" name="edit_user" class="form-horizontal" role="form" data-parsley-validate novalidate>
                                              
                                              
                                               <div class="form-group">
                                                   <label class="col-md-2 control-label">Cedula</label>
	                                                <div class="col-md-10">
	                                                    <input name="cedula" type="number"  class="form-control" id="cedula" value="<?php echo $row_edi_user['cedula']; ?>" readonly>
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
	                                                    <input name="login" type="email" class="form-control" value="<?php echo $row_edi_user['email_user']; ?>" data-parsley-type="email">
	                                                </div>
	                                            </div>
                                              
                                              
                                             
                                                 <div class="form-group">
	                                                <label class="col-md-2 control-label">Password</label>
	                                                <div class="col-md-10">
	                                                    <input name="password" type="password" class="form-control" value="<?php echo $row_edi_user['password_user']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
                                              
                                              
                                              
                                              
	                                            
	                                            
	                                            
	                                            <div class="form-group">
                                                  <label class="col-md-2 control-label">Nombre</label>
	                                                <div class="col-md-10">
	                                                    <input name="nombre" type="text" class="form-control" value="<?php echo $row_edi_user['nombre_user']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                            
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Apellido</label>
	                                                <div class="col-md-10">
	                                                    <input name="apellido" type="text" class="form-control" value="<?php echo $row_edi_user['apellido_user']; ?>" data-parsley-required>
	                                                </div>
	                                            </div>
	                                            
	                                            
	                                            
	                                             
	                                            
	                                            
	                                            
	                                            
	                                               <div class="form-group">
	                                                <label class="col-md-2 control-label">Avatar</label>
	                                                <div class="col-md-10">
                                                      <input type="file" name="e_avatar" id="e_avatar" class="form-control" orakuploader="on">
	                                                </div>
	                                            </div>
	                                            
	                                            
                                                
                                                  <div class="form-group">
	                                                <label class="col-md-2 control-label">Estado</label>
	                                                <div class="col-md-10">
	                                                    <select name="estado" class="form-control" data-parsley-required>
	                                                        <option value="Activo">Activo</option>
	                                                        <option value="Suspendido">Suspendido</option>
	                                                     </select>
	                                                </div>
	                                            </div>
                                                
                                                
                                                
	                                            
	                                            
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                   <button type="submit" class="btn btn-inverse waves-effect waves-light">Editar</button>
	                                                </div>
	                                            </div>
	                                             <input type="hidden" name="MM_update" value="edit_user">
	                                          
	                                            
	                                            
	                                          </form>
	                                
</div>
                                              
<?php
mysql_free_result($edi_user);
?>
