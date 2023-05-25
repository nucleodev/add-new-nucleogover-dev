<html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Sequência Fibonacci</title>
 </head>
 <body>
     <style>
        body{
    margin-top: 200px;
    text-align: center;
}
input{
    margin: 12px;
}
</style>

    <div class="container">
        <form action="" method="get">
            Digite um número de entrada positivo e maior que 1:
            <br>
            <input type="number" name="number">
            <br>
            <input class="btn btn-success" type="submit" name="submit" value="Calcular">
        </form> 
 <?php 
  $numeroEntrada=$_GET['number'];
  $ultimo=1;
  $penultimo=0; 
  echo "0<br>1<br>";
  for($contador=1 ; $contador<=$numeroEntrada-2 ; $contador++){
   $atual = $ultimo + $penultimo;
   echo $atual."<br>";
   $penultimo = $ultimo;
   $ultimo = $atual;
  } 
 ?>
 </div>
 </body>
</html>
