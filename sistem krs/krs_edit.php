<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: krs_tampil.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];
    
    $sql = "UPDATE krs SET mahasiswa_npm='$mahasiswa_npm', matakuliah_kodemk='$matakuliah_kodemk' WHERE id='$id'";
    
    if ($conn->query($sql)) {
        header("Location: krs_tampil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}