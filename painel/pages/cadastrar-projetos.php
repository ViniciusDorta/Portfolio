<?php
    if (isset($_POST['acao'])){
        if (Painel::insert($_POST)){ 
            Painel::alert('sucesso', 'Cadastro do projeto foi realizado com sucesso!');
        } else {
            Painel::alert('erro', 'Preencha todos os campos!');
        }
    }
?>

<div class="box-content">
    <h1><i class="fa-solid fa-folder-plus"></i>Cadastrar Projetos</h1>
    <h3><span>Adicionar Novo Projeto</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nome_projeto" placeholder="Nome do Projeto..."/>
        </div>
        <div class="form-group">
            <input type="text" name="link_projeto" placeholder="Link do Projeto..."/>
        </div>
        <div class="form-group">
            <textarea name="descricao_projeto" cols="30" rows="10" placeholder="Descreva um pouco sobre o Proejto..."></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.projetos" />
            <input type="submit" name="acao" value="Cadastrar Projeto" />
        </div>
        <div class="clear"></div>
    </form>
</div>
