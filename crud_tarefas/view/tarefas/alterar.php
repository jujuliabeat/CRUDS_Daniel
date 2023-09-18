<?php 
//View para alterar Projetos

require_once(__DIR__ . "/../../controller/ProjetoController.php");
require_once(__DIR__ . "/../../model/Projeto.php");
require_once(__DIR__ . "/../../model/Usuario.php");

$msgErro = "";
$projeto = null;

$projetoCont = new ProjetoController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    // echo 'clicou no gravar';
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : null;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;

    $idprojeto = $_POST['id'];
    // echo $idprojeto$projeto;
    // exit;

    // Criar um Objeto projeto$projeto para persistência

    $projeto = new Projeto();
    $projeto->setId($idprojeto);
    $projeto->setNome($nome);
    $projeto->setIdade($idade);
    $projeto->setEstrangeiro($estrang);

    if($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $projeto->setCurso($curso);
    }


    // Criar um projeto$projeto Controller
    $projetoCont = new projeto();
    $erros = $projetoCont->inserir($projeto);

    if(! $erros) {
        // Redirecionar para o listar
        header("location: listar.php");
        exit;

    } else {
        $msgErro = implode("<br>",$erros);
        // print_r($erros);
    }

} else {
    //Usuário apenas entrou na página para alterar
    $idprojeto = 0;
    if(isset($_GET['idprojeto$projeto']))
        $idprojeto = $_GET['idprojeto$projeto'];

    
    $projeto =  $projetoCont->buscarPorId($idprojeto);
    // print_r($projeto);
    if(! $projeto) {
        echo "projeto não encontrado!<br>";
        echo "<a href='listar.php'><br>Voltar</a>";
        exit;
    }
}

//Inclui o formulário
include_once(__DIR__ . "/form.php");