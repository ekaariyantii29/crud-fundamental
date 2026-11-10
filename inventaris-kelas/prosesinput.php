
<?php
include 'config.php';

if (isset($_POST['simpan'])) {

    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO barang
    (nama_barang, kategori, jumlah, kondisi, lokasi, keterangan)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssisss",
        $nama_barang,
        $kategori,
        $jumlah,
        $kondisi,
        $lokasi,
        $keterangan
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data barang berhasil disimpan!');
            window.location='index.php';
        </script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
}
?>
