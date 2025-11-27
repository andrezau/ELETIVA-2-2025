<?php
    require("cabecalho.php");
    require("conexao.php");

    
    if(!isset($_GET['id'])){
        header("location: espacos.php");
        exit();
    }

    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM espaco WHERE id = ?");
        $stmt->execute([$id]);
        $espaco = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$espaco){
            header("location: espacos.php");
            exit();
        }
    } catch(Exception $e) {
        die("Erro ao buscar dados: " . $e->getMessage());
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $localizacao = $_POST['localizacao'];
        $capacidade = $_POST['capacidade'];

        try{
            $sql = "UPDATE espaco SET nome = ?, localizacao = ?, capacidade = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            
            if($stmt->execute([$nome, $localizacao, $capacidade, $id])){
                header("location: espacos.php?status=edited");
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
            <h2 style="color: var(--navy-main); font-weight: 700;">Editar Espaço</h2>
            <p class="text-muted">Atualize as informações do espaço abaixo.</p>
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
                    
                    <input type="hidden" name="id" value="<?= $espaco['id'] ?>">

                    <div class="mb-3">
                        <label for="nome" class="form-label text-muted small fw-bold">NOME DO ESPAÇO</label>
                        <input type="text" id="nome" name="nome" class="form-control" 
                               value="<?= $espaco['nome'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="localizacao" class="form-label text-muted small fw-bold">LOCALIZAÇÃO</label>
                        <input type="text" id="localizacao" name="localizacao" class="form-control" 
                               value="<?= $espaco['localizacao'] ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="capacidade" class="form-label text-muted small fw-bold">CAPACIDADE</label>
                        <input type="number" id="capacidade" name="capacidade" class="form-control" 
                               value="<?= $espaco['capacidade'] ?>" min="1" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Alterações
                        </button>
                        <a href="espacos.php" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<?php
    require("rodape.php");
?>