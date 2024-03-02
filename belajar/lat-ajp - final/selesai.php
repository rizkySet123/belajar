<?php
include("fungsi.php");//menghubungkan dangan file fungsi php
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Pemesanan Nasi Kotak</title>
    <!-- Instruksi Kerja Nomor 5. -->
	<link rel="stylesheet" type= "text/css "href="./css/bootstrap.css"> <!-- menghubungkan halaman web ke file library css -->


</head>

<body>
    <div class="container border">
        <!-- Menampilkan judul halaman -->
        <h3>Data Pemesanan Nasi Kotak</h3>
        <!-- Instruksi Kerja Nomor 6. -->
		<img src="./gambar/logo.png" alt> <!-- menambahkan logo ke file gambar -->
        <!--periksa variabel hitung-->

        <?php
        if(isset($_GET["hitung"])){

            $berkas = "data/data.json";//membaca file json
            $dataJson=file_get_contents($berkas);
            $dataPesanan = json_decode($dataJson, true); //mengubah data pesanan dalam format json ke format array


            $tagihanAwal = hitung_tagihan_awal($dataPesanan['jumlahPesanan'],$hargaSatuan); //menghitung tagihan awal sblm diskon
			
			$diskon = 0; //inisialisasi diskon

			if ($tagihanAwal > 1000000){
				$diskon = $tagihanAwal * 0.05; // menghitung diskon
			}

			$tagihanAkhir = $tagihanAwal - $diskon; //berisi nilai akhir

    echo 
        "<br/>
            <div class='container'>
                <div class='row'>
                    <!-- Menampilkan lokasi cabang restoran. -->
                    <div class='col-lg-2'>Cabang:</div>
                    <div class='col-lg-2'>".$dataPesanan['cabang']."</div>
                </div>
        <!-- /*LENGKAPI ELEMEN */ -->

            <div class='row'>
                <!-- Menampilkan Nama Pelanggan. -->
                <div class='col-lg-2'>Nama:</div>
                <div class='col-lg-2'>".$dataPesanan['nama']."</div>
            </div>

                <div class='row'>
                    <!-- Menampilkan noHP. -->
                    <div class='col-lg-2'>noHP:</div>
                    <div class='col-lg-2'>".$dataPesanan['noHP']."</div>
                </div>
                <div class='row'>
                    <!-- Menampilkan jumlah kotak pesanan. -->
                    <div class='col-lg-2'>Jumlah Kotak:</div>
                    <div class='col-lg-2'>".$dataPesanan['jumlahPesanan']." box</div>
                </div>
                <div class='row'>
                    <!-- Menampilkan tagihan awal (sebelum diskon). -->
                    <div class='col-lg-2'>Tagihan Awal:</div>
                    <div class='col-lg-2'>Rp".number_format($tagihanAwal, 0, ".", ".").",-</div>
                </div>
                <div class='row'>
                    <!-- Menampilkan tarif pemesanan. -->
                    <div class='col-lg-2'>Diskon:</div>
                    <div class='col-lg-2'>Rp".number_format($diskon, 0, ".", ".").",-</div>
                </div>
                <div class='row'>
                    <!-- Menampilkan tagihan akhir (setelah diskon). -->
                    <div class='col-lg-2'>Tagihan Akhir:</div>
                    <div class='col-lg-2'>Rp".number_format($tagihanAkhir, 0, ".", ".").",-</div>
                </div>
        </div>
        ";
        }
    echo '<a href="index.php">Kembali<a>';//tombol kembali
        ?>
    </div>
</body>
</html>

