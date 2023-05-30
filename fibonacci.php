<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sequência de Fibonacci</title>
    <style>
        :root{
            --color-primary: #1F618D;
            --color-secondary: #2874A6;
        }
        @font-face {
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        }

        body {
            background-color: #F0F4F7;
            font-family: Roboto, sans-serif;
        }

        h1 {
            text-align: center;
            color: var(--color-primary);
            margin-top: 50px;
        }

        .fibonacci {
            text-align: center;
            margin-top: 30px;
        }

        .indice {
            color: var(--color-primary);
            font-weight: bold;
        }

        .resultado {
            color: var(--color-secondary);
            font-size: 20px;
            margin-top: 10px;
        }
        .fibonacci button {
            background-color: var(--color-primary);
            color: #FFF;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .fibonacci button:hover {
            background-color: var(--color-secondary);
        }
        .fibonacci input[type="number"],
        .fibonacci textarea {
            padding: 8px;
            font-size: 16px;
            border: 2px solid var(--color-primary);
            border-radius: 4px;
        }

        .fibonacci label {
            display: block;
            margin-bottom: 10px;
            color: var(--color-primary);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['posicao'])) {
    $posicao = ($_POST['posicao']);
    $resultado = fibonacci($posicao);
} else {
    $posicao = 10; // valor padrao
    $resultado = fibonacci($posicao);
}
?>

<div class="fibonacci">
    <form method="POST">
        <label for="posicao">Digite a posição desejada:</label>
        <input type="number" id="posicao" name="posicao" value="<?php echo $posicao; ?>">
        <button type="submit">Calcular</button>
    </form>

    <h2>Índice escolhido: <span class="indice"><?php echo $posicao; ?></span></h2>
    <p class="resultado"><?php echo "n$posicao: " . $resultado[$posicao]; ?></p>
</div>

</body>
</html>
