<div id="form-return">
    <section class="desktop-hidden" style="padding: 40px 0;"> </section>
    <section class="mobile-hidden" style="padding: 20px 0;"> </section>
    <section>
        <div class="container">
            <h3 class="title-ofert">Registros Nota Fiscal</h3>
            <h3 class="title-ofert2">Consulte os registros de nota fiscal no sistema</h3>
        </div>
    </section>
    <div class="container card-body">
        <div class="row">

            <?php
            $consulta = "SELECT * FROM upload_xml";
            $resultado = Classes::connexao([$consulta, 'Query']);

            if (Classes::connexao([$resultado[0], 'Count']) == false)
                exit('<div class="col-md-12"><h2 class="text-center ts-name">Não foi encontrado registros de nota fiscal no sistema!</h2>      </div>');

            while ($row = Classes::connexao([$resultado[0], 'Fetch'])) {

            ?>
                <div class="col-md-3">
                    <h2 class="text-center ts-name">Número da Nota Fiscal </h2>
                        <h3 class="text-center text-muted"> <?= $row['chNFe']; ?></h3>
                </div>


                <div class="col-md-3">
                    <h2 class="text-center ts-name">Data da Nota Fiscal </h2>
                    <h3 class="text-center text-muted"> <?= $row['dhRecbto']; ?></h3>
                </div>


                <div class="col-md-3">
                    <h2 class="text-center ts-name">Valor Total Nota Fiscal </h2>
                        <h3 class="text-center text-muted">R$ <?= number_format( $row['vNF'], 2, ',', '.'); ?></h3>
                </div>


                <div class="col-md-3">
                    <h2 class="text-center ts-name">Ver Mais Detalhes</h2>
                    <h3 class="text-center text-muted"> <a href="#" class="nav-link" onclick="loading('?go=registrocompleto&id=<?= $row['id']; ?>', 'conteudo_mostrar');"> Ver +</a> </h3>
                </div>

            <?php }
            ?>


        </div>

    </div>
</div>
</div>