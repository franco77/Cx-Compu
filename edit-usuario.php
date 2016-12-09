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


 

      


        

<?php include("inc/edit/user.php"); ?>
         

       


                     


      

                
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
$(document).ready(function() {	
	$('#cedula').blur(function(){
		
		$('#Info').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>').fadeOut(1000);

		var cedula = $(this).val();		
		var dataString = 'cedula='+cedula;
		
		$.ajax({
            type: "POST",
            url: "inc/list/chek_cedula.php",
            data: dataString,
            success: function(data) {
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    
</script>
       <?php include("orakuploader/avatar.php"); ?>


    </body>
</html>