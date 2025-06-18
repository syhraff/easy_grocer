<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Easy Grocer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #fff4e6, #ffffff);
      font-family: 'Segoe UI', sans-serif;
    }
    .header-bar {
      background: #ff5722;
      color: white;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .header-bar a {
      color: white !important;
    }
    .category-card, .product-card, .zon-box {
      border: none;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: all 0.2s ease-in-out;
    }
    .category-card:hover, .product-card:hover, .zon-box:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .btn-primary, .btn-success {
      background-color: #ff5722;
      border: none;
    }
    .btn-primary:hover, .btn-success:hover {
      background-color: #e64a19;
    }
    .progress-bar-flash {
      background-color: #ff5722;
    }
    .modal-content {
      border-radius: 10px;
      border: 2px solid #ff5722;
    }
    .footer {
      background: #ff5722;
      color: white;
      padding: 20px;
      margin-top: 50px;
    }
    .footer a {
      color: white;
      text-decoration: underline;
    }
  </style>
</head>
<body>
