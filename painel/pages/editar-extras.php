<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    if (isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $extras = Painel::select('tb_site.extras', 'id = ?', array($id));
    } else {
        echo "<script>
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Você precisa passar o pârametro ID.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>";
        die();
    }
    if (isset($_POST['acao'])) {
        if (Painel::update($_POST)){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Conhecimento extra atualizado com sucesso!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
            $extras = Painel::select('tb_site.extras', 'id = ?', array($id));
        } else {
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Preencha todos os campos!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        }
    }
?>

<div class="box-content">
    <h1><i class="fa-solid fa-file-pen"></i>Editar conhecimento extra</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" value="<?php echo $extras['conhecimento']; ?>" name="conhecimento" placeholder="Adicione um conhecimento extra..." />
        </div>
        <div class="form-group">
            <a class="voltar-listar" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-extras">Voltar</a>
            <div class="btn-atualizar">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="nome_tabela" value="tb_site.extras" />
                <input type="submit" name="acao" value="Atualizar" />
            </div>
        </div>
        <div class="clear"></div>
    </form>
</div>
