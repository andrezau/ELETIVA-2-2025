<?php
    require("cabecalho.php");
    require("conexao.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        try{
            $stmt = $pdo->prepare("INSERT INTO evento (titulo, descricao) VALUES (?, ?)");
            $stmt->execute([$titulo, $descricao]);
            header('location: eventos.php');
        }catch(Exception $e){
            echo "<div class='alert alert-danger'>Erro: ".$e->getMessage()."</div>";
        }
    }
?>

<h1 class="mb-4">Cadastrar Tipo de Evento</h1>
<form method="post" class="card p-4 shadow-sm">
    <div class="mb-3">
        <label class="form-label">Título do Evento (ex: Casamento, Reunião)</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descrição Detalhada</label>
        <textarea name="descricao" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php require("rodape.php"); ?>