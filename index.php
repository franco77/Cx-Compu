<?php require("inc/comun/head.php"); ?>
<link rel="stylesheet" href="plugins/morris/morris.css">

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

    
    
    
    <?php require("inc/index/index_inc.php"); ?>
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



        <!--Morris Chart-->
		<script src="plugins/morris/morris.min.js"></script>
		<script src="plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <?php require("inc/php/chart-index.php"); ?>

        

    </body>
</html>