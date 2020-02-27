<?php
    $open = 'charts';
    require_once __DIR__.'/../../autoloads/autoload.php';
    require_once __DIR__.'/../../layouts/header.php';

    $temp = $db->countQuestions("do_test",'1');
    $total = $temp['count'];
    $least_temp = $db->countQuestions("do_test","mark <= 4");
    $least = $least_temp['count'];
    $medium_temp = $db->countQuestions("do_test","mark <= 7 AND mark >= 5");
    $medium = $medium_temp['count'];
    $rather_temp = $db->countQuestions("do_test","mark <= 8 AND mark >= 7");
    $rather = $rather_temp['count'];
    $good_temp = $db->countQuestions("do_test","mark <= 10 AND mark >= 9");
    $good = $good_temp['count'];
    
$dataPoints = array( 
	array("label"=>"1-4đ", "y"=> $least/$total),
	array("label"=>"5-7đ", "y"=> $medium/$total),
	array("label"=>"7-8đ", "y"=> $rather/$total),
	array("label"=>"9-10đ", "y"=> $good/$total)
)
 
?>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Thống kê điểm"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
    <div class="container">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="<?php echo  base_url(); ?>public/admin/vendor/chart.js/canvasjs.min.js"></script>
    </div> 
</div>
<?php 
    require_once __DIR__.'/../../layouts/footer.php';
?>