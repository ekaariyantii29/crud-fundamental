<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE tbsiswa 
            SET Nama='$nama', kelas='$kelas' 
            WHERE ID='$id'";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        header("Location: pageview.php");
        exit();
    } else {
        echo "Update gagal: " . mysqli_error($koneksi);
    }
}
?>