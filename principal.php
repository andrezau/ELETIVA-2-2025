<?php
    require("cabecalho.php");
    require("conexao.php");

    try {
        $total_reservas = $pdo->query("SELECT COUNT(*) FROM reserva")->fetchColumn();
        $total_espacos  = $pdo->query("SELECT COUNT(*) FROM espaco")->fetchColumn();
        $total_eventos  = $pdo->query("SELECT COUNT(*) FROM evento")->fetchColumn();
        $total_usuarios = $pdo->query("SELECT COUNT(*) FROM usuario")->fetchColumn();
    } catch (Exception $e) {
        $total_reservas = $total_espacos = $total_eventos = $total_usuarios = 0;
    }
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 style="color: var(--navy-main); font-weight: 700;">Visão Geral</h2>
        <p class="text-muted mb-0">Acompanhe os indicadores do sistema em tempo real.</p>
    </div>
    <div class="no-print">
        <span class="badge bg-secondary"><?= date('d/m/Y') ?></span>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid var(--navy-main) !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title text-muted mb-0 text-uppercase fw-bold" style="font-size: 0.8rem;">Reservas Totais</h6>
                    <span style="font-size: 1.5rem;">📅</span>
                </div>
                <h2 class="display-4 fw-bold mb-0" style="color: var(--navy-main);"><?= $total_reservas ?></h2>
                <a href="reservas.php" class="btn btn-link text-decoration-none p-0 mt-2 small fw-bold">Ver lista completa →</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid #198754 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title text-muted mb-0 text-uppercase fw-bold" style="font-size: 0.8rem;">Espaços Públicos</h6>
                    <span style="font-size: 1.5rem;">🏟️</span>
                </div>
                <h2 class="display-4 fw-bold mb-0 text-dark"><?= $total_espacos ?></h2>
                <a href="espacos.php" class="btn btn-link text-decoration-none p-0 mt-2 small fw-bold text-success">Gerenciar espaços →</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid #fd7e14 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title text-muted mb-0 text-uppercase fw-bold" style="font-size: 0.8rem;">Tipos de Eventos</h6>
                    <span style="font-size: 1.5rem;">🎉</span>
                </div>
                <h2 class="display-4 fw-bold mb-0 text-dark"><?= $total_eventos ?></h2>
                <a href="eventos.php" class="btn btn-link text-decoration-none p-0 mt-2 small fw-bold text-warning">Gerenciar tipos →</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid #0dcaf0 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title text-muted mb-0 text-uppercase fw-bold" style="font-size: 0.8rem;">Usuários</h6>
                    <span style="font-size: 1.5rem;">👥</span>
                </div>
                <h2 class="display-4 fw-bold mb-0 text-dark"><?= $total_usuarios ?></h2>
                <a href="usuarios.php" class="btn btn-link text-decoration-none p-0 mt-2 small fw-bold text-info">Ver usuários →</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="card-title mb-3" style="color: var(--navy-main);">O que você deseja fazer agora?</h5>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="nova_reserva.php" class="btn btn-primary px-4 py-2">
                        <span class="me-2">+</span>Nova Reserva
                    </a>
                    <a href="novo_espaco.php" class="btn btn-outline-secondary px-4 py-2">
                        <span class="me-2">+</span>Adicionar Espaço
                    </a>
                    <a href="novo_evento.php" class="btn btn-outline-dark px-4 py-2">
                        <span class="me-2">+</span>Novo Tipo de Evento
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require("rodape.php");
?>