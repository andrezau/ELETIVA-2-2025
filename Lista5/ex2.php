<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício - Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Contatos</h1>
        <form method="post">
            <?php for($i=1; $i<=5; $i++): ?>
            <div class="row mb-3">
                <div class="col-md-5">
                    <label for="nome<?= $i ?>" class="form-label">Nome:</label>
                    <input type="text" id="nome<?= $i ?>" name="nomes[]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="tel<?= $i ?>" class="form-label">Telefone:</label>
                    <input type="text" id="tel<?= $i ?>" name="telefones[]" class="form-control" required>
                </div>
            </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomes = $_POST['nomes'];
            $telefones = $_POST['telefones'];
            $contatos = [];

            for ($i = 0; $i < count($nomes); $i++) {
                $nome = trim($nomes[$i]);
                $telefone = trim($telefones[$i]);

                // Verificar duplicatas
                if (array_key_exists($nome, $contatos)) {
                    echo "<p class='text-danger'>⚠ Nome duplicado ignorado: $nome</p>";
                    continue;
                }
                if (in_array($telefone, $contatos)) {
                    echo "<p class='text-danger'>⚠ Telefone duplicado ignorado: $telefone</p>";
                    continue;
                }

                // Adicionar ao mapa
                $contatos[$nome] = $telefone;
            }

            // Ordenar por nome
            ksort($contatos);

            echo "<h3 class='mt-4'>📒 Lista de Contatos</h3>";
            echo "<ul class='list-group'>";
            foreach ($contatos as $nome => $tel) {
                echo "<li class='list-group-item'><b>$nome</b> - $tel</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>

</html>
