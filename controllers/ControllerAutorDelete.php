<?
include_once '../dao/AutorDao.php';
    include_once '../common/respostas.php';
    if (isset($_GET['id'])){                        
        $Autor = new AutorDao();
        $Autor = $_GET['id'];
        $resultado = $obj->delete($Autor);
        if ($resultado == SUCESSO){
            echo "Não foi eliminado";
        } else {
            $resultado=$Autor->delete($_GET['id']);
            if($resultado){
                echo "eliminado!";
            }
        }
    }