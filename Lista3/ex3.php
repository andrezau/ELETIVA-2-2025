<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Contém</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="palavra1" class="form-label">Informe a primeira palavra:</label>
              <input type="text" id="palavra1" name="palavra1" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="palavra2" class="form-label">Informe a segunda palavra:</label>
              <input type="text" id="palavra2" name="palavra2" class="form-control" required="">
            </div><div class="col-md-4">
            <h4>Resultado:</h4>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $palavra1 = $_POST['palavra1'];
      $palavra2 = $_POST['palavra2'];
        if (strpos($palavra1, $palavra2) !== false) {
            echo "<p>A palavra $palavra1 contém a palavra $palavra2</p>";
        } else {
            echo "<p>A palavra $palavra1 não contém a palavra $palavra2</p>";
        }
    }
    ?>
            </div>
</div>
<button type="submit" class="btn btn-primary">Ler</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>