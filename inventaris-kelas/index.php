
<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAK - Inventaris Kelas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>SIMAK</h1>
            <p>Sistem Informasi Manajemen Aset Kelas</p>
        </header>

        <section class="form-container">
            <h2>Tambah Barang</h2>

            <form action="prosesinput.php" method="POST">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" required>

                <label>Kategori</label>
                <input type="text" name="kategori" required>

                <label>Jumlah</label>
                <input type="number" name="jumlah" min="1" required>

                <label>Kondisi</label>
                <select name="kondisi" required>
                    <option value="">Pilih kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>

                <label>Lokasi</label>
                <input type="text" name="lokasi" required>

                <label>Keterangan</label>
                <textarea name="keterangan"></textarea>

                <button type="submit" name="simpan">Simpan Barang</button>
            </form>
        </section>

        <section class="data-container">
            <h2>Data Inventaris Barang</h2>
            <?php include 'view-data.php'; ?>
        </section>
    </div>

</body>
</html>
