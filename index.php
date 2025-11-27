<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Reservas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo Clean / Navy Blue */
    body { 
      background-color: #f0f2f5; 
      color: #333; 
      display: flex; 
      align-items: center; 
      height: 100vh; 
      font-family: 'Segoe UI', sans-serif;
    }
    .card { 
      background-color: #ffffff; 
      border: none; 
      border-top: 5px solid #0a192f; 
      box-shadow: 0 4px 20px rgba(0,0,0,0.1); 
      border-radius: 8px;
    }
    h2 { color: #0a192f; font-weight: 700; }
    .form-control { background-color: #f8f9fa; border: 1px solid #ced4da; padding: 12px; }
    .form-control:focus { border-color: #0a192f; box-shadow: 0 0 0 0.2rem rgba(10, 25, 47, 0.15); background-color: #fff; }
    .btn-primary { background-color: #0a192f; border: none; padding: 12px; font-weight: 600; letter-spacing: 0.5px; }
    .btn-primary:hover { background-color: #112240; }
    a { text-decoration: none; color: #0a192f; font-weight: 500; }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="card p-4">
          <div class="card-body">
            <div class="text-center mb-4">
               <span style="font-size: 3rem;">🏛️</span>
               <h2 class="mt-2">Login</h2>
               <p class="text-muted">Sistema de Reservas Públicas</p>
            </div>
            
            <?php
              if($_SERVER['REQUEST_METHOD'] == "POST"){
                require('conexao.php'); // Certifique-se que o erro de driver foi corrigido aqui
                
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                
                try{
                  // 1. Busca o usuário pelo Email
                  $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
                  $stmt->execute([$email]);
                  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                  
                  // 2. Lógica de Verificação
                  if($usuario){
                      // O usuário EXISTE. Agora confere a senha.
                      if(password_verify($senha, $usuario['senha'])){
                        session_start();
                        $_SESSION['acesso'] = true;
                        $_SESSION['nome'] = $usuario['nome'];
                        $_SESSION['id'] = $usuario['id'];
                        header('location: principal.php');
                      } else {
                        // Email existe, mas senha errada
                        echo "<div class='alert alert-danger py-2'>Senha incorreta! Tente novamente.</div>";
                      }
                  } else {
                      // O usuário NÃO EXISTE (Aqui está a mudança que você pediu)
                      echo "<div class='alert alert-warning py-3 text-center'>
                              <strong>Usuário não encontrado!</strong><br>
                              Este e-mail não possui cadastro.<br><br>
                              <a href='cadastro.php' class='btn btn-sm btn-outline-dark w-100'>Criar Conta Agora</a>
                            </div>";
                  }

                } catch(Exception $e){
                  echo "<div class='alert alert-danger'>Erro técnico: ".$e->getMessage()."</div>";
                }
              }
            ?>

            <form method="POST">
              <div class="mb-3">
                <label class="form-label text-muted small fw-bold">EMAIL</label>
                <input type="email" name="email" class="form-control" required placeholder="seu@email.com">
              </div>
              <div class="mb-4">
                <label class="form-label text-muted small fw-bold">SENHA</label>
                <input type="password" name="senha" class="form-control" required placeholder="••••••">
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">ACESSAR SISTEMA</button>
              </div>
            </form>
            
            <hr class="my-4">
            
            <p class="mb-0 text-center text-muted">
              Não possui acesso? <br>
              <a href="cadastro.php">Criar nova conta</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>