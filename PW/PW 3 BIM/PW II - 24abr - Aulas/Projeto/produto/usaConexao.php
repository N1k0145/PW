<?php

      try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->pass
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
require_once 'classeConexao.php';

$conexao = new Conexao();
$pdo = $conexao->getPdo();

$stmt = $pdo->query("SELECT * FROM cursos"); // Ajuste o nome da tabela conforme seu banco
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($dados);
echo "</pre>";
?>
