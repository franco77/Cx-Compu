<?php
mysql_select_db($database_db_compu, $db_compu);
$query_eventos = "SELECT * FROM tb_eventos";
$eventos = mysql_query($query_eventos, $db_compu) or die(mysql_error());
$row_eventos = mysql_fetch_assoc($eventos);
$totalRows_eventos = mysql_num_rows($eventos);
?>


  
  
<script type="text/javascript">
$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			buttonText: {
		month: "Mes",
		week: "Semana",
		day: "Día",
		list: "Agenda",
		today: "Hoy"
                       },
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
	
			
			
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: new Date(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				
				
				<?php do { ?>
				{
					id: <?php echo $row_eventos['id_evento']; ?>,
					title: '<?php echo $row_eventos['titulo_evento']; ?>',
					start: '<?php echo $row_eventos['desde_evento']; ?> <?php echo $row_eventos['hora_evento_d']; ?>',
					end: '<?php echo $row_eventos['hasta_evento']; ?> <?php echo $row_eventos['hora_evento_h']; ?>',
					color: '<?php echo $row_eventos['prioridad_eveto']; ?>'
				},
				 <?php } while ($row_eventos = mysql_fetch_assoc($eventos)); ?>
				
			]
		});
		
	});
</script>




