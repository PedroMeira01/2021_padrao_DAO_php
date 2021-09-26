<?php
require('config.php');
require('DAO/UsuarioDAO.php');
require "header.php";

$usuarioDAO = new UsuarioDAO($pdo);
$usuarios = $usuarioDAO->findAll();

?>
    <a href="adicionar.php">Adicionar usuário</a> <br><br>
    <table border="1px" width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $u): ?>
            <tr>
                <td><?php echo $u->getId(); ?></td>
                <td><?php echo $u->getNome(); ?></td>
                <td><?php echo $u->getEmail(); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $u->getId(); ?>">[Editar]</a> 
                    <span>|</span> 
                    <a href="excluir.php?id=<?php echo $u->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">[Deletar]</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php require "footer.php"; ?>