<?php

abstract class Metodo
{
    const GET = 'GET';
    const POST = 'POST';
}

class Rota
{
    private static array $rotas;
    private static string|null $grupo = null;
    private static string|null $guarda = null;

    public static function get(string $uri, string $controlador, string $acao): Rota
    {
        return static::adicionarRota($uri, $controlador, $acao, Metodo::GET);
    }

    public static function post(string $uri, string $controlador, string $acao): Rota
    {
        return static::adicionarRota($uri, $controlador, $acao, Metodo::POST);
    }

    public static function grupo(string $grupo, callable $rotas): void
    {
        static::$grupo = $grupo;
        $rotas();
        static::$grupo = null;
    }

    private static function adicionarRota(string $uri, string $controlador, string $acao, string $metodo): Rota
    {
        $uri = static::corrigirUri($uri);
        $uri = static::agrupar($uri);

        static::$rotas['rotas'][$uri][$metodo] = [$controlador, $acao];

        if (static::$guarda) {
            static::$rotas['rotas'][$uri][$metodo]['guarda'] = static::$guarda;
        }

        $rota = new Rota();
        $rota->uri = $uri;
        $rota->metodo = $metodo;

        return $rota;
    }

    public static function corrigirUri(string $uri): string
    {
        $tamanho = strlen($uri);

        if ($tamanho > 1 && $uri[$tamanho - 1] === '/') {

            $nova_uri = '';
            foreach (str_split($uri) as $index => $letra) {
                if ($index < $tamanho - 1)
                    $nova_uri .= $letra;
            }

            return $nova_uri;
        }

        return $uri;
    }

    private static function agrupar(string $uri): string
    {
        if (static::$grupo) {
            if ($uri === '' || $uri === '/') return (string)static::$grupo;
            return static::$grupo . '/' . $uri;
        }
        return $uri;
    }

    public static function ir(string $uri, string $metodo, Requisicao $requisicao): Navegador
    {

        $uri = static::corrigirUri($uri);

        if (isset(static::$rotas['rotas'][$uri][$metodo])) {

            if (isset(static::$rotas['rotas'][$uri][$metodo]['guarda'])) {

                $classe = static::$rotas['rotas'][$uri][$metodo]['guarda'];

                $guarda = new $classe();


                if (!$guarda->executar($requisicao)) {
                    return redirecionar($guarda->destino);
                }
            }

            $classe = static::$rotas['rotas'][$uri][$metodo][0];
            $metodo = static::$rotas['rotas'][$uri][$metodo][1];

            $controlador = new $classe();

            return $controlador->$metodo($requisicao);

        } elseif (isset(static::$rotas['rotas'][$uri]['redirecionar']))
            return redirecionar(static::$rotas['rotas'][$uri]['redirecionar']);

        return erro(404);
    }

    public static function guarda(string $guarda, callable $rotas): void
    {
        static::$guarda = $guarda;
        $rotas();
        static::$guarda = null;
    }

    public static function redirecionar(string $de, string $para): static
    {
        $de = static::corrigirUri($de);
        $de = static::agrupar($de);

        static::$rotas['rotas'][$de]['redirecionar'] = $para;
        return new static;
    }

    private string $uri;
    private string $metodo;

    public function nome(string $nome): void
    {
        static::$rotas['nomes'][$nome][$this->metodo] = $this->uri;
    }

}