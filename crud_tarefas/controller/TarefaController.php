<!-- Controller para Tarefa-->

<?php

    require_once(__DIR__."/../dao/TarefaDAO.php");

    class TarefaController {

        private TarefaDao $tarefaDao;

        public function __construct() {
            $this ->tarefaDao = new TarefaDao();
        }
            
        
        public function listar() {

            return $this->tarefaDao->list();
        }

    }
?>