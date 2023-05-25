<?php

function fibonacci($n)
{
    $fib = [0, 1];

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = ($fib[$i - 1] + $fib[$i - 2]);
    }

    return $fib;
}

$posicao = 100;//inserir o valor da posição daqui
$resultado = fibonacci($posicao);

echo "n$posicao: " . ($resultado[$i = $posicao]);

