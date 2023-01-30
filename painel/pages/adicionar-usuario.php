<?php

    verificaPermissaoPagina(2);

    if (isset($_POST['acao'])) {
       
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-plus"></i>Adicionar Usuário</h1>
    <h3><span>Novo Usuário</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nome" placeholder="Nome usuário..." required />
        </div>
        <div class="form-group">
            <input type="text" name="cargo" placeholder="Cargo usuário..." required />
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="E-mail usuário..." required />
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Digite uma senha..." required />
        </div>
        <div class="form-group">
            <input type="file" id="img" name="img" required />
            <label for="img">Adicionar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Criar Usuário" />
        </div>
        <div class="clear"></div>
    </form>
</div>
