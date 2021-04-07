<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIE Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<?php 
 
	include("koneksi.php");
	
	$dimensi=$_GET['dimensi'];
	$measure=$_GET['measure'];
	$produk = mysqli_query($koneksi,"SELECT * FROM fakta GROUP BY ".$dimensi."");

		if ($measure == 'qty') {

			while($row = mysqli_fetch_array($produk)){
				$a[] = $row[''.$dimensi.''];
					
				$query = mysqli_query($koneksi,"SELECT SUM(qtypenjualan) FROM fakta WHERE ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
					$row = $query->fetch_array();
					$b[] = $row['SUM(qtypenjualan)'];
			
			}
		} 
		elseif ($measure == 'amount') {

			while($row = mysqli_fetch_array($produk)){
				$a[] = $row[''.$dimensi.''];
					
				$query = mysqli_query($koneksi,"SELECT SUM(jumlahpenjualan) FROM fakta WHERE ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
					$row = $query->fetch_array();
					$b[] = $row['SUM(jumlahpenjualan)'];
			} 
		}

?>

<div style="width: 800px;margin: 0px auto; margin-bottom: 20px;">
	<canvas id="pieChart"></canvas>
</div>

<script>
		var ctx = document.getElementById("pieChart").getContext('2d');
		var myChart = new Chart(ctx,config1);
		var config1 = {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($a); ?>,
				datasets: [{
					label: 'Grafik SUM ',
					data: <?php echo json_encode($b); ?>,
					backgroundColor: ['rgba(255, 99, 133, 0.671)','rgba(54, 163, 235, 0.747)'],
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