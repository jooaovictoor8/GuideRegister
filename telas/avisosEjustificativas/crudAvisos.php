<?php
//---------------Avisos e Justificativas------------------

function inserirAvisos($conexao, $dados) {
    $sqlInserir = "insert into avisoejustificativa ("
            . "tituloAviso, "
            . "ConteudoAviso "
            . ")"
            . "VALUES('"
            . "{$dados['tituloAviso']}','"
            . "{$dados['conteudoAviso']}')";
    if (mysqli_query($conexao, $sqlInserir)) {
        echo 'fez a inserao';
    } else {
        print_r(mysqli_error($conexao));
        echo 'repita novamente a insersao';
    }

    unset($_POST);
}