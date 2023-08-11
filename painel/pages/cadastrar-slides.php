<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    verificaPermissaoPagina(2);

    if (isset($_POST['acao'])) {
       
        $nome = $_POST['nome'];
        $img = $_FILES['img'];

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
        }else if($img == ''){
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
            if(Painel::imgValid($img) == false){
                echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Formato de imagem inválida!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
            } else {
                $usuario = new Usuario();
                $img = Painel::uploadFile($img);
                $arr = ['nome'=>$nome, 'slide'=>$img, 'nome_tabela'=>'tb_site.slides'];
                Painel::insert($arr);
                echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Cadastro do slide foi realizado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-images"></i>Cadastrar imagem para slide</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Imagem:</label>
            <input type="text" name="nome" placeholder="Nome da imagem..."/>
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="img"/>
            <label for="img" style="color:#fff;">Adicionar Imagem</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Adicionar Slide" />
        </div>
        <div class="clear"></div>
    </form>
</div>
