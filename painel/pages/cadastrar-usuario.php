<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    verificaPermissaoPagina(2);

    if (isset($_POST['acao'])) {
       
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $img = $_FILES['img'];
        $cargo = $_POST['cargo'] ?? '';

        if($nome == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Campo nome está vázio!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else if($cargo == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Selecione um cargo!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else if($email == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Campo email está vázio!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else if($password == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Campo senha está vázio!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else if($img == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Precisa adicionar uma imagem!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else {
            if($cargo >= $_SESSION['cargo']){
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Cargo inválido!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            } else if(Painel::imgValid($img) == false){
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Formato de imagem inválida!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            } else if(Usuario::existsUser($email)){
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Usuário já cadastrado!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            } else {
                $usuario = new Usuario();
                $img = Painel::uploadFile($img);
                $usuario->insertUser($email, $password, $img, $nome, $cargo);
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Cadastro de ".$nome." realizado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-plus"></i>Adicionar usuário</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Nome usuário..."/>
        </div>
        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo" id="cargo">
                <option hidden disabled selected>Selecione um cargo</option>
                <?php
                    foreach (Cargo::$cargos as $key => $value) {
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="text" name="email" placeholder="E-mail usuário..."/>
        </div>
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" placeholder="Digite uma senha..."/>
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="img"/>
            <label for="img" style="color:#fff;">Adicionar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Adicionar Usuário" />
        </div>
        <div class="clear"></div>
    </form>
</div>
