
<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "db_inventaris_kelas";

// Menghubungkan ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
