<?php
    if (isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $categorias = Painel::select('tb_site.categorias', 'id = ?', array($id));
        if (isset($_POST['acao'])) {
            $slug = Painel::generateSlug($_POST['nome']);
            $arr = array_merge($_POST, array('slug'=>$slug));
            $verificar = Painel::verificaSlug($_POST['nome'], $id);
            if($verificar->rowCount() == 1){
                if (Painel::update($arr)){
                    Painel::alert('sucesso', 'Categoria atualizado com sucesso!');
                    $categorias = Painel::select('tb_site.categorias', 'id = ?', array($id));
                } else {
                    Painel::alert('erro', 'Preencha todos os campos!');
                }
            }
        }
    } else {
        Painel::alert('erro', 'Você precisa passar o pârametro ID.');
        die();
    }
?>

<div class="box-content">
    <h1><i class="fa-solid fa-file-pen"></i>Editar categoria</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" value="<?php echo $categorias['nome']; ?>" name="nome" placeholder="Categoria..."/>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="nome_tabela" value="tb_site.categorias" />
            <input type="submit" name="acao" value="Atualizar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
