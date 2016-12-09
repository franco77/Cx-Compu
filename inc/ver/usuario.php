<?php 
 mysql_select_db($database_db_compu, $db_compu);
$query_ver_user = "SELECT * FROM tb_login";
$ver_user = mysql_query($query_ver_user, $db_compu) or die(mysql_error());
$row_ver_user = mysql_fetch_assoc($ver_user);
$totalRows_ver_user = mysql_num_rows($ver_user);
?>


<?php do { ?>
  <div id="ver-usuario-<?php echo $row_ver_user['cedula']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Datos Del Usuario</h4>
          </div>
        <div class="modal-body">
          
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">Cedula Cliente</th>
                <td><?php echo $row_ver_user['cedula']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Nivel</th>
                <td><?php echo $row_ver_user['nivel']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Nombre</th>
                <td><?php echo $row_ver_user['nombre_user']; ?></td>
              </tr>
              <tr>
                <th scope="row">Apellido</th>
                <td><?php echo $row_ver_user['apellido_user']; ?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td><?php echo $row_ver_user['email_user']; ?></td>
              </tr>
              <tr>
                <th scope="row">Avatar</th>
                <td><img src="files/avatar/<?php echo $row_ver_user['avatar_user']; ?>" width="100" height="100"></td>
              </tr>
              
              <tr>
                <th scope="row" width="200">Fecha Registro</th>
                <td><?php echo $row_ver_user['fecha_reg']; ?></td>
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
  <?php } while ($row_ver_user = mysql_fetch_assoc($ver_user)); ?>
  

