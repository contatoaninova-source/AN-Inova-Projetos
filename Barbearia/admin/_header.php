<?php
// inclui a conexão do root
require_once __DIR__ . '/../conexao.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin • Lopes Cortes</title>
  <link rel="icon" type="image/png" href="../assets/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#0f1113; color:#e5e7eb; }
    a, .page-link { text-decoration:none; }
    .card { background:#14171a; border-color:#1f2328; }
    .form-control, .form-select { background:#0f1113; color:#e5e7eb; border-color:#2a2f35; }
    .form-control:focus, .form-select:focus { box-shadow:none; border-color:#a4874f; }
    .btn-primary { background:#a4874f; border-color:#a4874f; }
    .btn-primary:hover { background:#8f7744; border-color:#8f7744; }
    .table { color:#e5e7eb; }
    .table thead th { color:#cbd5e1; }
    .table td, .table th { border-color:#1f2328; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background:#14171a;">
  <div class="container">
    <a class="navbar-brand text-light fw-bold" href="index.php">Admin • Lopes Cortes</a>
  </div>
</nav>
<main class="container py-4">
