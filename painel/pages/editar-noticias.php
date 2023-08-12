<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $noticias = Painel::select('tb_site.noticias', 'id = ?', array($id));
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
        $id_categoria = $_POST['id_categoria'];
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $titulo = $_POST['titulo'];
        $capa = $_FILES['capa'];
        $img_atual = $_POST['img_atual'];

        if ($capa['name'] != '') {
            if (Painel::imgValid($capa)) {
                Painel::deleteFile($img_atual);
                $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?");
                $verifica->execute(array($titulo));
                if($verifica->rowCount() == 0){
                    $capa = Painel::uploadFile($capa);
                    $slug = Painel::generateSlug($titulo);
                    $arr = [
                        'id'=>$id, 
                        'id_categoria' => $id_categoria,
                        'titulo'=>$titulo, 
                        'conteudo'=>$conteudo, 
                        'capa'=>$capa,
                        'slug'=>$slug,
                        'nome_tabela'=>'tb_site.noticias'
                    ];
                    Painel::update($arr);
                    $noticias = Painel::select('tb_site.noticias', 'id = ?', array($id));
                    echo "<script>
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: 'A notícia foi atualizada com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>";
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
            $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?");
            $verifica->execute(array($titulo));
            if($verifica->rowCount() == 0){
                $slug = Painel::generateSlug($titulo);
                $capa = $img_atual;
                $arr = [
                    'id'=>$id, 
                    'id_categoria' => $id_categoria, 
                    'titulo'=>$titulo, 
                    'conteudo'=>$conteudo, 
                    'capa'=>$capa, 
                    'slug'=>$slug,
                    'nome_tabela'=>'tb_site.noticias'
                ];
                Painel::update($arr);
                $noticias = Painel::select('td_site.noticias', 'id = ?', array($id));
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
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-user-pen"></i>Editar notícias</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Categoria:</label>
            <select name="id_categoria">
                <?php 
                    $categorias = Painel::selectAll('tb_site.categorias');
                    foreach ($categorias as $key => $value) {
                ?>
                    <option <?php if($value['id'] == $noticias['id_categoria']) echo 'selected'; ?> 
                        value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Titulo:</label>
            <input type="text" name="titulo" value="<?php echo $noticias['titulo']; ?>" placeholder="Alterar titulo..." required />
        </div>
        <div class="form-group">
            <label>Conteúdo:</label>
            <textarea type="text" name="conteudo" placeholder="Conteudo da notícia..."><?php echo $noticias['conteudo']; ?></textarea>
        </div>
        <div class="form-group label-content">
        <input type="file" id="img" name="capa" />
            <input type="hidden" name="img_atual" value="<?php echo $noticias['capa']; ?>">
            <label for="img" style="color:#fff;">Alterar capa</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div>
        <div class="clear"></div>
    </form>
</div>
