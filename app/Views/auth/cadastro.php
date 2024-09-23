<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Cadastro | AutoView 3D</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">
    <style type="text/css">
        .form-label-group {
            margin-bottom: 25px;
        }

        .form-label-group input {
            border-radius: 0;
        }

        button.btn.btn-lg.btn-primary.btn-block {
            background-color: #57a6c7;
            border: none;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <form class="form-signin" method="post" action="<?php echo base_url('auth/cadastrar'); ?>">
        <div class="text-center mb-4">
            <h1>Cadastro</h1>
            <img src="<?php echo base_url('assets/images/cadastro.png'); ?>" style="max-width: 220px;padding: 20px 0px;">
        </div>

        <div class="form-label-group">
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome Completo" autocomplete="name" required
                autofocus>
            <label for="nome">Nome Completo</label>
        </div>

        <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="email" required
                autofocus>
            <label for="email">Email</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="senha" name="senha" class="form-control" autocomplete="current-password" placeholder="Senha" required>
            <label for="senha">Senha</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="confirma_senha" name="confirma_senha" class="form-control" autocomplete="current-password" placeholder="Confirmar Senha" required>
            <label for="confirma_senha">Confirmar Senha</label>
        </div>




        <button class="mb-3 btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
        <p class="mb-3 text-center"><a href="<?php echo base_url('auth/login') ?>" class="mb-3 text-center">Já tenho uma conta</a></p>
        <p class="mt-5 mb-3 text-muted text-center">&copy;AutoView3D <?php echo date("Y"); ?></p>
    </form>

    <script>
        document.querySelector('button[type="submit"]').addEventListener('click', function() {
            this.innerHTML = '<l-square size="20" stroke="5" stroke-length="0.25" bg-opacity="0.1" speed="0.7" color="white" ></l-square>';

        });
    </script>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/square.js"></script>

    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/waveform.js"></script>
</body>

</html>