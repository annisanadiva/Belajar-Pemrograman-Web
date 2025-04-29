<?php
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

ksort($bandara_asal);
ksort($bandara_tujuan);

function generateRegistration() {
    return "REG-" . rand(10000, 99999);
}

$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maskapai = htmlspecialchars($_POST["maskapai"]);
    $asal = $_POST["asal"];
    $tujuan = $_POST["tujuan"];
    $harga = (int) $_POST["harga"];

    $pajak_asal = $bandara_asal[$asal];
    $pajak_tujuan = $bandara_tujuan[$tujuan];
    $total_pajak = $pajak_asal + $pajak_tujuan;
    $total_harga = $harga + $total_pajak;

    $hasil = [
        "reg" => generateRegistration(),
        "tanggal" => date("Y-m-d H:i:s"),
        "maskapai" => $maskapai,
        "asal" => $asal,
        "tujuan" => $tujuan,
        "harga" => number_format($harga, 0, ',', '.'),
        "pajak" => number_format($total_pajak, 0, ',', '.'),
        "total" => number_format($total_harga, 0, ',', '.')
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pendaftaran Rute Penerbangan</h1>
        <form method="POST">
            <label>Nama Maskapai:</label>
            <input type="text" name="maskapai" required>

            <label>Bandara Asal:</label>
            <select name="asal" required>
                <option value="">-- Pilih Bandara Asal --</option>
                <?php foreach ($bandara_asal as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>

            <label>Bandara Tujuan:</label>
            <select name="tujuan" required>
                <option value="">-- Pilih Bandara Tujuan --</option>
                <?php foreach ($bandara_tujuan as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>

            <label>Harga Tiket:</label>
            <input type="number" name="harga" required>

            <button type="submit">Daftar</button>
        </form>

        <?php if ($hasil): ?>
            <div class="hasil">
                <h2>Data Penerbangan</h2>
                <p><strong>No. Registrasi:</strong> <?= $hasil["reg"] ?></p>
                <p><strong>Tanggal:</strong> <?= $hasil["tanggal"] ?></p>
                <p><strong>Maskapai:</strong> <?= $hasil["maskapai"] ?></p>
                <p><strong>Asal:</strong> <?= $hasil["asal"] ?></p>
                <p><strong>Tujuan:</strong> <?= $hasil["tujuan"] ?></p>
                <p><strong>Harga Tiket:</strong> Rp <?= $hasil["harga"] ?></p>
                <p><strong>Pajak:</strong> Rp <?= $hasil["pajak"] ?></p>
                <p><strong>Total Harga Tiket:</strong> Rp <?= $hasil["total"] ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
