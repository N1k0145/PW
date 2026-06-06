<?php

include_once 'Conectar.php';

class Produto
{
    private $id;
    private $nome;
    private $estoque;
    private $conn;



    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }
}

function salvar()
{
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into produto values (null, ?, ?)");
        $sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
        $sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
        
        if ($sql->execute() == 1)
        {
            return "Registro salvo com sucesso!!";
        }

        $this->conn = null;
    }
    catch (PDOException $exc)
    {
        echo "Erro ao salvar o registro: " . $exc->getMessage();
    }
}
function alterar()
{
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("select * from produto where id = ?"); // informa o ? (parâmetro)
        $sql->bindParam(1, $this->getId(), PDO::PARAM_STR); // define o parâmetro
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc)
    {
        echo "Erro ao alterar: " . $exc->getMessage();
    }
}

function altera2()
{
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("update produto set nome = ?, estoque = ? where id = ?");
        $sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
        $sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
        $sql->bindParam(3, $this->getId(), PDO::PARAM_STR);

        if ($sql->execute() == 1)
        {
            return "Registro alterado com sucesso!";
        }

        $this->conn = null;
    }
    catch (PDOException $exc)
    {
        echo "Erro ao salvar o registro: " . $exc->getMessage();
    }
}


function consultar()
{
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("select * from produto where nome like ?"); // informa o ?
        $sql->bindParam(1, $this->getNome(), PDO::PARAM_STR); // define o parâmetro
        // Se quiser buscar por parte do nome, descomente a linha abaixo:
        // $sql->bindParam(1, $this->getNome() . "%", PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc)
    {
        echo "Erro ao executar consulta: " . $exc->getMessage();
    }
}

function exclusao()
{
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("delete from produto where id = ?"); // informa o ? (parâmetro)
        $sql->bindParam(1, $this->getId(), PDO::PARAM_STR); // define o parâmetro

        if ($sql->execute() == 1)
        {
            return "Excluído com sucesso!";
        }
        else
        {
            return "Erro na exclusão!";
        }

        $this->conn = null;
    }
    catch (PDOException $exc)
    {
        echo "Erro ao excluir: " . $exc->getMessage();
    }
}

function listar()
{
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->query("select * from produto order by nome");
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc)
    {
        echo "Erro ao executar consulta: " . $exc->getMessage();
    }
}