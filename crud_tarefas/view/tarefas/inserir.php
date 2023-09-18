<?php
// View para inserir alunos

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__. "/../../controller/TarefaController.php");
    require_once(__DIR__. "/../../model/Tarefa.php");
    require_once(__DIR__. "/../../model/Usuario.php");


    $msgErro = "";
    $Tarefa = null;

    if (isset($_POST['submetido'])) {
        // echo 'clicou no gravar';
        $titulo = trim($_POST['titulo']) ? trim($_POST['titulo']) : null;
        $descricao = trim($_POST['descricao']) ? $_POST['descricao'] : null;
        $dtCriacao = trim($_POST['dtCriacao']) ? trim($_POST['dtCriacao']) : null;
        $Trstatus = trim($_POST['dtCriacao']) ? trim($_POST['Trstatus']) : null;
        $id_Tarefa = is_numeric($_POST['Tarefa']) ? $_POST['Tarefa'] : null;
        $id_usuario = is_numeric($_POST['usuario']) ? $_POST['usuario'] : null;

        // Criar um Objeto Tarefa para persistência

        $Tarefa = new Tarefa();
        $Tarefa->setTitulo($titulo);
        $Tarefa->setDescricao($descricao);
        $Tarefa->setDtCriacao($dtCriacao);

        if($idUsuario) {
            $usuario = new Usuario();
            $usuario->setId($idCurso);
            $Tarefa->setusuario($curso);
        }


       
        $tarefaCont = new TarefaController();
        $erros = $tarefaCont->inserir($tarefa);

        if(! $erros) {
            
            header("location: listar.php");
            exit;

        } else {
            $msgErro = implode("<br>",$erros);
            
        }

    }
    
// Inclui o formulario
include_once(__DIR__."/form.php");