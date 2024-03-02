<?php
include("fungsi.php");//menghubungkan dangan file fungsi php
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
		<img src="./gambar/zilaRound.png" alt> <!-- menambahkan logo ke file gambar -->


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
			
			//variabel error dalam bentuk array
			$error = array();

			/*memeriksa input cabang
			akan bernilai TRUE jika input user memiliki
			Nilai (berisi sesuatu karakter)*/

			if(empty($dataPesanan['cabang'])){
				//menyimpam ke array jika input kosong
				$error[] = 'cabang belum terisi<br>';
			}
			if(empty($dataPesanan['nama'])){
				//menyimpam ke array jika input kosong
				$error[] = 'nama belum terisi<br>';
			}
			if(empty($dataPesanan['noHP'])){
				//menyimpam ke array jika input kosong
				$error[] = 'noHP belum terisi<br>';
			}
			
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
				$error[] = "Jumlah pesanan belum diinput";
			}elseif ($sisaStok <0){//menampilkan pesan jika pesanan di luar batas 
				$error[] = "Jumlah Pesanan melebihi batas stok";
			}
			/*periksa error jika ada
			
			hitung jumlah array error*/
			$jml_error =count($error);

			if ($jml_error > 0){
				echo'<div class="alert alert-danger">Terdapat error sebanyak ', $jml_error,' error: <br></div>';
				foreach ($error as $error) {
					echo '<div class="alert alert-danger">',$error ,'</div>';
				}
			}else{

				/*Redirect ke halaman selesai*/
				header("Location:selesai.php?hitung=ok");
				//(?)digunakan untuk mengakhiri perintah php/html untuk diberi suatu variabel/perintah
				exit();
				//Menampilkan data pemesanan dan hasil perhitungan diskon dan tagihan jika keriteria terpenuhi
		}
	}
	?>
</body>
</html>