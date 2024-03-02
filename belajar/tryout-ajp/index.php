<?php
// Mengikutkan fungsi.php
include "fungsi.php"


?>


<!DOCTYPE html>
<html>

<head>
    <title>Form Pembelian Sparepart</title>
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

        button {
            margin-bottom: 5px;
            margin-top: 5px;
        }

    </style>
</head>

<body>

    <div class="container border">
        <!-- Menampilkan judul halaman -->
        <h3>Form Pembelian Sparepart</h3>

        <!-- Instruksi Kerja Nomor 6. -->
        <!-- Menambahkan logo pada halaman dengan menggunakan file gambar logo -->
        <img src="./assets/gambar/logo2.png" alt="logo">

        <!-- Form untuk memasukkan data pembelian. -->
        <form action="index.php" method="POST" id="formPembelian">

            <div class="row">
                <!-- Masukan pilihan daftar sparepart. -->
                <div class="col-lg-2"><label for="sparepart">Sparepart:</label></div>
                <div class="col-lg-2">
                    <select id="sparepart" name="sparepart">
                        <option value="">- Pilihan Sparepart -</option>
                        <!-- // Instruksi Kerja Nomor 7. -->
                        <!-- Menampilkan isi array daftar sparepart dan harga per-alatan motor pada form pembelian dengan menggunakan kontrol perulangan. -->
                        <?php foreach ($sparepart as $item) : ?>
                            <option value="<?php echo $item['kode']; ?>"><?php echo $item['nama_sprt'] . " - " . number_format($item['harga_sprt'], 0, ',', '.'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <!-- Memasukan nama konsumen. Tipe data text. -->
                <div class="col-lg-2"><label for="nama_konsumen">Nama Konsumen:</label></div>
                <div class="col-lg-2"><input type="text" id="nama_konsumen" name="nama_konsumen"></div>
            </div>

            <div class="row">
                <!-- Memasukan Jumlah dibeli . Tipe data number. -->
                <div class="col-lg-2"><label for="jml_beli">Jumlah:</label></div>
                <div class="col-lg-2"><input type="number" id="jml_beli" name="jml_beli"></div>
            </div>

            <div class="row">
                <!-- Tombol Submit -->
                <div class="col-lg-2"><button class="btn btn-primary" type="submit" form="formPembelian" value="Pesan" name="Beli">Tekan disini</button></div>
                <div class="col-lg-2"></div>
            </div>
        </form>
    </div>
    <?php
    //	Kode berikut dieksekusi setelah tombol Beli ditekan.
    if (isset($_POST['Beli'])) {


        //	Instruksi Kerja Nomor 8.
        // Lakukan validasi error terhadap semua inputan. Jika ada kesalahan inputan yang tidak diisi atau kosong maka form akan menampilkan pesan kesalahan pada form
        $error = array();

        // memeriksa input sparepart
        if (empty($_POST['sparepart'])) {
            // Menyimpan ke array jika input kosong/empty
            //echo "Sparepart belum terisi";
            $error[] = "<div class='alert alert-warning' role='alert'>Sparepart belum terisi</div>";
        }

        // memeriksa input nama konsumen
        if (empty($_POST['nama_konsumen'])) {
            // Menyimpan ke array jika input kosong/empty
            $error[] = "<div class='alert alert-warning' role='alert'>Nama Konsumen belum terisi</div>";
        }

        // memeriksa input cabang
        if (empty($_POST['jml_beli'])) {
            // Menyimpan ke array jika input kosong/empty
            $error[] = "<div class='alert alert-warning' role='alert'>Jumlah belum terisi</div>";
        }

        $jml_error = count($error);

        if ($jml_error > 0) {
            echo "</br><div class='alert alert-danger' role='alert'>Terdapat error sebanyak $jml_error &nbsp;error</div>";
            foreach ($error as $error) {
                echo $error;
            }
        } else {

            //	Instruksi Kerja Nomor 9.
            // a. Memberikan nilai ke variabel $kode_alat sesuai nilai inputan pilihan sparepart.
            $kode_alat = $_POST['sparepart'];

            // b. Memberikan nilai ke variabel $nama_alat dengan nama alat berdasarkan pilihan sparepart .  
            // $nama_alat = "";
            $cek_nama = array_column($sparepart, 'nama_sprt', 'kode');

            if (array_key_exists($kode_alat, $cek_nama)) {
                $nama_alat = $cek_nama[$kode_alat];
            }
            // c. Memberikan nilai ke variabel $harga_alat dengan harga satuan peralat berdasarkan pilihan sparepart .  
            // $harga_alat = "";
            $cek_harga = array_column($sparepart, 'harga_sprt', 'kode');

            if (array_key_exists($kode_alat, $cek_harga)) {
                $harga_alat = $cek_harga[$kode_alat];
            }


            // d. Menyimpan semua data pembelian ke dalam bentuk array 1 dimensi, dengan nama variabel $data_pembelian
            // menggunakan metode key/index assosiati
            $data_pembelian = array(
                'nama_konsumen' => $_POST['nama_konsumen'],
                'kode' => $_POST['sparepart'],
                'nama_sprt' => $nama_alat,
                'harga_sprt' => $harga_alat,
                'jml_beli' => $_POST['jml_beli'],
            );

            //instruksi 10
            $berkas = "data/data_alat.json";

            //	Mengubah data pemesanan yang berbentuk array PHP menjadi bentuk JSON.
            $dataJson = json_encode($data_pembelian, JSON_PRETTY_PRINT);

            // Menyimpan data pemesanan tersebut ke dalam file JSON 
            file_put_contents($berkas, $dataJson);

            // Mengambil data pesanan dari file JSON



            // Redirect ke Halaman Selesai.php
            header("Location:selesai.php?hitung=ok");
            exit();
            //	Menampilkan data pemesanan dan hasil perhitungan dan tagihan.

        }
    }

    ?>
    <!-- INSTRUKSI 14 -->
    <footer>
        <p>Jaya Motor Pringsewu</p>
        <p>Developer(Rizky Setiawan)</p>
    </footer>

</body>

</html>