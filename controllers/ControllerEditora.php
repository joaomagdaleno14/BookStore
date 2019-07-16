<?php 
    include_once '../model/Editora.php';
    include_once '../bl/EditoraBl.php';
    include_once '../common/respostas.php';
    require_once("model/Imagem.php");
    if (isset($_POST)){
        $Editora = new Editora();
        $Editora->setNome($_POST['Nome']);        
        $eBl = new EditoraBl();
        $resultado = $eBl->registrarEditora($Editora);
        
 
    $objImagem = new Upload;
    //chama o método que faz o upload da imagem
    $objImagem->uploadImagem("imagem","img/","adsdsa","image/jpg,image/jpeg,image/png");

        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>