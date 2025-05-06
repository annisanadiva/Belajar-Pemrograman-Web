<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    
    $sql = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', '$jumlah_sks')";
    
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
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Mata Kuliah</h1>
    <form method="post">
        <label>Kode MK:</label><br>
        <input type="text" name="kodemk" required><br><br>
        
        <label>Nama Mata Kuliah:</label><br>
        <input type="text" name="nama" required><br><br>
        
        <label>Jumlah SKS:</label><br>
        <input type="number" name="jumlah_sks" min="1" max="6" required><br><br>
        
        <input type="submit" value="Simpan">
        <a href="krs_tampil.php">Batal</a>
    </form>
</body>
</html>