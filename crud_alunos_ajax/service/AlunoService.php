<?php 
//Classe service para aluno

require_once(__DIR__ . "/../model/Aluno.php");

class AlunoService {

    public function validarDados(Aluno $aluno) {
        $erros = array();
        
        //Validar o nome
        if(! $aluno->getNome()) {
            array_push($erros, "Informe o nome!");
        }

        //Validar a idade
        if(! $aluno->getIdade()) {
            array_push($erros, "Informe a idade!");
        }

        //Validar estrangeiro
        if(! $aluno->getEstrangeiro()) {
            array_push($erros, "Informe se o aluno é estrangeiro!");
        }

        //Validar curso
        if(! $aluno->getCurso()) {
            array_push($erros, "Informe o curso!");
        }

        return $erros;
    }

}