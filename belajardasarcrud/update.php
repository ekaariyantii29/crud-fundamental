<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>

<?php
include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tbsiswa WHERE ID='$id'";
$result = mysqli_query($koneksi, $sql);

$row = mysqli_fetch_assoc($result);
?>

<form action="prosesupdate.php" method="post">

    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

    <input type="text" name="nama" value="<?php echo $row['Nama']; ?>" required>

    <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required>

    <input type="submit" value="Update Data">

</form>

</body>

</html>