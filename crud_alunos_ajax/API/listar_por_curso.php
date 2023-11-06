<?php

    require_once(__DIR__. "/../controller/DisciplinaController.php");

    $idCurso = $_GET['idCurso'];

    $discCont = new DisciplinaController();
    $disciplinas = $discCont-> listarPorCurso($idCurso);

    echo json_encode($disciplinas, JSON_UNESCAPED_UNICODE);
?>