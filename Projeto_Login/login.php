<?php

include 'config.php'; // inclui configurações com o banco de dados
session_start(); // inicio da sessão

// Verifica se a requisição é do tipo POST
if($_SERVER['REQUEST_METHOD'] == 'post'){
    //obtém os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM user (name,email,password) VALUES (?,?,?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header ('Location: index.php');
        exit;
    } else {
        echo "Credenciais Inválidas";
    };

}else{
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <h2 class="text-center">Login</h2>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3">Não tem uma conta? <a href="register.php">Registre-se</a></p>
                    </div>
                </div>
            </div>
        </body>
        </html>';
};
?>