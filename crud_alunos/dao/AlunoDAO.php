<?php
    // DAO para Aluno
    // DAO será com descrições em EN
    require_once(__DIR__ . "/../util/Connection.php");
    require_once(__DIR__ . "/../model/Aluno.php");
    require_once(__DIR__ . "/../model/Curso.php");

    class AlunoDAO{

        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        public function list() {
            $sql = "SELECT a.*," . 
            " c.nome AS nome_curso, c.turno As turno_curso".
            " FROM alunos a".
            " JOIN cursos c ON (c.id = a.id_curso)";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        private function mapBancoParaObjeto($result){
            $alunos = array();

            foreach($result as $reg){
                $aluno = new Aluno();
                $aluno->setId($reg['id']);
                $aluno->setNome($reg['nome']);
                $aluno->setIdade($reg['idade']);
                $aluno->setEstrangeiro($reg['estrangeiro']);

            $curso = new Curso();
            $curso->setId($reg['id_curso'])
                    ->setNome($reg['nome_curso'])
                    ->setTurno($reg['turno_curso']);

            $aluno->setCurso($curso);
                
            array_push($alunos, $aluno);
            }
            return $alunos;
        }
    }
?>