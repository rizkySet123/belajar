# TUGAS PRAKTIK DEMOSTRASI

## SMK - ASISTEN JUNIOR PROGRAMMER (TRY-OUT)

---
### Petunjuk Pengerjaan Soal

1. Baca dan pelajari setiap instruksi kerja di bawah ini dengan cermat sebelum melaksanakan praktik.
2. Klarifikasi kepada Asesor apabila ada hal-hal yang belum jelas.
3. Laksanakan pekerjaan sesuai dengan urutan proses yang sudah ditetapkan.
4. Seluruh proses kerja mengacu kepada SOP/WI yang dipersyaratkan.

### Skenario

Anda sebagai seorang pengembang web mendapatkan tugas untuk melanjutkan pekerjaan dari programmer lain. Anda diberikan file zip berisi kode program untuk menampilkan dan memproses sebuah halaman web untuk melakukan Pembelian Sparepart Motor pada Toko "Jaya Motor Pringsewu". Tugas Anda adalah memperbaiki dan mengupdate kode program tersebut dalam waktu paling lama 4 jam agar sesuai dengan kebutuhan pengguna dengan mengikuti instruksi kerja di bawah.

#### Instruksi Kerja

1. Buatlah sebuah fungsi dengan nama hitung_total_beli untuk menghitung total pembelian sparepart motor .
   a. Parameter fungsi tersebut adalah harga_alat dan jumlah_alat.
   b. Parameter "harga_alat" merupakan harga per-sparepart motor.
   c. Parameter "jumlah_alat" merupakan jumlah alat yang akan dibeli oleh konsumen per-sparepart.
   d. Fungsi tersebut mengembalikan nilai total_bayar.
   e. Nilai total_bayar didapatkan dari harga_alat dikalikan dengan jumlah_alat dengan rumus : 
       total_bayar = harga_alat X jumlah_alat
   f. Tuliskan baris komentar untuk menjelaskan fungsi tersebut.

2. Buatlah sebuah array multi dimensi yang berisikan daftar kode, nama dan harga per-sparepart, berikut data array tersebut : 
      Kode     Nama Sparepart                                  Harga Sparepart  
      =======  =============================================   =============
      SPNR      Spion Racing Sepasang                           Rp. 150.000,-
      LMHP      Lampu Head Projie                               Rp. 200.000,-
      SENM      Lampu Sein Motor                                Rp. 55.000,-
      JOKR      Jok MBTech Racing                               Rp. 270.000,-
      BAND      Ban Racing Depan                                Rp. 150.000,-
      KLPR      Knalpot Racing Dunlop                           Rp. 850.000,-
      =======  ==============================================  =============

3. Urutkan array pada instruksi kerja nomor 2 (dua). Pergunakan fungsi bawaan PHP.
4. Buatlah beberapa pendeklarasian variabel awal/kosong sebagai berikut:
   a. Sebuah variabel bertipe string untuk menyimpan "kode alat" dengan nama variabel $kode_alat. Kode Alat didapatkan saat user memilih pilihan alat/sparepart.
   b. Sebuah variabel bertipe string untuk menyimpan "nama alat" dengan nama variabel $nama_alat. Nama Alat didapatkan saat user memilih pilihan alat/sparepart.   
   c. Sebuah variabel bertipe numerik untuk menyimpan "harga alat" dengan nama variabel $harga_alat. Nama Alat didapatkan saat user memilih pilihan alat/sparepart.
5. Hubungkan halaman web tersebut dengan file library CSS yang sudah tersedia.
6. Tambahkan logo pada halaman tersebut dengan menggunakan dengan menggunakan file gambar logo yang sudah disediakan. Posisi logo adalah di bawah tulisan “Form Pembelian Sparepart ”.
7. Melengkapi Elemen Input Data pada form "formPembelian" seperti :
   a. Tampilkan isi array pada instruksi kerja nomor 2 sebagai pilihan (dropdown) daftar sparepart dan harga per-alatan motor pada form pembelian dengan menggunakan kontrol perulangan.
   b. Nama Konsumen bertipe data text.
   c. Jumlah dibeli bertipe data angka.
   d. Tombol Submit dengan tulisan tombol adalah "Beli"
8. Lakukan validasi error terhadap semua inputan. Jika ada kesalahan inputan yang tidak diisi atau kosong maka form akan menampilkan pesan kesalahan pada form ini.

9. Jika tidak ditemukankan error/kesalahan input maka lakukan :
   a. Memberikan nilai ke variabel $kode_alat sesuai nilai inputan pilihan sparepart.
   b. Memberikan nilai ke variabel $nama_alat dengan nama alat berdasarkan pilihan sparepart .  
   c. Memberikan nilai ke variabel $harga_alat dengan harga satuan peralat berdasarkan pilihan sparepart .  
   d. Menyimpan semua data pembelian ke dalam bentuk array 1 dimensi, dengan nama variabel $data_pembelian. Dengan data array seperti berikut:
      - nama_konsumen   ==> inputan nama konsumen
      - kode_alat       ==> input pilihan sparepart
      - nama_alat       ==> nilai variable $kode_alat
      - harga_alat      ==> nilai variable $harga_alat
      - jml_beli        ==> inputan jumlah yang dibeli


10. Lengkapi baris kode untuk menyimpan data pembelian tersebut ke dalam file JSON yang sudah tersedia.
11. Jika semua data input telah terisi dan sesuai maka form akan menampilkan data detil pembelian pada halaman baru dengan judul 
"Halaman Data Pembelian Sparepart Motor". 
Berikut informasi yang harus ditampilkan pada halaman baru "Data Pembelian Sparepart Motor" :
   - Nama Konsumen
   - Nama Sparepart 
   - Harga Satuan (Rupiah)
   - Jumlah Dibeli (pcs)
   - Total Pembelian (Rupiah).

12. Lengkapi baris kode untuk membaca data pembelian dari file JSON.
13. Tambahkan baris kode untuk menghitung nilai total pembelian menggunakan fitur fungsi yang telah dibuat pada instruksi nomor 1. 

14. Tambahkan informasi pada footer  di Halaman Input Data dan Halaman Data Pembelian Sparepart Motor (poin 14), informasi yang diberikan adalah nama Toko "Jaya Motor Pringsewu" dan nama Developer(Pengembang Aplikasi) . 

15. Rapikan file-file pekerjaan ke dalam folder-folder. Sesuaikan path file-file tersebut agar tetap terhubung. (Misalnya file CSS, data, gambar)

16. Buatlah file README.md untuk halaman web tersebut, dengan ketentuan sebagai berikut:

   a. Tuliskan nomor dan nama peserta assesmen sebagai developer. [NOMOR DAN NAMA PESERTA]
   b. Tuliskan judul Sistem Aplikasi yang sedang dibuat [JUDUL SISTEM]
   c. Tuliskan petunjuk penggunaan Sistem Aplikasi sebagai manual guide untuk pengguna aplikasi. [GUIDE MANUAL]
   d. Susun dengan format tulisan yang rapih dan mudah dibaca.


#### SELAMAT BEKERJA DENGAN DOA DAN USAHA   