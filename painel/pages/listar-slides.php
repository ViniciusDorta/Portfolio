<?php
    if (isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.projetos', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-projetos');
    }

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
                <td>
                    <div class="btn-acoes">
                        <a class="editar" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-projeto?id=<?php echo $value['id'] ?>" id="btn-editar"></a>
                        <a class="excluir" actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-projetos?excluir=<?php echo $value['id'] ?>" id="btn-excluir"></a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>