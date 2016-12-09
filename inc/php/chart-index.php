<?php 


 
$maxRows_chart_1 = 6;
$pageNum_chart_1 = 0;
if (isset($_GET['pageNum_chart_1'])) {
  $pageNum_chart_1 = $_GET['pageNum_chart_1'];
}
$startRow_chart_1 = $pageNum_chart_1 * $maxRows_chart_1;

mysql_select_db($database_db_compu, $db_compu);
$query_chart_1 = "SELECT monto_ingreso, mes_reg_ingreso, fecha_reg_ingreso, (SUM(monto_ingreso)) AS Total FROM tb_ingresos GROUP BY mes_reg_ingreso ORDER BY fecha_reg_ingreso ASC";
$query_limit_chart_1 = sprintf("%s LIMIT %d, %d", $query_chart_1, $startRow_chart_1, $maxRows_chart_1);
$chart_1 = mysql_query($query_limit_chart_1, $db_compu) or die(mysql_error());
$row_chart_1 = mysql_fetch_assoc($chart_1);

if (isset($_GET['totalRows_chart_1'])) {
  $totalRows_chart_1 = $_GET['totalRows_chart_1'];
} else {
  $all_chart_1 = mysql_query($query_chart_1);
  $totalRows_chart_1 = mysql_num_rows($all_chart_1);
}
$totalPages_chart_1 = ceil($totalRows_chart_1/$maxRows_chart_1)-1;




$maxRows_chart_2 = 6;
$pageNum_chart_2 = 0;
if (isset($_GET['pageNum_chart_2'])) {
  $pageNum_chart_2 = $_GET['pageNum_chart_2'];
}
$startRow_chart_2 = $pageNum_chart_2 * $maxRows_chart_2;

mysql_select_db($database_db_compu, $db_compu);
$query_chart_2 = "SELECT monto_gasto, mes_reg_gasto, fecha_reg_gasto, (SUM(monto_gasto)) AS Total1 FROM tb_gastos GROUP BY mes_reg_gasto ORDER BY fecha_reg_gasto DESC";
$query_limit_chart_2 = sprintf("%s LIMIT %d, %d", $query_chart_2, $startRow_chart_2, $maxRows_chart_2);
$chart_2 = mysql_query($query_limit_chart_2, $db_compu) or die(mysql_error());
$row_chart_2 = mysql_fetch_assoc($chart_2);

if (isset($_GET['totalRows_chart_2'])) {
  $totalRows_chart_2 = $_GET['totalRows_chart_2'];
} else {
  $all_chart_2 = mysql_query($query_chart_2);
  $totalRows_chart_2 = mysql_num_rows($all_chart_2);
}
$totalPages_chart_2 = ceil($totalRows_chart_2/$maxRows_chart_2)-1;
?>

<script type="text/javascript">
!function($) {
    "use strict";

    var Dashboard1 = function() {
    	this.$realData = []
    };

    //creates Bar chart
    Dashboard1.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.2,
            barColors: lineColors,
            postUnits: 'Bs'
        });
    },

    //creates line chart
    Dashboard1.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.2,
            barColors: lineColors,
            postUnits: 'Bs'
        });
    },

  

    
    Dashboard1.prototype.init = function() {



        //creating bar chart
        var $barData1  = [
		<?php do { ?>
		<?php $date=date_create($row_chart_1['fecha_reg_ingreso']); ?>
            { y: '<?php echo date_format($date,"m-y"); ?>', a: <?php echo $row_chart_1['Total']; ?> },
           <?php } while ($row_chart_1 = mysql_fetch_assoc($chart_1)); ?>
            
        ];
        this.createBarChart('char_ingresos', $barData1, 'y', ['a'], ['Ingrsos'], ['#3bafda']);




        //create line chart
              var $barData1  = [
		<?php do { ?>
		<?php $date1=date_create($row_chart_2['fecha_reg_gasto']); ?>
            { y: '<?php echo date_format($date1,"m-y"); ?>', a: <?php echo $row_chart_2['Total1']; ?> },
           <?php } while ($row_chart_2 = mysql_fetch_assoc($chart_2)); ?>
            
        ];
        this.createBarChart('char_gastos', $barData1, 'y', ['a'], ['Gastos'], ['#FC080C']);

        //creating donut chart
        
        
    },
    //init
    $.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard1.init();
}(window.jQuery);
</script>


