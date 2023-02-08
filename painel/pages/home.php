<?php
    $usuariosOnline = Painel::listUserOnline();
    $totalVisitas = Painel::totalAccess();
    $visitasHoje = Painel::accessToDay();
?>

<div class="box-content w100">
    <h2><i class="fa-solid fa-house-chimney"></i> Painel de Controle - VineServer</h2>
    <div class="box-metricas">
        <div class="box-metricas-single">
            <div class="box-metricas-wraper">
                <h2>Usuários Online</h2>
                <p><i class="fa-solid fa-user"></i><?php echo count($usuariosOnline); ?></p>
            </div>
        </div>

        <div class="box-metricas-single">
            <div class="box-metricas-wraper">
                <h2>Total de Visitas</h2>
                <p><i class="fa-solid fa-users"></i><?php echo count($totalVisitas); ?></p>
            </div>
        </div>

        <div class="box-metricas-single">
            <div class="box-metricas-wraper">
                <h2>Visitas Hoje</h2>
                <p><i class="fa-solid fa-users-line"></i><?php echo count($visitasHoje); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="box-content w100"> 
    <h2><i class="fa-solid fa-rocket"></i> Usuários Online do Site</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <p>IP</p>
            </div>
            <div class="col">
                <p>Última ação</p>
            </div>
        </div>

        <?php
            foreach ($usuariosOnline as $key => $value) {
                
        ?>
            <div class="row">
                <div class="col">
                    <p><?php echo $ocult = substr($value['ip'], 0, -4) . '****'; ?></p>
                </div>
                <div class="col">
                    <p><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?></p>
                </div>
            </div>  
        <?php } ?>
    </div>
</div>

<div class="box-content w100"> 
    <h2><i class="fa-solid fa-rocket"></i> Usuários do Painel</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <p>Nome</p>
            </div>
            <div class="col">
                <p>Cargo</p>
            </div>
        </div>

        <?php
            $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users`");
            $usuariosPainel->execute();
            $usuariosPainel = $usuariosPainel->fetchAll();
            foreach ($usuariosPainel as $key => $value) {
                
        ?>
            <div class="row">
                <div class="col">
                    <p><?php echo $value['nome']; ?></p>
                </div>
                <div class="col">
                    <p><?php echo Cargo::pegaCargo($value['cargo']); ?></p>
                </div>
            </div>  
        <?php } ?>
    </div>
</div>