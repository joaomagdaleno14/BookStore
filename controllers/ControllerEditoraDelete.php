<?
include_once '../dao/EditoraDao.php';
    include_once '../common/respostas.php';
    if (isset($_GET['id'])){                        
        $Editora = new EditoraDao();
        $Editora = $_GET['id'];
        $resultado = $obj->delete($Editora);
        if ($resultado == SUCESSO){
            echo "Não foi eliminado";
        } else {
            $resultado=$Editora->delete($_GET['id']);
            if($resultado){
                echo "eliminado!";
            }
        }
    }