<?php
//array satu dimensi

$cabang = array("Harmoni", "Sarinah", "Grogol", "Senayan", "Pluit", "Cempaka"); //membuat array 1 dimensi

foreach ($cabang as $k => $v) { //or foreach ($cabang as $cabang)
    echo "key = ", $k, " nilai = ", $v, "</br>"; //menampilkan key & value array
}
$key = array_search("Senayan", $cabang); //mencari array
if (empty($key)) {
    echo "Data Tidak Di Temukan"; //jika data tidak ditemukan
} else {
    echo "Senayan memiliki Key", $key, "</br>";
}

//in_array (data yang ditampilkan BOLEAN)
//mencari DATA array menggunakan in array
if (in_array("Sarinah", $cabang)) { //    
    //echo "Sarinah ditemukan pada array</br>";
    $error[] = 'cabang belum terisi<br>';

} else {
    //echo "Data tidak ditemukan</br>";
}
//NOT Notasi pada seu = !
if (!in_array("Sari", $cabang)) { //  !in_array = not in_array
    echo "Data tidak ditemukan</br>";
} else {
    echo "Sarinah ditemukan pada array</br>";
}

$cabang = array();

$cabang = array(
    "kode" => "hm", "nama" => "Harmoni", "alamat" => "bekasi"
); //membuat array 1 dimensi

if (array_key_exists("nama", $cabang)) { //  Mencari Key pada array
    echo "Key ditemukan pada array</br>";
} else {
    echo "Data tidak ditemukan</br>";
}

?>
