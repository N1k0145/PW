<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página do Usuário</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
