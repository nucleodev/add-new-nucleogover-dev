
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sequência de Fibonacci</title>
    <style>
        @font-face {
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        }
        body {
            background-color: #F0F4F7;
            color: #333;
            font-family: Roboto, sans-serif;

        }
        h1 {
            text-align: center;
            color: #1F618D;
            margin-top: 50px;
        }

        .fibonacci {
            text-align: center;
            margin-top: 30px;
        }

        .indice {
            color: #1F618D;
            font-weight: bold;
        }

        .resultado {
            color: #2874A6;
            font-size: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h1>Sequência de Fibonacci</h1>
<?php
function fibonacci($n)
{
    $fib = [0, 1];

    for ($i = 2; $i <= $n; $i++) {
    $fib[$i] = ($fib[$i - 1] + $fib[$i - 2]);
}

return $fib;
}

$posicao = 1042; // Inserir o valor do indice aqui
$resultado = fibonacci($posicao);
?>

<div class="fibonacci">
    <h2>Índice escolhido: <span class="indice"><?php echo $posicao; ?></span></h2>
    <p class="resultado"><?php echo "n$posicao: " . $resultado[$posicao]; ?></p>
</div>
</body>
</html>