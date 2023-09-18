<!-- Controller para Projeto-->

<?php
    require_once(__DIR__."/../dao/ProjetoDAO.php");

    class ProjetoController {

        private ProjetoDAO $projetoDAO;

        public function __construct() {
            $this ->projetoDAO = new ProjetoDAO();
        }
            
        
        public function listar() {

            return $this->projetoDAO->list();
        }

    }
?>