<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slides = Painel::select('tb_site.slides', 'id = ?', array($id));
    } else {
        echo "<script>
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Você precisa passar o parametro ID.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>";
        die();
    }

    if (isset($_POST['acao'])) {
        $nome = $_POST['nome'];
        $img = $_FILES['img'];
        $img_atual = $_POST['img_atual'];

        if ($img['name'] != '') {
            if (Painel::imgValid($img)) {
                Painel::deleteFile($img_atual);
                $img = Painel::uploadFile($img);
                $arr = ['id'=>$id, 'nome'=>$nome, 'slide'=>$img, 'nome_tabela'=>'tb_site.slides'];
                Painel::update($arr);
                $slides = Painel::select('tb_site.slides', 'id = ?', array($id));
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'O slide foi atualizado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
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
            $arr = ['id'=>$id, 'nome'=>$nome, 'slide'=>$img, 'nome_tabela'=>'tb_site.slides'];
            Painel::update($arr);
            $slides = Painel::select('td_site.slides', 'id = ?', array($id));
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'O slide foi atualizado com sucesso!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-pen"></i>Editar slide</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $slides['nome']; ?>" placeholder="Alterar nome..." required />
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="img" />
            <input type="hidden" name="img_atual" value="<?php echo $slides['slide']; ?>">
            <label for="img" style="color:#fff;">Alterar slide</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
