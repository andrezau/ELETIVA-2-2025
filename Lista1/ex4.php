<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 4</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Divisão</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="valor1" class="form-label">Informe o primeiro valor:</label>
              <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="valor2" class="form-label">Informe o segundo valor:</label>
              <input type="number" id="valor2" name="valor2" class="form-control" required="">
            </div><div class="col-md-4">
            <h4>Resultado:</h4>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $fator1 = $_POST['valor1'];
      $fator2 = $_POST['valor2'];
      $multiplicacao = $fator1 * $fator2;
      echo "$fator1  X  $fator2  =  $multiplicacao";
    }
    ?>
            </div>
</div>
<button type="submit" class="btn btn-primary">Calcular</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>