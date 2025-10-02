<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Produtos</h1>
        <form method="post">
            <?php for($i=1; $i<=5; $i++): ?>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="codigo[]" class="form-label">Código:</label>
                    <input type="text" id="codigo[]" name="codigo[]" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="nome[]" class="form-label">Nome:</label>
                    <input type="text" id="nome[]" name="nome[]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="preco[]" class="form-label">Preço:</label>
                    <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required>
                </div>
            </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Salvar Produtos</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $codigos = $_POST['codigo'];
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];

            $produtos = [];

            foreach ($codigos as $i => $codigo) {
                $nome = $nomes[$i];
                $preco = floatval($precos[$i]);

                if ($preco > 100) {
                    $preco *= 0.9;
                }

                $produtos[$codigo] = [
                    'nome' => $nome,
                    'preco' => $preco
                ];
            }
            uasort($produtos, function($a, $b) {
                return strcmp($a['nome'], $b['nome']);
            });

            echo "<h3 class='mt-4'>Lista de Produtos</h3>";
            echo "<ul class='list-group'>";
            foreach ($produtos as $codigo => $info) {
                echo "<li class='list-group-item'>
                        <b>Código:</b> $codigo <br>
                        <b>Nome:</b> {$info['nome']} <br>
                        <b>Preço:</b> R$ " . number_format($info['preco'], 2, ',', '.') . "
                      </li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>

</html>
