<div class="box-content w100">
    <h2><i class="fa-solid fa-house-chimney"></i> Painel de Controle - VineServer</h2>
    <div class="box-metricas">
        <div class="box-metricas-single">
            <div class="box-metricas-wraper">
                <h2>Usuários Online</h2>
                <p><i class="fa-solid fa-user"></i> ?</p>
            </div>
        </div>

        <div class="box-metricas-single">
            <div class="box-metricas-wraper">
                <h2>Total de Visitas</h2>
                <p><i class="fa-solid fa-users"></i> ?</p>
            </div>
        </div>

        <div class="box-metricas-single">
            <div class="box-metricas-wraper">
                <h2>Visitas Hoje</h2>
                <p><i class="fa-solid fa-users-line"></i> ?</p>
            </div>
        </div>
    </div>
</div>

<div class="box-content w100"> 
    <h2><i class="fa-solid fa-rocket"></i> Usuários Online</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div>
            <div class="col">
                <span>Última ação</span>
            </div>
        </div>

        <?php
            for($i = 0; $i < 10; $i++) {
        ?>
            <div class="row">
                <div class="col">
                    <span>199.199.199</span>
                </div>
                <div class="col">
                    <span>23/01/2023 - 19:50:00</span>
                </div>
            </div>  
        <?php } ?>
    </div>
</div>