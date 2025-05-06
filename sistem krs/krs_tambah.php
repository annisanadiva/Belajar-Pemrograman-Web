<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];
    
    $sql = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";
    
    if ($conn->query($sql)) {
        header("Location: krs_tampil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data mahasiswa dan mata kuliah untuk dropdown
$sql_mahasiswa = "SELECT * FROM mahasiswa";
$result_mahasiswa = $conn->query($sql_mahasiswa);

$sql_matakuliah = "SELECT * FROM matakuliah";
$result_matakuliah = $conn->query($sql_matakuliah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambil KRS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ambil KRS</h1>
    <form method="post">
        <label>Mahasiswa:</label><br>
        <select name="mahasiswa_npm" required>
            <option value="">-- Pilih Mahasiswa --</option>
            <?php
            while ($row = $result_mahasiswa->fetch_assoc()) {
                echo "<option value='" . $row['npm'] . "'>" . $row['npm'] . " - " . $row['nama'] . "</option>";
            }
            ?>
        </select><br><br>
        
        <label>Mata Kuliah:</label><br>
        <select name="matakuliah_kodemk" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            <?php
            while ($row = $result_matakuliah->fetch_assoc()) {
                echo "<option value='" . $row['kodemk'] . "'>" . $row['kodemk'] . " - " . $row['nama'] . " (" . $row['jumlah_sks'] . " SKS)</option>";
            }
            ?>
        </select><br><br>
        
        <input type="submit" value="Simpan">
        <a href="krs_tampil.php">Batal</a>
    </form>
</body>
</html>