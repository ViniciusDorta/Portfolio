<?php
    if (isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.extras', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-extras');
    }

    $extras = Painel::selectAll('tb_site.extras');
?>

<div class="box-content">
    <h1><i class="fa-solid fa-list-check"></i>Listar conhecimentos extras</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th width="100px">Ações</th>
            </tr>
        </thead>
        <?php
            foreach ($extras as $key => $value) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['conhecimento']; ?></td>
                    <td>
                        <div class="btn-acoes">
                            <a class="editar" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-extras?id=<?php echo $value['id'] ?>" id="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="excluir" actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-extras?excluir=<?php echo $value['id'] ?>" id="btn-excluir"><i class="fa-solid fa-rectangle-xmark"></i></div></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>