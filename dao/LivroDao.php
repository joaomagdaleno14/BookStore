<?php
include_once '../model/Livro.php';
include_once '../common/respostas.php';

class LivroDao extends Livro{


    public function inserir( Livro $Livro) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO Livro (NomeLivro, Ano_Publi, Preco, Descricao, ID_Editora, ID_Autor, Livro_Img) VALUES (:NomeLivro, :Ano_Publi, :Preco, :Descricao, :ID_Editora, :ID_Autor, :Livro_Img)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":NomeLivro",$Livro->getNomeLivro());
            $preparedStatment->bindValue(":Ano_Publi",$Livro->getAno_Publi());
            $preparedStatment->bindValue(":Preco",$Livro->getPreco());
            $preparedStatment->bindValue(":Descricao",$Livro->getDescricao());
            $preparedStatment->bindValue(":ID_Editora",$Livro->getID_Editora());
            $preparedStatment->bindValue(":ID_Autor",$Livro->getID_Autor());
            $preparedStatment->bindValue(":Livro_Img",$Livro->getLivro_Img());
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
    
    public function listarFetchAll() {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT *, Editora.NomeEditora, autor.NomeAutor FROM Livro join editora on Livro.ID_Editora = editora.ID join autor on livro.ID_Autor = autor.ID";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetchAll(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
            //var_dump($resultado);
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
            $sql = "SELECT * FROM Livro";
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
            $sql = "SELECT * FROM Livro WHERE ID = :Id";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":Id",$obj->getId());
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
}
