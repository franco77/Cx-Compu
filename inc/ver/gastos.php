<?php 

mysql_select_db($database_db_compu, $db_compu);
$query_ver_gasto = "SELECT * FROM tb_gastos, tb_cat_gasto WHERE tb_gastos.id_cat_gasto = tb_cat_gasto.id_cat_gasto";
$ver_gasto = mysql_query($query_ver_gasto, $db_compu) or die(mysql_error());
$row_ver_gasto = mysql_fetch_assoc($ver_gasto);
$totalRows_ver_gasto = mysql_num_rows($ver_gasto);
?>
<?php do { ?>
  <div id="ver-gasto-<?php echo $row_ver_gasto['id_gasto']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Datos De Los Gastos</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">#</th>
                <td><?php echo $row_ver_gasto['id_gasto']; ?></td>
              </tr>
              <tr>
                <th scope="row">Categoria</th>
                <td><?php echo $row_ver_gasto['nomb_cat_gasto']; ?></td>
              </tr>
              <tr>
                <th scope="row">Titulo Ingreso</th>
                <td><?php echo $row_ver_gasto['titulo_gasto']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nota</th>
                <td><?php echo $row_ver_gasto['nota_gasto']; ?></td>
              </tr>
              <tr>
                <th scope="row">Monto</th>
                <td><?php echo $row_ver_gasto['monto_gasto']; ?></td>
              </tr>
              <tr>
                <th scope="row">Fecha De Registro</th>
                <td><?php echo $row_ver_gasto['fecha_reg_gasto']; ?></td>
              </tr>
              <tr>
                <th scope="row">Autor Ingreso</th>
                <td><a data-toggle="modal" data-target="#ver-usuario-<?php echo $row_ver_gasto['autor_gasto']; ?>"><?php echo $row_ver_gasto['autor_gasto']; ?></a></td>
              </tr>
              <tr>
                <th scope="row">Actualizado Por</th>
                <?php if($row_ver_gasto['actualizado_por'] != '') { ?>
                <td><?php echo $row_ver_gasto['actualizado_por']; ?></td>
                <?php }
				 else
				 {
					 echo '<td>Este Registro No Ha Sido Actualizado</td>';
				 }
				  ?>
              </tr>
              <tr>
                <th scope="row" width="200">Actualizado EL</th>
                <?php if($row_ver_gasto['actualizado_el'] != '') { ?>
                <td><?php echo $row_ver_gasto['actualizado_el']; ?></td>
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
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
 
  <?php } while ($row_ver_gasto = mysql_fetch_assoc($ver_gasto)); ?>
