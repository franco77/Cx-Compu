<?php require_once('Connections/db_compu.php'); ?>
<?php
require("inc/comun/funcion_sql.php"); 
?>
<?php

if (!isset($_SESSION)) {
	
  session_start();
   
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
	 
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
  
}


if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password = md5($_POST['password']);
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "index.php";
  //$MM_redirectLoginFailed = "Error Al Ingresar";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db_compu, $db_compu);
  	
  $LoginRS__query=sprintf("SELECT email_user, password_user, nivel, estado_user FROM tb_login WHERE email_user=%s AND password_user=%s AND estado_user = 'Activo'",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db_compu) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    $error='<div class="alert alert-danger" role="alert">Algo Salio Mal </div>';
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <title>Login</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                          <p align="center"><img src="files/login/login.png" class="img-responsive" width="120"></p>

                          

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        
                                            <span style="color:#FFFFFF">Entrat Al </span><span style="color:#E0620D">Sistema</span>
                                        
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    
                                    <form METHOD="POST" name="login" class="form-horizontal" action="<?php echo $loginFormAction; ?>">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input name="email" type="text" required="" class="form-control"  placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input name="password" type="password" required="" class="form-control" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox-signup" type="checkbox" checked>
                                                    <label for="checkbox-signup">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                    

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" name="login" type="submit">Entrar</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>
                              
                                </div>
                            </div>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <?php echo isset($error) ? utf8_decode($error) : '' ; ?>
                            <!-- end card-box-->


                           <!-- <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div>-->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

       
     <?php require("inc/comun/js.php"); ?>  
       

    </body>
</html>