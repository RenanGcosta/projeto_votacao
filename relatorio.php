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
    <title>RESULTADOS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2 class="text-center">Banco de Votação</h2>
    <?php if ($usuarioDao->readUsuario()) { ?>

        <div class="container">
            <h1 class="text-white">Registros</h1>
            <table class="table table-success table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Idade</th>
                        <th>Candidato</th>
                        <th>Data Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarioDao->readUsuario() as $usuarios) { ?>
                        <tr>
                            <td><?php echo $usuarios["nome"]; ?></td>
                            <td><?php echo $usuarios["cpf"]; ?></td>
                            <td><?php echo $usuarios["idade"]; ?></td>
                            <td><?php echo $usuarios["voto"]; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($usuarios["data_registro"])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } ?>

</body>

</html>