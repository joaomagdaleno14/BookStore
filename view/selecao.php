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
        ?>
        <tr>
            <td><?php echo $BFetch['Nome'];?></td>
            <td><?php echo $BFetch['Sobrenome'];?></td>
            <td><?php echo $BFetch['CPF'];?></td>
            <td><?php echo $BFetch['Dt_Nascimento'];?></td>
            <td><?php echo $BFetch['Telefone'];?></td>
            <td><?php echo $BFetch['Email'];?></td>
            <td><?php echo $BFetch['Senha'];?></td>

            <td>
                <a href="<?php echo "Visualizar.php?id=".$BFetch['ID'].";" ?>"><img src="Images/search.png" alt="Visualizar"></a>
                <a href="<?php echo "Cadastro.php?id=".$BFetch['ID'].";"?>"><img src="Images/edit.png" alt="Editar"></a>
                <a class="Deletar" href="<?php echo "Controllers/ControllerDelete.php?id={$BFetch['ID']}"; ?>"><img src="Images/delete.png" alt="Deletar"></a>
            </td>


        </tr>

        <?php  
        //} 
                    ?>
    </table>
</div>

<?php 
    include("Footer.php")
?>