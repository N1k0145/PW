<?php
include_once 'Conectar.php';

class Produto {
    private $id;
    private $nome;
    private $estoque;

     
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }
    public function getEstoque() { return $this->estoque; }
    public function setEstoque($estoque) { $this->estoque = $estoque; }

    
    public function listar() {
        try {
            $conn = Conectar::getInstance();
            $sql = $conn->prepare("SELECT * FROM produtos ORDER BY nome");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
            return [];
        }
    }
}
?>