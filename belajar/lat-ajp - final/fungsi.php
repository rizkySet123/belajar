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
