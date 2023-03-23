<?php
    if (isset($_POST['acao'])){
        if (Painel::insert($_POST)){ 
            Painel::alert('sucesso', 'Extra cadastrado com sucesso!');
        } else {
            Painel::alert('erro', 'Preencha todos os campos!');
        }
    }
?>

<div class="box-content">
    <h1><i class="fa-solid fa-book"></i>Cadastrar Extras</h1>
    <h3><span>Adicionar Conhecimento Extra</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <textarea name="conhecimento" cols="30" rows="10" placeholder="Conhecimento extra..."></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.extras" />
            <input type="submit" name="acao" value="Cadastrar Extra" />
        </div>
        <div class="clear"></div>
    </form>
</div>
