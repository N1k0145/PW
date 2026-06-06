<?php
// listar.php

// Inclui o arquivo da classe Produto
require_once 'Produto.php';

// Instancia a classe
$pro = new Produto();

// Executa o método listar e armazena o resultado
$resultados = $pro->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <!-- Se quiser estilizar com Bootstrap, inclua esta linha -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
    <h1>📋 Produtos Cadastrados</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $pro_mostrar): ?>
                <tr>
                    <td><?= htmlspecialchars($pro_mostrar[0]) ?></td>
                    <td><?= htmlspecialchars($pro_mostrar[1]) ?></td>
                    <td><?= htmlspecialchars($pro_mostrar[2]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>