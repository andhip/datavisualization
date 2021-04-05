<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet"> 
<title>SUM & AVR Datavisualization</title>
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>

<!-- script -->
<script>
    
    function refreshpage() {
        location.reload();
    }

    function displayResult(){ 
        var dimensi=document.getElementById("dimensi").value;
        if (document.getElementById('sum').checked) {
        
        $.ajax({
                        type: 'GET',
                        url: "dashboard_tgs1.php",
                        data: {dimensi:dimensi},
                        success: function(hasil) {
                            $('#grafik').html(hasil);
                    }
                    });//ajax untuk menampilkan grafik
                                    }//pilihan jika ingin melihat qty penjualan
                    
        else if (document.getElementById('avg').checked) {
        $.ajax({
                        type: 'GET',
                        url: "dashboard_tgs2.php",
                        data: {dimensi:dimensi},
                        success: function(hasil) {
                            $('#grafik').html(hasil);
                    }
                    });//ajax untuk menampilkan grafik			   
                    }//pilihan jika ingin melihat Amount penjualan

        }

    // function refreshpage() {
    //     location.reload();
    // }

    // function displayResult() {
    // var dimensi = document.getElementById("dimensi").value;
    // var msr     = document.getElementById("Measurement").value;
    // if (document.getElementById('value').value == 'sum') {
    
    //     $.ajax({
    //                 type: 'GET',
    //                 url: "dashboard_tgs1.php",
    //                 data: {dimensi:dimensi,msr:msr},
    //                 success: function(data) {
    //                     $('#grafik').html(data);
    //                 }
    //                 });//ajax untuk menampilkan grafik
    //                                 }//pilihan jika ingin melihat qty penjualan    
			   
    //     else if (document.getElementById('value').value == 'avg') {
    //     $.ajax({
    //                 type: 'GET',
    //                 url: "dashboard_tgs2.php",
    //                 data: {dimensi:dimensi,msr:msr},
    //                 success: function(hasil) {
    //                     $('#grafik').html(hasil);
    //                 }
    //                 });//ajax untuk menampilkan grafik			   
    //                 }//pilihan jika ingin melihat Amount penjualan

      
    // }
    
</script>
<style>
    body { 
        background-color: rgb(241, 241, 241); 
        color:black;
        font-family: 'Public Sans', sans-serif;
        }
</style>
</head>

<body>
<h1 align="center">Aplikasi Dashboard PT Datamining</h1>

<div style="text-align:center">
<p>Dimensi yang Ingin anda Analisa?</p>

<select id="dimensi" onchange="refreshpage();">
    <option value="id_produk">produk</option>
    <option value="id_cabang">cabang</option>   
    <option value="id_periode">periode</option>     
</select><br />

<p>Measuremnet Apa yang ingin anda ukur?</p>
<select id="Measurement" onchange="refreshpage();">
    <option value="id_produk" >qty penjualan</option>
    <option value="id_cabang">Amount penjualan</option> 
</select><br />

<p>Besaran yang ingin anda gunakan?</p>
<input type="radio" id="sum" name="pilihan" />
<label for="qty">Sum(Jumlah)</label>
<input type="radio" id="avg" name="pilihan"  />
<label for="amount">Rata-rata</label><br />
<!-- 
<p>Besaran yang ingin anda gunakan?</p>
<select id="dimensi" onchange="refreshpage();">
    <option value="id_produk" id="sum">Sum(Jumlah)</option>
    <option value="id_cabang" id="avg">Rata-rata</option>   
      
</select><br /> -->

<button id="visual" onclick="displayResult();">Visualisasi</button>
</div>
<div id="grafik">

</div>
</body>
</html>
