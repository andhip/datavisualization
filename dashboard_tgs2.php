<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BAR Chart</title>
<script type="text/javascript" src="Chart.js"></script>
</head>

<body onload="location.reload();">
<?php 

	include("koneksi.php");

	$dimensi=$_GET['dimensi'];
	$measure=$_GET['measure'];
	$produk = mysqli_query($koneksi,"SELECT * FROM fakta GROUP BY ".$dimensi."");

		if ($measure == 'qty') {

			while($row = mysqli_fetch_array($produk)){
				$a[] = $row[''.$dimensi.''];
					
				$query = mysqli_query($koneksi,"SELECT AVG(qtypenjualan) FROM fakta WHERE ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
					$row = $query->fetch_array();
					$b[] = $row['AVG(qtypenjualan)'];
			
			}
		} 
		elseif ($measure == 'amount') {

			while($row = mysqli_fetch_array($produk)){
				$a[] = $row[''.$dimensi.''];
					
				$query = mysqli_query($koneksi,"SELECT AVG(jumlahpenjualan) FROM fakta WHERE ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
					$row = $query->fetch_array();
					$b[] = $row['AVG(jumlahpenjualan)'];
			} 
		}
?>
<div style="width: 800px;margin: 0px auto; margin-bottom: 15px;">
	<canvas id="barChart"></canvas>
</div>

<script>
		var ctx = document.getElementById('barChart').getContext('2d');
			window.myPie = new Chart(ctx, config);
		var config = {
			type: 'bar',
			data: {
				datasets: [{
					data:<?php echo json_encode($b); ?>,
					backgroundColor: [
					'rgba(255, 99, 133, 0.671)',
					'rgba(54, 163, 235, 0.660)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',					
					],
					label: 'Rata-rata Penjualan Barang'
				}],
				labels: <?php echo json_encode($a); ?>},
			options: {
				responsive: true
			}
		};
	</script>

</body>
</html>
