<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Dashboard | AutoView 3D</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/css/app.css'); ?>" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>

    <div class="sidebar" id="sidebar">
        <br>
        <br>
        <h2>AutoView 3D <i class="ph ph-cube-transparent"></i></h2>
        <ul>
            <li><a href="<?php echo base_url(''); ?>"><i class="ph ph-house"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('veiculos'); ?>"><i class="ph ph-car"></i> Veiculos</a></li>
            <li><a href="<?php echo base_url('token'); ?>"><i class="ph ph-password"></i> Token</a></li>
            <li><a href="<?php echo base_url('conta'); ?>"><i class="ph ph-user"></i> Conta</a></li>
            <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="ph ph-sign-out"></i> Sair</a></li>
        </ul>
        <hr>
        <span>
            Inova Desenvolvimentos &copy; 2024
        </span>
    </div>