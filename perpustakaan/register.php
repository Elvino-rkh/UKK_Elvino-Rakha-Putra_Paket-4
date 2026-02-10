<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/style.css">
</head>

<body>
<div class="center">
  <div class="card">
    <h2>📝 Register Akun</h2>

    <form action="auth/proses_register.php" method="POST">
      <input name="nama" placeholder="Nama Lengkap" required>
      <input name="username" placeholder="Username" required>
      <input name="password" type="password" placeholder="Password" required>

      <select name="role">
        <option value="anggota">Anggota</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit">Daftar</button>
    </form>

    <a href="index.php">Kembali Login</a>
  </div>
</div>
</body>
</html>
