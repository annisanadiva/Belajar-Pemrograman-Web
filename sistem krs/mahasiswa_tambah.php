<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    
    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
    
    if ($conn->query($sql)) {
        header("Location: krs_tampil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form method="post">
        <label>NPM:</label><br>
        <input type="text" name="npm" required><br><br>
        
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>
        
        <label>Jurusan:</label><br>
        <select name="jurusan" required>
            <option value="informatika">Informatika</option>
            <option value="sistem informasi">Sistem Informasi</option>
        </select><br><br>
        
        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>
        
        <input type="submit" value="Simpan">
        <a href="krs_tampil.php">Batal</a>
    </form>
</body>
</html>