<?php 
mysql_select_db($database_db_compu, $db_compu);
$query_ver_ingreso = "SELECT * FROM tb_ingresos, tb_cat_ingreso WHERE tb_ingresos.id_cat_ingreso = tb_cat_ingreso.id_cat_ingreso";
$ver_ingreso = mysql_query($query_ver_ingreso, $db_compu) or die(mysql_error());
$row_ver_ingreso = mysql_fetch_assoc($ver_ingreso);
$totalRows_ver_ingreso = mysql_num_rows($ver_ingreso);
?>
<?php do { ?>
  <div id="ver-ingreso-<?php echo $row_ver_ingreso['id_ingreso']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Datos De Los Ingresos</h4>
          </div>
        <div class="modal-body">
          
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">#</th>
                <td><?php echo $row_ver_ingreso['id_ingreso']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Categoria</th>
                <td><?php echo $row_ver_ingreso['nombre_cat_ingreso']; ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Titulo Ingreso</th>
                <td><?php echo $row_ver_ingreso['titulo_ingreso']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nota</th>
                <td><?php echo $row_ver_ingreso['nota_ingreso']; ?></td>
              </tr>
              
              <tr>
                <th scope="row">Monto</th>
                <td><?php echo number_format($row_ver_ingreso['monto_ingreso'],2,",","."); ?></td>
              </tr>
              
              
              <tr>
                <th scope="row">Fecha De Registro</th>
                <td><?php echo $row_ver_ingreso['fecha_reg_ingreso']; ?></td>
              </tr>
              
              
              
              
              <tr>
                <th scope="row">Autor Ingreso</th>
                <td><a data-toggle="modal" data-target="#ver-usuario-<?php echo $row_ver_ingreso['autor_ingreso']; ?>"><?php echo $row_ver_ingreso['autor_ingreso']; ?></a></td>
              </tr>
              
              
              <tr>
                <th scope="row">Actualizado Por</th>
                <?php if($row_ver_ingreso['actualizado_por'] != '') { ?>
                <td><?php echo $row_ver_ingreso['actualizado_por']; ?></td>
                 <?php }
				 else
				 {
					 echo '<td>Este Registro No Ha Sido Actualizado</td>';
				 }
				  ?>
              </tr>
              
              
              
              <tr>
                <th scope="row" width="200">Actualizado EL</th>
                <?php if($row_ver_ingreso['actualizado_el'] != '') { ?>
                <td><?php echo $row_ver_ingreso['actualizado_el']; ?></td>
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
  
  <?php } while ($row_ver_ingreso = mysql_fetch_assoc($ver_ingreso)); ?>
