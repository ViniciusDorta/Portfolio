<?php
    if (isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.projetos', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-projetos');
    }

    $projetos = Painel::selectAll('tb_site.projetos');
?>

<div class="box-content">
    <h1><i class="fa-solid fa-list-check"></i>Listar projetos</h1>
    <table>
        <thead>
            <tr>
                <th>Projeto</th>
                <th>Link</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
            foreach ($projetos as $key => $value) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $value['nome']; ?></td>
                    <td><?php echo $value['link']; ?></td>
                    <td><?php echo $value['descricao']; ?></td>
                    <td>
                        <div class="btn-acoes">
                            <a class="editar" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-projetos?id=<?php echo $value['id'] ?>" id="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="excluir" actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-projetos?excluir=<?php echo $value['id'] ?>" id="btn-excluir"><i class="fa-solid fa-rectangle-xmark"></i></div></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>