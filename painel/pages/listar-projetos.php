<?php
    $projetos = Painel::selectAll('tb_site.projetos');
?>

<div class="box-content">
    <h1><i class="fa-solid fa-list-check"></i>Listar Projetos</h1>
    <h3><span>Listando os Projetos</span></h3>

    <table>
        <tr>
            <td>Projeto</td>
            <td>Link</td>
            <td>Descrição</td>
            <td>Ações</td>
        </tr>
        <?php
            foreach ($projetos as $key => $value) {
        ?>
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><?php echo $value['link']; ?></td>
                <td><?php echo $value['descricao']; ?></td>
                <td id="btn-acoes"></td>
            </tr>
        <?php } ?>
    </table>
</div>