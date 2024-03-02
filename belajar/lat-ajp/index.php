<?php
	//	Instruksi Kerja Nomor 1.
	function hitung_tagihan_awal($harga, $jumlah){ //fungsi menghitung tagihan awal dengan parameter harga dan jumlah
		$tagihan_awal = $harga * $jumlah; // nilai tagihan awal di dapat dari harga di kali jumlah
		return $tagihan_awal; //untuk mengembalikan nilai tagihan awal
	}
		

	//	Instruksi Kerja Nomor 2.
	$cabang = array( "Harmoni", "Sarinah", "Grogol", "Senayan", "Pluit", "Cempaka"); //membuat array 1 dimensi
	
	//	Instruksi Kerja Nomor 3.
	sort($cabang); //mengurutkan array dari A sampai Z

	//var_dump($lokasi_cabang);


	//	Instruksi Kerja Nomor 4.
	$hargaSatuan = 50000; //harga satuan nasi kotak


?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Pemesanan Nasi Kotak</title>
    <!-- Instruksi Kerja Nomor 5. -->
	<link rel="stylesheet" type= "text/css "href="./css/bootstrap.css"> <!-- menghubungkan halaman web ke file library css -->


</head>

<body>
    <div class="container border">
        <!-- Menampilkan judul halaman -->
        <h3>Form Pemesanan Nasi Kotak</h3>
        <!-- Instruksi Kerja Nomor 6. -->
		<img src="./gambar/logo.png" alt> <!-- menambahkan logo ke file gambar -->


        <!-- Form untuk memasukkan data pemesanan. -->
        <form action="index.php" method="POST" id="formPemesanan">
            <div class="row">
                <!-- Masukan pilihan lokasi cabang restoran. -->
                <div class="col-lg-2"><label for="tipe">Cabang:</label></div>
                <div class="col-lg-2">
                    <select id="cabang" name="cabang">
                        <option value="">- Pilih Cabang -</option>
                        <?php
						//	Instruksi Kerja Nomor 7.
						foreach ($cabang as $cabang){
							echo '<option value ="',$cabang,'">',$cabang,"</option>";}//menampilkan isi array pada form pemesanan
												
					?>
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- Masukan data nama pelanggan. Tipe data text. -->
                <div class="col-lg-2"><label for="nama">Nama Pelanggan:</label></div>
                <div class="col-lg-2"><input type="text" id="nama" name="nama"></div>
            </div>
            <div class="row">
                <!-- Masukan data nomor HP pelanggan. Tipe data number. -->
                <div class="col-lg-2"><label for="nomor">Nomor HP:</label></div>
                <div class="col-lg-2"><input type="number" id="noHP" name="noHP" maxlength="16"></div>
            </div>
            <div class="row">
                <!-- Masukan data jumlah kotak pesanan. Tipe data number. -->
                <div class="col-lg-2"><label for="nomor">Jumlah Kotak:</label></div>
                <div class="col-lg-2"><input type="number" id="jumlahPesanan" name="jumlahPesanan" maxlength="4"></div>
            </div>
            <div class="row">
                <!-- Tombol Submit -->
                <div class="col-lg-2"><button class="btn btn-primary" type="submit" form="formPemesanan" value="Pesan"
                        name="Pesan">Pesan</button></div>
                <div class="col-lg-2"></div>
            </div>
        </form>
    </div>
    <?php
		//	Kode berikut dieksekusi setelah tombol Hitung ditekan.
		if(isset($_POST['Pesan'])) {
			
			//	Variabel $dataPesanan berisi data-data pemesanan dari form dalam bentuk array.
			$dataPesanan = array(
				'cabang' => $_POST['cabang'],
				'nama' => $_POST['nama'],
				'noHP' => $_POST['noHP'],
				'jumlahPesanan' => $_POST['jumlahPesanan']
			);
			
			//	Variabel berisi path file data.json yang digunakan untuk menyimpan data pemesanan.
			$berkas = "data/data.json";
			
			//	Mengubah data pemesanan yang berbentuk array PHP menjadi bentuk JSON.
			$dataJson = json_encode($dataPesanan, JSON_PRETTY_PRINT);
			
			//	Instruksi Kerja Nomor 8.
			file_put_contents($berkas, $dataJson); //menyimpan data pemesanan ke json
			
			//	Instruksi Kerja Nomor 9.
			$dataJson = file_get_contents($berkas); //mengambil data dari json

			$dataPesanan = json_decode($dataJson, true); //mengubah data pesanan dalam format json ke format array

			$tagihanAwal = hitung_tagihan_awal($dataPesanan['jumlahPesanan'],$hargaSatuan); //menghitung tagihan awal sblm diskon
			
			//	Instruksi Kerja Nomor 10.
			$diskon = 0; //inisialisasi diskon

			if ($tagihanAwal > 1000000){
				$diskon = $tagihanAwal * 0.05; // menghitung diskon
			}

			$tagihanAkhir = $tagihanAwal - $diskon; //berisi nilai akhir

			//menambahkan variabel stokAwal
			$stokAwal = 10000;

			//menambahkan variabel jmlPesanan
			$jmlPesanan = intval ($dataPesanan["jumlahPesanan"]);
			//menghitung sisaStok
			$sisaStok = $stokAwal - $jmlPesanan;
			
			if ($jmlPesanan < 1){//menghitung apakah pesanan sudah diinput
				echo '<div class="alert alert-warning"><b>jumlah Pesanan belum di input</div>'; 
			}elseif ($sisaStok <0){//menampilkan pesan jika pesanan di luar batas 
				echo '<div class="alert alert-danger "><b>jumlah pesanan melebihi batas</div>';
			}else{
			//Menampilkan data pemesanan dan hasil perhitungan diskon dan tagihan jika keriteria terpenuhi
			echo "
				<br/>
				<div class='container'>
					<div class='row'>
						<!-- Menampilkan lokasi cabang restoran. -->
						<div c-===lass='col-lg-2'>Cabang:</div>
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
	}
	?>
</body>
</html>