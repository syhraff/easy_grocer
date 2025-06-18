<!DOCTYPE html>
<html>
<head>
  <title>Easy Grocer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    #promoModal img { width: 100%; height: auto; }
    .header-bar {
      padding: 10px 20px;
      background: #f8f8f8;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
  </style>
</head>
<body>

<!-- BAHAGIANN POPUP WEHH -->
<div class="modal fade" id="promoModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <img src="assetsimg/promo.jpg.png" alt="Promo">
    </div>
  </div>
</div>

<!-- BAHAGIAN CARIANNN -->
<div class="header-bar">
  <div><img src="assets/img/logo.png" height="40"></div>
  <div style="flex: 1; margin: 0 20px;">
    <input type="text" class="form-control" placeholder="Cari produk...">
  </div>
  <div>
    <a href="login.php" class="btn btn-outline-primary btn-sm">Log Masuk</a>
    <a href="register.php" class="btn btn-outline-success btn-sm">Daftar</a>
  </div>
</div>

<script>
  window.onload = function() {
    var promo = new bootstrap.Modal(document.getElementById('promoModal'));
    promo.show();
  };
</script>

</body>
</html>
