<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST["jenis"];
    $keterangan = $_POST["keterangan"];
    $jumlah = (int)$_POST["jumlah"];

    // Data transaksi awal
    $transaksi = [
        ["jenis" => "pemasukan", "keterangan" => "Gaji", "jumlah" => 1500000],
        ["jenis" => "pengeluaran", "keterangan" => "Makan", "jumlah" => 50000],
        ["jenis" => "pengeluaran", "keterangan" => "Transportasi", "jumlah" => 30000],
        ["jenis" => "pemasukan", "keterangan" => "Hadiah", "jumlah" => 100000],
    ];

    // Tambahkan transaksi baru dari input user
    $transaksi[] = [
        "jenis" => $jenis,
        "keterangan" => $keterangan,
        "jumlah" => $jumlah
    ];
} else {
    $transaksi = [
        ["jenis" => "pemasukan", "keterangan" => "Gaji", "jumlah" => 1500000],
        ["jenis" => "pengeluaran", "keterangan" => "Makan", "jumlah" => 50000],
        ["jenis" => "pengeluaran", "keterangan" => "Transportasi", "jumlah" => 30000],
        ["jenis" => "pemasukan", "keterangan" => "Hadiah", "jumlah" => 100000],
    ];
}

// Hitung total
$totalPemasukan = 0;
$totalPengeluaran = 0;

foreach ($transaksi as $t) {
    if ($t["jenis"] == "pemasukan") {
        $totalPemasukan += $t["jumlah"];
    } elseif ($t["jenis"] == "pengeluaran") {
        $totalPengeluaran += $t["jumlah"];
    }
}

$saldoAkhir = $totalPemasukan - $totalPengeluaran;

// Status keuangan
if ($saldoAkhir > 0) {
    $status = "Keuangan kamu sehat, masih ada sisa uang.";
} elseif ($saldoAkhir == 0) {
    $status = "Keuangan kamu seimbang, tidak ada sisa uang.";
} else {
    $status = "Hati-hati! Pengeluaran kamu lebih besar dari pemasukan.";
}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST["jenis"];
    $keterangan = $_POST["keterangan"];
    $jumlah = (int)$_POST["jumlah"];

    // Data transaksi awal
    $transaksi = [
        ["jenis" => "pemasukan", "keterangan" => "Gaji", "jumlah" => 1500000],
        ["jenis" => "pengeluaran", "keterangan" => "Makan", "jumlah" => 50000],
    ];

    // Tambahkan transaksi baru dari input user
    $transaksi[] = [
        "jenis" => $jenis,
        "keterangan" => $keterangan,
        "jumlah" => $jumlah
    ];
} else {
    $transaksi = [
        ["jenis" => "pemasukan", "keterangan" => "Gaji", "jumlah" => 1500000],
        ["jenis" => "pengeluaran", "keterangan" => "Makan", "jumlah" => 50000],
    ];
}

// Hitung total
$totalPemasukan = 0;
$totalPengeluaran = 0;

foreach ($transaksi as $t) {
    if ($t["jenis"] == "pemasukan") {
        $totalPemasukan += $t["jumlah"];
    } elseif ($t["jenis"] == "pengeluaran") {
        $totalPengeluaran += $t["jumlah"];
    }
}

$saldoAkhir = $totalPemasukan - $totalPengeluaran;

// Status keuangan
if ($saldoAkhir > 0) {
    $status = "Keuangan kamu sehat, masih ada sisa uang.";
} elseif ($saldoAkhir == 0) {
    $status = "Keuangan kamu seimbang, tidak ada sisa uang.";
} else {
    $status = "Hati-hati! Pengeluaran kamu lebih besar dari pemasukan.";
}
?>

<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Catatan Keuangan Pribadi</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

    .container {
        background: white;
        padding: 25px 40px;
        margin-top: 50px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        max-width: 700px;
        width: 100%;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    form {
        margin-bottom: 30px;
    }

    label {
        font-weight: bold;
        display: block;
        margin: 10px 0 5px;
    }

    select, input[type="text"], input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #bbb;
        border-radius: 8px;
        outline: none;
        transition: 0.2s;
    }

    select:focus, input:focus {
        border-color: #2ecc71;
        box-shadow: 0 0 5px rgba(46, 204, 113, 0.4);
    }

    button {
        background: #2ecc71;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 10px;
        font-weight: bold;
        transition: 0.3s;
    }

    button:hover {
        background: #27ae60;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 10px;
    }

    th {
        background: #2ecc71;
        color: white;
    }

    tr:nth-child(even) {
        background: #f8f8f8;
    }

    .summary {
        margin-top: 25px;
        background: #f1fdf6;
        padding: 15px;
        border-radius: 10px;
    }

    .summary b {
        color: #2c3e50;
    }

    .status {
        margin-top: 15px;
        padding: 12px;
        background: #eafaf1;
        border-left: 6px solid #2ecc71;
        font-weight: bold;
        border-radius: 6px;
    }
</style>

</head>
<body>
    <div class="container">
        <h2>Aplikasi Catatan Keuangan Pribadi</h2>

    <form method="post">
        <label>Jenis Transaksi:</label>
        <select name="jenis" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" required>

        <label>Jumlah (Rp):</label>
        <input type="number" name="jumlah" required>

        <button type="submit">Tambah Transaksi</button>
    </form>

    <h3>Daftar Transaksi</h3>
    <table>
        <tr><th>Jenis</th><th>Keterangan</th><th>Jumlah</th></tr>
        <?php foreach ($transaksi as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['jenis']); ?></td>
                <td><?= htmlspecialchars($t['keterangan']); ?></td>
                <td>Rp <?= number_format($t['jumlah'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="summary">
        <b>Total Pemasukan:</b> Rp <?= number_format($totalPemasukan, 0, ',', '.'); ?><br>
        <b>Total Pengeluaran:</b> Rp <?= number_format($totalPengeluaran, 0, ',', '.'); ?><br>
        <b>Saldo Akhir:</b> Rp <?= number_format($saldoAkhir, 0, ',', '.'); ?><br>
    </div>

    <div class="status"><?= $status; ?></div>
</div>
```

</body>
</html>
