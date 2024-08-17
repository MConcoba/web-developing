<?php

function operation($val_1, $val_2, $ope)
{
    $symbol = '';
    try {
        if (in_array($ope, ['+', '-', '/', '*'])) {
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
                $symbol = '/';
            } else {
                return [
                    'error' => true,
                    'val_1' => $val_1,
                    'symbol' => '?',
                    'val_2' => $val_2,
                    'result' => 'Operación no válida',
                ];
            }
        }

        if ($val_2 == 0 && $symbol == '/') {
            return [
                'error' => true,
                'val_1' => $val_1,
                'symbol' => $symbol,
                'val_2' => $val_2,
                'result' => 'Error: División por cero',
            ];
        }

        $expression = "$val_1 $symbol $val_2";
        $result = eval("return $expression;");

        // Mostrar el resultado
        return [
            'error' => false,
            'val_1' => $val_1,
            'symbol' => $symbol,
            'val_2' => $val_2,
            'result' => round($result, 3),
        ];
    } catch (\Throwable $th) {
        throw $th;
        return;
    }
}
