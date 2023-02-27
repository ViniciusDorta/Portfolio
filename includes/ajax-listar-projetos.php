<?php
include('../config/config.php');

    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.projetos` ORDER BY `nome` ASC");
    if ($sql->execute()) {
        $retorno = $sql->fetchAll();
    } else {
        $retorno = 'Nenhum projeto encontrado.';
    }

    echo json_encode($retorno);