<!DOCTYPE html>
<html>
<head>
  <title>Daftar - EasyGrocer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
    background: linear-gradient(135deg, #1e88e5, #5c6bc0);
      font-family: 'Segoe UI', sans-serif;
    }
    .register-box {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height:100vh;">
  <div class="register-box" style="width: 400px;">
    <h4 class="text-center mb-3">📝 Daftar Akaun</h4>
    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger"><?= $_GET['error'] ?></div>
    <?php endif; ?>
    <form method="post" action="register_process.php">
      <input type="text" name="fullname" class="form-control mb-2" placeholder="Nama Penuh" required>
      <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
      <input type="password" name="password" class="form-control mb-2" placeholder="Kata Laluan" required>
      <input type="password" name="confirm" class="form-control mb-3" placeholder="Sahkan Kata Laluan" required>
      <button class="btn btn-primary w-100">Daftar Sekarang</button>
      <p class="text-center mt-3 small">Sudah ada akaun? <a href="login.php">Log Masuk</a></p>
    </form>
  </div>
</body>
</html>
