<?php 
require_once("./models/Usuario.php");

class UsuarioDAO {
    private $pdo;

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome' , $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        return true;
    }

    public function findAll() {
        // Lista de usuários
        $usuarios = [];
        // Define a instância da classe de acesso ao Banco de Dados (PDO)
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();

            foreach ($dados as $usuario) {
                $u = new Usuario();
                $u->setId($usuario['id']);
                $u->setNome($usuario['nome']);
                $u->setEmail($usuario['email']);

                $usuarios[] = $u;
            }
        }
        
        return $usuarios;
    }

    public function find($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->setId($usuario['id']);
            $u->setNome($usuario['nome']);
            $u->setEmail($usuario['email']);
        }

        return $u;
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->setId($usuario['id']);
            $u->setNome($usuario['nome']);
            $u->setEmail($usuario['email']);
        }

        return $u;
    }

    public function update(Usuario $u) {

    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }


}