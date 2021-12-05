<?php


class Navegador
{

    public static array $props;

    public function __construct()
    {
        $_SESSION['navegador']['voltar'] = $_SERVER['REQUEST_URI'];
    }

    public function pagina(string $pagina, array $props = []): static
    {
        static::$props = $props;
        require_once ABSPATH . 'paginas/' . $pagina . '.php';
        return new static;
    }

    public function redirecionar(string $uri, int $codigo): static
    {
        header('Location: ' . $uri, true, $codigo);
        return new static;
    }

    public function voltar(): static
    {
        header('Location: ' . $_SESSION['navegador']['voltar'], true, 302);
        return new static;
    }

    public function erro_404(): static
    {
        return $this->pagina('erros/404');
    }
}