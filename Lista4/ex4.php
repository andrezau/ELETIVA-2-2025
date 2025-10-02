<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Itens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Itens</h1>
        <form method="post">
            <?php for($i=1; $i<=5; $i++): ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome[]" class="form-label">Nome:</label>
                    <input type="text" id="nome[]" name="nome[]" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="preco[]" class="form-label">Preço:</label>
                    <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required>
                </div>
            </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Calcular Preços com Imposto</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];
            $itens = [];
            foreach ($nomes as $i => $nome) {
                $preco = floatval($precos[$i]);
                $preco_com_imposto = $preco * 1.15;
                $itens[$nome] = $preco_com_imposto;
            }

            asort($itens);

            echo "<h3 class='mt-4'>Lista de Itens com Imposto</h3>";
            echo "<ul class='list-group'>";
            foreach ($itens as $nome => $preco) {
                echo "<li class='list-group-item'><b>$nome</b> - R$ " . number_format($preco, 2, ',', '.') . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>

</html>
