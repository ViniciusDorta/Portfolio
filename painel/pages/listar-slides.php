<?php
    if (isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site.slides` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));
        $imagem = $selectImagem->fetch()['slide'];
        Painel::deleteFile($imagem);

        Painel::deletar('tb_site.slides', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    }

    $slides = Painel::selectAll('tb_site.slides');
?>

<div class="box-content">
    <h1><i class="fa-solid fa-list-check"></i>Listar slide</h1>
    <table>
        <thead>
            <tr>
                <th width="40%">Imagem</th>
                <th width="50%">Nome</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <?php foreach ($slides as $key => $value) { ?>
            <tbody>
                <tr>
                    <td><img style="width:auto; height:150px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>" /></td>
                    <td><?php echo $value['nome']; ?></td>
                    <td>
                        <div class="btn-acoes">
                            <a class="editar" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slides?id=<?php echo $value['id'] ?>" id="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="excluir" actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id'] ?>" id="btn-excluir"><i class="fa-solid fa-rectangle-xmark"></i></div></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>