<?php
include_once '../model/Cliente.php';
include_once '../common/respostas.php';

class ClienteDao extends Cliente{


    public function inserir( Cliente $Cliente) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO cliente (NomeCliente, Sobrenome, CPF, Dt_Nascimento, Telefone, Email, Senha, Status) VALUES (:NomeCliente, :Sobrenome, :CPF, :Dt_Nascimento, :Telefone, :Email, :Senha, :confirmation)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":NomeCliente",$Cliente->getNomeCliente());
            $preparedStatment->bindValue(":Sobrenome",$Cliente->getSobrenome());
            $preparedStatment->bindValue(":CPF",$Cliente->getCPF());
            $preparedStatment->bindValue(":Dt_Nascimento",$Cliente->getDt_Nascimento());
            $preparedStatment->bindValue(":Telefone",$Cliente->getTelefone());
            $preparedStatment->bindValue(":Email",$Cliente->getEmail());
            $preparedStatment->bindValue(":Senha",$Cliente->getSenhaHash());            
            $preparedStatment->bindValue(":confirmation",'test');
            $response = $preparedStatment->execute();
            $connection->commit();
            if($response){
                return true;
            }
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function inserirToken( Cliente $Cliente) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO confirmation (Email,Token) VALUES (:Email, :Token)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":Email",$Cliente->getEmail());
            $preparedStatment->bindValue(":Token",$Cliente->getToken());
            $resultado = $preparedStatment->execute();
            $connection->commit();
            
            if($resultado){
                return true;
            }
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }


    
    public function listarFetchAll() {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql =  "SELECT * FROM cliente";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetchAll(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return false;
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
            $sql =  "SELECT * FROM cliente";
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
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function selectsenha(){
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql =  "SELECT Senha FROM cliente";
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
            return false;
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

    public function validarIssetEmail(Cliente $Cliente){
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT * FROM cliente WHERE Email = :Email";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":Email",$Cliente->getEmail());
            $preparedStatment->execute();
            $resultado=$preparedStatment->fetch(PDO::FETCH_ASSOC);
            $connection->commit();

            if($resultado){
                return true;

            }
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return false;
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
            $preparedStatment->bindValue(":Senha",$Cliente->getSenhaHash());
            $resultado=$preparedStatment->execute();
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

    public function delete(Cliente $Cliente) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "DELETE FROM Cliente WHERE ID = :ID";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":ID",$Cliente->getId());
            $resultado=$preparedStatment->execute();
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
