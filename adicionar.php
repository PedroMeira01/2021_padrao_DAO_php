<?php require("header.php"); ?>
    <h1>Adicionar usuário</h1>
    <form action="adicionar_action.php" method="POST">
        <label for="nome">Nome:</label> <br>
        <input type="text" name="nome" id="nome"> <br>
        <hr>
        <label for="emai">E-mail:</label> <br>
        <input type="text" name="email" id="email"> <br>
        <hr>
        <input type="submit" value="Cadastrar">
    </form>
<?php require("footer.php"); ?>