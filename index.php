<!DOCTYPE html>
<html>

<head>
    <title>Sequência de Fibonacci</title>
</head>

<body>
    <style>
        .container {
            width: 15rem;
            margin-left: 35rem;
            margin-top: 14rem;
            padding: 3rem 0rem 3rem 3rem;
            background: linear-gradient(120deg, #F8CBCC, #EF4BD0);
            border-radius: 10rem;
        }

        input {
            border-radius: 5rem;
            border: none;
            margin-left: 0.5rem;
        }

        h1 {

            color: white;
        }

        h2 {

            color: white;
            font-size: 15px;
            font-weight: 300;
            margin-left: 0.5rem;
        }

        body {
            background: linear-gradient(90deg, #ffe53bd8, #ff2525da);
        }

        button {
            border-radius: 10px;
            border: none;
            background-color: palevioletred;
            color: black;
            margin-top: 1rem;
            margin-left: 4rem;
        }
    </style>

    <div class="container">
        <h1>Sequência de Fibonacci</h1>
        <form action="" method="get">
            <h2>Coloque aqui um número:</h2>
            <input type="number" name="posicao" id="posicao">
            <br>
            <button>Calcular</button>
        </form>
        <?php
        if (isset($_GET['posicao'])) {
            $number = $_GET['posicao'];
            $lastNumber = 1;
            $penultimateNumber = 0;
            for ($i = 1; $i <= $number - 2; $i++) {
                $num = $lastNumber + $penultimateNumber;
                echo $num . "<br>";
                $penultimateNumber = $lastNumber;
                $lastNumber = $num;
            }
        }
        ?>
    </div>
</body>

</html>