<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    if (isset($_POST['acao'])){
        if (Painel::insert($_POST)){ 
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Conhecimento cadastrado com sucesso!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
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
    <h1><i class="fa-solid fa-book"></i>Cadastrar conhecimento extra</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="conhecimento" cols="30" rows="10" placeholder="Conhecimento extra..."></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.extras" />
            <input type="submit" name="acao" value="Adicionar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
