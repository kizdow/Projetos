<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redireciona para a página de login se não estiver autenticado
    header('Location: login.php');
    exit;
}

// Exibe uma mensagem de boas-vindas e um link para logout
echo "Bem-vindo, " . $_SESSION['user_name'] . "!";
echo "<br><a href='logout.php'>Logout</a>";
?>