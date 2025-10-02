<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Livros</h1>
        <form method="post">
            <?php for($i=1; $i<=5; $i++): ?>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="titulo[]" class="form-label">Título do Livro:</label>
                    <input type="text" id="titulo[]" name="titulo[]" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="quantidade[]" class="form-label">Quantidade em Estoque:</label>
                    <input type="number" id="quantidade[]" name="quantidade[]" class="form-control" required>
                </div>
            </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Salvar Livros</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulos = $_POST['titulo'];
            $quantidades = $_POST['quantidade'];

            $livros = [];

            foreach ($titulos as $i => $titulo) {
                $quantidade = intval($quantidades[$i]);
                $livros[$titulo] = $quantidade;
            }
            ksort($livros);

            echo "<h3 class='mt-4'>Lista de Livros</h3>";
            echo "<ul class='list-group'>";
            foreach ($livros as $titulo => $quantidade) {
                if ($quantidade < 5) {
                    echo "<li class='list-group-item list-group-item-warning'>
                            <b>$titulo</b> - Estoque: $quantidade (ALERTA: Baixa quantidade!)
                          </li>";
                } else {
                    echo "<li class='list-group-item'><b>$titulo</b> - Estoque: $quantidade</li>";
                }
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>

</html>
