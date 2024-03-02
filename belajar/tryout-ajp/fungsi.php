<?php
//	Instruksi Kerja Nomor 1.
//Fungsi menghitung Total Beli
function hitung_total_beli(
    $harga_alat,
    $jumlah_alat
) {
    $total_bayar = $harga_alat * $jumlah_alat;
    return $total_bayar;
}


//	Instruksi Kerja Nomor 2.
//  Membuat sebuah array multi dimensi yang berisikan daftar kode, nama dan harga per-sparepart
$sparepart = array();

$sparepart[] = array(
    "kode" => "SPNR", "nama_sprt" => "Spion Racing Sepasang", "harga_sprt" => "150000"
);
$sparepart[] = array(
    "kode" => "LMHP", "nama_sprt" => "Lampu Head Projie", "harga_sprt" => "200000"
);
$sparepart[] = array(
    "kode" => "SENM", "nama_sprt" => "Lampu Sein Motore", "harga_sprt" => "55000"
);
$sparepart[] = array(
    "kode" => "JOKR", "nama_sprt" => "Jok MBTech Racing", "harga_sprt" => "270000"
);
$sparepart[] = array(
    "kode" => "BAND ", "nama_sprt" => "Ban Racing Depan", "harga_sprt" => "150000"
);
$sparepart[] = array(
    "kode" => "KLPR", "nama_sprt" => "Knalpot Racing Dunlop", "harga_sprt" => "850000"
);

//	Instruksi Kerja Nomor 3.
// Mengurutkan array $sparepart sesuai abjad A-Z
sort($sparepart);

//	Instruksi Kerja Nomor 4.
// Membuat beberapa pendeklarasian variabel awal/kosong 
// variabel bertipe string untuk menyimpan "kode alat"
$kode_alat = "";
// variabel bertipe string untuk menyimpan "nama alat"
$nama_alat = "";
// variabel bertipe numerik untuk menyimpan "harga alat"
$harga_alat = "";



