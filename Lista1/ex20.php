<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 20</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Calcular velocidade</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="distancia" class="form-label">Informe a distância (em km):</label>
              <input type="number" id="distancia" name="distancia" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="tempo" class="form-label">Informe o tempo (em horas):</label>
              <input type="number" id="tempo" name="tempo" class="form-control" required="">
            </div><div class="col-md-4">
            <h4>Resultado:</h4>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $distancia = $_POST['distancia'];
      $tempo = $_POST['tempo'];
    $velocidade = $distancia / $tempo;
      echo "Velocidade = $velocidade km/h";
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