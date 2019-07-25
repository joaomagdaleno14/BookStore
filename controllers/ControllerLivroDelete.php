<?
include_once '../dao/LivroDao.php';
    include_once '../common/respostas.php';
    if (isset($_GET['id'])){                        
        $Livro = new LivroDao();
        $Livro = $_GET['id'];
        $resultado = $obj->delete($Livro);
        if ($resultado == SUCESSO){
            echo "Não foi eliminado";
        } else {
            $resultado=$Livro->delete($_GET['id']);
            if($resultado){
                echo "eliminado!";
            }
        }
    }