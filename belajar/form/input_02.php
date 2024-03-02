<?php
    $jurusan_array = array('PPLG' => 'Pengembangan Perangkat Lunak & Gim',
                        'TJKT' => 'Teknik Jaringan Komunikasi & Teknologi',
                        'TO' => 'Teknik Otomotif',
                        'BDP' => 'Bisnis Dan Pemasaran',
                        'AKL' => 'Akutansi Keuangan Lembaga',
                        'TF' => 'Teknik Farmasi')
?>

<?php
if (isset ($_POST['name'])) {
    $name = $_POST['name'];
    if (strlen($name) > 0) {/*strlen untuk mengecek jumlah huruf */
    echo"Nama Anda : <b>$name</b><br></br>";
    }else{
        echo "Nama anda : <b>belum terisi</b><br></br>";
    }
    }
    if (isset ($_POST['kelas'])) {
        $kelas = $_POST['kelas'];
        if (strlen($kelas) > 0) {
        echo"Kelas Anda : <b>$kelas</b><br></br>";
        }else{
            echo "Kelas anda : <b>BELUM TERISI!!!<b><br></br>";
        }
        }
        if (isset ($_POST['jurusan'])) {
            $jurusan = $_POST['jurusan'];
            if (strlen($jurusan) > 0) {
            /*menampilkan array */
        $nama_jurusan = $jurusan_array[$jurusan];
            echo"Jurusan Anda :<b>$nama_jurusan</b><br></br>";
            }
            else{
                echo "Jurusan anda belum dipilih<br></br>";
            }
        }
            echo '<a href="input_01.php">Kembali<a>';
?>