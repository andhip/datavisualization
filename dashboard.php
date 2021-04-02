<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bar Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
	
	
	
</head>

<body>
<?php 
include("koneksi.php");
$dimensi=$_GET['dimensi'];
$produk = mysqli_query($koneksi,"SELECT * FROM fakta GROUP BY ".$dimensi."");
while($row = mysqli_fetch_array($produk)){
$a[] = $row[''.$dimensi.''];
	
$query = mysqli_query($koneksi,"SELECT SUM(qtypenjualan) FROM fakta WHERE ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
	$row = $query->fetch_array();
	$b[] = $row['SUM(qtypenjualan)'];
}
?>

<div style="width: 800px;margin: 0px auto;">
	<canvas id="barChart"></canvas>
</div>
<script>
		var ctx = document.getElementById("barChart").getContext('2d');
		var myChart = new Chart(ctx,config1);
		var config1 = {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($a); ?>,
				datasets: [{
					label: 'Grafik qty Penjualan',
					data: <?php echo json_encode($b); ?>,
					backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'],
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		};
	</script>



</body>
</html>
