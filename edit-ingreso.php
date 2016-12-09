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


 

      


        

<?php include("inc/edit/ingresos.php"); ?>



         

       


                     


      

                
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

              <?php require("inc/comun/footer.php"); ?>

            </div>


            

        </div>
        <!-- END wrapper -->



      <?php include("inc/comun/js.php"); ?>
		
        
        
        
      <script src="plugins/tinymce/tinymce.min.js"></script>
         <script type="text/javascript">
					$(document).ready(function () {
						if($("#detalle_ingreso").length > 0){
							tinymce.init({
								selector: "textarea#detalle_ingreso",
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
      
      
      


       

        
		

    </body>
</html>