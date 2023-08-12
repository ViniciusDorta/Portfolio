<?php
    if (isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT capa FROM `tb_site.noticias` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));
        $imagem = $selectImagem->fetch()['slide'];
        Painel::deleteFile($imagem);

        Painel::deletar('tb_site.noticias', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-noticias');
    }

    $noticias = Painel::selectAll('tb_site.noticias');
?>

<div class="box-content">
    <h1><i class="fa-solid fa-list-check"></i>Listar noticias</h1>
    <table>
        <thead>
            <tr>
                <th width="40%">Imagem</th>
                <th width="30%">Titulo</th>
                <th width="20%">Categoria</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <?php 
            foreach ($noticias as $key => $value) { 
                $nomeCategoria = Painel::select('tb_site.categorias', 'id=?', array($value['id_categoria']))['nome'];
        ?>
            <tbody>
                <tr>
                    <td><img style="width:auto; max-height:200px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa']; ?>" /></td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $nomeCategoria; ?></td>
                    <td>
                        <div class="btn-acoes">
                            <a class="editar" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticias?id=<?php echo $value['id'] ?>" id="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="excluir" actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-noticias?excluir=<?php echo $value['id'] ?>" id="btn-excluir"><i class="fa-solid fa-rectangle-xmark"></i></div></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>