<?php
require_once 'koneksi.php';

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"));

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM pasien WHERE id = $id");
        } else {
            $result = $conn->query("SELECT * FROM pasien");
        }

        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        echo json_encode($output);
        break;

    case 'POST':
        $nama = $data->nama;
        $jenis_kelamin = $data->jenis_kelamin;
        $umur = $data->umur;
        $diagnosa = $data->diagnosa;

        $sql = "INSERT INTO pasien (nama, jenis_kelamin, umur, diagnosa)
                VALUES ('$nama', '$jenis_kelamin', $umur, '$diagnosa')";
        if ($conn->query($sql)) {
            echo json_encode(["message" => "Pasien berhasil ditambahkan"]);
        } else {
            echo json_encode(["message" => "Gagal menambahkan pasien"]);
        }
        break;

    case 'PUT':
        if (!isset($_GET['id'])) {
            echo json_encode(["message" => "ID wajib disertakan"]);
            exit;
        }

        $id = $_GET['id'];
        $nama = $data->nama;
        $jenis_kelamin = $data->jenis_kelamin;
        $umur = $data->umur;
        $diagnosa = $data->diagnosa;

        $sql = "UPDATE pasien SET 
                    nama='$nama',
                    jenis_kelamin='$jenis_kelamin',
                    umur=$umur,
                    diagnosa='$diagnosa'
                WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode(["message" => "Data pasien berhasil diperbarui"]);
        } else {
            echo json_encode(["message" => "Gagal memperbarui data pasien"]);
        }
        break;

    case 'DELETE':
        if (!isset($_GET['id'])) {
            echo json_encode(["message" => "ID wajib disertakan"]);
            exit;
        }

        $id = $_GET['id'];
        $sql = "DELETE FROM pasien WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode(["message" => "Pasien berhasil dihapus"]);
        } else {
            echo json_encode(["message" => "Gagal menghapus pasien"]);
        }
        break;

    default:
        echo json_encode(["message" => "Metode tidak dikenali"]);
        break;
}
?>
