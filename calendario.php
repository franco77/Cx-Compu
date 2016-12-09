
<?php require("inc/comun/head.php"); ?>

<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_eventos")) {
	
	$user_login=$row_user_login['cedula'];
	
  $insertSQL = sprintf("INSERT INTO tb_eventos (titulo_evento, nota_eveto, desde_evento, hora_evento_d, hasta_evento, hora_evento_h, autor_evento, prioridad_eveto) VALUES (%s, %s, %s, %s, %s, %s, '$user_login', %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['nota'], "text"),
                       GetSQLValueString($_POST['f_desde'], "date"),
                       GetSQLValueString($_POST['h_desde'], "date"),
                       GetSQLValueString($_POST['f_hasta'], "date"),
                       GetSQLValueString($_POST['h_hasta'], "date"),
                       GetSQLValueString($_POST['prioridad'], "text"));

  mysql_select_db($database_db_compu, $db_compu);
  $Result1 = mysql_query($insertSQL, $db_compu) or die(mysql_error());
  


  header( 'Location: calendario.php' ) ;


}
?>





    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

           
           
           
  <?php include("inc/comun/top-bar.php"); ?>
                        
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
  <?php include("inc/comun/side-menu.php"); ?>  
           
           
           
           
           
           
           
           
           
           
           
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Calendar </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li class="active">
                                            Calendar
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->



                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    
                                                    
                                                    
                                                    
                                                    
                                                     <form action="<?php echo $editFormAction; ?>" name="add_eventos" method="POST" data-parsley-validate="">
                                                             <div class="form-group ">
                                                              <label class="control-label " for="titulo">
                                                               Titulo
                                                              </label>
                                                              <div class="input-group">
                                                               <input class="form-control" id="titulo" name="titulo" type="text" required=""/>
                                                               <div class="input-group-addon">
                                                                <i class="fa fa-font">
                                                                </i>
                                                               </div>
                                                              </div>
                                                             </div>
                                                             <div class="form-group ">
                                                              <label class="control-label " for="nota">
                                                               Nota
                                                              </label>
                                                              <textarea class="form-control" cols="40" id="nota" name="nota" rows="10"></textarea>
                                                             </div>
                                                             <div class="form-group ">
                                                              <label class="control-label " for="f_desde">
                                                               Fecha Desde
                                                              </label>
                                                              <div class="input-group">
                                                               <input class="form-control" id="f_desde" name="f_desde" type="text" required=""/>
                                                               <div class="input-group-addon">
                                                                <i class="fa fa-calendar">
                                                                </i>
                                                               </div>
                                                              </div>
                                                             </div>
                                                             <div class="form-group ">
                                                              <label class="control-label " for="h_desde">
                                                               Desde Hora
                                                              </label>
                                                              <div class="input-group">
                                                               <input class="form-control" id="h_desde" name="h_desde" type="text"/>
                                                               <div class="input-group-addon">
                                                                <i class="fa fa-hourglass-start">
                                                                </i>
                                                               </div>
                                                              </div>
                                                             </div>
                                                             <div class="form-group ">
                                                              <label class="control-label " for="f_hasta">
                                                               Fecha Hasta
                                                              </label>
                                                              <div class="input-group">
                                                               <input class="form-control" id="f_hasta" name="f_hasta" type="text"/>
                                                               <div class="input-group-addon">
                                                                <i class="fa fa-calendar">
                                                                </i>
                                                               </div>
                                                              </div>
                                                             </div>
                                                             
                                                             <div class="form-group ">
                                                              <label class="control-label " for="name5">
                                                               Hasta Hora
                                                              </label>
                                                              <div class="input-group">
                                                              <input class="form-control" id="h_hasta" name="h_hasta" type="text"/>
                                                               <div class="input-group-addon">
                                                                <i class="fa fa-hourglass-start">
                                                                </i>
                                                               </div>
                                                             </div>
                                                             </div>
                                                             
                                                             	<div class="form-group ">
                                                                      <label class="control-label " for="prioridad">
                                                                       Prioridad
                                                                      </label>
                                                                      <select class="select form-control" id="prioridad" name="prioridad">
                                                                           <option value="#14A8D5">Normal </option>
                                                                           <option value="#E97D3C"> Urgente </option>
                                                                           <option value="#E00003"> Alta </option>
                                                                      </select>
                                                             </div>
                                                             
                                                                 <div class="form-group">
                                                                  <div>
                                                                       <button class="btn btn-primary " name="submit" type="submit">
                                                                        Submit
                                                                       </button>
                                                                  </div>
                                                                 </div>
                                                             <input type="hidden" name="MM_insert" value="add_eventos">
                                                            </form>
                                                    
                                                    
                                                    
                                                    
                                                    

                                                    <!-- checkbox -->
                                                

                                                </div>
                                            </div>
                                        </div> <!-- end col-->
                                        <div class="col-md-9">
                                            <div id="calendar"></div>
                                        </div> <!-- end col -->
                                    </div>  <!-- end row -->
                                </div>

                                <!-- BEGIN MODAL -->
                             

                                <!-- Modal Add Category -->
                             
                                <!-- END MODAL -->
                            </div>
                            <!-- end col-12 -->
                        </div> <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

            <?php require("inc/comun/footer.php"); ?>

            </div>


           

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>

        <!-- Jquery-Ui -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

        <!-- BEGIN PAGE SCRIPTS -->
        <script src="plugins/moment/moment.js"></script>
        <script src='plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="https://cdn.jsdelivr.net/fullcalendar/2.0.1/lang-all.js"></script>
       <?php require("inc/php/calendario.php"); ?>
        

       <!-- parsleyjs -->
       <script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>
       <script src="plugins/parsleyjs/i18n/es.js"></script>
		  <script type="text/javascript">
              $(document).ready(function() {
                        $('form').parsley();
                    });
        </script>	



    <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
        
        
    <script src="plugins/moment/moment.js"></script>
   	<script src="plugins/timepicker/bootstrap-timepicker.js"></script>
   	<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
   	<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   	<script src="plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
   	<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="assets/pages/jquery.form-pickers.init.js"></script>
        
        
        
        

</body>
</html>