<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Calcular Desconto</h1>
    <form method="post">
      <div class="row inline-row mb-3">
        <div class="col-md-3">
          <label for="preco" class="form-label">Preço:</label>
          <input type="number" id="preco" name="preco" class="form-control" required="">
        </div>
        <div class="col-md-6">
          <h4>Resultado:</h4>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $preco = $_POST['preco'];
            if($preco > 1000) {
              $desconto = $preco * 0.15;
              $preco_final = $preco - $desconto;
              echo "<p>Preço com desconto: R$ $preco_final (Desconto de R$ $desconto)";
            } else {
              echo "<p>Preço sem desconto: R$ $preco";
            }
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