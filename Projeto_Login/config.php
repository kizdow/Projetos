<?php
// config bd
$host = 'localhost';
$db = 'login_system';
$user = 'root';
$password = 'root';
$charset = 'utf8mb4';

// data source name (dns)
$dns = "mysql:host=$host;dbname=$db;charset=$charset";

//  opção de configuração de PDO
$options = [
    PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erros
    PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC, // Modo de busca padrão: arrays associativos
    PDO::ATTR_EMULATE_PREPARES     => false, // Desatitva emulação de preparos para maior segurança
];

// Tenta estabelecer a conexão com o banco de dados usando PDO
try {
    $pdo = new PDO($dns, $user, $password, $options);
} catch (\PDOException $e) {
    // Em caso de erro, lança uma exceção com a mensagem de erro
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
};

?>