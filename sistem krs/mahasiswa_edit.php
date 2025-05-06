<?php
include 'koneksi.php';

if (!isset($_GET['npm'])) {
    header("Location: krs_tampil.php");
    exit();
}

$npm = $_GET['npm'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    
    $sql = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";
    
    if ($conn->query($sql)) {
        header("Location: krs_tampil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>