<?php
function validarSenha($senha, $minCaracteres, $maxCaracteres) {
    $tamanhoSenha = strlen($senha);

    if ($tamanhoSenha < $minCaracteres || $tamanhoSenha > $maxCaracteres) {
        return false;
    }

    return true;
}

