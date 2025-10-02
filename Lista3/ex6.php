<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 6</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Formatar número</h1>
    <form method="post">
      <div class="row inline-row mb-3">
        <div class="col-md-3">
          <label for="numero" class="form-label">Número:</label>
          <input type="number" id="numero" name="numero" class="form-control" step="any" required="">
        </div>
        <div class="col-md-9">
          <h4>Resultado:</h4>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];
            echo "<p> Valor arredondado: ".round($numero)."</p>";
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