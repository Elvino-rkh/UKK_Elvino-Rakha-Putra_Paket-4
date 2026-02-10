<?php
session_start();
include "../config/koneksi.php";

if (isset($_POST['pinjam'])) {
    $buku = $_POST['buku'];
    $user = $_SESSION['user_id'];

    mysqli_query($conn, "INSERT INTO transaksi VALUES(NULL,'$user','$buku',NOW(),NULL,'dipinjam')");
    mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id='$buku'");

    echo "<script>alert('Buku berhasil dipinjam!');window.location='pinjam.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Pinjam Buku</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>📚 Pinjam Buku</h2>

        <form method="POST">
            <select name="buku" required>
                <option value="">-- Pilih Buku --</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");
                while ($b = mysqli_fetch_assoc($q)) {
                    echo "<option value='$b[id]'>$b[judul] (Stok: $b[stok])</option>";
                }
                ?>
            </select>

            <button name="pinjam">Pinjam Buku</button>
        </form>

        <div class="nav" style="margin-top:15px;">
            <a href="dashboard.php">⬅ Kembali ke Dashboard</a>
        </div>
    </div>
</div>

</body>
</html>
