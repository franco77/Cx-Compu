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
         
       
        
        
        
        
       
      
      
       <!-- Data-Table -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>
       
	   
       
       <!-- Multi Select -->
        <script src="plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>
       
       
       
	    <!-- Modal-Effect -->
        <script src="plugins/custombox/js/custombox.min.js"></script>
        <script src="plugins/custombox/js/legacy.min.js"></script>
	   

         <!-- Upload Imagenes -->
	    <script type="text/javascript" src="orakuploader/jquery-ui.min.js"></script>
	    <script type="text/javascript" src="orakuploader/orakuploader.js"></script>
 
        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>
        
       <!-- parsleyjs -->
       <script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>
       <script src="plugins/parsleyjs/i18n/es.js"></script>
        
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
			
		 </script>
		
		
		  <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable1').dataTable({
    language: {
        url: '//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'
    }
});
             });
            
            $(document).ready(function () {
                $('#datatable2').dataTable({
    language: {
        url: '//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'
    }
});
             });
        </script>
		
		
		
		
		
        
        <script type="text/javascript">
      $(document).ready(function() {
				$('form').parsley();
			});
</script>	


 <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
        })
    </script>
