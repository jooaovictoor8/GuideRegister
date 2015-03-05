<?php
include_once 'crud/conexao.php';
include_once 'telas/avisosEjustificativas/crudAvisos.php';
include_once 'telas/includes/funcoesDeApoio.php';
$dadosAviso = array();
$temErros = false;
$errosValidacao = array();

$dadosAviso = array(
    'id' => 0,
    'nome' => (isset($_POST['nome'])) ? $_POST['nome'] : '',
    'Turma' => (isset($_POST['Turma'])) ? $_POST['Turma'] : '',
    'Curso' => (isset($_POST['Curso'])) ? $_POST['Curso'] : '',
    'conteudoAviso' => (isset($_POST['conteudoAviso'])) ? $_POST['conteudoAviso'] : '',
    'tituloAviso' => (isset($_POST['tituloAviso'])) ? $_POST['tituloAviso'] : '',
    'NomeP' => (isset($_POST['NomeP'])) ? $_POST['NomeP'] : '',
    'conteudoAviso' => (isset($_POST['conteudoAviso'])) ? $_POST['conteudoAviso'] : '',
    'Just' => (isset($_POST['Just'])) ? $_POST['Just'] : '',);

if (temPost() && isset($_POST['cadNovoAviso'])) {
    $dadosAviso = array();

 
    if (isset($_POST['tituloAviso']) && strlen($_POST['tituloAviso']) > 2) {
        $dadosAviso['tituloAviso'] = $_POST['tituloAviso'];
    } else {
        $temErros = true;
        $errosValidacao['tituloAviso'] = ''
                . '<div class="alert alert-error">'
                . '<button type="button" class="close" data-dismiss="alert">×</button>'
                . '<h4>Justificativa incompleta!</h4>'
                . 'Digite corretamente sua justificativa de falta'
                . '</div>';
    }

    if (isset($_POST['conteudoAviso']) && strlen($_POST['conteudoAviso']) > 0) {
        $dadosAviso['conteudoAviso'] = $_POST['conteudoAviso'];
    } else {
        $temErros = true;
        $errosValidacao['conteudoAviso'] = ''
                . '<div class="alert alert-error">'
                . '<button type="button" class="close" data-dismiss="alert">×</button>'
                . '<h4>Sem Conteúdo!</h4>'
                . 'Digite algo no conteúdo!'
                . '</div>';
    }
}
 if (!$temErros) {
        // Função de inserir no banco de dados
        inserirAvisos($conexao, $dadosAviso);
        die();
    }


