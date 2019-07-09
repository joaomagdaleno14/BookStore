<?
include_once '../dao/PacienteDao.php';
    include_once '../common/respostas.php';
    if (isset($_GET['id'])){                        
        $obj= new ClienteDao();
        $resultado = $obj->delete($_GET['id']);
        if ($resultado == SUCESSO){
            echo "Não foi eliminado";
        } else {
            $resultado=$obj->delete($_GET['id']);
            if($resultado){
                echo "eliminado!";
            }
        }