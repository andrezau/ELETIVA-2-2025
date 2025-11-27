<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Novo Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { 
      background-color: #f0f2f5; 
      color: #333; 
      padding-top: 40px;
      font-family: 'Segoe UI', sans-serif;
    }
    .card { 
      background-color: #ffffff; 
      border: none; 
      border-top: 5px solid #198754; 
      box-shadow: 0 4px 20px rgba(0,0,0,0.1); 
      border-radius: 8px;
    }
    h2 { color: #198754; font-weight: 700; }
    
    .form-control { 
      background-color: #f8f9fa; 
      border: 1px solid #ced4da; 
      padding: 12px;
    }
    .form-control:focus { 
      border-color: #198754; 
      box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15); 
      background-color: #fff;
    }
    
    .btn-success { 
      background-color: #198754; 
      border: none; 
      padding: 12px; 
      font-weight: 600; 
    }
    .btn-success:hover { background-color: #146c43; }
    a { text-decoration: none; color: #0a192f; }
  </style>
</head>
<body>
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4">
            <div class="text-center mb-4">
                <h2 class="mt-2">Criar Conta</h2>
                <p class="text-muted">Preencha seus dados para começar</p>
            </div>
            
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                require("conexao.php");
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
                
                try{
                    $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
                    if($stmt->execute([$nome, $email, $senha])){
                        echo "<div class='alert alert-success text-center'>
                                <strong>Sucesso!</strong><br>Cadastro realizado.<br>
                                <a href='index.php' class='alert-link'>Clique aqui para entrar.</a>
                              </div>";
                    }
                } catch(Exception $e){
                    echo "<div class='alert alert-danger'>Erro ao cadastrar: ".$e->getMessage()."</div>";
                }
            }
            ?>

            <form method="POST">
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">NOME COMPLETO</label>
                <input type="text" class="form-control" name="nome" required placeholder="Ex: João da Silva">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">EMAIL</label>
                <input type="email" class="form-control" name="email" required placeholder="seu@email.com">
            </div>
            <div class="mb-4">
                <label class="form-label text-muted small fw-bold">SENHA</label>
                <input type="password" class="form-control" name="senha" required placeholder="Crie uma senha forte">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">CADASTRAR-SE</button>
            </div>
            </form>
            
            <hr class="my-4">
            
            <p class="mt-3 text-center text-muted">
             Já tem uma conta? <br>
            <a href="index.php" class="fw-bold">Voltar para o Login</a>
            </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>