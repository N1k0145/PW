<?php
include_once 'Produto.php';
$produto = new Produto();
$produtos = $produto->listar();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="produtos.css">
    <title>Listar Produtos</title>
</head>
<body>
    <h1>Produtos Cadastrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estoque</th>
        </tr>
        <?php foreach ($produtos as $prod): ?>
        <tr>
            <td><?= $prod['id'] ?></td>
            <td><?= $prod['nome'] ?></td>
            <td><?= $prod['estoque'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="menu.html">Voltar</a>

     
</body>
</html>