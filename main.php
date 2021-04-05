<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Qty & Amoount Datavisualization</title>
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<script>
function refreshpage(){
	location.reload();
	}

function displayResult(){ 
var dimensi=document.getElementById("dimensi").value;
 if (document.getElementById('qty').checked) {
 
$.ajax({
	            type: 'GET',
	            url: "dashboard.php",
				data: {dimensi:dimensi},
	            success: function(hasil) {
	                $('#grafik').html(hasil);
	           }
			   });//ajax untuk menampilkan grafik
			                 }//pilihan jika ingin melihat qty penjualan
			   
else if (document.getElementById('amount').checked) {
$.ajax({
	            type: 'GET',
	            url: "dashboard_1.php",
				data: {dimensi:dimensi},
	            success: function(hasil) {
	                $('#grafik').html(hasil);
	           }
			   });//ajax untuk menampilkan grafik			   
               }//pilihan jika ingin melihat Amount penjualan

}
</script>
</head>

<body>
<h1 align="center">Aplikasi Dashboard PT Datamining</h1>

<div style="text-align:center">
<p>Dimensi yang Ingin anda Analisa</p>

<select id="dimensi" onchange="refreshpage();">
    <option value="id_produk">produk</option>
    <option value="id_cabang">cabang</option>   
    <option value="id_periode">periode</option>     
</select><br />

<p>Measuremnet Apa yang ingin anda ukur</p>
<input type="radio" id="qty" name="pilihan" />
<label for="qty">Qty Penjualan</label>
<input type="radio" id="amount" name="pilihan"  />
<label for="amount">Amount Penjualan</label><br />

<button id="visual" onclick="displayResult();">Visualisasi</button>
</div>
<div id="grafik">

</div>
</body>
</html>
