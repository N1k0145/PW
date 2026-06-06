<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Consulta</title>
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        fieldset {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }
        legend {
            font-weight: bold;
            font-size: 1.2em;
        }
        .product-result {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .product-result:last-child {
            border-bottom: none;
        }
        .product-info {
            font-size: 1.1em;
            margin: 5px 0;
        }
        .product-info span {
            font-weight: normal;
        }
        .back-button-container {
            text-align: center;
            margin-top: 30px;
        }
        .back-button-container button {
            padding: 10px 20px;
            background-color: #555;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .back-button-container a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>Resultado da Consulta de Produtos</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnenviar'])) {
        // Assegura que o script seja executado apenas quando o formulário for enviado via POST

        // Inclui a classe Produto.php apenas se o botão de envio foi clicado
        include_once 'Produto.php';

        // Usa filter_input para obter e sanitizar o nome do produto de forma segura
        $nome = filter_input(INPUT_POST, 'txtnome', FILTER_SANITIZE_STRING);

        // O 'o%' serve para busca aproximada, ou seja, começa com uma determinada letra
        $nome_busca = "%" . $nome . "%";

        $p = new Produto();
        $p->setNome($nome_busca);

        $pro_bd = $p->consultar(); // Chamada de método com retorno

        if ($pro_bd) {
            echo '<fieldset><legend>Resultado:</legend>';
            foreach ($pro_bd as $pro_mostrar) {
                echo '<div class="product-result">';
                echo '<p class="product-info"><b>ID:</b> <span>' . htmlspecialchars($pro_mostrar[0]) . '</span></p>';
                echo '<p class="product-info"><b>Nome:</b> <span>' . htmlspecialchars($pro_mostrar[1]) . '</span></p>';
                echo '<p class="product-info"><b>Estoque:</b> <span>' . htmlspecialchars($pro_mostrar[2]) . '</span></p>';
                echo '</div>';
            }
            echo '</fieldset>';
        } else {
            echo '<fieldset><legend>Resultado:</legend><p>Nenhum produto encontrado com o nome ' . htmlspecialchars($nome) . '.</p></fieldset>';
        }

    } else {
        // Se a página for acessada diretamente sem o formulário, redireciona ou exibe uma mensagem
        echo '<p style="text-align: center;">Por favor, use o formulário de consulta para buscar um produto.</p>';
    }
    ?>

    <div class="back-button-container">
        <button><a href="menu.html">Voltar</a></button>
    </div>

</body>
</html>