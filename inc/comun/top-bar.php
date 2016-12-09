<?php

if (!isset($_SESSION)) {
  session_start();
}


$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
require("consultas-top-bar.php");
 ?>

<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo"><span>CI<span>TRUX</span></span><i class="mdi mdi-layers"></i></a>
                   
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li >
                            <p>&nbsp;</p>
                                <?php 
								$fecha_hoy=date("d-m-Y");
								$hora_hoy=date("H:i:s");
								echo '<span class="label label-default"> <i class="fa fa-calculator"></i> '.$fecha_hoy .'</span> ';
								echo ' <span class="label label-default"><i class="fa fa-clock-o"></i> '.$hora_hoy .'</span>';
								?>
                              
                            </li>
                          
                        
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <span class="badge up bg-success"><?php echo $totalRows_noti_event; ?></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Eventos</h5>
                                    </li>
                                    
                                    <?php if ($totalRows_noti_event >= 1) { ?>
									<?php do { ?>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-info">
                                                <i class="mdi mdi-calendar"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name"><?php echo $row_noti_event['titulo_evento']; ?></span>
                                                
                                            </div>
                                        </a>
                                    </li>
                                    <?php } while ($row_noti_event = mysql_fetch_assoc($noti_event)); ?>
                                    <?php }
									else {
										
										echo '<li>
										       <div class="user-list-item">
										       <div class="icon" style="background-color: #f8b619">
                                                <i class="fa fa-warning"></i>
                                            </div>
											 <div class="user-desc">
											 <span class="name">
											<div class="alert alert-warning" role="alert" style="padding:3px 6px 3px">
                                                <strong>No!</strong> tienes Notificaciones</div>
												</div>
												</span>
												</div>
												</li>';
										
										}
									 ?>
                                     <li class="all-msgs text-center">
                                        <p class="m-0"><a href="calendario.php">Ver Caledario</a></p>
                                    </li>
                                </ul>
                            </li>

                           
                           
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-white-balance-incandescent "></i>
                                    <span class="badge up bg-danger"><?php echo $totalRows_event_equipos; ?></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Equipos</h5>
                                    </li>
                                   
                                   <?php do { ?>
                                    <li>
                                        <a href="#" class="user-list-item">
                                           <div class="icon bg-info">
                                                <i class="mdi mdi-desktop-mac"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name"><?php echo $row_event_equipos['dni_eqp']; ?></span>
                                                <span class="desc"><?php echo $row_event_equipos['titulo_eqp']; ?></span>
                                               
                                            </div>
                                        </a>
                                    </li>
                                 <?php } while ($row_event_equipos = mysql_fetch_assoc($event_equipos)); ?>
                                  
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="listar-equipos.php">Lista De Equipos</a></p>
                                    </li>
                                </ul>
                            </li>

                          

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="files/avatar/<?php echo $row_user_login['avatar_user']; ?>" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hola, <?php echo $row_user_login['nombre_user']; ?></h5>
                                    </li>
                                    
                                    
                                  <li><a data-toggle="modal" data-target="#ver-usuario-<?php echo $row_user_login['cedula']; ?>"><i class="ti-user m-r-5"></i> Perfil</a></li>
                                    <li><a href="edit-usuario.php?cedula=<?php echo $row_user_login['cedula']; ?>"><i class="ti-settings m-r-5"></i> Ajustes</a></li>
                                    <li><a href="<?php echo $logoutAction ?>"><i class="ti-power-off m-r-5"></i> Salir</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
