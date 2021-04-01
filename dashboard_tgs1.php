<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<?php 
 
    include("koneksi.php");
    $dimensi = $_GET['dimensi'];
    $produk = mysqli_query($koneksi,"select * from fakta group by ".$dimensi."");

    while($row = mysqli_fetch_array($produk)){
    $a[] = $row[''.$dimensi.''];
        
    $query = mysqli_query($koneksi,"select sum(qtypenjualan) from fakta where ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
        $row = $query->fetch_array();
        $b[] = $row['sum(qtypenjualan)'];
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