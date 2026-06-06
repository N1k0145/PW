<?php
require_once("classeConexao.php");

class Produto {
    private $codigo;
    private $nome;
    private $preco;

    public function getCodigo() { return $this->codigo; }
    public function setCodigo($codigo) { $this->codigo = $codigo; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getPreco() { return $this->preco; }
    public function setPreco($preco) { $this->preco = $preco; }

    public function listar() {
        global $con;
        try {
            $sql = $con->prepare("SELECT * FROM produto");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
        }
    }
}
?>
