<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
}

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO buku VALUES(NULL,'$_POST[judul]','$_POST[penulis]','$_POST[tahun]','$_POST[stok]')");
    echo "<script>alert('Buku berhasil ditambahkan!');window.location='buku.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Buku</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>📚 Kelola Data Buku</h2>

        <!-- FORM TAMBAH BUKU -->
        <form method="POST">
            <input name="judul" placeholder="Judul Buku" required>
            <input name="penulis" placeholder="Penulis Buku" required>
            <input name="tahun" placeholder="Tahun Terbit" required>
            <input name="stok" placeholder="Stok Buku" required>
            <button name="simpan">➕ Simpan Buku</button>
        </form>

        <!-- TABEL DATA BUKU -->
        <table>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC");
            while ($b = mysqli_fetch_assoc($data)) {
                echo "<tr>
                <td>$b[judul]</td>
                <td>$b[penulis]</td>
                <td>$b[tahun]</td>
                <td>$b[stok]</td>
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
