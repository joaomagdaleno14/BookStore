<?
include_once '../dao/ClienteDao.php';
    include_once '../common/respostas.php';
    if (isset($_GET['id'])){                        
        $Cliente = new ClienteDao();
        $Cliente = $_GET['id'];
        $resultado = $obj->delete($Cliente);
        if ($resultado == SUCESSO){
            echo "Não foi eliminado";
        } else {
            $resultado=$Cliente->delete($_GET['id']);
            if($resultado){
                echo "eliminado!";
            }
        }
    }