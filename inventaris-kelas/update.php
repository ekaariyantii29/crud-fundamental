
<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("ID barang tidak ditemukan.");
}

$id = (int) $_GET['id'];

$query = "SELECT * FROM barang WHERE id_barang = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data barang tidak ditemukan.");
}

if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE barang SET
        nama_barang = ?,
        kategori = ?,
        jumlah = ?,
        kondisi = ?,
        lokasi = ?,
        keterangan = ?
        WHERE id_barang = ?";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssisssi",
        $nama_barang,
        $kategori,
        $jumlah,
        $kondisi,
        $lokasi,
        $keterangan,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location='index.php';
        </script>";
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang - SIMAK</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Edit Data Barang</h1>

    <form method="POST">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang"
            value="<?= htmlspecialchars($data['nama_barang']); ?>" required>

        <label>Kategori</label>
        <input type="text" name="kategori"
            value="<?= htmlspecialchars($data['kategori']); ?>" required>

        <label>Jumlah</label>
        <input type="number" name="jumlah" min="1"
            value="<?= htmlspecialchars($data['jumlah']); ?>" required>

        <label>Kondisi</label>
        <select name="kondisi" required>
            <option value="Baik" <?= $data['kondisi'] == 'Baik' ? 'selected' : ''; ?>>Baik</option>
            <option value="Rusak Ringan" <?= $data['kondisi'] == 'Rusak Ringan' ? 'selected' : ''; ?>>Rusak Ringan</option>
            <option value="Rusak Berat" <?= $data['kondisi'] == 'Rusak Berat' ? 'selected' : ''; ?>>Rusak Berat</option>
        </select>

        <label>Lokasi</label>
        <input type="text" name="lokasi"
            value="<?= htmlspecialchars($data['lokasi']); ?>" required>

        <label>Keterangan</label>
        <textarea name="keterangan"><?= htmlspecialchars($data['keterangan']); ?></textarea>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Kembali</a>
    </form>
</div>

</body>
</html>
