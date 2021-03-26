<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Visuallization</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    function refreshpage() {
        location.reload();
    }

    function displayResult() {
        var dimention=document.getElementById("dimention").value;
        if (document.getElementById('qty').checked) {

            $.ajax({
                    type: 'GET',
                    url: "dashboard.php",
                    data: "dimention:dimention",
                    success: function(hasil) {
                        $('#grafik').html(hasil);
                    }
            }); //showing graphic
        
        } //option if you want to see the amount of sales
        else if (document.getElementById('amount').checked) {
            $.ajax ({
                type: 'GET',
                    url: "dashboard_1.php",
                    data: "dimention:dimention",
                    success: function(hasil) {
                        $('#grafik').html(hasil);
                    }

            });
        }
    }

     </script>
</head>
<body>

<h1 align="center"> Aplikasi Dashboard PT Datamining </h1>

<div style="text-align-center tae">
    <p>Dimensi yang ingin anda analisa</p>

    <select id="dimention" onchange="refreshpage();">
        <option value="id_produk">Produk</option>
        <option value="id_cabang">Cabang</option>
        <option value="id_periode">Periode</option>
    </select> <br>

    <p>Measurement apa yang ingin anda ukur?</p>
        <input type="radio" id="qty" name="pilihan">
        <label for="qty">Qty Penjualan</label>
        <input type="radio" id="amount" name="pilihan">
        <label for="amount">Amount Penjualan</label> <br>

    <button id="visual" onclick="displayResult();">Visualization</button>
</div>
<div id="grafik">

</div>
    
</body>
</html>