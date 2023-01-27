<?php

    if (isset($_POST['acao'])) {
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $img = $_FILES['img'];
        $img_atual = $_POST['img_atual'];
        $usuario = new Usuario();

        if ($img['name'] != '') {
            if (Painel::imgValid($img)) {
                Painel::deleteFile($img_atual);
                $img = Painel::uploadFile($img);
                if ($usuario->updateUser($nome, $password, $img)) {
                    $_SESSION['nome'] = $nome;
                    $_SESSION['password'] = $password;
                    $_SESSION['img'] = $img;
                    Painel::alert('sucesso', 'Atualizado com sucesso!');
                } else {
                    Painel::alert('erro', 'Erro ao fazer a atualização!');
                }
            } else {
                Painel::alert('erro', 'Formato da imagem não é válido!');
            }
        } else {
            $img = $img_atual;
            if ($usuario->updateUser($nome, $password, $img)) {
                $_SESSION['nome'] = $nome;
                $_SESSION['password'] = $password;
                Painel::alert('sucesso', 'Atualizado com sucesso!');
            } else {
                Painel::alert('erro', 'Erro ao fazer a atualização!');
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-pen"></i>Editar Usuário</h1>
    <h3><span>Editação de Dados</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" placeholder="Alterar nome..." required />
        </div>
        <div class="form-group">
            <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" placeholder="Alterar senha..." required />
        </div>
        <div class="form-group">
            <input type="file" id="img" name="img" />
            <input type="hidden" name="img_atual" value="<?php echo $_SESSION['img']; ?>">
            <label for="img">Trocar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
