<?php
    if (isset($_POST['acao'])) {       
        $nome = $_POST['nome'];
        if($nome == ''){
            Painel::alert('erro','Campo nome está vázio!');
        } else {
            $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?");
            $verifica->execute(array($nome));
            if($verifica->rowCount() == 0){
                $slug = Painel::generateSlug($nome);
                $arr = ['nome'=>$nome, 'slug'=>$slug, 'nome_tabela'=>'tb_site.categorias'];
                Painel::insert($arr);
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Cadastro do categoria foi realizado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Essa categoria ja existe, tente novamente com outro nome!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-tag"></i></i>Cadastrar categoria</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Categoria:</label>
            <input type="text" name="nome" placeholder="Nome categoria..."/>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
