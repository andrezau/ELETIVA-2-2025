<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1></h1>
<form method="post">
<div class="mb-3">
              <label for="valor1" class="form-label">Digite um Valor:</label>
              <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div><div class="row inline-row mb-3"><div class="col-md-12">
              <label for="valor2" class="form-label">Digite um Valor:</label>
              <input type="number" id="valor2" name="valor2" class="form-control" required="">
            </div></div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<div class="container">
<?php
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $resultado = $valor1 + $valor2;
    echo "$valor1  +  $valor2  =  $resultado";
?>
</div>
</body>
</html>