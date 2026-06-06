<?php
require_once("Produto.php");

$pro = new Produto();
$lista = $pro->listar();
?>

<h2>Lista de Produtos</h2>
<table border="1">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Preço</th>
    </tr>
    <?php
    foreach ($lista as $pro_mostrar) {
        echo "<tr>";
        echo "<td>" . $pro_mostrar[0] . "</td>";
        echo "<td>" . $pro_mostrar[1] . "</td>";
        echo "<td>" . $pro_mostrar[2] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
