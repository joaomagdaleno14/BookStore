<?php 
    include("../dao/TemaDao.php");
    include("Header.php");
?>

<div class="Content">
    <table class="Tabela">
    <h1>Seleção dos Temas<h1>
        <tr>
            <td>Nome</td>
            <td>Ações</td>
        </tr>

        <!---- Estrutura de Loop ------>

        <?php $Tema= new TemaDao();
            $BFetch=$Tema->listar();
            foreach($BFetch as $row){
        ?>
        <tr>
            <td><?php echo $row['Nome'];?></td>

            <td>
                <a href="<?php echo "editarTema.php?id=".$row['ID'].";"?>"><img src="../public/img/edit.png" alt="Editar"></a>
                <a class="Deletar" href="<?php echo "Controllers/ControllerDeleteTema.php?id={$row['ID']}"; ?>"><img src="../public/img/delete.png" alt="Deletar"></a>
            </td>


        </tr>

        <?php  
        }?>
    </table>
</div>

<?php 
    include("Footer.php")
?>