<?php
require 'config.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
}else {
    echo '<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Venda Casada</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4"> 
                    <form action="">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div> <br>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div> 
            </div>
        </div>
    </body>
    </html>';
};

?>
