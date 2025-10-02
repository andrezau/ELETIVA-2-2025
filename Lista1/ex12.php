<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 12</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Calcular potenciação</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="base" class="form-label">Informe a base:</label>
              <input type="number" id="base" name="base" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="expoente" class="form-label">Informe o expoente:</label>
              <input type="number" id="expoente" name="expoente" class="form-control" required="">
            </div><div class="col-md-4">
            <h4>Resultado:</h4>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $base = $_POST['base'];
      $expoente = $_POST['expoente'];
      $potencia = $base ** $expoente;
      echo "<p>$base  ^  $expoente  =  $potencia</p>";
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