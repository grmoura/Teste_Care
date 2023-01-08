<?php

use model\EnviarModel\EnviarModel;

class Classes
{

    public static function connexao(array $consulta)
    {
        try {

            $con = new PDO('mysql:host=mariaDB;dbname=testeCare', 'root', '654321');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($consulta[1] == "Query") {


                $stmt = $con->prepare($consulta[0]);

                $stmt->execute();

                return array($stmt, $con->lastInsertId());
            }


            if ($consulta[1] == "Count") {

                return $consulta[0]->rowCount();
            }

            if ($consulta[1] == "Fetch") {

                return $consulta[0]->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {

            exit('Não foi possível conectar com banco de dados! <br>Erro: ' . $e->getMessage());
        }
    }


    public static function paginacao(array $paginacao)
    {
        switch ($paginacao[0]) {

            case 'registrocompleto':
                $view = 'view/pages/registrocompleto.php';
                break;

            case 'registros':
                $view = 'view/pages/registros.php';
                break;

            case 'enviar':
                $view = 'view/pages/enviar.php';
                break;

            default:
                $view = 'view/pages/404.php';
        }

        if (file_exists($view)) {
            include($view);
            exit();
        }
    }


    public static function uploadXML($extensao)
    {

        $novoNome = rand(100, 999) . '.' . $extensao;
        if (file_exists("uploads/$novoNome")) {
            return Classes::uploadXML($extensao);
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $novoNome);
            return  'uploads/' . $novoNome;
        }
    }


    public static function formatarInsertMysql(array $dados)
    {

        foreach ($dados as $chave => $valor) {

            $colunas[] = $chave;
            $valores[] = $valor;
        }

        $colchete = array('[', ']');
        $parentese   = array('(', ')');
        $texto    = str_replace('"', '', json_encode($colunas)) . ' values ' . json_encode($valores);
        $parametros  = str_replace($colchete, $parentese, $texto);

        return $parametros;
    }


    public static function inserirRegistro(array $dados)
    {
        $dadosFormatado = Classes::formatarInsertMysql($dados[1]);
        $consulta =  "INSERT INTO $dados[0] $dadosFormatado";
        $id = Classes::connexao([$consulta, 'Query']);
        return $id[1];
    }


    public static function buscarRegistros(array $dados)
    {
        $consulta = "SELECT $dados[3] as coluna FROM $dados[0] where  $dados[1]='$dados[2]' ";
        $resultado = Classes::connexao([$consulta, 'Query']);

        while ($row = Classes::connexao([$resultado[0], 'Fetch'])) {
            return  $row['coluna'] ?? 'Não encontrado';
        }

    }
}
