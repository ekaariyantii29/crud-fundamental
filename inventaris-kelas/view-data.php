
<?php
include 'config.php';

$query = "SELECT * FROM barang ORDER BY id_barang DESC";
$result = mysqli_query($koneksi, $query);
?>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;

            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($data['kategori']); ?></td>
                    <td><?= htmlspecialchars($data['jumlah']); ?></td>
                    <td><?= htmlspecialchars($data['kondisi']); ?></td>
                    <td><?= htmlspecialchars($data['lokasi']); ?></td>
                    <td><?= htmlspecialchars($data['keterangan']); ?></td>
                    <td>
                        <a href="update.php?id=<?= $data['id_barang']; ?>">Edit</a>
                        |
                        <a href="hapus.php?id=<?= $data['id_barang']; ?>"
                           onclick="return confirm('Yakin ingin menghapus barang ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="8">Belum ada data barang.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
