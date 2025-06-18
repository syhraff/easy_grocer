<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$uid=$_SESSION['user']['id'];
$items = $_POST['checkout_items'] ?? [];
$voucher = $_POST['voucher'] ?? '';
$total=0;$data=[];
if($items){
  $in=implode(',',array_map('intval',$items));
  $res=mysqli_query($conn,"SELECT * FROM cart WHERE user_id=$uid AND id IN($in)");
  while($r=mysqli_fetch_assoc($res)){
    $data[]=$r;
    $total+=$r['price']*$r['quantity'];
  }
}
$discount = ($voucher=='EASY10'&&$total>=30)?$total*0.1:(($voucher=='GROCERY5'&&$total>=50)?5:0);
$final = $total-$discount;
?>
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8"><title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>body{font-family:'Segoe UI',sans-serif;background:#f7faff}.box{background:white;padding:20px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.05)}</style>
</head>
<body class="p-4">
<div class="container">
  <h3 class="mb-4">🧾 Checkout</h3>
  <div class="box">
    <ul class="list-group mb-3">
      <?php foreach($data as $i): ?>
      <li class="list-group-item d-flex justify-content-between">
        <div><?= htmlspecialchars($i['product_name']) ?> x <?= $i['quantity'] ?>
          <?php if($i['specification']): ?><br><small><?= htmlspecialchars($i['specification']) ?></small><?php endif; ?>
        </div>
        <div>RM <?= number_format($i['price']*$i['quantity'],2) ?></div>
      </li>
      <?php endforeach; ?>
    </ul>
    <p>Jumlah: RM <?= number_format($total,2) ?></p>
    <p>Baucar: <?= $voucher ?: 'Tiada' ?></p>
    <p>Diskaun: - RM <?= number_format($discount,2) ?></p>
    <h5>Total Bayar: RM <?= number_format($final,2) ?></h5>

    <form method="post" action="payment_process.php" class="mt-4">
      <input type="hidden" name="total" value="<?= $final ?>">
      <input type="hidden" name="voucher" value="<?= $voucher ?>">
      <input type="hidden" name="items" value='<?= json_encode($items) ?>'>

      <h6>Maklumat Pembayaran & Penghantaran</h6>
      <input type="text" name="fullname" class="form-control mb-2" placeholder="Nama Penuh" required>
      <input type="text" name="phone" class="form-control mb-2" placeholder="Telefon" required>
      <input type="text" name="address" class="form-control mb-2" placeholder="Alamat" required>
      <input type="text" name="card" class="form-control mb-2" placeholder="Nombor Kad (16 digit)" required>
      <div class="row mb-2">
        <div class="col"><input type="text" name="exp_month" class="form-control" placeholder="MM" required></div>
        <div class="col"><input type="text" name="exp_year" class="form-control" placeholder="YY" required></div>
        <div class="col"><input type="text" name="cvv" class="form-control" placeholder="CVV" required></div>
      </div>
      <button class="btn btn-success w-100">Bayar Sekarang</button>
    </form>
  </div>
</div>
</body>
</html>
