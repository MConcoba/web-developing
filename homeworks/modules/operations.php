<?php

function operation($val_1, $val_2, $ope)
{
    $symbol = '';
    try {
        $test = eval("return {$ope}1;");
        if ($test == true) {
            $symbol = $ope;
        } else {
            $ope = strtolower($ope);

            if ($ope == 'suma') {
                $symbol = '+';
            } elseif ($ope == 'resta') {
                $symbol = '-';
            } elseif ($ope == 'multiplicacion') {
                $symbol = '*';
            } elseif ($ope == 'division') {
                if ($val_2 != 0) {
                    $symbol = '/';
                } else {
                    echo "Error: División por cero";
                    return;
                }
            } else {
                echo "Operación no válida";
                return;
            }
        }

        $expression = "$val_1 $symbol $val_2";

        // Evaluar la expresión
        $result = eval("return $expression;");

        // Mostrar el resultado
        echo "{$val_1} {$symbol} {$val_2} = {$result}";
    } catch (\Throwable $th) {
        throw $th;
        return;
    }
}

// Ejemplo de uso
