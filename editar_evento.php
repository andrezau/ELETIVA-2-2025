<?php
    require("cabecalho.php");
    require("conexao.php");

    if(!isset($_GET['id'])){
        header("location: eventos.php");
        exit();
    }

    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM evento WHERE id = ?");
        $stmt->execute([$id]);
        $evento = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$evento){
            header("location: eventos.php");
            exit();
        }
    } catch(Exception $e) {
        die("Erro ao buscar: " . $e->getMessage());
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        try{
            $stmt = $pdo->prepare("UPDATE evento SET titulo = ?, descricao = ? WHERE id = ?");
            if($stmt->execute([$titulo, $descricao, $id])){
                header("location: eventos.php?status=edited");
                exit();
            }
        } catch(Exception $e){
            $erro = "Erro ao atualizar: " . $e->getMessage();
        }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        
        <div class="mb-4 text-center">
            <h2 style="color: var(--navy-main); font-weight: 700;">Editar Tipo de Evento</h2>
            <p class="text-muted">Altere o nome ou descrição do evento.</p>
        </div>

        <?php if(isset($erro)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= $erro ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="post">
                    <input type="hidden" name="id" value="<?= $evento['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">TÍTULO DO EVENTO</label>
                        <input type="text" name="titulo" class="form-control" 
                               value="<?= $evento['titulo'] ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted small fw-bold">DESCRIÇÃO</label>
                        <textarea name="descricao" class="form-control" rows="4"><?= $evento['descricao'] ?></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Salvar Alterações</button>
                        <a href="eventos.php" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require("rodape.php"); ?>