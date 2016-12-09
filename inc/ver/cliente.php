<?php

mysql_select_db($database_db_compu, $db_compu);
$query_ver_cliente = "SELECT * FROM tb_cliente";
$ver_cliente = mysql_query($query_ver_cliente, $db_compu) or die(mysql_error());
$row_ver_cliente = mysql_fetch_assoc($ver_cliente);
$totalRows_ver_cliente = mysql_num_rows($ver_cliente);
?>


<?php do { ?>
  <div id="ver-cliente-<?php echo $row_ver_cliente['cedula_cl']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Datos Del CLiente</h4>
          </div>
        <div class="modal-body">
          
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">Cedula Cliente</th>
                <td><?php echo $row_ver_cliente['cedula_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nombre</th>
                <td><?php echo $row_ver_cliente['nombre_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Apellido</th>
                <td><?php echo $row_ver_cliente['apellido_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td><?php echo $row_ver_cliente['email_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Telefono</th>
                <td><?php echo $row_ver_cliente['telefono_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Detalle</th>
                <td><?php echo $row_ver_cliente['detalle_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row" width="200">Fecha Registro</th>
                <td><?php echo $row_ver_cliente['fecha_reg_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Registrado Por</th>
                <td><?php echo $row_ver_cliente['autor_reg_cl']; ?></td>
              </tr>
              <tr>
                <th scope="row">Direccion</th>
                <td><?php echo $row_ver_cliente['direccion_cl']; ?></td>
              </tr>
              
              
               <tr>
                <th scope="row">Actulizado EL</th>
                <?php if($row_ver_cliente['actualizado_el'] != '') { ?>
                <td><?php echo $row_ver_cliente['actualizado_el']; ?></td>
                 <?php }
				 else
				 {
					 echo '<td>Este Registro No Ha Sido Actualizado</td>';
				 }
				  ?>
              </tr>
              
              
              
               <tr>
                <th scope="row">Actualizado Por</th>
                <?php if($row_ver_cliente['actualizado_por'] != '') { ?>
                <td><?php echo $row_ver_cliente['actualizado_por']; ?></td>
                 <?php }
				 else
				 {
					 echo '<td>Este Registro No Ha Sido Actualizado</td>';
				 }
				  ?>
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
  <?php } while ($row_ver_cliente = mysql_fetch_assoc($ver_cliente)); ?>

