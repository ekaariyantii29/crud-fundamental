
<?php
include 'config.php';

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $query = "DELETE FROM barang WHERE id_barang = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data barang berhasil dihapus!');
            window.location='index.php';
        </script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);

} else {
    echo "ID barang tidak ditemukan.";
}
?>
