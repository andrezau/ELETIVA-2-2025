<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 14</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Conversor de KM em milha</h1>
    <form method="post">
      <div class="row inline-row mb-3">
        <div class="col-md-3">
          <label for="km" class="form-label">Medida em quilômetro:</label>
          <input type="number" id="km" name="km" class="form-control" required="">
        </div>
        <div class="col-md-3">
          <h4>Resultado:</h4>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $km = $_POST['km'];
            $milha = $km / 1.609;
            echo "<p>$km Km = " . number_format($milha, 2, ',', '.') . "mi</p>";
          }
          ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Converter </button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>