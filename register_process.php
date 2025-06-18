<?php
include "db.php";

$fullname = $_POST['fullname'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm'] ?? '';

if ($password !== $confirm) {
  header("Location: register.php?error=Kata laluan tidak sepadan");
  exit();
}

$check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
  header("Location: register.php?error=Email telah digunakan");
  exit();
}

$sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
$insert = mysqli_query($conn, $sql);

if ($insert) {
  // Lepas daftar, pergi ke login
  header("Location: login.php?success=Berjaya daftar. Sila log masuk.");
} else {
  header("Location: register.php?error=Ralat pendaftaran");
}
?>
