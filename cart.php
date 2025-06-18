<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
$user = $_SESSION['user'];
$uid = $user['id'];

$result = mysqli_query($conn, "SELECT * FROM cart WHERE user_id=$uid");
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Troli Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
    .cart-box { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 1px 6px rgba(0,0,0,0.05); }
    .remove-btn { font-size: 12px; padding: 4px 8px; }
  </style>
</head>
<body class="p-4">

<div class="container">
  <h3 class="mb-4">🛒 Troli Anda</h3>
  <div class="cart-box">
    <form method="post" action="checkout.php">
      <ul class="list-group mb-3">
        <?php while($row = mysqli_fetch_assoc($result)): 
          $sub = $row['price'] * $row['quantity'];
          $total += $sub;
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkout_items[]" value="<?= $row['id'] ?>" checked>
            <label class="form-check-label"><?= $row['product_name'] ?> x <?= $row['quantity'] ?></label>
            <br><small class="text-muted">RM <?= number_format($row['price'],2) ?> / item</small>
          </div>
          <div class="text-end">
            <span>RM <?= number_format($sub, 2) ?></span><br>
            <a href="remove_cart.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm remove-btn mt-1">Buang</a>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>

      <h5 class="text-end">Jumlah: <b>RM <?= number_format($total, 2) ?></b></h5>
      <div class="text-end mt-3">
        <button class="btn btn-success px-4">Checkout Sekarang</button>
      </div>
    </form>
  </div>
</div>
<?php
$uid = $_SESSION['user']['id'];
$res = mysqli_query($conn, "SELECT * FROM user_vouchers WHERE user_id=$uid");
?>

<label>Baucar:</label>
<select name="voucher" class="form-select mb-3">
  <option value="">Tiada</option>
  <?php while ($v = mysqli_fetch_assoc($res)): ?>
    <option value="<?= $v['code'] ?>"><?= $v['code'] ?> - <?= $v['description'] ?></option>
  <?php endwhile; ?>
</select>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php if (isset($_SESSION['added'])): ?>
  <script>
    alert("✅ <?= $_SESSION['added'] ?> telah dimasukkan ke dalam troli!");
  </script>
  <?php unset($_SESSION['added']); ?>
<?php endif; ?>

</body>
</html>
