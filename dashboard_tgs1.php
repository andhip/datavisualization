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
    
</body>
</html>