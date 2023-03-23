<?php

    verificaPermissaoPagina(2);

    if (isset($_POST['acao'])) {
       
        $nome = $_POST['nome'];
        $img = $_FILES['img'];

        if($nome == ''){
            Painel::alert('erro','Campo nome está vázio!');
        }else if($img == ''){
            Painel::alert('erro','Precisa adicionar uma imagem!');
        } else {
            if(Painel::imgValid($img) == false){
                Painel::alert('erro', 'Formato de imagem inválida!');
            } else {
                include('../vendor/wade-image/lib/WideImage.php');
                $usuario = new Usuario();
                $img = Painel::uploadFile($img);
                WideImage::load('upload/'.$img)->resize(100)->saveToFile('upload/'.$img);
                $arr = ['nome'=>$nome, 'slide'=>$img, 'nome_tabela'=>'tb_site.slides'];
                Painel::insert($arr);
                Painel::alert('sucesso', 'Cadastro do slide foi realizado com sucesso!');
            }
        }
    }

?>

<div class="box-content">
    <h1><i class="fa-solid fa-images"></i>Cadastrar Slide</h1>
    <h3><span>Nova Imagem no Slide</span></h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="nome" placeholder="Nome da imagem..."/>
        </div>
        <div class="form-group label-content">
            <input type="file" id="img" name="img"/>
            <label for="img">Adicionar Foto</label>
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar Slide" />
        </div>
        <div class="clear"></div>
    </form>
</div>
