<?php

    require_once (__DIR__."/../controller/TurmaController.php");
    require_once (__DIR__."/../model/Turma.php");
    require_once (__DIR__."/../model/Disciplina.php");

    // Capturar os parâmentros POST 
    $ano = is_numeric($_POST['ano']) ? $_POST['ano'] : 0;
    $idCurso = is_numeric($_POST['idCurso']) ? $_POST['idCurso'] : 0;
    $idDisc = is_numeric($_POST['idDisc']) ? $_POST['idDisc'] : 0;

    $turma = new Turma();

    // Sets dos valores da turma
    $turma ->setAno($ano);
    
    if($idDisc) {

        $disc = new Disciplina();
        $disc->setId($idDisc);
        $turma->setDisciplina($disc);
    }

    // Chamar o controller para salvar a turma 
    $turmaCont = new TurmaController();
    $erros = $turmaCont->salvar($turma);

    // Retornar os erros ou uma string vazia se não houverem erros 
    $msgErro = "";
    if($erros)
        $msgErro = implode("<br>" , "erros"); 

    echo $msgErro;

    // echo $ano . " - " . $idCurso . " - " . $idDisc;

?>