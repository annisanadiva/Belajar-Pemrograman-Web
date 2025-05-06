<?php
include 'koneksi.php';

if (!isset($_GET['kodemk'])) {
    header("Location: krs_tampil.php");
    exit();
}

$kodemk = $_GET['kodemk'];

// Hapus dulu KRS yang terkait dengan mata kuliah ini
$sql_delete_krs = "DELETE FROM krs WHERE matakuliah_kodemk='$kodemk'";
$conn->query($sql_delete_krs);

// Kemudian hapus mata kuliah
$sql = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";

if ($conn->query($sql)) {
    header("Location: krs_tampil.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>