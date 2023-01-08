<div id="form-return">
    <section class="desktop-hidden" style="padding: 40px 0;"> </section>
    <section class="mobile-hidden" style="padding: 20px 0;"> </section>
    <section>

        <?php
        $id = $_GET['id'];
        $consulta = "SELECT * FROM upload_xml where id= $id";
        $resultado = Classes::connexao([$consulta, 'Query']);

        if (Classes::connexao([$resultado[0], 'Count']) == false)
            exit('<div class="col-md-12"><h2 class="text-center ts-name">Não foi encontrada no sistema!</h2></div>');

        while ($row = Classes::connexao([$resultado[0], 'Fetch'])) {
            $upload_xml_id = $row['id'];

            $CNPJ =  Classes::buscarRegistros(['dest_xml', 'upload_xml_id', $upload_xml_id, 'CNPJ']);
            $xNome =  Classes::buscarRegistros(['dest_xml', 'upload_xml_id', $upload_xml_id, 'xNome']);
            $indIEDest =  Classes::buscarRegistros(['dest_xml', 'upload_xml_id', $upload_xml_id, 'indIEDest']);
            $IE =  Classes::buscarRegistros(['dest_xml', 'upload_xml_id', $upload_xml_id, 'IE']);
            $dest_xml_id =  Classes::buscarRegistros(['dest_xml', 'upload_xml_id', $upload_xml_id, 'id']);

            $xLgr =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'xLgr']);
            $nro =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'nro']);
            $xBairro =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'xBairro']);
            $cMun =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'cMun']);
            $xMun =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'xMun']);
            $UF =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'UF']);
            $CEP =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'CEP']);
            $cPais =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'cPais']);
            $fone =  Classes::buscarRegistros(['enderDest_xml', 'dest_xml_id', $dest_xml_id, 'fone']);
        ?>
            <div class="container">
                <h3 class="title-ofert">Número Notal Fiscal : <?= $row['chNFe']; ?></h3>
                <h3 class="title-ofert2">Mais detalhes</h3>
            </div>
    </section>
    <div class="container card-body">

        <h4 class="title-produto"> Principal</h4>
        <div class="row">

            <div class="col-md-4">
                <h2 class="text-center ts-name">Número da Nota Fiscal </h2>
                <h3 class="text-center text-muted"> <?= $row['chNFe']; ?></h3>
            </div>


            <div class="col-md-4">
                <h2 class="text-center ts-name">Data da Nota Fiscal </h2>
                <h3 class="text-center text-muted"> <?= $row['dhRecbto']; ?></h3>
            </div>


            <div class="col-md-4">
                <h2 class="text-center ts-name">Valor Total Nota Fiscal </h2>
                <h3 class="text-center text-muted">R$ <?= number_format($row['vNF'], 2, ',', '.'); ?></h3>
            </div>
        </div>
        <h4 class="title-produto"> Detalhes Destinatário</h4>

        <div class="row">
            <div class="col-md-3">
                <h2 class="text-center ts-name">CNPJ</h2>
                <h3 class="text-center text-muted"><?= $CNPJ; ?></h3>
            </div>

            <div class="col-md-3">
                <h2 class="text-center ts-name">Nome</h2>
                <h3 class="text-center text-muted"><?= $xNome; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">indIEDest</h2>
                <h3 class="text-center text-muted"><?= $indIEDest; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">INSCRIÇÃO ESTADUAL</h2>
                <h3 class="text-center text-muted"><?= $IE; ?></h3>
            </div>
        </div>
        <h4 class="title-produto"> Detalhes Entregra</h4>
        <div class="row">
            <div class="col-md-3">
                <h2 class="text-center ts-name">Logradouro</h2>
                <h3 class="text-center text-muted"><?= $xLgr; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">Nº</h2>
                <h3 class="text-center text-muted"><?= $nro; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">Bairro</h2>
                <h3 class="text-center text-muted"><?= $xBairro; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">Nº Município</h2>
                <h3 class="text-center text-muted"><?= $cMun; ?></h3>
            </div>

            <div class="col-md-3">
                <h2 class="text-center ts-name">Nome Município</h2>
                <h3 class="text-center text-muted"><?= $xMun; ?></h3>
            </div>

            <div class="col-md-3">
                <h2 class="text-center ts-name">Estado</h2>
                <h3 class="text-center text-muted"><?= $UF; ?></h3>
            </div>

            <div class="col-md-3">
                <h2 class="text-center ts-name">CEP</h2>
                <h3 class="text-center text-muted"><?= $CEP; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">N° País</h2>
                <h3 class="text-center text-muted"><?= $cPais; ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="text-center ts-name">Telefone</h2>
                <h3 class="text-center text-muted"><?= $fone; ?></h3>
            </div>
        <?php }
        ?>


        </div>

    </div>
</div>
</div>