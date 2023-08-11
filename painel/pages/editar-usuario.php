<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    echo "<script>
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: 'Atualizado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            position: 'top',
                            icon: 'error',
                            title: 'Erro ao fazer a atualização!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Formato da imagem não é válido!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            }
        } else {
            $img = $img_atual;
            if ($usuario->updateUser($nome, $password, $img)) {
                $_SESSION['nome'] = $nome;
                $_SESSION['password'] = $password;
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Atualizado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Erro ao fazer a atualização!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-pen"></i>Editar conta</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" placeholder="Alterar nome..." required />
        </div>
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" placeholder="Alterar senha..." required />
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="img" />
            <input type="hidden" name="img_atual" value="<?php echo $_SESSION['img']; ?>">
            <label for="img" style="color:#fff;">Trocar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
