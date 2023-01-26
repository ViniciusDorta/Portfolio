<?php
    if (isset($_POST['acao'])) {
        Painel::alert('sucesso', 'Atualizado com sucesso!');
    } else {
        Painel::alert('erro', 'Erro ao fazer a atualização!');
    }
?>

<div class="box-content">
    <h2><i class="fa-solid fa-user-pen"></i>Editar Usuário</h2>
    <h3>Editação de Dados</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" placeholder="Alterar nome..." required />
        </div>
        <div class="form-group">
            <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" placeholder="Alterar senha..." required />
        </div>
        <div class="form-group">
            <input type="file" id="img" />
            <label for="img">Trocar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
