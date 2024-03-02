<?php
	//	Instruksi Kerja Nomor 1.
	//fungsi tagihan awal
	function hitung_tagihan_awal($harga, $jumlah){
		$tagihan_awal = $harga * $jumlah;
		return $tagihan_awal;
	}

	//	Instruksi Kerja Nomor 2.
	/*cabang restoran dakam bentuk array*/
	$cabang= array( "Harmoni", "Sarinah", "Grogol", "Senayan", "Pluit", "Cempaka");
	
	//	Instruksi Kerja Nomor 3.
	//mengurutkan array cabang dari A-Z
	sort($cabang);

    //menampilkan percobaan mengurutkan
	//var_dump($cabang);
	//die() ;
	//	Instruksi Kerja Nomor 4.

?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Pemesanan Nasi Kotak</title>
    <!-- Instruksi Kerja Nomor 5. -->


</head>

<body>
    <div class="container border">
        <!-- Menampilkan judul halaman -->
        <h3>Form Pemesanan Nasi Kotak</h3>

        <!-- Instruksi Kerja Nomor 6. -->


        <!-- Form untuk memasukkan data pemesanan. -->
        <form  id="formPemesanan">
            <div class="row">
                <!-- Masukan pilihan lokasi cabang restoran. -->
                <div class="col-lg-2"><label for="tipe">Cabang:</label></div>
                <div class="col-lg-2">
                    <select id="cabang" name="cabang">
                        <option value="">- Pilih Cabang -</option>
                        <?php
						//	Instruksi Kerja Nomor 7.

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



			
			//	Instruksi Kerja Nomor 9.


			
			//	Instruksi Kerja Nomor 10.

			
			//	Menampilkan data pemesanan dan hasil perhitungan diskon dan tagihan.
			echo "
				<br/>
				<div class='container'>
					<div class='row'>
						<!-- Menampilkan lokasi cabang restoran. -->
						<div class='col-lg-2'>Cabang:</div>
						<div class='col-lg-2'>".$dataPesanan['cabang']."</div>
					</div>

			/*LENGKAPI ELEMEN */


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
	?>
</body>

</html>