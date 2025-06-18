<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$uid=$_SESSION['user']['id'];
$total=$_POST['total'];$voucher=$_POST['voucher'];$items=json_decode($_POST['items'],true);
$fn=$_POST['fullname'];$ph=$_POST['phone'];$ad=$_POST['address'];
$stmt=$conn->prepare("INSERT INTO orders(user_id,fullname,phone,address,total,voucher,payment_date) VALUES(?,?,?,?,?,?,NOW())");
$stmt->bind_param("issids",$uid,$fn,$ph,$ad,$total,$voucher);$stmt->execute();
$order_id=$conn->insert_id; $stmt->close();
// BUAANGGGGG KT BWHHH
foreach($items as $id){
  mysqli_query($conn,"DELETE FROM cart WHERE id=".intval($id));
}
header("Location: success.php?id=$order_id");
exit();
