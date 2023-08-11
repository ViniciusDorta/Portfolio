<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    verificaPermissaoPagina(2);

    if (isset($_POST['acao'])) {
        $id_categoria = $_POST['id_categoria'];
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $capa = $_FILES['capa'];

        if($id_categoria == 0){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Selecione uma categoria!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else if($titulo == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Campo titulo está vázio!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else if($capa == ''){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Precisa adicionar uma imagem de capa!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
        } else {
            if(Painel::imgValid($capa) == false){
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
                $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?");
                $verifica->execute(array($titulo));
                if($verifica->rowCount() == 0){
                    $capa = Painel::uploadFile($capa);
                    $slug = Painel::generateSlug($titulo);
                    $arr = [
                        'id_categoria'=>$id_categoria, 
                        'titulo'=>$titulo, 
                        'conteudo'=>$conteudo, 
                        'capa'=>$capa,
                        'slug'=>$slug,
                        'nome_tabela'=>'tb_site.slides'
                    ];
                    if(Painel::insert($arr)){
                        echo "<script>
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'Cadastro do notícia foi realizado com sucesso!',
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
                            title: 'Esse titulo ja existe, tente novamente com outro titulo!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
                }
                
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-newspaper"></i></i>Cadastrar notícias</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Categoria:</label>
            <select name="id_categoria">
                <option value="0">Selecione uma categoria</option>
                <?php 
                    $categorias = Painel::selectAll('tb_site.categorias');
                    foreach ($categorias as $key => $value) {
                ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Titulo:</label>
            <input type="text" name="titulo" placeholder="Titulo da notícia..."/>
        </div>
        <div class="form-group">
            <label>Conteúdo:</label>
            <textarea type="text" name="conteudo" placeholder="Conteudo da notícia..."></textarea>
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="capa"/>
            <label for="img" style="color:#fff;">Adicionar Capa</label>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.categorias" />
            <input type="submit" name="acao" value="Adicionar Categoria" />
        </div>
        <div class="clear"></div>
    </form>
</div>
