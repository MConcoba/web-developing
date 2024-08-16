<?php

function operation($val_1, $val_2, $ope)
{
    // Construir la expresión
    $expression = "$val_1 $ope $val_2";

    // Evaluar la expresión
    $result = eval("return $expression;");

    // Mostrar el resultado
    echo "{$val_1} {$ope} {$val_2} = {$result}";
}

// Ejemplo de uso
