<?php
  session_start();
  if(!isset($_SESSION['acesso'])) header('location: index.php');
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reservas Públicas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>

    :root {
      --navy-main: #0a192f;
      --navy-light: #112240;
      --bg-light: #f0f2f5;
      --text-dark: #333333;
    }

    body { 
      background-color: var(--bg-light); 
      color: var(--text-dark); 
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;

      padding-bottom: 80px; 
      position: relative;
    }
    
    .navbar { 
      background-color: var(--navy-main) !important; 
      box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
    }
    .navbar-brand { font-weight: 700; letter-spacing: 0.5px; }
    .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500; }
    .nav-link:hover { color: #ffffff !important; }
    
    .btn-primary { 
      background-color: var(--navy-main); 
      border-color: var(--navy-main); 
    }
    .btn-primary:hover { 
      background-color: var(--navy-light);
      border-color: var(--navy-light); 
    }
    

    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px; 
        background-color: var(--navy-main);
        color: #8892b0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    }

    @media print { .no-print{ display: none !important; } }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark no-print">
    <div class="container">
      <a class="navbar-brand" href="principal.php">🏛️ Gestão Pública</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="principal.php">Dashboard</a></li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Cadastros</a>
            <ul class="dropdown-menu shadow">
              <li><a class="dropdown-item" href="espacos.php">Espaços</a></li>
              <li><a class="dropdown-item" href="eventos.php">Tipos de Eventos</a></li>
              <li><a class="dropdown-item" href="usuarios.php">Usuários</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="reservas.php">📅 Reservas</a></li>
        </ul>
        <div class="d-flex align-items-center text-white">
            <span class="me-3 small">Olá, <strong><?= $_SESSION['nome'] ?></strong></span>
            <a href="logout.php" class="btn btn-sm btn-outline-light">Sair</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container py-4">