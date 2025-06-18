<?php
session_start();
include "db.php";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
if (mysqli_num_rows($result) == 1) {
  $_SESSION['user'] = mysqli_fetch_assoc($result);
  header("Location: home.php");
} else {
  header("Location: login.php?error=Maklumat tidak sah");
}
?>
