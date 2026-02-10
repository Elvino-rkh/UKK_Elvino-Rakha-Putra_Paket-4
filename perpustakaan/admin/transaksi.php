<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Transaksi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>📊 Data Transaksi</h2>

        <table>
            <tr>
                <th>Nama</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "
            SELECT transaksi.*, users.nama, buku.judul
            FROM transaksi
            JOIN users ON transaksi.user_id = users.id
            JOIN buku ON transaksi.buku_id = buku.id
            ");

            while ($t = mysqli_fetch_assoc($data)) {
                echo "<tr>
                <td>$t[nama]</td>
                <td>$t[judul]</td>
                <td>$t[tanggal_pinjam]</td>
                <td>" . ($t['tanggal_kembali'] ?? '-') . "</td>
                <td>$t[status]</td>
                </tr>";
            }
            ?>
        </table>

        <div class="nav" style="margin-top:15px;">
            <a href="dashboard.php">⬅ Kembali ke Dashboard</a>
        </div>

    </div>
</div>

</body>
</html>
