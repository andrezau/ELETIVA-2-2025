<?php
    require("cabecalho.php");
    require("conexao.php");

    $usuarios = $pdo->query("SELECT id, nome FROM usuario")->fetchAll();
    $espacos  = $pdo->query("SELECT id, nome FROM espaco")->fetchAll();
    $eventos  = $pdo->query("SELECT id, titulo FROM evento")->fetchAll();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try {
            $sql = "INSERT INTO reserva (usuario_id, espaco_id, evento_id, data_hora_inicio, data_hora_fim) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['usuario'], 
                $_POST['espaco'], 
                $_POST['evento'], 
                $_POST['inicio'], 
                $_POST['fim']
            ]);
            header("location: reservas.php?status=success");
        } catch(Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header text-white" style="background-color: var(--navy-light);">
                <h4>Registrar Nova Reserva (RF4)</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label>Data Início</label>
                            <input type="datetime-local" name="inicio" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Data Fim</label>
                            <input type="datetime-local" name="fim" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Espaço Público</label>
                        <select name="espaco" class="form-select" required>
                            <option value="">Selecione...</option>
                            <?php foreach($espacos as $e): ?>
                                <option value="<?= $e['id'] ?>"><?= $e['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tipo de Evento</label>
                        <select name="evento" class="form-select" required>
                            <option value="">Selecione...</option>
                            <?php foreach($eventos as $ev): ?>
                                <option value="<?= $ev['id'] ?>"><?= $ev['titulo'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Responsável (Usuário)</label>
                        <select name="usuario" class="form-select" required>
                            <option value="">Selecione...</option>
                            <?php foreach($usuarios as $u): ?>
                                <option value="<?= $u['id'] ?>"><?= $u['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Confirmar Reserva</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require("rodape.php"); ?>