<?
include_once '../dao/TemaDao.php';
    include_once '../common/respostas.php';
    if (isset($_GET['id'])){                        
        $Tema = new TemaDao();
        $Tema = $_GET['id'];
        $resultado = $Tema->delete($Tema);
        if ($resultado == SUCESSO){
            echo "Não foi eliminado";
        } else {
            $resultado=$Tema->delete($_GET['id']);
            if($resultado){
                echo "eliminado!";
            }
        }
    }