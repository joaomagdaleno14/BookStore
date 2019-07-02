<?php
include_once '../model/Cliente.php';
include_once '../common/respostas.php';

class ClienteDao extends Cliente{


    public function inserir( Cliente $Cliente) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO cliente (Nome, Sobrenome, CPF, Dt_Nascimento, Telefone, Email, Senha) VALUES (:Nome, :Sobrenome, :CPF, :Dt_Nascimento, :Telefone, :Email, :Senha)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":Nome",$Cliente->getNome());
            $preparedStatment->bindValue(":Sobrenome",$Cliente->getSobrenome());
            $preparedStatment->bindValue(":CPF",$Cliente->getCPF());
            $preparedStatment->bindValue(":Dt_Nascimento",$Cliente->getDt_Nascimento());
            $preparedStatment->bindValue(":Telefone",$Cliente->getTelefone());
            $preparedStatment->bindValue(":Email",$Cliente->getEmail());
            $preparedStatment->bindValue(":Senha",$Cliente->getSenha());
            $preparedStatment->execute();
            $connection->commit();
           return SUCESSO;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
    
    public function listar() {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT * FROM cliente";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetch(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function listarunico($obj) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT * FROM cliente WHERE id=$obj";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetch(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function update(Cliente $Cliente) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "UPDATE cliente SET
            Nome = :Nome, Sobrenome = :Sobrenome, CFP = :CPF, Dt_Nascimento = :Dt_Nascimento, Telefone = :Telefone, Email = :Email, Senha = :Senha WHERE ID = :id";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":id",$Cliente->getid());
            $preparedStatment->bindValue(":Nome",$Cliente->getNome());
            $preparedStatment->bindValue(":Sobrenome",$Cliente->getSobrenome());
            $preparedStatment->bindValue(":CPF",$Cliente->getCPF());
            $preparedStatment->bindValue(":Dt_Nascimento",$Cliente->getDt_Nascimento());
            $preparedStatment->bindValue(":Telefone",$Cliente->getTelefone());
            $preparedStatment->bindValue(":Email",$Cliente->getEmail());
            $preparedStatment->bindValue(":Senha",$Cliente->getSenha());
            $preparedStatment->execute();
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
}
