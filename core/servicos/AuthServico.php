<?php

require_once __DIR__ . '/../../modelos/UsuarioModelo.php';

class AuthServico
{
    public UsuarioModelo $usuario;

    public function __construct()
    {
        $this->autenticado();
    }

    public function autenticado(): bool
    {
        if (isset($_SESSION['auth']['id'])) {
            $this->carregar($_SESSION['auth']['id']);
            return true;
        }
        return false;
    }

    public function autenticar(string $usuario, string $senha): bool
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
        $stmt = db()->prepare($sql);
        $stmt->bindValue(':usuario', $usuario);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        $usuario = $stmt->fetch();

        if ($usuario) {
            $_SESSION['auth']['id'] = $usuario['id'];
            return true;
        }

        return false;
    }

    private function carregar(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = db()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $usuario = $stmt->fetch();

        $this->usuario = new UsuarioModelo($usuario['id'], $usuario['usuario'], $usuario['nome']);
    }

    public function sair(): void
    {
        session_destroy();
    }
}