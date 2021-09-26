<?php
require("config.php");
require_once("DAO/UsuarioDAO.php");

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDAO = new UsuarioDAO($pdo);
    if ($usuarioDAO->find($id)) {
        $usuarioDAO->delete($id);
    }
}

header("Location: index.php");
exit;