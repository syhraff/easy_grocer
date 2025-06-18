<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$uid = $_SESSION['user']['id'];
$code = $_GET['code'] ?? '';

$exists = mysqli_query($conn, "SELECT * FROM user_vouchers WHERE user_id=$uid AND code='".mysqli_real_escape_string($conn,$code)."'");
if(mysqli_num_rows($exists)==0){
  $desc = ($code=='OPEN5')?'RM5 off sempena pembukaan':'';
  mysqli_query($conn, "INSERT INTO user_vouchers(user_id,code,description) VALUES($uid,'$code','$desc')");
}
header("Location: home.php");
exit();
