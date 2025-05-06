<?php
include 'koneksi.php';

// Query untuk mendapatkan data KRS
$sql = "SELECT krs.id, mahasiswa.nama as nama_mahasiswa, matakuliah.nama as nama_matakuliah, matakuliah.jumlah_sks 
        FROM krs
        JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
        JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
        ORDER BY krs.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem KRS Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sistem KRS Mahasiswa</h1>
    
    <a href="mahasiswa_tambah.php">Tambah Mahasiswa</a> | 
    <a href="matakuliah_tambah.php">Tambah Mata Kuliah</a> | 
    <a href="krs_tambah.php">Ambil KRS</a>
    
    <h2>Daftar KRS</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nama_mahasiswa'] . "</td>";
                    echo "<td>" . $row['nama_matakuliah'] . "</td>";
                    echo "<td><span class='nama'>" . $row['nama_mahasiswa'] . "</span> Mengambil Mata Kuliah <span class='matkul'>" . 
                         $row['nama_matakuliah'] . "</span> (" . $row['jumlah_sks'] . " SKS)</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data KRS</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>