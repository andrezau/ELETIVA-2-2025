<?php
    require("cabecalho.php");
    require("conexao.php");
    try {
        $sql_reservas = "SELECT r.id, r.data_hora_inicio, r.data_hora_fim, 
                                u.nome as usuario, e.nome as espaco, ev.titulo as evento
                         FROM reserva r
                         JOIN usuario u ON r.usuario_id = u.id
                         JOIN espaco e ON r.espaco_id = e.id
                         JOIN evento ev ON r.evento_id = ev.id
                         ORDER BY r.data_hora_inicio DESC";
        $lista_reservas = $pdo->query($sql_reservas)->fetchAll();

        $lista_espacos = $pdo->query("SELECT * FROM espaco ORDER BY nome")->fetchAll();

        $lista_eventos = $pdo->query("SELECT * FROM evento ORDER BY titulo")->fetchAll();

        $lista_usuarios = $pdo->query("SELECT * FROM usuario ORDER BY nome")->fetchAll();

    } catch (Exception $e) {
        echo "Erro ao gerar relatório: " . $e->getMessage();
        exit;
    }
?>

<div class="d-flex justify-content-between align-items-end mb-4 border-bottom pb-3">
    <div>
        <h2 style="color: var(--navy-main); font-weight: 700;">Relatório Geral do Sistema</h2>
        <p class="text-muted mb-0">Visão unificada de cadastros e movimentações.</p>
        <small class="text-secondary">Gerado em: <strong><?= date('d/m/Y \à\s H:i') ?></strong></small>
    </div>
    <div class="no-print">
        <button onclick="window.print()" class="btn btn-primary">
            🖨️ Imprimir Relatório
        </button>
    </div>
</div>

<div class="mb-5">
    <h4 class="mb-3 p-2 text-white rounded" style="background-color: var(--navy-light);">
        1. Histórico de Reservas
    </h4>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <table class="table table-sm table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data/Hora Início</th>
                        <th>Data/Hora Fim</th>
                        <th>Espaço Reservado</th>
                        <th>Tipo de Evento</th>
                        <th>Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($lista_reservas) > 0): ?>
                        <?php foreach($lista_reservas as $r): ?>
                        <tr>
                            <td>#<?= $r['id'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($r['data_hora_inicio'])) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($r['data_hora_fim'])) ?></td>
                            <td><?= $r['espaco'] ?></td>
                            <td><?= $r['evento'] ?></td>
                            <td><?= $r['usuario'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">Nenhuma reserva registrada.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <h5 class="mb-3 text-secondary border-bottom pb-2">2. Catálogo de Espaços Públicos</h5>
        <div class="card border-0 shadow-sm">
            <table class="table table-sm table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Localização</th>
                        <th>Cap.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_espacos as $e): ?>
                    <tr>
                        <td><strong><?= $e['nome'] ?></strong></td>
                        <td><?= $e['localizacao'] ?></td>
                        <td><?= $e['capacidade'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <h5 class="mb-3 text-secondary border-bottom pb-2">3. Tipos de Eventos Cadastrados</h5>
        <div class="card border-0 shadow-sm">
            <table class="table table-sm table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título do Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_eventos as $ev): ?>
                    <tr>
                        <td width="50"><?= $ev['id'] ?></td>
                        <td><?= $ev['titulo'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mb-5">
    <h5 class="mb-3 text-secondary border-bottom pb-2">4. Base de Usuários (Clientes)</h5>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <table class="table table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Email de Contato</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_usuarios as $u): ?>
                    <tr>
                        <td width="60"><?= $u['id'] ?></td>
                        <td><?= $u['nome'] ?></td>
                        <td><?= $u['email'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-none d-print-block mt-5 pt-5 text-center">
    <div style="border-top: 1px solid #000; width: 40%; margin: 0 auto;"></div>
    <p class="mt-2">Assinatura do Responsável</p>
</div>

<?php
    require("rodape.php");
?>