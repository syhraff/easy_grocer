<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$name = $_GET['name'] ?? '';
$price = $_GET['price'] ?? 0;
$img = $_GET['img'] ?? '';
?>
<!DOCTYPE html>
<html><head><title><?=$name?> – Easy Grocer</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{font-family:'Segoe UI';background:#f7f7f7;} .spec-box{display:flex;gap:10px;}</style>
</head>
<body class="p-4">
<div class="container" style="max-width:600px">
  <div class="card p-3 mb-3">
    <h4><?=$name?></h4>
    <img src="assetsimg/<?=$img?>" class="img-fluid mb-3">
    <p class="h5">RM <?=number_format($price,2)?></p>
    <form action="cart_add.php" method="post" class="mb-3">
      <input type="hidden" name="product_name" value="<?=htmlspecialchars($name)?>">
      <input type="hidden" name="price" value="<?=$price?>">
      <input type="hidden" name="img" value="<?=$img?>">

      <div class="spec-box mb-2">
        <select name="warna" class="form-select" required>
          <option value="">Pilih Warna</option><option value="Merah">Merah</option><option value="Biru">Biru</option>
        </select>
        <select name="saiz" class="form-select" required>
          <option value="">Pilih Saiz</option><option value="1kg">1kg</option><option value="2kg">2kg</option>
        </select>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text">Qty</span>
        <input type="number" name="quantity" class="form-control" value="1" min="1">
      </div>

      <button class="btn btn-success w-100">Tambah ke Troli</button>
    </form>
    <a href="home.php" class="btn btn-outline-secondary">← Kembali ke Home</a>
  </div>
</div>
</body></html>
