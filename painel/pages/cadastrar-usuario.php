<?php

    verificaPermissaoPagina(2);

    if (isset($_POST['acao'])) {
       
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $img = $_FILES['img'];
        $cargo = $_POST['cargo'] ?? '';

        if($nome == ''){
            Painel::alert('erro','Campo nome está vázio!');
        } else if($cargo == ''){
            Painel::alert('erro','Selecione um cargo!');
        } else if($email == ''){
            Painel::alert('erro','Campo e-mail está vázio!');
        } else if($password == ''){
            Painel::alert('erro','Campo senha está vázio!');
        } else if($img == ''){
            Painel::alert('erro','Precisa adicionar uma imagem!');
        } else {
            if($cargo >= $_SESSION['cargo']){
                Painel::alert('erro', 'Cargo inválido!');
            } else if(Painel::imgValid($img) == false){
                Painel::alert('erro', 'Formato de imagem inválida!');
            } else if(Usuario::existsUser($email)){
                Painel::alert('erro', 'Usuário já cadastrado!');
            } else {
                $usuario = new Usuario();
                $img = Painel::uploadFile($img);
                $usuario->insertUser($email, $password, $img, $nome, $cargo);
                Painel::alert('sucesso', 'Cadastro de '.$nome.' realizado com sucesso!');
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-plus"></i>Adicionar Usuário</h1>
    <h3><span>Novo Usuário</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nome" placeholder="Nome usuário..."/>
        </div>
        <div class="form-group">
            <select name="cargo" id="cargo">
                <option hidden disabled selected>Selecione um Cargo</option>
                <?php
                    foreach (Cargo::$cargos as $key => $value) {
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="E-mail usuário..."/>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Digite uma senha..."/>
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="img"/>
            <label for="img">Adicionar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Criar Usuário" />
        </div>
        <div class="clear"></div>
    </form>
</div>
