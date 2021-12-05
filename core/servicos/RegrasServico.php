<?php

class RegrasServico
{

    public static function temPermissao(string $modulo, string $acao): bool
    {
        $sql = "SELECT u.usuario, rm.contexto as modulo, ra.contexto
                FROM usuarios u
                         JOIN regras_usuarios ru on u.id = ru.id_usuario
                         JOIN regras_funcoes rf on rf.id = ru.id_funcao
                         JOIN regras_operacoes ro on rf.id = ro.id_funcao
                         JOIN regras_acoes ra on ra.id = ro.id_acao
                         JOIN regras_modulos rm on rm.id = ro.id_modulo
                WHERE u.id = :id
                  AND ra.contexto = :acao
                  AND rm.contexto = :modulo";

        $stmt = db()->prepare($sql);
        $stmt->bindValue(':id', auth()->usuario->getId());
        $stmt->bindValue(':modulo', $modulo);
        $stmt->bindValue(':acao', $acao);
        $stmt->execute();

        $permissao = $stmt->fetch();

        if ($permissao)
            return true;

        return false;
    }

}