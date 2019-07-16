<?php 
    include("../dao/EditoraDao.php");
    include("Header.php");
?>

<div class="Content">
    <table class="Tabela">
    <h1>Seleção das Editoras<h1>
        <tr>
            <td>Nome</td>
            <td>Img</td>
            <td>Ações</td>
        </tr>

        <!---- Estrutura de Loop ------>

        <?php $Editora= new EditoraDao();
            $BFetch=$Editora->listarFetchAll();
            foreach($BFetch as $row){
        ?>
        <tr>
            <td><?php echo $row['NomeEditora'];?></td>
            <td><?php echo $row['Img'];?></td>

            <td>
                <a href="<?php echo "editarEditora.php?id=".$row['ID'].";"?>"><img src="../public/img/edit.png" alt="Editar"></a>
                <a class="Deletar" href="<?php echo "Controllers/ControllerDeleteEditora.php?id={$row['ID']}"; ?>"><img src="../public/img/delete.png" alt="Deletar"></a>
            </td>


        </tr>

        <?php  
        }?>
    </table>
</div>

<?php 
    include("Footer.php")
?>