<?php


class Classes
{

    public static function connect(array $consulta)
    {
        try {

            $con = new PDO('mysql:host=mariaDB;dbname=teste', 'root', '654321');
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

            exit('Não foi possível conectar com banco de dados! <br>Erro: '.$e->getMessage());
        }
    }




    public function extendsRequest(array $arrayRequest)
    {
        $var = $arrayRequest[1];
        $type = $arrayRequest[0];


        if ($type == 'requiredVarString') {

            for ($i = 1; $i <= $var[0]; $i++) {
                if (preg_match('/^[a-zA-Z0-9\_\,\.\@\-\d]+$/', $var[$i]) == 0) {
                    return 0;
                }
            }
            return 1;
        }

        if ($type == 'requiredVarStringAll') {

            for ($i = 1; $i <= $var[0]; $i++) {
                if (preg_match('/^[a-zA-Z0-9\_\ \,\.\@\-\d]+$/', $var[$i]) == 0) {
                    return array(0, $var[$i + 1]);
                }
            }
            return array(1);
        }

        if ($type == 'emptyVarStringAll') {

            for ($i = 1; $i <= $var[0]; $i++) {
                if ($var[$i] == "") {
                    return array(0, $var[$i + 1]);
                }
            }
            return array(1);
        }

        if ($type == 'requiredVarNumb') {

            for ($i = 1; $i <= $var[0]; $i++) {
                if (!is_numeric($var[$i])) {
                    return 0;
                }
            }
            return 1;
        }

        if ($type == 'requiredVarLetNumb') {

            if (preg_match('/^[a-zA-Z0-9 ]+$/', $var) == 0) {
                return 0;
            }

            return 1;
        }


        if ($type == 'removedAccents') {
            return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $var);
        }

        if ($type == 'removedString') {
            return preg_replace('/[^0-9]/', '', $var);
        }

        if ($type == 'antInject') {
            $x = preg_replace("/(from|INSERT|DROP|DELETE|update|UPDATE|select|insert|delete|where|drop table|show tables|#|'|\"|@|\*|--|\\\\)/", '', $var);
            return $x;
        }
    }


}
