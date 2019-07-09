<?php 
    include("../dao/ClienteDao.php");
    include("Header.php");
?>

<div class="Content">
    <table class="Tabela">
    <h1>Seleção dos Clientes<h1>
        <tr>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>CPF</td>
            <td>Data de Nascimento</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>Senha</td>
            <td>Ações</td>
        </tr>

        <!---- Estrutura de Loop ------>

        <?php $Cliente= new ClienteDao();
            $BFetch=$Cliente->listar();


            foreach($BFetch as $row){
        ?>
        <tr>
            <td><?php echo $row['Nome'];?></td>
            <td><?php echo $row['Sobrenome'];?></td>
            <td><?php echo $row['CPF'];?></td>
            <td><?php echo $row['Dt_Nascimento'];?></td>
            <td><?php echo $row['Telefone'];?></td>
            <td><?php echo $row['Email'];?></td>
            <td><?php echo $row['Senha'];?></td>

            <td>
                <a href="<?php echo "editar.php?id=".$row['ID'].";"?>"><img src="../public/img/edit.png" alt="Editar"></a>
                <a class="Deletar" href="<?php echo "Controllers/ControllerDelete.php?id={$row['ID']}"; ?>"><img src="../public/img/delete.png" alt="Deletar"></a>
            </td>


        </tr>

        <?php  
        }?>
    </table>
</div>

<?php 
    include("Footer.php")
?>