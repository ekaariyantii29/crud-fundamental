<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsiswa");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>