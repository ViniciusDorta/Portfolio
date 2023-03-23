<?php
include('../config/config.php');

    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.extras` ORDER BY `conhecimento` ASC");
    if ($sql->execute()) {
        $retorno = $sql->fetchAll();
    } else {
        $retorno = 'Nenhum conhecimento extra encontrado.';
    }

    echo json_encode($retorno);