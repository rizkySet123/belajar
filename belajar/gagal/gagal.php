<?php
//instruksi kerja 1
function hitung_total_beli($harga_alat, $jumlah_alat)
{ //fungsi dengan nama hitung_total_beli untuk menghitung total pembelian sparepart motor .
    $total_bayar = $harga_alat * $jumlah_alat; // nilai total_bayar di dapat dari harga_alat di kali jumlah_alat
    return $total_bayar; //untuk mengembalikan nilai total_bayar
}

//inatruksi 2
$sparepart = array();
$sparepart[] = array(
    "kode" => "SPNR", "nama_sprt" => "Spion Racing Sepasang", "harga_sprt" => "150000"
);
$sparepart[] = array(
    "kode" => "LMHP", "nama_sprt" => "Lampu Head Projie", "harga_sprt" => "200000"
);
$sparepart[] = array(
    "kode" => "SENM", "nama_sprt" => "Lamou Sein motor", "harga_sprt" => "55000"
);
$sparepart[] = array(
    "kode" => "JORK", "nama_sprt" => "Jok MBTech Racing", "harga_sprt" => "270000"
);
$sparepart[] = array(
    "kode" => "BAND", "nama_sprt" => "Ban Racing Depan", "harga_sprt" => "150000"
);
$sparepart[] = array(
    "kode" => "KLPR", "nama_sprt" => "Knalpot Racing Dunlop", "harga_sprt" => "850000"
);

//instruksi 3
sort($sparepart); //MEngurutkan array

//instruksi 4
//a variable kode alat
$kode_alat = "";
//b variable nama alat
$nama_alat = "";
//c harga alat
$harga_alat = "";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Pembelian Sparepart</title>
    <!-- instruksi 5 -->
    <link rel="stylesheet" type="text/css " href="./assets/css/bootstrap.css"> <!-- menghubungkan halaman web ke file library css -->
</head>

<body>

    <div class="container border">
        <!-- Menampilkan judul halaman -->
        <h3>Form Pembelian Sparepart</h3>
        <!-- instruksi 6 -->
        <img src="./assets/gambar/logo2.png" alt>

        <!-- Form untuk memasukkan data pembelian. -->
        <form action="index.php" method="POST" id="formPembelian">
            <div class="row">
                <!-- Masukan pilihan daftar sparepart. -->
                <div class="col-lg-2"><label for="tipe">Sparepart:</label></div>
                <div class="col-lg-2">
                    <select id="sparepart" name="sparepart">
                        <option value="">- Pilihan Sparepart -</option>
                        <?php

                        //instruksi 7
                        foreach ($sparepart as $item) : ?>
                            <option value="<?php echo $item['kode']; ?>"><?php echo $item['nama_sprt'] . "= RP. " . number_format($item['harga_sprt'], 0, ',', '.'); ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>

            <div class="row">
                <!-- Masukan data konsumen. Tipe data text. -->
                <div class="col-lg-2"><label for="nama_konsumen">Nama Konsumen:</label></div>
                <div class="col-lg-2"><input type="text" id="nama_konsumen" name="nama_konsumen"></div>
            </div>
            <div class="row">
                <!-- Masukan data jumlah dibeli. Tipe data number. -->
                <div class="col-lg-2"><label for="jumlah">Jumlah dibeli:</label></div>
                <div class="col-lg-2"><input type="number" id="jumlah" name="jumlah" maxlength="4"></div>
            </div>
            <div class="row">
                <!-- Tombol Submit -->
                <div class="col-lg-2"><button class="btn btn-primary" type="submit" form="formPembelian" value="Pesan" name="Beli">Beli</button></div>
                <div class="col-lg-2"></div>
            </div>
        </form>
    </div>
    <?php
    //	Kode berikut dieksekusi setelah tombol Beli ditekan.
    if (isset($_POST['Beli'])) {
            //instruksi 8
            $formPembelian = array(
                'sparepart' => $_POST['sparepart'],
                'nama_konsumen' => $_POST['nama_konsumen'],
                'jumlah' => $_POST['jumlah'],
        //validasi error
        $error = array();

        if (empty($formPembelian['sparepart'])) {
            //menyimpam ke array jika input kosong
            //echo 'sparepart belum terisi<br>';
            $error[] = 'sparepart belum terisi<br>';
        }
        if (empty($formPembelian['nama_konsumen'])) {
            //menyimpam ke array jika input kosong
            //echo 'nama belum terisi<br>';
            $error[] = 'nama anda belum terisi<br>';
        }
        if (empty($formPembelian['jumlah'])) {
            //menyimpam ke array jika input kosong
            // echo 'jumlah dibeli belum terisi<br>';
            $error[] = 'jumlah belum terisi<br>';
        }

        $jml_error = count($error);

        if ($jml_error > 0) {
            echo '<div class="alert alert-danger">Terdapat error sebanyak ', $jml_error, ' error: <br></div>';
            foreach ($error as $error) {
                echo '<div class="alert alert-danger">', $error, '</div>';
            }
        }

        //instruksi 9
    }

    ?>
</body>
`

</html>`