<?php
include "fungsi.php"
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Pembelian Sparepart Motor</title>
    <!-- Instruksi Kerja Nomor 5. -->
    <!-- menghubungkan halaman web dengan file library CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <style>
        footer {
            font-size: x-small;
            text-align: center;
            /* padding: 3px; */
            background-color: lightgray;
            /* color: white;*/
        }

        .a {
            display: inline-block;
            padding: 8px 16px;
        }

        a:hover {
            background-color: #ddd;
            color: black;
        }

        .kembali {
            display: inline-block;
            font-weight: normal;
            line-height: 1.25;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            background-color: lightslategrey;
            color: black;
            margin-bottom: 5px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container border">
        <!-- Menampilkan judul halaman -->
        <h3>Data Pembelian Sparepart Motor</h3>

        <!-- Instruksi Kerja Nomor 6. -->
        <!-- Menambahkan logo pada halaman dengan menggunakan file gambar logo -->
        <img src="./assets/gambar/logo2.png" alt="logo">

        <?php
        if (isset($_GET['hitung'])) {
            //INSTRUKSI 12
            // membaca data file /data/data.json
            $berkas = "data/data_alat.json";
            $dataJson = file_get_contents($berkas);

            // konversi decode ke variable array dengen fungsi
            $data_pembelian = json_decode($dataJson, true);

            //INSTRUKSI 13
            $total_bayar = hitung_total_beli(
                $data_pembelian['jml_beli'],
                $data_pembelian['harga_sprt']
            );
            $tagihanAkhir = $total_bayar;

            //INSTRUKSI 11

            echo "

                    
            
			<br/>
			<div class='container'>
				<div class='row'>
					<!-- Menampilkan nama Konsumen. -->
					<div class='col-lg-2'>Nama Konsumen:</div>
					<div class='col-lg-2'>" . $data_pembelian['nama_konsumen'] . "</div>
				</div>
				<div class='row'>
					<!-- Menampilkan Nama Sparepart. -->
					<div class='col-lg-2'>Nama Alat Sparepart:</div>
					<div class='col-lg-2'>" . $data_pembelian['nama_sprt'] . "</div>
				</div>
				<div class='row'>
					<!-- Menampilkan Harga  Sparepart. -->
					<div class='col-lg-2'>Harga Satuan: </div>
					<div class='col-lg-2'>Rp " . number_format($data_pembelian['harga_sprt'], 0, ".", ".") . ",-</div>
				</div>
				<div class='row'>
					<!-- Menampilkan Jumlah dibeli -->
					<div class='col-lg-2'>Jumlah:</div>
				<div class='col-lg-2'>" . $data_pembelian['jml_beli'] . " Pcs</div>
				</div>

				<div class='row'>
					<!-- Menampilkan  -->
					<div class='col-lg-2'>Total Bayar:</div>
					<div class='col-lg-2'>Rp " . number_format($total_bayar, 0, ".", ".") . ",-</div>
				</div>
				";
        }
        
        ?>
        <a href="index.php" class="kembali">Kembali<a>
    </div>
    <!-- INSTRUKSI 14 -->
    <footer>
        <p>Jaya Motor Pringsewu</p>
        <p>Developer(Rizky Setiawan)</p>
    </footer>

</body>

</html>