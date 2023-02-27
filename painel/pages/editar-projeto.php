<?php
    if (isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $projeto = Painel::select('tb_site.projetos', 'id = ?', array($id));
        if (isset($_POST['acao'])) {
            if (Painel::update($_POST)){
                Painel::alert('sucesso', 'Projeto atualizado com sucesso!');
                $projeto = Painel::select('tb_site.projetos', 'id = ?', array($id));
            } else {
                Painel::alert('erro', 'Preencha todos os campos!');
            }
        }
    } else {
        Painel::alert('erro', 'Você precisa passar o pârametro ID.');
        die();
    }
?>

<div class="box-content">
    <h1><i class="fa-solid fa-file-pen"></i>Editar Projetos</h1>
    <h3><span>Edição de Projetos</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" value="<?php echo $projeto['nome']; ?>" name="nome_projeto" placeholder="Nome do Projeto..."/>
        </div>
        <div class="form-group">
            <input type="text"  value="<?php echo $projeto['link']; ?>" name="link_projeto" placeholder="Link do Projeto..."/>
        </div>
        <div class="form-group">
            <textarea name="descricao_projeto" value="<?php echo $projeto['descricao']; ?>" cols="30" rows="10" placeholder="Descreva um pouco sobre o Projeto..."></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="<?php echo $id; ?>" />
            <input type="hidden" name="nome_tabela" value="tb_site.projetos" />
            <input type="submit" name="acao" value="Atualizar Projeto" />
        </div>
        <div class="clear"></div>
    </form>
</div>
