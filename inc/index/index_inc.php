<?php

mysql_select_db($database_db_compu, $db_compu);
$query_count_clientes = "SELECT COUNT(*) FROM tb_cliente";
$count_clientes = mysql_query($query_count_clientes, $db_compu) or die(mysql_error());
$row_count_clientes = mysql_fetch_assoc($count_clientes);
$totalRows_count_clientes = mysql_num_rows($count_clientes);

mysql_select_db($database_db_compu, $db_compu);
$query_count_equipos = "SELECT COUNT(*) FROM tb_equipo";
$count_equipos = mysql_query($query_count_equipos, $db_compu) or die(mysql_error());
$row_count_equipos = mysql_fetch_assoc($count_equipos);
$totalRows_count_equipos = mysql_num_rows($count_equipos);

mysql_select_db($database_db_compu, $db_compu);
$query_count_equi_pend = "SELECT COUNT(*) FROM tb_equipo WHERE tb_equipo.estado_rep_eqp = 'Pendiente'";
$count_equi_pend = mysql_query($query_count_equi_pend, $db_compu) or die(mysql_error());
$row_count_equi_pend = mysql_fetch_assoc($count_equi_pend);
$totalRows_count_equi_pend = mysql_num_rows($count_equi_pend);

mysql_select_db($database_db_compu, $db_compu);
$query_count_equi_rep = "SELECT COUNT(*) FROM tb_equipo WHERE tb_equipo.estado_rep_eqp = 'Reparado'";
$count_equi_rep = mysql_query($query_count_equi_rep, $db_compu) or die(mysql_error());
$row_count_equi_rep = mysql_fetch_assoc($count_equi_rep);
$totalRows_count_equi_rep = mysql_num_rows($count_equi_rep);
?>
<div class="row">
			 <div class="col-xs-12">
				 <div class="page-title-box">
                     <h4 class="page-title">Escritorio</h4>
                     <div class="clearfix"></div>
                 </div>
		     </div>
		 </div>  
                   
                   
                   
                   
                   
               
               <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-three">
                                    <div class="bg-icon pull-left">
										<i class="ti-user "></i>
									</div>
                                    <div class="text-right">
                                        <p class="text-success m-t-5 text-uppercase font-600 font-secondary">Clientes Registrados</p>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php echo $row_count_clientes['COUNT(*)']; ?></span></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-three">
                                    <div class="bg-icon pull-left">
										<i class="ti-desktop "></i>
									</div>
                                    <div class="text-right">
                                        <p class="text-pink m-t-5 text-uppercase font-600 font-secondary">Equipos Registrados</p>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php echo $row_count_equipos['COUNT(*)']; ?></span></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-three">
                                    <div class="bg-icon pull-left">
										<i class="ti-crown"></i>
									</div>
                                    <div class="text-right">
                                        <p class="text-purple m-t-5 text-uppercase font-600 font-secondary">Equipos Pendientes</p>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php echo $row_count_equi_pend['COUNT(*)']; ?></span></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-three">
                                    <div class="bg-icon pull-left">
										<i class="ti-agenda"></i>
									</div>
                                    <div class="text-right">
                                        <p class="text-warning m-t-5 text-uppercase font-600 font-secondary">Equipos Reparados</p>
                                        <h2 class="m-b-10"><span data-plugin="counterup"><?php echo $row_count_equi_rep['COUNT(*)']; ?></span></h2>
                                    </div>
                                </div>
                            </div>

                        </div>
               
               
               
               
               
               
               
                        
                        
                                 <?php require("chart.php"); ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                   <div class="row">
                    <?php require("last_clientes.php"); ?>
                            <!-- end col -->

                      <?php require("last_equipos.php"); ?>
                            <!-- end col -->

                        </div>
                                   <?php
mysql_free_result($count_clientes);

mysql_free_result($count_equipos);

mysql_free_result($count_equi_pend);

mysql_free_result($count_equi_rep);
?>
