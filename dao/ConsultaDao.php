<?php
include_once '../model/Consulta.php';
include_once '../common/respostas.php';

class ConsultaDao extends Consulta {
    
    
    public function inserir( Consulta $consulta) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=sistemadentista;charset=utf8','root','');
            $connection->beginTransaction();
            $sql = "INSERT INTO consulta (Data, Paciente_ID, NomeDent, Tratamento, Situacao) VALUES (:Data, :Paciente_ID, :NomeDent, :Tratamento, :Situacao)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":Data",$consulta->getData());
            $preparedStatment->bindValue(":Paciente_ID",$consulta->getPaciente_ID());
            $preparedStatment->bindValue(":NomeDent",$consulta->getNomeDent());
            $preparedStatment->bindValue(":Tratamento",$consulta->getTratamento());
            $preparedStatment->bindValue(":Situacao",$consulta->getSituacao());
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

}
