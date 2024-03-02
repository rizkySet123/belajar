<?php
    $jurusan_array = array('PPLG' => 'Pengembangan Perangkat',
                        'TJKT' => 'Teknik Jaringan Komunikasi & Teknologi',
                        'TO' => 'Teknik Otomotif',
                        'BDP' => 'Bisnis Dan Pemasaran',
                        'AKL' => 'Akutansi Keuangan Lembaga',
                        'TF' => 'Teknik Farmasi')
?>
<html>
<head><title>form input 01</title></head>
<body>
    
    <form action="input_02.php" method="POST" name="form_input">
        <p>
            <label for name="name">Nama : </label>
            <input type="text" name="name"><br>
        </p>
        <p>
            <label for name="kelas">Kelas : </label>
            <input type="text" name="kelas"><br>
        </p>
    <p>
        <label for="jurusan">jurusan</label>
        <select name="jurusan">
            <option value="">Pilih jurusan</option>
            <?php
            foreach ($jurusan_array as $key => $value) {
                echo '<option value="', $key ,'">', $value ,"</option>";
            }
                ?>
        </select>
    </p>
    <p>   
        <input type="submit" name="proses" value="Proses">
    </p>


</body>
</html>
