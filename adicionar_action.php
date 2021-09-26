<?php 
require('config.php');
require('DAO/UsuarioDAO.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($nome && $email) {
    $usuarioDAO = new UsuarioDAO($pdo);
    // Verifica se o e-mail já existe no banco
    if (!$usuarioDAO->findByEmail($email)) {
        $u = new Usuario();
        $u->setNome($nome);
        $u->setEmail($email);
        // Adiciona novo usuário
        $usuarioDAO->add($u);

        header("Location: index.php");
        exit;
    } else {
        // Se o usuário já existir
        header("Location: adicionar.php");
        exit;
    }
} else {
    // Se o usuário não preencher todos os campos
    header("Location: adicionar.php");
    exit;
}
