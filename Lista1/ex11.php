<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 11</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Calcular perímetro</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="largura" class="form-label">Largura:</label>
              <input type="number" id="largura" name="largura" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="altura" class="form-label">Altura:</label>
              <input type="number" id="altura" name="altura" class="form-control" required="">
            </div><div class="col-md-4">
            <h4>Resultado:</h4>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $largura = $_POST['largura'];
      $altura = $_POST['altura'];
      $perimetro = ($largura + $altura) * 2;
      echo "<p>Perímetro de largura =$largura cm  e altura =$altura cm =  $perimetro cm</p>";
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