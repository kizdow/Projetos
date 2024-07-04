<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'post') {
    // Dados obtidos do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Criando criptografia, bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Preparação do sql
    $sql = 'INSERT INTO user (name,email,password) VALUES ( ? , ? , ? )';
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([ $name, $email, $hashed_password ])) { 
        // mensagem de successo
        echo "Registro realizado com sucesso. <a href='login.php'>Faça login Aqui</a>.";
    } else {
        echo "Erro ao registrar."; // mensagem de erro no registro
    };

} else {
    echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Registro</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-md-4'>
                        <h2 class='text-center'>Registro</h2>
                        <form method='POST' action='register.php'>
                            <div class='form-group'>
                                <label for='name'>Nome:</label>
                                <input type='text' class='form-control' id='name' name='name' required>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Email:</label>
                                <input type='email' class='form-control' id='email' name='email' required>
                            </div>
                            <div class='form-group'>
                                <label for='password'>Senha:</label>
                                <input type='password' class='form-control' id='password' name='password' required>
                            </div>
                            <button type='submit' class='btn btn-primary btn-block mt-3'>Registrar</button>
                        </form>
                        <p class='text-center mt-3'>Já tem uma conta? <a href='login.php'>Login</a></p>
                    </div>
                </div>
            </div>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
        </body>
        </html>
        ";
};