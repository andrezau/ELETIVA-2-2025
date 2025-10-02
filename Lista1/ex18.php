<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 18</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Calcular Juros Compostos</h1>
    <form method="post">
      <div class="row inline-row mb-3">
        <div class="col-md-3">
          <label for="capital" class="form-label">Capital:</label>
          <input type="number" id="capital" name="capital" class="form-control" step="0.01" required="">
        </div>
        <div class="col-md-3">
          <label for="taxa" class="form-label">Taxa em %:</label>
          <input type="number" id="taxa" name="taxa" class="form-control" step="0.01" required="">
        </div>
        <div class="col-md-3">
          <label for="periodo" class="form-label">Período em meses:</label>
          <input type="number" id="periodo" name="periodo" class="form-control" required="">
        </div>
        <div class="col-md-3">
          <h4>Média dos valores:</h4>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $capital = $_POST['capital'];   
            $taxa = $_POST['taxa'];
            $periodo = $_POST['periodo'];
            $juros = $capital * (1 + $taxa/100) ** $periodo - $capital;
            echo "<p>Total em juros: " . number_format($juros, 2, ',', '.') . "</p>";
            echo "<p>Valor total: " . number_format($capital + $juros, 2, ',', '.') . "</p>";
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