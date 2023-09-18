<?php
    // Controller para Usuario

    require_once(__DIR__."/../dao/UsuarioDAO.php");

    class UsuarioController {

        private UsuarioDao $usuarioDao;

        public function __construct() {
            $this ->usuarioDao = new UsuarioDao();
        }
            
        
        public function listar() {

            return $this->usuarioDao->list();
        }

    }
?>