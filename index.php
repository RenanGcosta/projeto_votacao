<?php

require_once('app/Models/Usuario.php');
require_once('app/Controllers/ControllerUsuario.php');

$usuarioDao = new ControllerUsuario();

if (
    !empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade']) && !empty($_POST['voto'])
) {
    $usuario = new Usuario($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['voto']);

    $usuario->validarDados();
    $usuarioDao->createUsuario($usuario);   //new usuario controller
    //$usuario->validarCpf($cpf);   
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Votação</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary p-5">
    <div class="container border border-2 rounded-4 p-4 shadow bg-white mb-5" style="max-width: 300px;">
        <form method="post">
            <h1 class="mb-3 fw-bold fs-3 text-center">VOTAÇÃO</h1>
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do eleitor</label>
                    <input type="text" name="nome" class="form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-3">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="text" name="idade" class="form-control form-control-lg bg-light" value="" required>
                </div>
            </div>

            <div class="mt-2 mb-3">
                <label for="Bill_gates">
                    <img src="imagens/bill-gates.jpg" alt="imagem do Bill gates" height="50px" width="50px">
                    <input class="form-check-input mt-3" type="radio" name="voto" id="Bill_gates" value="999" required> Bill Gates
                </label>
            </div>

            <div>
                <label for="Mark_zuckerberg">
                    <img src="imagens/mark-zuckerberg.jpg" alt="imagem do Mark Zuckerberg" height="50px" width="50px">
                    <input class="form-check-input mt-3" type="radio" name="voto" id="Mark_zuckerberg" value="888" required> Mark Zuckerberg
                </label>
            </div>

            <div class="d-grid mt-3 mb-4">
                <input type="submit" value="VOTAR" class="btn btn-primary btn-lg">
            </div>
        </form>
    </div>

    <div class="text-center d-grid gap-2">
        <a href="relatorio.php" target="_blank" class="btn btn-primary">VISUALIZAR RESULTADOS</a>
    </div>

</body>

</html>