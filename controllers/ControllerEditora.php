<?php 
    include_once '../model/Editora.php';
    include_once '../bl/EditoraBl.php';
    include_once '../common/respostas.php';
    include_once "../model/Imagem.php";
    if (isset($_POST)){
        $Editora = new Editora();
        $Editora->setNome($_POST['Nome']);        
        $eBl = new EditoraBl();
        $resultado = $eBl->registrarEditora($Editora);
        
        $imagem = $_FILES["imagem"];
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "bookstore";
 
    if($imagem != NULL) { 
    $nomeFinal = time().'.jpg';
    if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
        $tamanhoImg = filesize($nomeFinal); 
 
        $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
 
        mysql_connect($host,$username,$password) or die("Impossível Conectar"); 
 
        @mysql_select_db($db) or die("Impossível Conectar"); 
 
        mysql_query("INSERT INTO Editora (Img) VALUES ('$mysqlImg')") or
        die("O sistema não foi capaz de executar a query"); 
 
        unlink($nomeFinal);
         
        header("location:exibir.php");
        }
    } 
    else { 
        echo"Você não realizou o upload de forma satisfatória."; 
    } 
    
        
        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>