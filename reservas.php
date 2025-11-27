<?php
    require("cabecalho.php");
    require("conexao.php");

    try{
        $sql = "SELECT r.id, r.data_hora_inicio, r.data_hora_fim, 
                       u.nome as usuario_nome, 
                       e.nome as espaco_nome, 
                       ev.titulo as evento_titulo
                FROM reserva r
                INNER JOIN usuario u ON r.usuario_id = u.id
                INNER JOIN espaco e ON r.espaco_id = e.id
                INNER JOIN evento ev ON r.evento_id = ev.id
                ORDER BY r.data_hora_inicio DESC";
        
        $stmt = $pdo->query($sql);
        $reservas = $stmt->fetchAll();
    } catch(Exception $e){
        echo "<div class='alert alert-danger'>Erro: ".$e->getMessage()."</div>";
    }
?>

<h2 class="mb-4" style="color: var(--navy-dark);">Agenda de Reservas</h2>
<a href="nova_reserva.php" class="btn btn-primary mb-3">Nova Reserva</a>

<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Data/Hora</th>
                <th>Espaço</th>
                <th>Evento</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservas as $r): ?>
            <tr>
                <td>
                    <?= date('d/m/Y H:i', strtotime($r['data_hora_inicio'])) ?> <br>
                    <small class="text-muted">até <?= date('H:i', strtotime($r['data_hora_fim'])) ?></small>
                </td>
                <td><span class="badge bg-secondary"><?= $r['espaco_nome'] ?></span></td>
                <td><?= $r['evento_titulo'] ?></td>
                <td><?= $r['usuario_nome'] ?></td>
                <td>
                    <a href="excluir_reserva.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmar cancelamento?');">Cancelar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require("rodape.php"); ?>