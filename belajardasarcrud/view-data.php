<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'config.php';
    ?>

    <!-- tampilkan data dari database -->

    <?php
    // query untuk mendapatkan data dari database
    $sql = "SELECT * FROM tbsiswa";
    $result = mysqli_query($koneksi, $sql);
    ?>
    <div class="container">
        <!-- tombol kembali ke halaman input data -->
        <a href="index.php"><button> Kembali</button></a>
    </div>
    <?php
    if (mysqli_num_rows($result) > 0): ?>
        <div class="container">
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nama']); ?></td>
                                <td><?= htmlspecialchars($row['kelas']); ?></td>
                                <td><?= htmlspecialchars($row['alamat']); ?></td>
                                <!-- tombol hapus data tanpa konfirmasi -->
                                <td>
                                    <a href="hapus.php?id=<?= urlencode($row['id']); ?>">Hapus</a>
                                    <a href="update.php?id=<?= urlencode($row['id']); ?>">Edit</a>


                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>



        <?php else: ?>

            <p>Data tidak ditemukan</p>

        <?php endif; ?>

</body>

</html>