<?php
    
    require_once(__DIR__."/../service/LoginService.php");
    require_once(__DIR__."/../dao/UsuarioDAO.php");

    class LoginController {

        private LoginService $loginService;
        private UsuarioDAO $usuarioDAO;

        public function __construct() {

            $this->loginService = new LoginService();
            $this->usuarioDAO = new UsuarioDAO();

        }

        public function logar($usuario, $senha) {

            // Valida se os campos estão preenchidos

            $erros = $this->loginService->validarDados($usuario, $senha);

            if($erros)

            return $erros;


            // Buscando o usuário pelo login e senha

            $usuario = $this->usuarioDAO->findByLoginSenha($usuario, $senha);

            if(! $usuario) {
                array_push($erros, "Usuário ou senha inválidos");
                return $erros;
            }

            $this->loginService->salvarUsuarioSessao($usuario);

            return array();
        }

        public function verificarUsuarioLogado() {

            $nomeUsuario = $this->loginService->getNomeUsuarioSessao();
            if($nomeUsuario)
                return true;

            return false;
        }
        
        public function getNomeUsuario() {

            return $this->loginService->getNomeUsuarioSessao();
            
            
        }
        
        public function deslogar() {

            return $this->loginService->getNomeUsuarioSessao();
            
            
        }
    }
?>