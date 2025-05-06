<?php
include 'koneksi.php';

if (!isset($_GET['kodemk'])) {
    header("Location: krs_tampil.php");
    exit();
}

$kodemk = $_GET['kodemk'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    
    $sql = "UPDATE matakuliah SET nama='$nama', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk'";
    
    if ($conn->query($sql)) {
        header("Location: krs_tampil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM matakuliah WHERE kodemk='$kodemk'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>