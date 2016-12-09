<script type="text/javascript">

 $(document).ready(function(){
	 
	
	jQuery('#avatar').orakuploader({
		orakuploader_path : 'orakuploader/',
	
		orakuploader_main_path : 'files/avatar',
		orakuploader_thumbnail_path : 'files/tn/avatar',
		
		orakuploader_use_sortable : true,
		orakuploader_use_dragndrop : true,
		
		orakuploader_add_image : 'orakuploader/images/add.png',
		orakuploader_add_label : 'Seleccionar Imagen',
		
		orakuploader_crop_to_width: 200,
		orakuploader_crop_to_height: 200,
		
		orakuploader_crop_thumb_to_width: 200,
		orakuploader_crop_thumb_to_height: 200,
		
		
		
		orakuploader_maximum_uploads : 1,
		orakuploader_hide_on_exceed : true,
		
		orakuploader_max_exceeded : function() {
		alert("Tu Estas Excediendo El limit De Imagenes.");
		}
		
		
	});	
	

	
});
</script>




<script type="text/javascript">

jQuery.noConflict();


 (function($) {
	 
	
	jQuery('#e_avatar').orakuploader({
		orakuploader_path : 'orakuploader/',
	
		orakuploader_main_path : 'files/avatar',
		orakuploader_thumbnail_path : 'files/tn/avatar',
		
		orakuploader_use_sortable : true,
		orakuploader_use_dragndrop : true,
		
		orakuploader_add_image : 'orakuploader/images/add.png',
		orakuploader_add_label : 'Seleccionar Imagen',
		
		orakuploader_crop_to_width: 200,
		orakuploader_crop_to_height: 200,
		
		orakuploader_crop_thumb_to_width: 200,
		orakuploader_crop_thumb_to_height: 200,
		
		//Attaching pre-uploaded images (add only the file names w/o directories)
		orakuploader_attach_images: ['<?php echo $row_edi_user['avatar_user']; ?>'],
		
		orakuploader_maximum_uploads : 1,
		orakuploader_hide_on_exceed : true,
		
		orakuploader_max_exceeded : function() {
		alert("Tu Estas Excediendo El limit De Imagenes.");
		}
		
		
		});	
	

	
})(jQuery);
</script>









