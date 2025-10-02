<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 16</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Calcular desconto</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="preco" class="form-label">Informe Preço:</label>
              <input type="number" id="preco" name="preco" class="form-control" step="0.01" required="">
            </div><div class="col-md-4">
              <label for="percentual" class="form-label">Informe percentual de desconto:</label>
              <input type="number" id="percentual" name="percentual" class="form-control" required="">
            </div><div class="col-md-4">
            <h4>Resultado:</h4>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $preco = $_POST['preco'];
      $percentual = $_POST['percentual'];
      $percentual = $percentual / 100;
      $desconto = ($preco * $percentual) + $preco;
      echo "<p>Preço com desconto =  R$" . round($desconto,2) . "</p>";
    }
    ?>
            </div>
</div>
<button type="submit" class="btn btn-primary">Descontar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>