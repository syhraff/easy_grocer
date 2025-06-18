<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

$uid = $_SESSION['user']['id'];

// CLAIM VOUCERR
$available = [
  ['code' => 'EASY10', 'description' => 'Diskaun 10% atas RM30'],
  ['code' => 'GROCERY5', 'description' => 'Diskaun RM5 atas RM50'],
  ['code' => 'PENGHANTARAN', 'description' => 'Penghantaran Percuma'],
];

$claimed = [];
$result = mysqli_query($conn, "SELECT code FROM user_vouchers WHERE user_id=$uid");
while ($row = mysqli_fetch_assoc($result)) {
  $claimed[] = $row['code'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Claim Baucar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h3 class="mb-4">🎁 Senarai Baucar</h3>
  <div class="row">
    <?php foreach ($available as $v) { ?>
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $v['code']; ?></h5>
          <p class="card-text"><?php echo $v['description']; ?></p>
          <?php if (in_array($v['code'], $claimed)) { ?>
            <button class="btn btn-secondary" disabled>✅ Telah Ditebus</button>
          <?php } else { ?>
            <a href="claim_voucher.php?code=<?php echo $v['code']; ?>&desc=<?php echo urlencode($v['description']); ?>" class="btn btn-success">Claim</a>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
</body>
</html>
