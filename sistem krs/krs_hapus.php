<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: krs_tampil.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM krs WHERE id='$id'";

if ($conn->query($sql)) {
    header("Location: krs_tampil.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>