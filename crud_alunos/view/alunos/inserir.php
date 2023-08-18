<?php
// View para inserir alunos

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__. "/../../controller/AlunoController.php");
    require_once(__DIR__. "/../../model/Aluno.php");
    require_once(__DIR__. "/../../model/Curso.php");

    if (isset($_POST['submetido'])) {
        // echo 'clicou no gravar';
        $nome = isset($_POST['submetido']) ? trim($_POST['nome']) : null;
        $idade = isset($_POST['idade']) and is_numeric($_POST['idade']) ? trim($_POST['idade']) : null;
        $estrang = isset($_POST['estrang']) ? trim($_POST['estrang']) : null;
        $idCurso = isset($_POST['curso']) and is_numeric($_POST['curso']) ? trim($_POST['curso']) : null;

        // Criar um Objeto aluno para persistência

        $aluno = new Aluno();
        $aluno->setNome($nome);
        $aluno->setIdade($idade);
        $aluno->setEstrangeiro($estrang);

        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);


        // Criar um Aluno Controller
        $alunoCont = new AlunoController();
        $erros = $alunoCont->inserir($aluno);

            if(! $erros) {
                // Redirecionar para o listar
                header("location: listar.php");
                exit;

            } else {
                print_r($erros);
            }

    }
    
// Inclui o formulario
include_once(__DIR__."/form.php");