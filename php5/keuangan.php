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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Catatan Keuangan Pribadi</title>
</head>
<body>
    <h2>Aplikasi Catatan Keuangan Pribadi</h2>

    <form method="post">
        <label>Jenis Transaksi:</label>
        <select name="jenis" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>
        <br><br>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" required>
        <br><br>

        <label>Jumlah (Rp):</label>
        <input type="number" name="jumlah" required>
        <br><br>

        <button type="submit">Tambah Transaksi</button>
    </form>

    <hr>

    <h3>Daftar Transaksi</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>Jenis</th><th>Keterangan</th><th>Jumlah</th></tr>
        <?php foreach ($transaksi as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['jenis']); ?></td>
                <td><?= htmlspecialchars($t['keterangan']); ?></td>
                <td>Rp <?= number_format($t['jumlah'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <b>Total Pemasukan:</b> Rp <?= number_format($totalPemasukan, 0, ',', '.'); ?><br>
    <b>Total Pengeluaran:</b> Rp <?= number_format($totalPengeluaran, 0, ',', '.'); ?><br>
    <b>Saldo Akhir:</b> Rp <?= number_format($saldoAkhir, 0, ',', '.'); ?><br><br>
    <b>Status:</b> <?= $status; ?>
</body>
</html>
