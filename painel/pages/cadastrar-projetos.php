<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    if (isset($_POST['acao'])){
        if (Painel::insert($_POST)){ 
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Cadastro do projeto foi realizado com sucesso!',
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
    <h1><i class="fa-solid fa-folder-plus"></i>Cadastrar projetos</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Projeto:</label>
            <input type="text" name="nome_projeto" placeholder="Nome do projeto..."/>
        </div>
        <div class="form-group">
            <label>URL:</label>
            <input type="text" name="link_projeto" placeholder="Link do projeto..."/>
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="descricao_projeto" cols="30" rows="10" placeholder="Descreva um pouco sobre o projeto..."></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.projetos" />
            <input type="submit" name="acao" value="Adicionar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
