<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <title>Profil Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
    .profile-pic { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; }
  </style>
</head>
<body class="p-4">
  <div class="container" style="max-width: 600px;">
    <h3 class="mb-4 text-center">👤 Profil Pengguna</h3>

    <!-- Gambar Profil -->
    <div class="text-center mb-4">
    <img src="<?= !empty($user['profile_img']) && file_exists("uploads/".$user['profile_img']) ? 'uploads/'.htmlspecialchars($user['profile_img']) : 'assets/img/default_user.png' ?>" class="profile-pic mb-2" alt="Gambar Profil">
      <form method="post" action="upload_profile.php" enctype="multipart/form-data">
        <input type="file" name="photo" class="form-control mb-2" required>
        <button class="btn btn-outline-primary btn-sm">Muat Naik Gambar</button>
      </form>
    </div>

    <!-- Butiran Profil -->
    <form method="post" action="update_profile.php" class="card p-3 shadow-sm">
      <label class="form-label">Nama Penuh</label>
      <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" class="form-control mb-2" required>

      <label class="form-label">Tarikh Lahir</label>
      <input type="date" name="dob" value="<?= htmlspecialchars($user['dob'] ?? '') ?>" class="form-control mb-2">

      <label class="form-label">Jantina</label>
      <select name="gender" class="form-select mb-2">
        <option value="Male" <?= ($user['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Lelaki</option>
        <option value="Female" <?= ($user['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Perempuan</option>
      </select>

      <label class="form-label">Telefon</label>
      <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" class="form-control mb-2">

      <label class="form-label">Alamat</label>
      <textarea name="address" class="form-control mb-3" rows="3"><?= htmlspecialchars($user['address'] ?? '') ?></textarea>

      <button class="btn btn-success w-100">💾 Simpan Maklumat</button>
    </form>

    <div class="text-center mt-3">
      <a href="home.php" class="btn btn-outline-secondary btn-sm">← Kembali ke Home</a>
    </div>
  </div>
</body>
</html>
