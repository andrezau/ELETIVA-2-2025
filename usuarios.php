<?php
    require("cabecalho.php");
    require("conexao.php");

    $stmt = $pdo->query("SELECT * FROM usuario");
    $dados = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 style="color: var(--navy-main); font-weight: 700;">Usuários Cadastrados</h2>
        <p class="text-muted mb-0">Lista de cidadãos registrados no sistema.</p>
    </div>
    </div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: #f8f9fa;">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach($dados as $d): ?>
                <tr>
                    <td class="ps-4 text-muted"><?= $d['id'] ?></td>
                    <td><strong><?= $d['nome'] ?></strong></td>
                    <td><?= $d['email'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require("rodape.php"); ?>