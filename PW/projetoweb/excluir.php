<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Produtos</title>
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
            margin: 20px;
        }
        h1, h3 {
            text-align: center;
        }
        form, fieldset {
            max-width: 500px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }
        legend {
            font-weight: bold;
            font-size: 1.2em;
        }
        input[type="text"] {
            padding: 8px;
            width: calc(100% - 18px);
            box-sizing: border-box;
        }
        .buttons-container {
            text-align: center;
            margin-top: 20px;
        }
        .buttons-container input, .buttons-container button {
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #f44336;
            color: white;
        }
        input[type="reset"] {
            background-color: #ddd;
            color: #333;
        }
        .message {
            margin-top: 20px;
            text-align: center;
            font-size: 1.2em;
        }
        .back-button-container {
            text-align: center;
            margin-top: 30px;
        }
        .back-button-container button {
            background-color: #555;
        }
        .back-button-container a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>Exclusão de Produtos Cadastrados</h1>

    <form name="cliente" method="POST" action="">
        <fieldset>
            <legend>Informe o ID do produto desejado:</legend>
            <label for="txtid">Id:</label>
            <input name="txtid" id="txtid" type="text" size="20" maxlength="5" placeholder="Id do Produto">
            <div class="buttons-container">
                <input name="btnenviar" type="submit" value="Excluir">
                <input name="limpar" type="reset" value="Limpar">
            </div>
        </fieldset>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnenviar'])) {
        // Assegura que o script seja executado apenas quando o formulário for enviado via POST

        // Inclui a classe Produto.php apenas se o botão de envio foi clicado
        include_once 'Produto.php';

        $id = filter_input(INPUT_POST, 'txtid', FILTER_SANITIZE_NUMBER_INT);
        // Usa filter_input para uma maneira mais segura de obter dados do POST.

        if ($id) {
            $p = new Produto();
            $p->setId($id);
            $mensagem = $p->exclusao();
            echo "<fieldset class='message'><legend>Resultado:</legend><h3>" . htmlspecialchars($mensagem) . "</h3></fieldset>";
        } else {
            echo "<fieldset class='message'><legend>Resultado:</legend><h3>Por favor, insira um ID válido.</h3></fieldset>";
        }
    }
    ?>

    <div class="back-button-container">
        <button><a href="menu.html">Voltar</a></button>
    </div>

</body>
</html>