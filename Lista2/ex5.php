    <!doctype html>
    <html lang="pt-BR">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
    <div class="container py-3">
        <h1>Escolher Mês</h1>
        <form method="post">
        <div class="row inline-row mb-3">
            <div class="col-md-3">
            <label for="mes" class="form-label">Mês:</label>
            <input type="number" id="mes" name="mes" class="form-control" required="">
            </div>
            <div class="col-md-6">
            <h4>Resultado:</h4>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mes = $_POST['mes'];
                switch($mes){
                case 1:
                    echo "Mês de Janeiro";
                    break;
                case 2:
                    echo "Mês de Fevereiro";
                    break;
                case 3:
                    echo "Mês de Março";
                    break;
                case 4:
                    echo "Mês de Abril";
                    break;
                case 5:
                    echo "Mês de Maio";
                    break;
                case 6:
                    echo "Mês de Junho";
                    break;
                case 7:
                    echo "Mês de Julho";
                    break;
                case 8:
                    echo "Mês de Agosto";
                    break;
                case 9:
                    echo "Mês de Setembro";
                    break;
                case 10:
                    echo "Mês de Outubro";
                    break;
                case 11:
                    echo "Mês de Novembro";
                    break;
                case 12:
                    echo "Mês de Dezembro";
                    break;
                default:
                    echo "Hoje pode ser qualquer mês";
            }
        }
            ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Escolher </button>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
    </body>

    </html>