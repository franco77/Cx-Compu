<?php require("inc/comun/head.php"); ?>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="plugins/elFinder-2.1.18/css/elfinder.min.css">
<!--<link rel="stylesheet" type="text/css" media="screen" href="plugins/elFinder-2.1.18/theme/windows-10/css/theme.css">-->
<link rel="stylesheet" type="text/css" media="screen" href="plugins/elFinder-2.1.18/theme/Material/theme.css">

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

                <?php include("inc/comun/top-bar.php"); ?>
                        
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
  <?php include("inc/comun/side-menu.php"); ?>



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    
                        <!-- end row -->

    
    
    
   <div id="elfinder"></div>
                        <!-- end row -->


      




                    </div> <!-- container -->

                </div> <!-- content -->

               <?php require("inc/comun/footer.php"); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
     
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->




       <?php require("inc/comun/js.php"); ?>



        <!-- elFinder JS (REQUIRED) -->
		<script src="plugins/elFinder-2.1.18/js/elfinder.min.js"></script>
        <script src="plugins/elFinder-2.1.18/js/i18n/elfinder.es.js"></script>
        <script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : 'plugins/elFinder-2.1.18/php/connector.minimal.php', 
					lang: 'es',
					height: 800                    // language (OPTIONAL)
				});
			});
		</script>

        

    </body>
</html>