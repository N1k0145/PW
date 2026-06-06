<?php
include_once 'Conectar.php';

// Classe Produto

class Produto
{
    
    // Parte 1 - Atributos
    
    private $id;
    private $nome;
    private $estoque;
    private $conn;

    // Parte 2 - Getters e Setters

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    // Parte 3 - Métodos
    
    // Salvar novo produto

    public function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("INSERT INTO produto VALUES (NULL, ?, ?)");
            $sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            $sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);

            if ($sql->execute() == 1) {
                return "Registro salvo com sucesso!";
            }

            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }

    // Buscar produto por ID
    public function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM produto WHERE id = ?");
            $sql->bindParam(1, $this->getId(), PDO::PARAM_INT);
            $sql->execute();

            return $sql->fetchAll();

            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao buscar: " . $exc->getMessage();
        }
    }

    // Alterar produto existente
    public function alterar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("UPDATE produto SET nome = ?, estoque = ? WHERE id = ?");
            $sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            $sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            $sql->bindParam(3, $this->getId(), PDO::PARAM_INT);

            if ($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }

            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }

    public function consultar()
{
    try {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("SELECT * FROM produto WHERE nome LIKE ?");
        $sql->bindParam(1, $this->nome, PDO::PARAM_STR);

        // Adiciona o curinga % para buscar partes do nome
        $nomeBusca = "%" . $this->getNome() . "%";
        $sql->bindParam(1, $nomeBusca, PDO::PARAM_STR);

        $sql->execute();
        return $sql->fetchAll();

        $this->conn = null;
    } catch (PDOException $exc) {
        echo "Erro ao executar consulta: " . $exc->getMessage();
    }
}

    public function exclusao()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("DELETE FROM produto WHERE id = ?");
            $sql->bindParam(1, $this->getId(), PDO::PARAM_INT);

            if ($sql->execute() == 1) {
                return "Excluído com sucesso!";
            } else {
                return "Erro na exclusão!";
            }

            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao excluir: " . $exc->getMessage();
        }
    }

    function listar()
{
    try {
        $this->conn = new Conectar();

        $sql = $this->conn->query("select * from produto order by nome");

        $sql->execute();

        return $sql->fetchAll();

        $this->conn = null;
    } catch (PDOException $exc) {
        echo "Erro ao executar consulta. " . $exc->getMessage();
    }
}

// encerramento da classe Produto

}
?>
