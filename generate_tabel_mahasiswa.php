<!-- Author: M.Hidayatullah -->
<?php
  // buat koneksi dengan database mysql
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $link   = mysqli_connect($dbhost,$dbuser,$dbpass);

  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }

  //buat database kampusku jika belum ada
  $query = "CREATE DATABASE IF NOT EXISTS kampusku";
  $result = mysqli_query($link, $query);

  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Database <b>'kampusku'</b> berhasil dibuat... <br>";
  }

  //pilih database kampusku
  $result = mysqli_select_db($link, "kampusku");

  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Database <b>'kampusku'</b> berhasil dipilih... <br>";
  }

  // cek apakah tabel mahasiswa sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS mahasiswa";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'mahasiswa'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel mahasiswa
  $query  = "CREATE TABLE mahasiswa (nim CHAR(8), nama VARCHAR(100), ";
  $query .= "tempat_lahir VARCHAR(50), tanggal_lahir DATE, ";
  $query .= "fakultas VARCHAR(50), jurusan VARCHAR(50), ";
  $query .= "ipk DECIMAL(3,2), PRIMARY KEY (nim))";

  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'mahasiswa'</b> berhasil dibuat... <br>";
  }

  // buat query untuk INSERT data ke tabel mahasiswa
  $query  = "INSERT INTO mahasiswa VALUES ";
  $query .= "('19010102', 'Dayat', 'Ubung', '2000-10-25', ";
  $query .= "'Teknik', 'Ilmu Komputer', 4.0), ";
  $query .= "('19010103', 'Rudi Permana', 'Mataram', '2000-08-22', ";
  $query .= "'Teknik', 'Ilmu Komputer', 2.9), ";
  $query .= "('19010104', 'Sari Citra Lestari', 'Lembar', '1999-12-31', ";
  $query .= "'Teknik', 'Ilmu Komputer', 3.5), ";
  $query .= "('19010105', 'Rina Kumala Sari', 'Praya', '2000-06-28', ";
  $query .= "'Teknik', 'Sistem Informasi', 3.4), ";
  $query .= "('19010106', 'Jayadi', 'Mataram', '1999-04-02', ";
  $query .= "'Teknik','Ilmu Komputer', 2.7)";

  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'mahasiswa'</b> berhasil diisi... <br>";
  }

  // tutup koneksi dengan database mysql
  mysqli_close($link);
?>
