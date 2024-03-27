<?php
    $title = "Form Pembelian Produk";
    echo "<title>$title</title>";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        form {
            width: 50%;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], select, input[type="number"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin: 5px 0 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus, select:focus, input[type="number"]:focus {
            outline: none;
            border-color: #4CAF50;
        }

        button {
            background-color: #4CAF50; 
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049; 
        }

        #hasil {
            margin-top: 20px;
            padding: 20px;
            border-radius: 4px;
            background-color: #ffffff;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        #hasil p {
            margin: 0;
        }

        caption {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            padding: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
    font-size: 20px;
}

header h1 {
    margin: 0;
}
    </style>
</head>
<body>
    <header>
        <h3><?php echo $title; ?></h3>
    </header>
    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" required><br>

        <label for="produk">Produk:</label>
        <select name="produk" id="produk" required>
            <option value="TV">TV</option>
            <option value="KULKAS">KULKAS</option>
            <option value="MESIN CUCI">MESIN CUCI</option>
            <option value="AC">AC</option>
        </select><br>

        <label for="jumlah">Jumlah Beli:</label>
        <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Beli" required><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $produk = $_POST["produk"];
        $jumlah = $_POST["jumlah"];

    
        switch ($produk) {
            case 'TV':
                $harga_satuan = 1250000;
                break;
            case 'KULKAS':
                $harga_satuan = 450000;
                break;
            case 'MESIN CUCI':
                $harga_satuan = 6000000;
                break;
            case 'AC':
                $harga_satuan = 5250000;
                break;
            default:
                $harga_satuan = 0;
                break;
        }

        $total_belanja = $jumlah * $harga_satuan;
        $diskon = 0.2 * $total_belanja;
        $ppn = 0.1 * ($total_belanja - $diskon);
        $harga_bersih = ($total_belanja - $diskon) + $ppn;

        echo "<div id='hasil'>";
        echo "<table>";
        echo "<caption>Detail Pembelian</caption>";
        echo "<tr><th>Nama</th><td>$nama</td></tr>";
        echo "<tr><th>Produk</th><td>$produk</td></tr>";
        echo "<tr><th>Jumlah Beli</th><td>$jumlah</td></tr>";
        echo "<tr><th>Harga Satuan</th><td>Rp " . number_format($harga_satuan, 0, ',', '.') . "</td></tr>";
        echo "<tr><th>Total Belanja</th><td>Rp " . number_format($total_belanja, 0, ',', '.') . "</td></tr>";
        echo "<tr><th>Diskon (20%)</th><td>Rp " . number_format($diskon, 0, ',', '.') . "</td></tr>";
        echo "<tr><th>PPN (10%)</th><td>Rp " . number_format($ppn, 0, ',', '.') . "</td></tr>";
        echo "<tr><th>Harga Bersih</th><td>Rp " . number_format($harga_bersih, 0, ',', '.') . "</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>
</body>
</html>
