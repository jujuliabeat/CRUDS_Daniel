<?php
    // Controller para Aluno

    require_once(__DIR__."/../dao/AlunoDAO.php");

    class AlunoController {

        private $alunoDAO;

        public function __construct() {
            $this->alunoDAO =  new AlunoDAO;
        }

        public function listar() {
           return $this->alunoDAO->list();
        }
    }
?>