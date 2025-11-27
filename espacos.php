<?php
    require("cabecalho.php");
    require("conexao.php");
    
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') echo "<div class='alert alert-success'>Operação realizada com sucesso!</div>";
        else echo "<div class='alert alert-danger'>Erro na operação!</div>";
    }

    $stmt = $pdo->query("SELECT * FROM espaco");
    $espacos = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--navy-dark);">Gerenciar Espaços Públicos</h2>
    <a href="novo_espaco.php" class="btn btn-primary">Adicionar Espaço</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Espaço</th>
                    <th>Localização</th>
                    <th>Capacidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($espacos as $e): ?>
                <tr>
                    <td><?= $e['id'] ?></td>
                    <td><strong><?= $e['nome'] ?></strong></td>
                    <td><?= $e['localizacao'] ?></td>
                    <td><?= $e['capacidade'] ?> pessoas</td>
                    <td>
                        <a href="editar_espaco.php?id=<?= $e['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                        <a href="excluir_espaco.php?id=<?= $e['id'] ?>" class="btn btn-sm btn-outline-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require("rodape.php"); ?>