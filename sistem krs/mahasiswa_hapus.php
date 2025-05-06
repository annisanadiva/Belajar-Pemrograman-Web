<?php
include 'koneksi.php';

if (!isset($_GET['npm'])) {
    header("Location: krs_tampil.php");
    exit();
}

$npm = $_GET['npm'];

// Hapus dulu KRS yang terkait dengan mahasiswa ini
$sql_delete_krs = "DELETE FROM krs WHERE mahasiswa_npm='$npm'";
$conn->query($sql_delete_krs);

// Kemudian hapus mahasiswa
$sql = "DELETE FROM mahasiswa WHERE npm='$npm'";

if ($conn->query($sql)) {
    header("Location: krs_tampil.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>