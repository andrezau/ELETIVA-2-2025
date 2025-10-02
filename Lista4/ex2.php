<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Alunos</h1>
        <form method="post">
            <?php for($i=1; $i<=5; $i++): ?>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="nomes[]" class="form-label">Nome:</label>
                    <input type="text" id="nomes[]" name="nomes[]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="nota1[]" class="form-label">Nota 1:</label>
                    <input type="number" step="0.01" id="nota1[]" name="nota1[]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="nota2[]" class="form-label">Nota 2:</label>
                    <input type="number" step="0.01" id="nota2[]" name="nota2[]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="nota3[]" class="form-label">Nota 3:</label>
                    <input type="number" step="0.01" id="nota3[]" name="nota3[]" class="form-control" required>
                </div>
            </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Calcular Médias</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomes = $_POST['nomes'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];

            $alunos = [];

            foreach ($nomes as $i => $nome) {
                if($nome != "" && is_numeric($nota1[$i]) && is_numeric($nota2[$i]) && is_numeric($nota3[$i])){
                    $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;
                    $alunos[$nome] = $media;
                }
            }
            arsort($alunos);
            echo "<h3 class='mt-4'>Lista de Alunos por Média</h3>";
            echo "<ul class='list-group'>";
            foreach ($alunos as $nome => $media) {
                echo "<li class='list-group-item'><b>$nome</b> - Média: " . number_format($media, 2) . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>

</html>
