<?php 

mysql_select_db($database_db_compu, $db_compu);
$query_ver_equipos = "SELECT * FROM tb_equipo, tb_cliente WHERE tb_equipo.id_cliente = tb_cliente.cedula_cl";
$ver_equipos = mysql_query($query_ver_equipos, $db_compu) or die(mysql_error());
$row_ver_equipos = mysql_fetch_assoc($ver_equipos);
$totalRows_ver_equipos = mysql_num_rows($ver_equipos);
?>

<?php do { ?>
  <div id="ver-equipo-<?php echo $row_ver_equipos['dni_eqp']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Datos Del Equipo En reparacion</h4>
          </div>
        <div class="modal-body">
          
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">DNI</th>
                <td><span class="label label-success"><?php echo $row_ver_equipos['dni_eqp']; ?></span></td>
              </tr>
              
              
              <tr>
                <th scope="row">Titulo</th>
                <td><?php echo $row_ver_equipos['titulo_eqp']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Marca</th>
                <td><?php echo $row_ver_equipos['marca_eqp']; ?></td>
              </tr>
              <tr>
                <th scope="row">Modelo</th>
                <td><?php echo $row_ver_equipos['modelo_eqp']; ?></td>
              </tr>
              <tr>
                <th scope="row">Descripcion</th>
                <td><?php echo $row_ver_equipos['descripccion_eqp']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row" width="200">Fecha Registro</th>
                <td><?php echo $row_ver_equipos['facha_registro_eqp']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Fecha Entrega</th>
                <td><?php echo $row_ver_equipos['fecha_entrega_eqp']; ?></td>
              </tr>
              
              
              
              <tr>
                <th scope="row">Hora De Entrega</th>
                <td><?php echo $row_ver_equipos['hora_entrega']; ?></td>
              </tr>
              
              
              
              
              <tr>
                <th scope="row">Precio</th>
                <td><?php echo $row_ver_equipos['precio_rep_eqp']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Registrado Por</th>
                <td><?php echo $row_ver_equipos['autor_reg_eqp']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Actualizado El</th>
                <?php if($row_ver_equipos['actualizado_el'] != '') { ?>
                <td><?php echo $row_ver_equipos['actualizado_el']; ?></td>
                <?php }
				else {
					echo '<td> Estos Datos No han Sido Actualizados</td>';
					}
				 ?>
              </tr>
              
              
              <tr>
                <th scope="row">Actualizado Por</th>
                <?php if ($row_ver_equipos['actualizado_por'] != '') { ?>
                <td><?php echo $row_ver_equipos['actualizado_por']; ?></td>
                 <?php }
				 else
				 {
					echo '<td> Estos Datos No han Sido Actualizados</td>'; 
				 }
				  ?>
              </tr>
              
              
              <tr>
                <th scope="row">Estado </th>
                <td><?php echo $row_ver_equipos['estado_rep_eqp']; ?></td>
              </tr>
              
              
              <tr>
              <td><h4>Datos Del CLiente</h4></td>
              </tr>
              
              <tr>
                <th scope="row">Cedula Del CLiente</th>
                <td><?php echo $row_ver_equipos['cedula_cl']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Nombre Del Cliente</th>
                <td><?php echo $row_ver_equipos['nombre_cl']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Apellido CLiente</th>
                <td><?php echo $row_ver_equipos['apellido_cl']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Email Cliente</th>
                <td><?php echo $row_ver_equipos['email_cl']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Telefono CLiente</th>
                <td><?php echo $row_ver_equipos['telefono_cl']; ?></td>
              </tr>
              
              
              
            </tbody>
          </table>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
          
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <?php } while ($row_ver_equipos = mysql_fetch_assoc($ver_equipos)); ?>

