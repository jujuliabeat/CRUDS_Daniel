<?php
#Classe Controller para o model de Disciplina

require_once(__DIR__ . "/../dao/DisciplinaDAO.php");

class DisciplinaController {

    private DisciplinaDAO $disciplinaDAO;

    public function __construct() {
        $this->disciplinaDAO = new DisciplinaDAO();        
    }

    public function listarPorCurso(int $idCurso) {
        return $this->disciplinaDAO->listByCurso($idCurso);
    }

}