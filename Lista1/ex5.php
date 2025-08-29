<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Média</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Média</h1>
    <form method="post">
      <div class="row inline-row mb-3">
        <div class="col-md-3">
          <label for="valor1" class="form-label">Nota P1:</label>
          <input type="number" id="nota1" name="nota1" class="form-control" required="">
        </div>
        <div class="col-md-3">
          <label for="valor2" class="form-label">Nota P2:</label>
          <input type="number" id="nota2" name="nota2" class="form-control" required="">
        </div>
        <div class="col-md-3">
          <label for="valor3" class="form-label">Nota P3:</label>
          <input type="number" id="nota3" name="nota3" class="form-control" required="">
        </div>
        <div class="col-md-3">
          <h4>Média dos valores:</h4>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $media = ($nota1 + $nota2 + $nota3) / 3;
            echo "Média Final: $media";

          }
          ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>