<?php
session_start();
include "../config/koneksi.php";

$user = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($conn, "UPDATE transaksi SET status='dikembalikan', tanggal_kembali=NOW() WHERE id='$id'");
    mysqli_query($conn, "
        UPDATE buku 
        SET stok = stok + 1 
        WHERE id = (SELECT buku_id FROM transaksi WHERE id='$id')
    ");

    echo "<script>alert('Buku berhasil dikembalikan!');window.location='kembali.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Pengembalian Buku</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>🔄 Pengembalian Buku</h2>

        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "
                SELECT transaksi.*, buku.judul 
                FROM transaksi 
                JOIN buku ON transaksi.buku_id = buku.id 
                WHERE transaksi.user_id = '$user'
            ");

            while ($t = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td>$t[judul]</td>
                    <td>$t[status]</td>
                    <td>";

                if ($t['status'] == 'dipinjam') {
                    echo "<a href='?id=$t[id]' onclick=\"return confirm('Kembalikan buku ini?')\">🔁 Kembalikan</a>";
                } else {
                    echo "<span style='color:green;font-weight:bold;'>Selesai</span>";
                }

                echo "</td></tr>";
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
