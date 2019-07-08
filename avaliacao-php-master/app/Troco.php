<a href="index.html">Voltar</a>
<br>
<h4>CÉDULAS DE TROCO</h4>
<?php

/**
 * Essa classe possui o metodo getQtdeNotas ele não está completo e cabe a você concluí-lo de acordo com 
 * os requisitos.
 */

$reais = $_GET["val"];

if($reais == ""){
    echo "Valores não encontrados!";
    return false;
}
getQtdeNotas($reais);
function getQtdeNotas(float $reais): array{
    $notas_qtd = [
        "100" => 0,
        "50" => 0,
        "20" => 0,
        "10" => 0,
        "5" => 0,
        "2" => 0,
        "1" => 0,
        "0.5" => 0,
        "0.25" => 0,
        "0.1" => 0,
        "0.01" => 0,
    ]; 
    /* var_dump($notas_qtd);   */

    /*
    * Coloque o seu código aqui.
    * Você é livre para criar classes, arquivos e funções da maneira que achar melhor.
    * Esse método deve retornar a quantidade de notas e moedas necessária para o valor em reais 
    * passado para ele
    *
    * Exemplo:
    * getQtdeNotas(100.00); // Deve retornar algo como ['100' => 1]
    */

    $valor100 = (int)($reais/100);
    $resto100 = $reais%100;
    $notas_qtd["100"] = "$valor100";

    $valor50 = (int)($resto100/50);
    $resto50 = $resto100%50;
    $notas_qtd["50"] = "$valor50";

    $valor20 = (int)($resto50/20);
    $resto20 = $resto50%20;
    $notas_qtd["20"] = "$valor20";

    $valor10 = (int)($resto20/10);
    $resto10 = $resto20%10;
    $notas_qtd["10"] = "$valor10";

    $valor5 = (int)($resto10/5);
    $resto5 = $resto10%5;
    $notas_qtd["5"] = "$valor5";

    $valor2 = (int)($resto5/2);
    $resto2 = $resto5%2;
    $notas_qtd["2"] = "$valor2";

    $valor1 = (int)($resto2/1);
    $resto1 = $resto2%1;
    $notas_qtd["1"] = "$valor1";

    $decimal = $reais-(int)$reais;
    $valor = $reais-(int)$reais;

    if ($decimal != 0){
        if($decimal >= 0.50){
            $notas_qtd["0.5"] = "1";
            $decimal = $decimal - 0.5;
        }
        if($decimal >= 0.25){
            $notas_qtd["0.25"] = "1";
            $decimal = $decimal - 0.25;
        }

        if($decimal > 0.1){
            $decimal = $decimal/0.1;
            if($decimal >= 1.0 && $decimal <= 1.9){
                $notas_qtd["0.1"] = "1";
                $decimal = $decimal - 1;
            }
            if($decimal >= 2){
                $notas_qtd["0.1"] = "2";
                $decimal = $decimal - 2;
            }
            $strig01 = "1";
            $strig02 = "2";
            if(strcasecmp($decimal,$strig01) == 0){
                $notas_qtd["0.1"] = "1";
                $decimal = 0;
            }
            if(strcasecmp($decimal,$strig02) == 0){
                $notas_qtd["0.1"] = "2";
                $decimal = 0;
            } 
        }
        if($decimal < 0.9){
            if(strlen($decimal) > 4){
                $valor001 = number_format(($decimal/0.1),0,",",".");
                $notas_qtd["0.01"] = "$valor001";
            }
            if(strlen($decimal) <= 4){
                $valor001 = $decimal/0.1;
                $notas_qtd["0.01"] = "$valor001";
            }
        }
    }

    echo "100 => ";
    echo $notas_qtd["100"];
    echo "<br>";
    echo  "50 => ";
    echo $notas_qtd["50"];
    echo "<br>";
    echo  "20 => ";
    echo $notas_qtd["20"];
    echo "<br>";
    echo  "10 => ";
    echo $notas_qtd["10"]; 
    echo "<br>";
    echo  "5 => ";
    echo $notas_qtd["5"];
    echo "<br>";
    echo  "2 => ";
    echo $notas_qtd["2"];
    echo "<br>";
    echo  "1 => ";
    echo $notas_qtd["1"];
    echo "<br>";
    echo  "0.5 => ";
    echo $notas_qtd["0.5"];
    echo "<br>";
    echo  "0.25 => ";
    echo $notas_qtd["0.25"];
    echo "<br>";
    echo  "0.1 => ";
    echo $notas_qtd["0.1"];
    echo "<br>";
    echo  "0.01 => ";
    echo $notas_qtd["0.01"]; 
    return $notas_qtd;
}
?>
