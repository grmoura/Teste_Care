<?php

include('../../vendor/autoload.php');


if (!$_POST['enviar']) {


    $extensao = explode('.', $_FILES['file']['name'])[1];

    if (empty($_FILES['file']['name']))
        exit("Selecione um arquivo para enviar.");
    if ($extensao != 'xml')
        exit("Formato inválido.<br/>O arquivo deve estar no formato <strong>XML</strong>.");


    $xml = simplexml_load_string($_POST['xml']);


    foreach ($xml->NFe->infNFe->emit as $emit) {
        if ($emit->CNPJ != '09066241000884')
            exit("A nota possui o cnpj do emitente não permitido, envie a nota com o CNPJ: 09066241000884");
    }


    foreach ($xml->protNFe->infProt as $infProt) {

        $dadosNota['chNFe'] = (string)  substr($infProt->chNFe, 25, -10);
        $dadosNota['dhRecbto'] = (string)  $infProt->dhRecbto;

        if ($infProt->nProt == '')
            exit("A nota não possui protocolo de autorização.");
    }


    foreach ($xml->NFe->infNFe->total->ICMSTot as $ICMSTot) {
        $dadosNota['vNF'] =  (string) $ICMSTot->vNF;
    }


    $upload_xml_id = Classes::inserirRegistro(['upload_xml', $dadosNota]);

    foreach ($xml->NFe->infNFe->dest as $dest) {
        $dadosDest['CNPJ'] =  (string) $dest->CNPJ;
        $dadosDest['xNome'] = (string) $dest->xNome;
        $dadosDest['indIEDest'] =  (string) $dest->indIEDest;
        $dadosDest['IE'] = (string) $dest->IE;
        $dadosDest['upload_xml_id'] =  $upload_xml_id;
    }


    $dest_xml_id = Classes::inserirRegistro(['dest_xml', $dadosDest]);


    foreach ($xml->NFe->infNFe->dest->enderDest as $enderDest) {
        $dadosEnderDest['xLgr'] =  (string) $enderDest->xLgr;
        $dadosEnderDest['nro'] = (string) $enderDest->nro;
        $dadosEnderDest['xBairro'] = (string) $enderDest->xBairro;
        $dadosEnderDest['cMun'] = (string) $enderDest->cMun;
        $dadosEnderDest['xMun'] = (string) $enderDest->xMun;
        $dadosEnderDest['UF'] = (string) $enderDest->UF;
        $dadosEnderDest['CEP'] =  (string) $enderDest->CEP;
        $dadosEnderDest['cPais'] = (string) $enderDest->cPais;
        $dadosEnderDest['fone'] = (string) $enderDest->fone;
        $dadosEnderDest['dest_xml_id '] =  $dest_xml_id;
    }

    $enderDest_xml_id = Classes::inserirRegistro(['enderDest_xml', $dadosEnderDest]);

    Classes::uploadXML($extensao);
    exit("Arquivo enviado com sucesso!");
}
