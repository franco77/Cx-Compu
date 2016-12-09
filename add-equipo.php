<?php include("inc/comun/head.php"); ?>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->

            <?php include("inc/comun/top-bar.php"); ?>
                        
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
  <?php include("inc/comun/side-menu.php"); ?>
            <!-- Left Sidebar End -->



            
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


        
                        <!-- end row -->


 

      


        

<?php include("inc/add/equipos.php"); ?>



         

       


                     


      

                
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 © Zircos.
                </footer>

            </div>


            

        </div>
        <!-- END wrapper -->



      <?php include("inc/comun/js.php"); ?>
		 <script type="text/javascript">
				function randomPassword(length) {
					var chars = "*+-ABCDEFGHIJKLMNOP1234567890";
					var pass = "";
					for (var x = 0; x < length; x++) {
						var i = Math.floor(Math.random() * chars.length);
						pass += chars.charAt(i);
					}
					return pass;
				}
				
				function generate() {
					add_equipos.dni.value = randomPassword(add_equipos.length.value);
				}   
         </script>
        
        
        
      <script src="plugins/tinymce/tinymce.min.js"></script>
         <script type="text/javascript">
					$(document).ready(function () {
						if($("#detalle_eqp").length > 0){
							tinymce.init({
								selector: "textarea#detalle_eqp",
								theme: "modern",
								height:300,
								plugins: [
									"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
									"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
									"save table contextmenu directionality emoticons template paste textcolor"
								],
								toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
								style_formats: [
									{title: 'Bold text', inline: 'b'},
									{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
									{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
									{title: 'Example 1', inline: 'span', classes: 'example1'},
									{title: 'Example 2', inline: 'span', classes: 'example2'},
									{title: 'Table styles'},
									{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
								]
							});
						}
					});
        </script>
      
      
      


        <script src="plugins/moment/moment.js"></script>
     	<script src="plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

         <script src="assets/pages/jquery.form-pickers.init.js"></script>

        
		

    </body>
</html>