<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $localizacao = $_POST['localizacao'];
        $capacidade = $_POST['capacidade'];

        try{
            $sql = "INSERT INTO espaco (nome, localizacao, capacidade) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            
            if($stmt->execute([$nome, $localizacao, $capacidade])){
                header("location: espacos.php?status=success");
                exit();
            }
        } catch(Exception $e){
            $erro = "Erro ao cadastrar: " . $e->getMessage();
        }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        
        <div class="mb-4 text-center">
            <h2 style="color: var(--navy-main); font-weight: 700;">Novo Espaço Público</h2>
            <p class="text-muted">Cadastre quadras, auditórios ou salas disponíveis para reserva.</p>
        </div>

        <?php if(isset($erro)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $erro ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="post">
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label text-muted small fw-bold">NOME DO ESPAÇO</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Quadra Poliesportiva A" required>
                    </div>

                    <div class="mb-3">
                        <label for="localizacao" class="form-label text-muted small fw-bold">LOCALIZAÇÃO / ENDEREÇO</label>
                        <input type="text" id="localizacao" name="localizacao" class="form-control" placeholder="Ex: Bloco C - Térreo" required>
                    </div>

                    <div class="mb-4">
                        <label for="capacidade" class="form-label text-muted small fw-bold">CAPACIDADE MÁXIMA (PESSOAS)</label>
                        <input type="number" id="capacidade" name="capacidade" class="form-control" placeholder="Ex: 50" min="1" required>
                        <div class="form-text">Número máximo de pessoas permitidas no local.</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Espaço
                        </button>
                        <a href="espacos.php" class="btn btn-outline-secondary">
                            Cancelar e Voltar
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