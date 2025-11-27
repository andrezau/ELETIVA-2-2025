<?php
    require("cabecalho.php");
    require("conexao.php");

    $stmt = $pdo->query("SELECT * FROM evento");
    $dados = $stmt->fetchAll();
?>

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] == 'success'): ?>
        <div class='alert alert-success alert-dismissible fade show'>
            Evento cadastrado com sucesso! <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
    <?php elseif ($_GET['status'] == 'edited'): ?>
        <div class='alert alert-primary alert-dismissible fade show'>
            Evento atualizado com sucesso! <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
    <?php elseif ($_GET['status'] == 'deleted'): ?>
        <div class='alert alert-warning alert-dismissible fade show'>
            Evento excluído! <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
    <?php elseif ($_GET['status'] == 'error_fk'): ?>
        <div class='alert alert-danger alert-dismissible fade show'>
            <strong>Erro:</strong> Não é possível excluir este evento pois existem reservas agendadas com ele.
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--navy-main); font-weight: 700;">Tipos de Eventos</h2>
    <a href="novo_evento.php" class="btn btn-primary">
        + Novo Evento
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th class="text-end pe-4">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados as $d): ?>
                    <tr>
                        <td class="ps-4 text-muted"><?= $d['id'] ?></td>
                        <td><strong><?= $d['titulo'] ?></strong></td>
                        <td><?= $d['descricao'] ?></td>
                        <td class="text-end pe-4">
                            <a href="editar_evento.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary me-1">
                                Editar
                            </a>
                            <a href="excluir_evento.php?id=<?= $d['id'] ?>" 
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Tem certeza que deseja excluir este evento?');">
                                Excluir
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require("rodape.php"); ?>