<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$user = $_SESSION['user'];
$uid = $user['id'];
?>
<!DOCTYPE html>
<html lang="ms">
<head><meta charset="UTF-8"><title>Easy Grocer - Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{font-family:'Segoe UI',sans-serif;background:#f3f7fa}
.header{background:linear-gradient(135deg,#0d47a1,#00acc1);padding:12px;color:white}
.header a{color:white;text-decoration:none}
.header img.profile{width:32px;height:32px;border-radius:50%}
.card-pro{border:0;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.05)}
.flash-bar{height:6px;background:#eee;border-radius:4px;overflow:hidden}
.flash-fill{height:6px;background:#ff5252}
#popup-bg{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);display:none;z-index:1000}
#popup-card{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:white;border-radius:12px;overflow:hidden;max-width:360px;z-index:1001;display:none}
#popup-card img{width:100%}
</style>
</head>
<body onload="showPopup()">

<div id="popup-bg"></div>
<div id="popup-card">
  <img src="assetsimg/promo.jpg.png" alt="Promo">
  <button class="btn btn-primary w-100" onclick="hidePopup()">Tutup</button>
</div>

<div class="header d-flex justify-content-between align-items-center">
  <h4 class="m-0">Easy Grocer</h4>
  <div>
    <a href="profile.php" class="me-3">
      <?php if(!empty($user['profile_img'])): ?>
        <img src="uploads/<?= htmlspecialchars($user['profile_img']) ?>" alt="profile" class="profile">
      <?php else: ?>👤<?php endif; ?>
    </a>
    <a href="cart.php" class="me-3">🛒</a>
    <a href="admin_login.php" class="btn btn-light btn-sm">Admin Login</a>
  </div>
</div>

<div class="container mt-4">
  <!--GAMBAR GERAK AUTO MAATTT POWERRR OUHHH-->
  <div id="slide" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner rounded">
      <div class="carousel-item active"><img src="assetsimg/banner1.jpg.jpg" class="d-block w-100"></div>
      <div class="carousel-item"><img src="assetsimg/banner2.jpg.jpg" class="d-block w-100"></div>
    </div>
  </div>
  <!-- Categories -->
  <h5>📂 Kategori</h5>
  <div class="row text-center mb-4">
    <?php $cats=[['Makanan','makanan.png'],['Minuman','minuman.png'],['peralatan rumah','peralatan_rumah.png'],['Pakaian','Pakaian.png']];
    foreach($cats as $c): ?>
      <div class="col-3 mb-2">
        <a href="category.php?cat=<?= urlencode($c[0])?>" class="text-decoration-none text-dark">
          <div class="card card-pro p-2"><img src="assetsimg/<?= $c[1]?>" style="width:auto; height:auto;" class="img-fluid mb-1"><small><?= $c[0]?></small></div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- TOPP SALESSSS -->
  <h5>🌟 Produk Teratas</h5>
  <div class="row mb-3">
    <?php $tops=[['Milo','milo.png',10],['Maggi','maggi.png',4.5],['Susu','susu.png',6],['Boh','boh.png',3.5]];
    foreach($tops as $p): ?>
      <div class="col-sm-6 col-md-3 mb-3">
        <div class="card card-pro text-center p-3"><img src="assetsimg/<?= $p[1]?>" class="img-fluid mb-2"><strong><?= $p[0]?></strong><p>RM <?= number_format($p[2],2)?></p><a href="product.php?name=<?=urlencode($p[0])?>&price=<?= $p[2]?>&img=<?= $p[1]?>" class="btn btn-sm btn-primary">Lihat</a></div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="text-center mb-4"><button class="btn btn-outline-primary" onclick="document.getElementById('more').style.display='flex'">🛍️ Lihat Lagi</button></div>
  <div class="row mb-4" id="more" style="display:none">
    <?php $extras=[['Beras','beras.png',22],['Telur','telur.png',12],['Kopi','kopi.png',5.8],['Roti','roti.png',2.8]];
    foreach($extras as $p): ?>
      <div class="col-sm-6 col-md-3 mb-3">
        <div class="card card-pro text-center p-3"><img src="assetsimg/<?= $p[1]?>" class="img-fluid mb-2"><strong><?= $p[0]?></strong><p>RM <?= number_format($p[2],2)?></p><a href="product.php?name=<?=urlencode($p[0])?>&price=<?= $p[2]?>&img=<?= $p[1]?>" class="btn btn-sm btn-primary">Lihat</a></div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- Flash Sale -->
  <h5 class="mt-4">🔥 Flash Sale</h5>
  <div class="row mb-4">
    <?php $fs=[['Minyak','1.png',25.9,30,25,3600],['Gula','2.png',2.5,20,15,3600]];
    foreach($fs as $i=>$f): ?>
      <div class="col-sm-6 mb-3">
        <div class="card card-pro p-3 d-flex"><div class="d-flex"><img src="assetsimg/<?= $f[1]?>" class="rounded me-3" style="width: 150px; height: 200px">
        <div><span class="badge bg-danger mb-1">FLASH</span><h6><?= $f[0]?></h6><p>RM <?=number_format($f[2],2)?></p>
        <div class="flash-bar mb-1"><div id="bar<?= $i?>" class="flash-fill" style="width:<?= (($f[3]-$f[4])/$f[3])*100?>%"></div></div>
        <small>Stok <?= $f[4]?>/<?= $f[3]?></small><br>
        <a href="product.php?name=<?= urlencode($f[0])?>&price=<?= $f[2]?>&img=<?= $f[1]?>" class="btn btn-sm btn-primary mt-2">Tambah ke Troli</a>
        <div id="timer<?= $i?>" class="text-danger mt-1"></div>
        </div></div></div>
      </div>
      <script>
        let t<?=$i?>=<?= $f[5]?>, iv<?=$i?>=setInterval()()=>{
          (if(t<?=$i?><=0){clearInterval(iv<?=$i?>);document.getElementById('timer<?=$i?>').innerText='TAMAT';document.getElementById('bar<?=$i?>').style.width='0%'; return;}
          let m=Math.floor(t<?=$i?>)/60), s=t<?=$i?>%60; document.getElementById('timer<?=$i?>').innerText=`Tamat dalam ${m}:${s<10?'0'+s:s}`; document.getElementById('bar<?=$i?>').style.width=(t<?=$i?>/<?=$f[5]?>)*100+'%'; t<?=$i?>--;
        },1000);
      </script>
    <?php endforeach; ?>
  </div>
  <!-- Voucher Zone -->
  <h5>🎁 Klaim Baucar</h5>
  <div class="row mb-4">
    <?php
    $claimed = [];
    foreach(mysqli_query($conn,"SELECT code FROM user_vouchers WHERE user_id=$uid") as $x) $claimed[]=$x['code'];
    $allv = [['EASY10','10% diskaun atas RM30'],['GROCERY5','RM5 off atas RM50'],['OPEN5','RM5 off sempena pembukaan']];
    foreach($allv as $v): ?>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card card-pro p-3 text-center"><strong><?= $v[0]?></strong><p><?= $v[1]?></p>
        <?php if(in_array($v[0],$claimed)): ?>
          <button class="btn btn-secondary btn-sm disabled">Tuntut</button>
        <?php else: ?>
          <a href="claim_voucher.php?code=<?= $v[0]?>" class="btn btn-success btn-sm">Claim</a>
        <?php endif;?>
        </div>
      </div>
    <?php endforeach;?>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white py-4"><div class="container"><div class="row small mb-2">
    <div class="col">KHIDMAT PELANGGAN<ul class="list-unstyled"><li>Hubungi Kami</li><li>Cara Membeli</li></ul></div>
    <div class="col">TENTANG KAMI<ul><li>Tentang</li><li>Privasi</li></ul></div>
    <div class="col"><img src="assetsimg/payments.png" style="max-width:100px; height:auto;"></div>
    <div class="col">IKUTI KAMI<ul class="list-unstyled"><li>FB</li><li>IG</li></ul></div></div>
    <div class="text-center border-top pt-2">© 2025 Easy Grocer</div>
  </div></footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showPopup(){document.getElementById('popup-bg').style.display='block';document.getElementById('popup-card').style.display='block'}
function hidePopup(){document.getElementById('popup-bg').style.display='none';document.getElementById('popup-card').style.display='none'}
</script>
</body>
</html>
