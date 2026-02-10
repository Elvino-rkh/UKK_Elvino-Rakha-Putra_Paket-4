<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
}

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO users VALUES(NULL,'$_POST[nama]','$_POST[username]','$_POST[password]','anggota')");
    echo "<script>alert('Anggota berhasil ditambahkan!');window.location='anggota.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Anggota</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>👥 Kelola Anggota</h2>

        <!-- FORM TAMBAH ANGGOTA -->
        <form method="POST">
            <input name="nama" placeholder="Nama Lengkap" required>
            <input name="username" placeholder="Username" required>
            <input name="password" type="password" placeholder="Password" required>
            <button name="simpan">➕ Tambah Anggota</button>
        </form>

        <!-- TABLE DATA ANGGOTA -->
        <table>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
            while ($u = mysqli_fetch_assoc($data)) {
                echo "<tr>
                <td>$u[nama]</td>
                <td>$u[username]</td>
                <td>$u[role]</td>
                <td>
                    <a href='hapus_anggota.php?id=$u[id]' onclick=\"return confirm('Hapus anggota ini?')\">🗑 Hapus</a>
                </td>
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
